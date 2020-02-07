<?php
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script>
    function ajax(){
        var req= new XMLHttpRequest();
        req.onreadystatechange=function(){
            if(req.readyState==4 && req.status==200){
                document.getElementById('chat').innerHTML=req.responseText;
            }
        }
        req.open('GET','chat.php',true);
        req.send();
    }
    setInterval(function(){
        ajax();
    },1000)
    </script>
    <title>Simple Chat App</title>
</head>
<body onload="ajax()">
<div id="container">
    <div id="chat_box">
        <div id="chat"></div>
    </div>
    <form action="index.php" method="post">
    <input type="text" name="name" placeholder="Enter Name">
    <textarea name="message" id="message" cols="" rows="" placeholder="Enter Message"></textarea>
    <input type="submit" value="Send" name="submit">
    </form>
    <?php 
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $message=$_POST['message'];
    }
    $query="INSERT INTO chat (name,message) values ('$name','$message')";
    $run=$con->query($query);
    if($run){
        echo "<audio src='tick.mp3' hidden='true' autoplay='true'></audio>";
    }
    ?>
</div>
    
</body>
</html>