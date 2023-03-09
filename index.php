<?php
    include 'database.php';

    $sql = "SELECT * FROM customers";

    $result = $conn->query($sql);

    while($row = $result->fetch()){
        echo "<table>";
        echo '<tr><td>' .$row['name']  . '</td>';
        echo '<td>' .$row['email']. '</td>';
        echo '<td>' .$row['age']. '</td>';
        echo '<td>' .$row['balance']. '</td></tr><table>'; 
    }
?>