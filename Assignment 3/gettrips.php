<?php
    //connects to database
    include 'connecttodb.php';
    //gets name and order from user input and POST
    $name = $_POST["name"];
    $order = $_POST["order"];
    
    //creates query based on the selected values 
    if(($name == "TripName") && ($order =="Ascending")){
        $query = 'SELECT * FROM Trip ORDER BY TripName ASC';
    } 
    else if(($name == "TripName") && ($order =="Descending")){
        $query = 'SELECT * FROM Trip ORDER BY TripName DESC';
    }
    else if(($name == "CountryName") && ($order =="Ascending")){
        $query = 'SELECT * FROM Trip ORDER BY CountryName ASC';
    }
    else if(($name == "CountryName") && ($order =="Descending")){
        $query = 'SELECT * FROM Trip ORDER BY CountryName DESC';
    }
    else {
        $query = 'SELECT * FROM Trip';
    }      
    //runs query
    $result = mysqli_query ($connection,$query);
    //checks if failed
    if (!$result) {
         die ("database query failed.");
     }
    //adds headers to table
    echo '<tr>';
    echo '<th>Course Number</th>';
    echo '<th>Course Name</th>';
    echo '</tr>';
    //displays results and populates table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<td> '. $row["TripName"] . '</td>';
        echo '<td> '. $row["CountryName"] . '</td>';
        echo '</tr>';
    }
    //frees results 
    mysqli_free_result($result);
?>