<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Home | Big Chungus Bus Tours</title>
</head>

<body>
    <?php
    include 'connecttodb.php';
    ?>
    <h1>Big Chungus Bus Tours</h1>
    <!-- 1. List of our bus trips -->
    <h3>List of our bus trips</h3>
    <form action="" method="post" value="Show bus trip lists" class="center">
        <table class="center">
            <tbody>
                <tr>
                    <td>
                        <?php echo '<input type="radio" name="order" value="Descending" >' . ' Descending'; ?>
                    </td>
                    <td>
                        <?php echo '<input type="radio" name="order" value="Ascending" >' . ' Ascending'; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo '<input type="radio" name="name" value="TripName" >' . ' Order by trip name'; ?>
                    </td>
                    <td>
                        <?php echo '<input type="radio" name="name" value="CountryName" >' . ' Order by coutry'; ?>
                    </td>
                </tr>
                <input style="margin-left: 0px;" type="submit" value="Sort Bus Trips">
            </tbody>
        </table>

        <table border="1" class="center">
            <?php
            include 'gettrips.php';
            ?>
        </table>
    </form>
    <!-- 2. Allow the user to select one of the Bus Trips listed and change the trip name,
    start date or end date and the image URL but  NOT allow the user to modify the trip id or the country.  -->
    <tr>
        <h3>Modify bus trips</h3>
        <td style="text-align: center;">
            <!-- 2. Calls modifytrip to modify trip -->
            <form action="modifytrip.php" method="post">
                <input type="submit" value="Modify Trips">
            </form>
        </td>
    </tr>
    <!-- 3. Allow the user to select one of the trips listed and delete that trip. If the trip has any bookings,
    make sure you let the user know that that trip cannot be deleted. Any permanent deletions should always allow the user the chance to back out.   -->
    <tr>
        <h3>Remove bus trips</h3>
        <td style="text-align: center;">
            <!-- 2. Calls removetrip to remove trip -->
            <form action="removetrip.php" method="post">
                <input type="submit" value="Remove Trips">
            </form>
        </td>
    </tr>
    <!-- 4. Allow the user to enter a new trip.  The user should be able to enter all the information including a URL of a trip 
    picture (but they could leave this NULL also). Make sure they enter a valid bus for the trip (you could make the bus a dropdown or a radio button).   
    If the user enters a trip id that already exists, give the user a warning message and do not allow it to be entered into the system.  -->
    <tr>
        <h3>Add bus trips</h3>
        <td style="text-align: center;">
            <!-- 2. Calls addtrip to add trip -->
            <form action="addtrip.php" method="post">
                <input type="submit" value="Add Trips">
            </form>
        </td>
    </tr>
    <!-- 5. Allow the user to select a country and see all the bus trips from that country.  -->
    <script src="update.js"></script>
    <tr>
        <h3>View trips by country</h3>
        <form action"" method="post">
            <select name="CountryName" id="CountryName">
                <option value="1">Select Here</option>
                <?php
                //query to get provice code for drop down
                $query2 = 'SELECT DISTINCT CountryName FROM Trip ORDER BY CountryName;';
                //runs query 
                $result2 = mysqli_query($connection, $query2);
                //checks if query was successful 
                if (!$result2) {
                    die("database query failed.");
                }
                //displays result
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo '"<option value="' . $row["CountryName"] . '"> ' . $row["CountryName"] . '</option>';
                }
                ?>
            </select>
        </form>
        <!-- calls gettripbycountryname.php to load in the information and run a seperate query with the help of the javascript function listener -->
        <table border="1" class="center">
            <?php
            include 'gettripbycountryname.php';
            ?>
        </table>
    </tr>
    <!-- 6. Allow the user to create a booking for a trip. The user should be able to pick an existing passenger and 
    an existing trip and then enter the price for that trip. -->
    <tr>
        <h3>Book a trip</h3>
        <form action="createbooking.php" method="post">
            <input type="submit" value="Create Booking">
        </form>
    </tr>
    <!-- 7. List all the info about the passengers including passport information in order by last name. -->
    <tr>
        <h3>Passenger Information</h3>
        <table border="1" class="center">
            <?php
            include 'getpassengerinfo.php';
            ?>
        </table>
    </tr>
    <!-- 8. Select a passenger and see all of his/her bookings. -->
    <tr>
        <h3>View bookings by passenger</h3>
        <form action"" method="post">
            <select name="PassengerID" id="PassengerID">
                <option value="1">Select Here</option>
                <?php
                //query to get provice code for drop down
                $query2 = 'SELECT DISTINCT Books.PassengerID, FirstName, LastName FROM Passenger INNER JOIN Books ON Books.PassengerID  = Passenger.PassengerID;';
                //runs query 
                $result2 = mysqli_query($connection, $query2);
                //checks if query was successful 
                if (!$result2) {
                    die("database query failed.");
                }
                //displays result
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo '"<option value="' . $row["PassengerID"] . $row["FirstName"] . $row["LastName"] . '"> ' . $row["PassengerID"] . " - " . $row["FirstName"] . " " . $row["LastName"] . '</option>';
                }
                ?>
            </select>
            <td>
                <!-- user input submitted and calls the getpassengerinfo.php in order to run the query and get the information -->
                <input style="margin-left: 0px;" type="submit" value="View Booked Trip">
            </td>
        </form>
        <!-- calls getbookingbypassenger.php to load in the information and run a seperate query with the help of the javascript function listener -->
        <table border="1" class="center">
            <?php
            include 'getbookingbypassenger.php';
            ?>
        </table>
    </tr>
    <!-- 9. Allow the user to delete a booking. -->
    <tr>
        <h3>Remove trip booking</h3>
        <td style="text-align: center;">
            <!-- 2. Calls removebooking to modify start date -->
            <form action="removebooking.php" method="post">
                <input type="submit" value="Remove Bookings">
            </form>
        </td>
    </tr>
    <!-- 10. List all the bus trips that don't any bookings yet.  -->
    <tr>
        <h3>Empty trips</h3>
        <table border="1" class="center">
            <?php
            include 'getemptytrips.php';
            ?>
        </table>
    </tr>
    <?php
    mysqli_close($connection);
    ?>
</body>
</html>