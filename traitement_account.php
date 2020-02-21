<?php
require '_conf.php';

$newName=filter_input(INPUT_POST, 'newName');
$newPassword=filter_input(INPUT_POST, 'newPassword');

$hashNewPassword= password_hash($newPassword, PASSWORD_BCRYPT);

if(isset($newName)){
    $reqNewName='UPDATE identifiants SET name= ? WHERE name= ?;';
    
    $prep=$pdo->prepare($reqNewName);
    
    $prep->bindParam(1, $newName, PDO::PARAM_STR);
    $prep->bindParam(2, $_SESSION['userName'], PDO::PARAM_STR);
    
    $prep->execute();
}


if(isset($newPassword)){
    $reqNewPassword='UPDATE identifiants SET hashPassword= ? WHERE name= ?;';
    
    $prep=$pdo->prepare($reqNewPassword);
    
    $prep->bindParam(1, $hashNewPassword, PDO::PARAM_STR);
    $prep->bindParam(2, $_SESSION['userName'], PDO::PARAM_STR);
        
    $prep->execute();
}
header ('location: index.php');
