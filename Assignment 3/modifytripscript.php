<?php 
    //connects to database
    include 'connecttodb.php';
    //gets var from POST
    $TripID = $_POST['TripID'];
    $NewTripName = $_POST['NewTripName'];
    $NewStartDate = $_POST['NewStartDate'];
    $NewEndDate = $_POST['NewEndDate'];
    $NewImageUrl = $_POST['NewImageUrl'];
    
    // Update tripname
    $query = 'UPDATE Trip SET TripName = "' .$NewTripName . '"';
    // Update startdate
    if(!empty($NewStartDate)) {
        $query = $query . ', StartDate = "' . $NewStartDate .'"';
    }
    // Update enddate
    if(!empty($NewEndDate)) {
        $query = $query . ', EndDate = "' . $NewEndDate .'"';
    }
    //appends end of query to query
    if(!empty($NewImageUrl)) {
        $query = $query . ', urlmage = "' . $NewImageUrl .'"';
    }
    $query = $query . 'WHERE TripID = "' . $TripID . '"';
    //runs query
    $result=mysqli_query($connection,$query);
    //checks if failed
    if (!$result) {
        die("database query failed after.");
    }
    //returns to home
     else {
        header('Location:index.php');
        exit;
    }
?>