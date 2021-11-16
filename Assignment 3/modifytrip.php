<!DOCTYPE html>
<html>

<head>
    <!-- Creates the page header and link to style sheet -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title> Modify Trip | Big Chungus Bus Tours </title>
</head>

<body>
    <?php
    //connects to database
    include 'connecttodb.php'
    ?>
    <h1>Modify Trips</h1>
    <!-- creates form to call update course script once user has inputted -->
    <form action="modifytripscript.php" method="post">

        <!-- gets courses for user to select from -->
        <p>Select a trip to update:</p>
        <select name="TripID" id="TripID">
            <option value="1">Select Here</option>
            <?php
            //creates query to get all westerncourse info
            $query = 'SELECT * FROM Trip';
            //runs query
            $result = mysqli_query($connection, $query);
            //checks if failed
            if (!$result) {
                die("database query failed.");
            }
            //populates drop down with result
            while ($row = mysqli_fetch_assoc($result)) {
                echo '"<option value="' . $row["TripID"] . '"> ' . $row["TripID"] . ' - ' . $row["TripName"] . ' - ' . $row["StartDate"] . ' - ' . $row["EndDate"] . ' - ' . $row["CountryName"] . ' - ' . $row["LicenceID"] . '</option>';
            }
            mysqli_free_result($result);

            ?>
        </select><br>
        <!-- gets user input for new information to be loaded in -->
        What is the new trip name: <input type="text" name="NewTripName"><br>
        What is the new start date: <input type="text" name="NewStartDate"><br>
        What is the new end date: <input type="text" name="NewEndDate"><br>
        What is the new image url: <input type="text" name="NewImageUrl"><br>

        <!-- submits form -->
        <input type="submit" value="Update Selected Bus Trip">

    </form>

</body>

</html>