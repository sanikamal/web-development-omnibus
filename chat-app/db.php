<?php

$host="localhost";
$user="root";
$pass="";
$db_name="chat_app";

$con=new mysqli($host,$user,$pass,$db_name);

function dateFormat($date)
{
   return date('g:i a',strtotime($date));
}


?>