<?php

include 'connect.php';

$stmt = $db->prepare("UPDATE names set postcode = :postcode
                     WHERE firstname = :firstname");

$stmt->bindValue(':firstname', 'Sani');
$stmt->bindValue(':postcode', '781001');
$stmt->execute();



?>
