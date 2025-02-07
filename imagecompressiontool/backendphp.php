<?php
print_r(get_loaded_extensions());
die;
header('Content-Type: application/json');

// Ensure the request is a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Validate quality input
$quality = isset($_POST['quality']) ? (int)$_POST['quality'] : 50;
$quality = max(20, min($quality, 100)); // Clamp quality between 20 and 100

// Validate uploaded files
if (empty($_FILES['images']['name'][0])) {
    http_response_code(400);
    echo json_encode(['error' => 'No images uploaded']);
    exit;
}

// Create a temporary folder for compressed images
$folderPath = 'compressed-images';
if (!file_exists($folderPath)) {
    mkdir($folderPath, 0777, true);
}

$zip = new ZipArchive();
$zipPath = 'compressed-images.zip';

if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to create zip file']);
    exit;
}

$totalImages = count($_FILES['images']['name']);
$imagesCompressed = 0;

foreach ($_FILES['images']['tmp_name'] as $index => $tmpFilePath) {
    $originalFileName = $_FILES['images']['name'][$index];
    $outputFilePath = $folderPath . '/compressed-' . $originalFileName;

    try {
        // Compress image using Imagick
        $imagick = new Imagick($tmpFilePath);
        $imagick->setImageFormat('webp');
        $imagick->setImageCompressionQuality($quality);
        $imagick->writeImage($outputFilePath);
        $imagick->destroy();

        // Add compressed image to zip
        $zip->addFile($outputFilePath, 'compressed-' . $originalFileName);

        // Update progress
        $imagesCompressed++;
        $progress = ($imagesCompressed / $totalImages) * 100;
        echo json_encode(['progress' => $progress]);
        flush(); // Send progress to the client
    } catch (Exception $e) {
        error_log('Error compressing image: ' . $e->getMessage());
    }
}

$zip->close();

// Clean up compressed images
array_map('unlink', glob("$folderPath/*"));
rmdir($folderPath);

// Send the zip file path to the client
echo json_encode(['zipPath' => $zipPath]);
?>