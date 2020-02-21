<?php
require '_conf.php';
include 'includes/header.php';


$texte=filter_input(INPUT_POST, 'dialogue');
$date= date('d/m/y h:i:s');

$reqDialogue='INSERT INTO dialogue(user, date, texte) VALUES ( ?, ?, ?);';
$prep=$pdo->prepare($reqDialogue);

$prep->bindParam(1, $_SESSION['userName'], PDO::PARAM_STR);
$prep->bindParam(2, $date, PDO::PARAM_STR);
$prep->bindParam(3, $texte, PDO::PARAM_STR);
        
$prep->execute();
header('location:chat.php');

