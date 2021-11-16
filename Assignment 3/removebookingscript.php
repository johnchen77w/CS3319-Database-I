<?php 
    //connects to database and session and gets variables
    session_start();
    include 'connecttodb.php';
    $TripID = $_SESSION['TripID'];
    
    //creates delete query
    $query = 'DELETE FROM Books WHERE TripID ="' .$TripID . '";';
    //runs query
    $result=mysqli_query($connection,$query);
    //checks if failed
    if (!$result) {
        die("database query failed.");
    }
    //returns to home page
    header('Location:index.php');
            exit;
?>