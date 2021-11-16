<script>
    //function with pop up to confirm if user would like to delete a booking
    function removalconfirmation() {
        var delectConfirm;
        //pop up message
        delectConfirm = confirm("Are you sure about that?");
        if (delectConfirm) { // if clicked OK
            window.location.replace("removetripscript.php");
        } else {
            //if clicked cancel
            window.location.replace("index.php");
        }
    }
</script>

<?php
//starts session to pass variables to another page
session_start();
include 'connecttodb.php';
//creates variables 
$TripID = $_POST['TripID'];
$_SESSION['TripID'] = $_POST['TripID'];
$check = false;

$query1 = 'SELECT * FROM Books;';
//runs query
$result1 = mysqli_query($connection, $query1);
//checks if failed
if (!$result1) {
    die("database query failed during initial check.");
}

while ($row = mysqli_fetch_assoc($result1)) {
    if ($row['TripID'] != $TripID) {
        $check = false;
        //if yes then gives warning messag through js function
        echo '<script type="text/javascript">removalconfirmation();</script>';
    } else {
        $check = true;
        echo 'Cannot delete, this trip has one or more bookings.';
    }
}
?>