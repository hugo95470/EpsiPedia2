<?php
session_start();

$BddServeur='localhost';
$BddUser='phpuser';
$BddPassword='php';
$BddName='EpsiPedia';

$pdo=new PDO('mysql:host=localhost;dbname=EpsiPedia','phpuser','php');
//on créer un lien vers notre BDD

