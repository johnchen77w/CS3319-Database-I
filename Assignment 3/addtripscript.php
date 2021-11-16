<?php 
    //connects to data base and gets the variables from POST 
    include 'connecttodb.php';
    $TripID = $_POST['NewTripID'];
    $TripName = $_POST['NewTripName'];
    $StartDate = $_POST['NewStartDate'];
    $EndDate = $_POST['NewEndDate'];
    $CountryName = $_POST['NewCountryName'];
    $LicenceID = $_POST['NewLicenceID'];
    $urlmage = $_POST['NewImageUrl'];
    
    //creates query to check if trip already exists
    $query1 = 'SELECT * FROM Trip;';

    //runs query
    $result1=mysqli_query($connection,$query1);
    //checks if query fails 
    if (!$result1) {
        die("database query failed.");
    }
    // if TripID already exists in table then gives an alert and quits without inserting
    while ($row = mysqli_fetch_assoc($result1)) {
        if($row['TripID'] == $TripID){
            $message = "Trip Already in Table";
            echo '<script type="text/javascript">alert("'.$message.'"); window.location="index.php";</script>';
            break;   
        }
    }
    //insert query creation
    $query = 'INSERT INTO Trip (TripID, TripName, StartDate, EndDate, CountryName, LicenceID, urlmage) VALUES ("' .$TripID .'", "' .$TripName . '", "' .$StartDate . '", "' .$EndDate . '", "' .$CountryName . '", "' .$LicenceID . '", "' .$urlmage . '");';
    //runs insert query
    $result=mysqli_query($connection,$query);
    //checks if query failed
    if (!$result) {
        die("database query failed to add.");
    }
    //returns to home page
    header('Location:index.php');
    exit;
?>