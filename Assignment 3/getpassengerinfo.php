<?php
    include 'connecttodb.php';
    $query = "SELECT * FROM Passenger INNER JOIN Passport ON Passenger.PassengerID = Passport.PassengerID ORDER BY LastName";
    //runs query
    $result = mysqli_query ($connection,$query);
    //checks if failed
    if (!$result) {
         die ("database query failed.");
     }
    //adds headers to table
    echo '<tr>';
    echo '<th>Passenger ID</th>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Passport ID</th>';
    echo '<th>Country</th>';
    echo '<th>Expiry Date</th>';
    echo '<th>Birth Date</th>';
    echo '</tr>';
    //displays results and populates table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<td> '. $row["PassengerID"] . '</td>';
        echo '<td> '. $row["FirstName"] . '</td>';
        echo '<td> '. $row["LastName"] . '</td>';
        echo '<td> '. $row["PassportID"] . '</td>';
        echo '<td> '. $row["Country"] . '</td>';
        echo '<td> '. $row["ExpiryDate"] . '</td>';
        echo '<td> '. $row["BirthDate"] . '</td>';
        echo '</tr>';
    }
    //frees results 
    mysqli_free_result($result);
?>