<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('./php-config.php');
session_start();


if(isset($_GET['user-id'])){
    if(isset($_COOKIE['userId' . $_GET['user-id']])){
        if($_SESSION['userId' . $_GET['user-id']]){
            goto content;
        } else {
            header('lcoation: login.php');
        }
    }
} else {
    header('location: login.php');
    die();
}

content:

$userId = $_GET['user-id'];
$fetchUser = $conn->prepare("select * from signup where id = ?");
$fetchUser->execute([$userId]);
$userData = $fetchUser->fetch();
$userName = strtoupper($userData['name']);

// echo "<h1>Welcome $userName</h1>";

/* echo "<script type='text/javascript'>
 let b = 'ashraf';
 console.log(b);
 var a = prompt('you are okay ');
 console.log(a);
 console.log('hii');
 console.log('you are login page');
 </script>"; */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chat</title>
    <style>
        body { font-family: Arial, sans-serif; }
        #chat-box { width: 300px; height: 300px; border: 1px solid #000; overflow-y: scroll; padding: 10px; }
        #message { width: 200px; }
    </style>
</head>
<body>

<h2>Simple Chat</h2>
<div id="chat-box"></div>

<input type="text" id="username" placeholder="Your Name">
<input type="text" id="message" placeholder="Type a message">
<button onclick="sendMessage()">Send</button>

<script>
    async function sendMessage() {
        let sender = document.getElementById("username").value;
        let message = document.getElementById("message").value;

        if (!sender || !message) return alert("Name aur message likho!");

        let response = await fetch("send_message.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ sender, message })
        });

        let result = await response.json();
        if (result.status === "success") {
            document.getElementById("message").value = ""; // Clear input
            loadMessages(); // Chat refresh karo
        }
    }

    async function loadMessages() {
    try {
        let response = await fetch("get_messages.php");


        let text = await response.text();
        console.log("Raw Response: ", text); // Log the raw response

        // Ensure no extra characters or HTML in the response
        try {
            let messages = JSON.parse(text);
            
            let chatBox = document.getElementById("chat-box");
            chatBox.innerHTML = "";

            messages.forEach(msg => {
                chatBox.innerHTML += `<p><b>${msg.sender}:</b> ${msg.message}</p>`;
            });
        } catch (parseError) {
            console.error("JSON Parsing Error: ", parseError);
            alert("Invalid JSON Response: " + parseError.message);
        }

    } catch (error) {
        console.error("Error fetching messages:", error);
        alert("Error fetching messages: " + error.message);
    }

}

// Load messages every 2 seconds
setInterval(loadMessages, 2000);




</script>

</body>
</html>

