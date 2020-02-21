<?php
include '_conf.php';
include 'includes/header.php';
?>
<div class="row" onload="">
    <div class="col-md-3">
        <?php
        include 'includes/side_bar.php';
        ?>
    </div>
    <div class="col-md-9">
        <?php
        include 'includes/nav_bar.php';
        ?>
        <div class="col-md-12 blue">
            <div class="centre dialogue">
                <h3>
                    dialogue
                </h3>
                <div class="col-lg-12 col-md-12 blue">
                    <form method="POST" id="dialogue" action="traitement_chat.php">
                        <?php
                        if(isset($_SESSION['userName'])){   //on ne peut poster sur le forum
                                                            //que si on est connecté
                        ?>
                            <input class="text submit" type="text" name="dialogue" placeholder="écrivez ici">
                            <input type="submit">
                        <?php
                            }
                        ?>
                    </form>
                </div>
                <?php
                    $data= $pdo->query('SELECT * FROM dialogue')->fetchAll(PDO::FETCH_BOTH);        
                    
                    foreach (array_reverse($data) as list($a, $b, $c, $d)) {
                ?>
                <div class="row">
                        <div class="col-md-2 message">
                            <?php
                                echo '<p>De '.$b.'</p>';
                                if(isset($_SESSION['userName'])){   //on verifie si l'utilisateur est connecté
                                    if($b==$_SESSION['userName']){  
                                    //si le propriétaire du message est le meme que l'utilisater de session
                                    //il peut supprimer le message
                                        ?>                          
                                        <a href="?sup=<?php
                                            echo $a;
                                            ?>">X</a>
                                        <?php
                                    }
                                }  
                            ?>
                        </div>
                        <div class="col-md-10 col-12 message left">
                            <?php
                                    echo '<p>'.$d.'</p>';
                                ?>
                            <div class="col-md-12 div_date">
                            <div>
                                <?php
                                echo '<h6 class="date"> '.$c.' </h6>';
                            ?>
                            </div>
                        </div>
                        </div>
                        
                    
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>