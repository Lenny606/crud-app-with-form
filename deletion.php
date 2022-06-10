<?php
session_start();
require_once "Region.php";
require_once 'DB.php';
require_once 'Session.php';

$success = DB::connect(
    'localhost',        
    'world',        
    'root',         
    '');


// your code here
$id = $_GET['id'] ?? null;
var_dump($id); 

if($id) {
    $region = DB::selectOne("SELECT * FROM `regions2` WHERE `id`=?", [$id], 'Region');
    
}

$region->delete();
header("Location: edit.php");