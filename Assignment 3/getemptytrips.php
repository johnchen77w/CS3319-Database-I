<?php
    include 'connecttodb.php';
    $query = "SELECT TripID, TripName FROM Trip WHERE TripID NOT IN (SELECT TripID FROM Books); ";
    //runs query
    $result = mysqli_query ($connection,$query);
    //checks if failed
    if (!$result) {
         die ("database query failed.");
     }
    //adds headers to table
    echo '<tr>';
    echo '<th>Trip ID</th>';
    echo '<th>Trip Name</th>';
    echo '</tr>';
    //displays results and populates table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<td> '. $row["TripID"] . '</td>';
        echo '<td> '. $row["TripName"] . '</td>';
        echo '</tr>';
    }
    //frees results 
    mysqli_free_result($result);
?>