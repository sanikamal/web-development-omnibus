<?php

include 'connect.php';

$stmt = $db->prepare("INSERT INTO names (firstname, lastname, postcode)
                     VALUES (:firstname, :lastname, :postcode)");

$stmt->bindValue(':firstname', 'Priya');
$stmt->bindValue(':lastname', 'das');
$stmt->bindValue(':postcode', '781002');
$stmt->execute();



?>
