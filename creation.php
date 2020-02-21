<?php
include('_conf.php');
    include('includes/header.php');
    include ('includes/side_bar.php');
?>  
<div id="identification">
    <form method="POST" action="traitement_creation.php">
        <p class="centre message">création d'un compte</p>
        <p><input type="text" name="name" placeholder="name"></p>
        <p><input type="password" name="password" placeholder="password"></p>
        <p><input type="password" name="verif_password" placeholder="password verification"></p>
        <p class="centre"><input type="submit" value="Création"></p>
    </form>
</div>
<?php



include("includes/footer.php");