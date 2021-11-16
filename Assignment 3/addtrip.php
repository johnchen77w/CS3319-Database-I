<!DOCTYPE html>
<html>

<head>
    <!-- Creates the home page header and link to style sheet -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title> Add Trip | Big Chungus Bus Tours </title>
</head>

<body>
    <!-- connects to databse -->
    <?php
    include 'connecttodb.php'
    ?>
    <h1> Add Trips </h1>

    <!-- calls addtripscript.php on submit -->
    <form action="addtripscript.php" method="post">
        <!-- gets user input -->
        What is the new trip id: <input type="text" name="NewTripID"><br>
        What is the new trip name: <input type="text" name="NewTripName"><br>
        What is the new start date: <input type="text" name="NewStartDate"><br>
        What is the new end date: <input type="text" name="NewEndDate"><br>
        What is the new destination country: <input type="text" name="NewCountryName"><br>
        What is the new bus: <input type="text" name="NewLicenceID"><br>
        What is the new image url: <input type="text" name="NewImageUrl"><br>

        <input type="submit" value="Add This Trip">
    </form>

</body>

</html>