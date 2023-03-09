<?php
    include "internationalVariants.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
        <?php


            echo "<table><tr id='define'>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Balance</th>
            </tr>";
            include 'database.php';

            while($row = $result->fetch()){
                if($index % 2 == 0){
                    echo "<tr data-key='$index' id='row1'><td><a href='#' data-key='$index' onclick='selectedCustoemr(this)'  style='text-decoration:none;color:black;'> " .$row['name']  . '</a></td>';
                    echo '<td>' .$row['email']. '</td>';
                    echo '<td>' .$row['age']. '</td>';
                    echo '<td>' .$row['balance']. '</td></tr>'; 
                }
                else{
                    echo  "<tr data-key='$index'><td><a href='#' data-key='$index' onclick='selectedCustoemr(this)' style='text-decoration:none;color:black;'> " .$row['name']  . '</a></td>';
                    echo '<td>' .$row['email']. '</td>';
                    echo '<td>' .$row['age']. '</td>';
                    echo '<td>' .$row['balance']. '</td></tr>'; 
                }
                $index += 1;
            }
            echo "</table>";
        ?>
    <script>
        let model = document.createElement('div');
        function selectedCustoemr(ele){
            model.style.display = 'block';
            let element = document.querySelector(`tr[data-key="${ele.getAttribute('data-key')}"]`);
            let username = ele.textContent;
            let email = element.childNodes[1].textContent;
            let age = element.childNodes[2].textContent;
            let balance = element.childNodes[3].textContent;
            model.innerHTML = `
            <div class="container">
                    <header>
                        <h1 style="text-algin:center;color:white;">${username}</h1>
                    </header>
                    <body>
                        <p> Customer Name: <span>${username} </span>
                        <p> Customer age: <span>${age} </span>
                        <p> Customer email: <span>${email} </span>
                        <p> Customer balance: <span>${balance} </span>
                    </body>
                    <footer>
                        <button onclick="openFormWindow()">Transfare Money</button>
                        <button onclick="closingForm($this)">Close</button>
                    </footer>
                </div>
            `;
            document.body.insertAdjacentElement('beforeend', model);
        }

        function openFormWindow(){
            console.log('Open Form Window');
            window.location.assign("./form.html");
        }

        function closingForm(el){
            model.style.display = 'none';
        }
    </script>
</body>
</html>