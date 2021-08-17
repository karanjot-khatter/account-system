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

$cid = $data['ID'];
$cname = $data['name'];
$cpass = $data['password'];
$cphone = $data['phone'];
$cgender = $data['gender'];
$cdob = $data['dob'];
$cphoto = $data['photo'];
$created = $data['creared_at'];
$verified = $data['verified'];

$fname = strtok($cname, ' ');

$reg_on = date('d M Y', strtotime($created));
