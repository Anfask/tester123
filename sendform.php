<?php

require 'vendor/autoload.php'; // Path to autoload.php from Firebase PHP SDK

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        !empty($_POST['name'])
        && !empty($_POST['email'])
        && !empty($_POST['phone'])
        && !empty($_POST['message'])
    ) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = isset($_POST["phone"]) ? $_POST["phone"] : ''; // Handling if phone is not set
        $message = $_POST["message"];

        // Initialize Firebase
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/path/to/firebase_credentials.json'); // Path to your Firebase credentials JSON file
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        $database = $firebase->getDatabase();

        // Push message data to Firebase
        $newPost = $database
            ->getReference('messages') // Choose a reference node in your Firebase database
            ->push([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
                'timestamp' => time() // Optionally, you can add a timestamp
            ]);

        if ($newPost->getKey()) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send message.";
        }
    }
}

?>
