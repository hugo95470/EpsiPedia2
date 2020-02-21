<?php
include 'includes/header.php';
include '_conf.php';
include 'includes/side_bar.php';
?>
<div class="row">
    <div class="col-8">
        <p class="message">
            name : 
            <?php
            if(isset($_SESSION['userName'])){
                echo $_SESSION['userName'];
            }
            ?>
        </p>
    </div>
    <div class="col-8">
        <form method="POST" action="traitement_account.php">
            <input type="text" name="newName" placeholder="change name">
            <input type="submit" value="modifier">
        </form>
    </div>
    <div class="col-8">
        <form method="POST" action="traitement_account.php">
            <input type="password" name="newPassword" placeholder="new password">
            <input type="submit" value="modifier">
        </form>
    </div>
    <div class="col-md-8">
        <form action="traitement_suppression.php">
            <input type="submit" value="supprimer mon comtpe">
        </form>
    </div>
</div>