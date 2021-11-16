<?php 
    //connects to data base and gets the variables from POST 
    include 'connecttodb.php';
    $PassengerID = $_POST['PassengerID'];
    $TripID = $_POST['TripID'];
    $Price = $_POST['Price'];
    
    $query = 'INSERT INTO Books (TripID, PassengerID, Price) VALUES ("' .$TripID. '", "'.$PassengerID. '", ' .$Price. ');';
    
    //runs query 
    $result=mysqli_query($connection,$query);
    //checks if query failed
    if (!$result) {
        die("database query failed to add.".mysqli_error($connection));
    }
    //returns to home page
     header('Location:index.php');
        exit;
?>