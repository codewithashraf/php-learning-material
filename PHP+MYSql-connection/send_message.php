<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('./php-config.php');


try {

    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!empty($data['sender']) && !empty($data['message'])) {
        $stmt = $conn->prepare("INSERT INTO messages (sender, message) VALUES (:sender, :message)");
        $stmt->execute([
            ':sender' => $data['sender'],
            ':message' => $data['message']
        ]);
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Sender or message missing"]);
    }

} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
