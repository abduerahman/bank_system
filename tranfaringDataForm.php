<?php
    include './database.php';
    $data =$_POST;
    $reciver_name = $_POST['reciver'];
    $sender_name = $_POST['sender_name'];
    $amount_of_moeny = $_POST['money_amount'];


    $sql = "SELECT * FROM customers WHERE `name` = '$sender_name'";
    $result1 = $conn->query($sql);

    $sql = "SELECT * FROM customers WHERE `name` = '$reciver_name'";
    $result2 = $conn->query($sql);

    while($row = $result1->fetch()){
        $balance = $row['balance'];
        if($balance >= $amount_of_moeny){
            $info;
            while($row2 = $result2->fetch()){
                $info = $row2;
            }
            $update_balance = $row['balance']- $amount_of_moeny;
            $update_balance_reciver = $info['balance'] + $amount_of_moeny;
            $sql = "UPDATE customers SET balance='$update_balance_reciver' WHERE `name`='$reciver_name'";
            $sql2 = "UPDATE customers SET balance='$update_balance' WHERE `name`='$sender_name'";   
            
            $sender_id = $row['id'];
            $reciver_id = $info['id'];
            $insertion = "INSERT INTO transfars (transfar_to,transfar_from,amount_of_money) VALUES ($reciver_id,$sender_id,$amount_of_moeny)";

            $stmt= $conn->prepare($sql);
            $stmt->execute();
            $stmt= $conn->prepare($sql2);
            $stmt->execute();

            $stmt= $conn->prepare($insertion);
            $stmt->execute();
        }
    }

    echo "<p>Successfully transition,Thanke for using out app</p>";
    echo "<p><a href='./index.html'>click here to redirect to the home page</a><p>";


?>