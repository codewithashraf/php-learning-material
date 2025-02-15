<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('./php-config.php');
try {

    $stmt = $conn->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 10");
    $messages = $stmt->fetchAll();
    // print_r($messages);
    header('Content-Type: application/json'); // Ensure JSON response
    echo json_encode($messages);

} catch (PDOException $e) {
    // echo json_encode(["error" => "Database error: " . $e->getMessage()]);
}
?>
