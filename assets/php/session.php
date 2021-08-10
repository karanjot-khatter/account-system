<?php
session_start();
require_once 'authentication.php';
$cUser = new Auth();

if (!isset($_SESSION['user']))
{
    header('location:../../index.php');
    die;
}

$cEmail = $_SESSION['user'];

$data = $cUser->currentUser($cEmail);