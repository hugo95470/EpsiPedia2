<?php
include '_conf.php';
include 'includes/header.php';
include 'includes/side_bar.php';
?>
<div id="identification">
    <form method="POST" action="traitement_connexion.php">
        <p class="centre message">identification</p>
        <p><input type="text" name="name" placeholder="name"></p>
        <p><input type="password" name="password" placeholder="password"></p>
        <p class="centre"><input type="submit" value="Connexion"></p>
    </form>
</div>

<?php
include 'includes/footer.php';