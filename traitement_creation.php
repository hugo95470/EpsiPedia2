<?php
require '_conf.php';
include 'includes/header.php';

$name=filter_input(INPUT_POST, 'name');
$password=filter_input(INPUT_POST, 'password');
$verif_password=filter_input(INPUT_POST, 'verif_password');

//on verifie que le nom que nous a donné l'utilisateur n'est pas deja dans la base de données
$reqNameUser="SELECT name FROM identifiants WHERE name= ?";
$stmt=$pdo->prepare($reqNameUser);

$stmt->bindParam(1, $name, PDO::PARAM_STR);

$stmt->execute();
$userName=$stmt->fetch(PDO::FETCH_BOTH);



if($userName[0]!=$name){
?>
<div class="row">
<?php

if($password!=$verif_password){
?>
    <div class="col-11 centre">
        <p class="message">mots de passe non identique</p>
    </div>
    <div class="col-11 flex_around">
            <a class="centre" href="/EpsiPedia/creation.php">identification</a>
            <a class="centre" href="/EpsiPedia">menu</a>
    </div>
</div>
<?php
    
}
else{
$hashPassword=password_hash($password, PASSWORD_BCRYPT);
?>

<div class="col-11 centre"><p class="message">creation de compte validé<br>nom : <?=$name?><br>hash du mot de passe : <?=$hashPassword?></p></div>

<?php

$reqCreateUser='INSERT INTO identifiants(name, hashPassword, blog) VALUES (? , ?, "");';

$prep=$pdo->prepare($reqCreateUser);

$prep->bindValue(1, $name, PDO::PARAM_STR);
$prep->bindValue(2, $hashPassword, PDO::PARAM_STR).
        
$prep->execute();

?>

    <div class="col-11 flex_around">
            <a class="centre" href="/EpsiPedia/connexion.php">identification</a>
            <a class="centre" href="/EpsiPedia/creation.php">créer un autre compte</a>
            <a class="centre" href="/EpsiPedia">menu</a>
    </div>

<?php
}
}
else{
    ?>
    <div class="col-md-3">
        <?php
        include 'includes/side_bar.php';
        
        ?>
    </div>
    <div class="centre col-md-4 flex-around">
            <p class="message">sorry this name is already take</p>
            <a class="centre" href="/EpsiPedia/connexion.php">identification</a>
            <a class="centre" href="/EpsiPedia/creation.php">créer un autre compte</a>
            <a class="centre" href="/EpsiPedia">menu</a>
    </div>
<?php
    
}
include 'includes/footer.php';
