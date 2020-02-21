<?php
include 'includes/header.php';
include '_conf.php';
?>
<div class="row">
    <div class="col-md-3">
        <?php
        include 'includes/side_bar.php';
        ?>
    </div>
    <div class="col-md-9">
        <?php
        include 'includes/nav_bar.php';
        ?>
        
        
        <form class="centre" method="POST" action="traitement_mon_blog.php">
            <input class="text submit" type="text" name="ajouter" placeholder="ajouter du texte">
            <input type="submit">
        </form>
        
        
        <form class="centre" method="POST" action="traitement_mon_blog.php">
            <input class="text submit" type="text" name="remplacer" placeholder="remplacer le texte">
            <input type="submit">
        </form>
        
        
        <div class="col-md-12 centre">
            <?php
            $reqBlog='SELECT blog FROM identifiants WHERE name= ?;';
            
            $prep=$pdo->prepare($reqBlog);
            
            $prep->bindParam(1, $_SESSION['userName'], PDO::PARAM_STR);
            
            $prep->execute();
                    
            $mon_blog=$prep->fetchAll(PDO::FETCH_BOTH);
            
            ?><p class="text message"><?=$mon_blog[0][0]?></p><?php
            ?>
        </div>
    </div>
</div>
