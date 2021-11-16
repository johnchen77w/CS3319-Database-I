<!DOCTYPE html>
<html>

<head>
    <!-- Creates the home page header and link to style sheet -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title> Book Trip | Big Chungus Bus Tours </title>
</head>

<body>
    <?php
    //connects to database
    include 'connecttodb.php'
    ?>
    <h1>Book Trips</h1>
    <!-- creates form for submit to other page to add -->
    <form action="createbookingscript.php" method="post">

        <p>Select a trip:</p>
        <select name="TripID" id="TripID">
            <option value="1">Select Here</option>
            <?php
            $query = 'SELECT * FROM Trip';
            //runs query
            $result = mysqli_query($connection, $query);
            //checks if query failed
            if (!$result) {
                die("database query failed.");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                echo '"<option value="' . $row["TripID"] . '"> ' . $row["TripID"] . ' - ' . $row["TripName"] . '</option>';
            }
            mysqli_free_result($result);

            ?>
        </select><br>
        <p>Select a Passenger:</p>
        <select name="PassengerID" id="PassengerID">
            <option value="">Select Here</option>
            <?php
            $query1 = 'SELECT * FROM Passenger';
            //runs query
            $result1 = mysqli_query($connection, $query1);
            //checks if query failed
            if (!$result1) {
                die("database query failed.");
            }
            while ($row = mysqli_fetch_assoc($result1)) {
                echo '<option value="' . $row["PassengerID"] . '"> ' . $row["PassengerID"] . " - " . $row["FirstName"] . " " . $row["LastName"] . '</option>';
            }
            mysqli_free_result($result1);

            ?>
        </select><br>
        <p>Input Price:</p>
            <input type="text" name="Price"><br> <br>
        <!-- submits form and send to script file to do the insert -->
        <input type="submit" value="Book Trip">
    </form>

</body>

</html>