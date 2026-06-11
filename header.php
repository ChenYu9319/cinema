<?php
session_start();
$db = new PDO("mysql:host=localhost;dbname=cinema", "root");
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}
?>