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
$id = $_GET['id'] ?? null;
var_dump($id); 

if($id) {
    $region = DB::selectOne("SELECT * FROM `regions2` WHERE `id`=?", [$id], 'Region');
} else {
    $region = new Region;
}

//VALIDATION//////////////
$valid = true;
$errors = [];

if(empty($_POST["name"])){
    $valid = false;
    $errors[] = "Hey, you forgot the name!" ;
} else {
    $success_messages[] = "saved";
}
if(empty($_POST["slug"])){
    $valid = false;
    $errors[] = "Hey Slug, fill the slug";
} 

if (!$valid) {
    
    //flash to session
    Session::instance()->flash('errors', $errors);
    Session::instance()->flash('success', $success_messages);
    Session::instance()->flash('delete', $delete_messages);
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


if($id) {
    $region->update();
}else{
    $region->insert(); 
}






var_dump($region->id);



header("Location: edit.php?id=" . $region->id);