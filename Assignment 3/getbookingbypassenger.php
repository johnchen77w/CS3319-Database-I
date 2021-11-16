<?php
    //connects to database and get province code from POST
    include 'connecttodb.php';
    $PassengerID = $_POST["PassengerID"];
    //creates query to get universities whith the selected province code 
    $query = 'SELECT TripName FROM Passenger INNER JOIN Books ON Passenger.PassengerID = Books.PassengerID INNER JOIN Trip ON Trip.TripID = Books.TripID WHERE Books.PassengerID="'.$PassengerID.'";';
    //runs query
    $result=mysqli_query($connection,$query);
    //checks if query failed
    if (!$result) {
         die("database query failed.");
     }
    //sets headers of table
    echo'<tr>';
    echo '<th>Trips</th>';
    echo '</tr>';
    //displays results and populates table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<td> '. $row["TripName"] . '</td>';
        echo '</tr>';
    }
    //frees results 
    mysqli_free_result($result);
?>