<?php
include('_conf.php');
    include('includes/header.php');
?>                  
<div class="row">
    <div class="col-md-3">
        <?php
        include ('includes/side_bar.php');
        ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <?php
            include ('includes/nav_bar.php');
            ?>
        </div>
        <div class="row">
            <?php
            include ('includes/second_bar.php');
            ?>
        </div>
        <div class="row">
            <?php
            include ('home.php');
            ?>
        </div>
    </div>
</div>
<?php
include("includes/footer.php");