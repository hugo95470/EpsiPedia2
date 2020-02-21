<?php
include '_conf.php';

$text_ajoute=filter_input(INPUT_POST, 'ajouter');
$text_remplace=filter_input(INPUT_POST, 'remplacer');

if(isset($text_ajoute)){//si il y a du texte dans ajouter alors on ajoute ce texte
    $reqBlog='UPDATE identifiants SET blog=CONCAT(blog, ?) WHERE name= ?;';
    
    $prep=$pdo->prepare($reqBlog); 
    
    $prep->bindParam(1, $text_ajoute, PDO::PARAM_STR);
    
}else{                  //sinon on remplace tout le contenu
    $reqBlog='UPDATE identifiants SET blog= ? WHERE name= ?;';
    
    $prep=$pdo->prepare($reqBlog);
    
    $prep->bindParam(1, $text_remplace, PDO::PARAM_STR);
    
}

$prep->bindParam(2, $_SESSION['userName'], PDO::PARAM_STR);


$prep->execute();

header ('location: mon_blog.php');

