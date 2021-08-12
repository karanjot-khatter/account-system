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

$cid = $data['id'];
$cname = $data['name'];
$cpass = $data['password'];
$cphone = $data['phone'];
$cgender = $data['gender'];
$cdob = $data['dob'];
$cphoto = $data['photo'];
$created = $data['created_at'];
$verified = $data['verified'];

$fname = strtok($cname, ' ');