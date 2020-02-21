<div id="purple" class="col">
    <div id="menu" class="row">
        <div class="col-lg-12 col-md-12 blue">
            <h3 class="centre text">
                <p>interclaires</p>
            </h3>
        </div>
        <div class="col-lg-12 col-md-12 blue">
            <h3 class="centre text">
                <p>bannière</p>
            </h3>
        </div>
        <div class="col-lg-12 col-md-12 blue">
            <h4 class="centre">
                <p>
                    <?php
                    if(isset($_GET['name'])){
                        echo 'blog de : '.$_GET['name'].'<br>';
                        }
                    else{
                        echo 'home';
                    }
                    ?>
                </p>
            </h4>
            <h5 class="centre">
                <p class="text">
                    <?php
                    if(isset($_GET['name'])){       //on affiche le blog de l'utilisateur recherché             
                        $reqBlog='SELECT blog FROM identifiants WHERE name= ?';
                        $stmt=$pdo->prepare($reqBlog);
                        $stmt->bindParam(1, $_GET['name'], PDO::PARAM_STR);
                        $stmt->execute();
                        $userBlog=$stmt->fetch(PDO::FETCH_BOTH);
                        echo $userBlog[0];
                        }else{                      //sinon on affiche l'home
                        echo 'this is the home pin pin pinnnnn';
                    }
                    ?>
                </p>
            </h5>
        </div>
        <div class="col-lg-12 col-md-12 blue">
            <h3 class="centre text">
                <p>collaborateurs</p>
            </h3>
        </div>
        <div class="col-lg-12 col-md-12 blue">
            <h3 class="centre text">
                <p>sources</p>
            </h3>
        </div>
    </div>
</div>
