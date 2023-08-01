<?php 
    require 'vendor/autoload.php'; // Make sure to include the path to your MongoDB PHP library if not in the same directory.

    // Connect to MongoDB
    $client = new MongoDB\Client($_ENV['DATABASE_URL']); // Replace with your MongoDB connection string
    
    // Select the database and collection
    $database = $client->selectDatabase('Blood_Donation_Project');
    $collection = $database->selectCollection('Blood_Grp_Data');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $bgroup = $_POST["bgroup"];
        $mobilenum = $_POST["mobilenum"];
    
        // Prepare the data to be inserted
        $data = [
            "name" => $name,
            "email" => $email,
            "bgroup" => $bgroup,
            "mobilenum" => $mobilenum,
        ];
    
        // Insert the data into MongoDB
        $collection->insertOne($data);
    
        // Redirect to a success page or do any other actions
        header("Location: success_page.php");
        exit();
    }

?>





