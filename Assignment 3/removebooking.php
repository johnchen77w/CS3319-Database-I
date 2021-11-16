<!DOCTYPE html>
<html>

<head>
    <!-- Creates the home page header and link to style sheet -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title> Remove Bookings | Big Chungus Bus Tours </title>
</head>

<body>

    <?php
    //connects to database
    include 'connecttodb.php'
    ?>
    <h1>Remove Bookings</h1>
    <!-- creates form that upon submit sends to check delete to see if an eqivalency exists -->
    <form action="confirmremovalbooking.php" method="post">

        <p>Select a trip to remove::</p>
        <!-- seelcts from westerncourses to delete -->
        <select name="TripID" id="TripID">
            <option value="1">Select Here</option>
            <?php
            //creates query to get all werstern course info
            $query = 'SELECT * FROM Books';
            //runs query
            $result = mysqli_query($connection, $query);
            //check if failed
            if (!$result) {
                die("database query failed.");
            }
            //displays the results in a selction drop down
            while ($row = mysqli_fetch_assoc($result)) {
                echo '"<option value="' . $row["TripID"] . '"> ' . $row["TripID"] . ' - ' . $row["PassengerID"] . ' - ' . $row["Price"]. '</option>';
            }
            mysqli_free_result($result);

            ?>
        </select><br>
        <!--submits form-->
        <input type="submit" value="Remove Selected Bookings">
    </form>

</body>

</html>