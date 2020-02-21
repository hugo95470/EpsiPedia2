<?php
include '_conf.php';

$reqSupp='DELETE FROM identifiants WHERE name= ?;';

$prep=$pdo->prepare($reqSupp);

$prep->bindParam(1, $_SESSION['userName'], PDO::PARAM_STR);


$prep->execute();

session_destroy();

header ('location: index.php');

