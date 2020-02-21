<?php
include 'includes/header.php';
include '_conf.php';
session_destroy();
header('location: index.php');