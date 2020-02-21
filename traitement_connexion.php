<?php
require '_conf.php';
include 'includes/header.php';

//on récupère le nom et password que l'utilisateur a entré lors de sa connexion
$namePost=filter_input(INPUT_POST, 'name');
$passwordPost=filter_input(INPUT_POST, 'password');

//on verifie que le nom que nous a donné l'utilisateur pour se connecter est bien dans la base de données
$reqNameUser="SELECT name FROM identifiants WHERE name= ?";
$stmt=$pdo->prepare($reqNameUser);
$stmt->bindParam(1, $reqNameUser, PDO::PARAM_STR);
$stmt->execute();
$userName=$stmt->fetch(PDO::FETCH_BOTH);


//on récupère le mot de passe associé au nom trouvé dans la base de données
$reqPasswordUser='SELECT hashPassword FROM identifiants WHERE name= ?';
$prep=$pdo->prepare($reqPasswordUser);
$prep->bindParam(1, $namePost, PDO::PARAM_STR);
$prep->execute();
$userPassword=$prep->fetch(PDO::FETCH_BOTH);

?>
<div class="row">
    <div class="col-4">
    <?php
    include 'includes/side_bar.php';
    ?>
    </div>
    <div class="col-4">
        <p class="centre">
        <?php

            if (password_verify($passwordPost, $userPassword['hashPassword'])){
                ?><p class="message">Le mot de passe est valide !<br></p><?php
                $_SESSION['userName']=$namePost;
                echo $_SESSION['userName'];
                header ('location: index.php');
            } else {
                ?><p class="message">Il doit y avoir une erreur dans le nom ou le mot de passe. <br></p><?php
        
        ?>
        </p>
        <div id="centre" class="col-12">
            <p class='centre'><a href="/EpsiPedia/connexion.php">s'identifier de nouveau</a></p>
        </div>
    </div>
</div>    
<?php
}