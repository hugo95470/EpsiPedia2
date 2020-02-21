<?php
include('_conf.php');
include('includes/header.php');

$recherche=filter_input(INPUT_POST, 'search');


?>                  
<div class="row">
    
    <div class="col-md-3">
        <?php
        include ('includes/side_bar.php');      //la side_bar
        ?>
    </div>
    
    
    <div class="col-md-9">
        <div class="row">
            <?php
            include ('includes/nav_bar.php');   //la nav_bar
            ?>
        </div>
        
        <form method="POST" action="recherche.php"> <!-- la barre de recherche  -->
                <input class="submit text" type="text" name="search" placeholder="recherche">
                <input type="submit">
        </form>
        
        <div class="row col-md-12 message">
            <p class="centre">recherche : 
                <?php                               //on ecrit ce que l'utilisateur a recherché
                    echo $recherche;
                ?>
            </p>
        </div>
        <div class="row col-md-12 message">
            <ul>
                    <?php
                        //on recherche si quelqu'un s'appelle comme la reherche
                        $reqRech='SELECT name FROM identifiants WHERE name="'.$recherche.'";';
                        $resRech=$pdo->query($reqRech)->fetch(PDO::FETCH_UNIQUE);

                        //on affiche le résultat si il y en a un
                        if (isset($resRech[0])) {
                    ?>
                <p>
                    <?php
                        echo $resRech[0];
                    ?>
                    a bien un blog
                    <a href="index.php?name=<?=$resRech[0];?>"> son blog</a>
                </p>
                        <?php
                    }else{
                        ?>
                            <p class="centre">desole personne ne s'appelle comme ca</p>
                        <?php
                    }

                    //on execute la recherche dans le blog de chaque utilisateur
                    $reqBlog='SELECT name FROM identifiants WHERE blog like"%'.$recherche.'%";';
                    $blog=$pdo->query($reqBlog)->fetchAll(PDO::FETCH_BOTH);

                    // affiche les resultats
                    foreach ($blog as list($a)){
                        ?>

                            <li>ce mot apparait bien dans le blog de
                            <a href="index.php?name=<?php
                                                    echo $a;
                                                    ?>
                               "><?php
                               echo $a;
                               ?></a></li>
                        <?php
                    }


                ?>
            </ul>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>

