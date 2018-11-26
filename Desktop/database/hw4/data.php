<?php
$servername = "localhost";
      $username = "root";
      $password = "mysql";
      $database = "yelp_db";
      $conn = new mysqli($servername, $username, $password, $database);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "";

      switch($_GET[action]){
        case 'monthly_2017': $sql = "SELECT MONTH(date) as n, COUNT(id) as t  FROM review WHERE YEAR(date) = 2017 group by MONTH(date);";
        break;
        case 'annual': $sql = "SELECT YEAR(date) as n, COUNT(id) as t  FROM review GROUP BY YEAR(date);";
        break;
        
        case 'monthly_2017_business': $sql = "SELECT MONTH(date) as n, COUNT(id) as t  FROM review WHERE YEAR(date) = 2017 AND business_id = 'lKq4Qsz13FDcAVgp49uukQ' group by MONTH(date);";
        break;
        default: $sql = "";
        break;
      }
      $result = $conn->query($sql);
      $output = "letter\tfrequency\n";
      if ($result){
        while($row = $result->fetch_assoc())
        {
            $output .= $row['n']."\t".$row['t']."\n"; 
        }
      }
      $result->free();
      echo $output;
      // Close connection
      mysqli_close($conn);
?>