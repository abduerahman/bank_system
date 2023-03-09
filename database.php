<?php
    try{

        $username = 'root';
        $password ='root';

        $conn = new PDO('mysql:host=localhost;dbname=bankSystem', $username, $password);
        
        $sql = "SELECT * FROM customers";
        $result = $conn->query($sql);
    }
    catch(PDOException $pe){
        die('Error connecting' . $pe);
    }
?>