<?php
   $query = "SELECT * FROM Trip";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Order By:" . "<br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="Trips" value="';
        echo $row["TripID"];
        echo '">' . $row["TripID  "] . " " . $row["TripName  "] . " " . $row["StartDate  "] . " " . $row["StartDate  "] . " " . $row["CountryName  "] .  " " . $row["LicenceID  "] . "<br>";
   }
   mysqli_free_result($result);
?>