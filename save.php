<!-- handles save + validation then redirect to edit (edit prepares and return to client) -->

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
$id = $_GET['id']?? null;
var_dump($id); 

if($id) {
    // $region = find($id, "name");
} else {
    $region = new Region;
}

//VALIDATION//////////////
$valid = true;
$errors = [];

if(empty($_POST["name"])){
    $valid = false;
    $errors[] = "Hey, you forgot the name!" ;
}
if(empty($_POST["slug"])){
    $valid = false;
    $errors[] = "Hey Slug, fill the slug";
} 

if (!$valid) {
    
    //flash to session
    Session::instance()->flash('errors', $errors);
    //redirect back
    if(!$id){
        header('Location: index.php');
    } else {
        header('Location: edit.php?id='. $id);
    }
    
    exit();
}


$region->name = $_POST["name"] ?? $region->name;
$region->slug = $_POST["slug"] ?? $region->slug;

$region->insert(); 
var_dump($region->id);

header("Location: edit.php?id=" . $region->id);