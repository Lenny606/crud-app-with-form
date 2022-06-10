<!-- form with edit , after submit redirect -->
<?php
require_once 'Region.php';
require_once 'DB.php';
require_once 'Session.php';

$success = DB::connect(  //implement into condition if ID exists
    'localhost',        
    'world',        
    'root',         
    '');

$success_message = Session::instance()->get('success', []);
$delete_message = Session::instance()->get('delete', []);


$id = $_GET['id'] ?? null;
if($id) {
    $region = DB::selectOne("SELECT * FROM `regions2` WHERE `id`=?", [$id], 'Region');
}else{
    $region = new Region;
}
 
var_dump($region->name);

?>

<?php if ($success_message) : ?>
    <div class="message message_success">
        <?= $success_message ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD App</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

   
    <div class="comments">
        <h2>Update Region:</h2>

        <!-- your code here -->
        <div>

            <form action="save.php?id=<?=$region->id?>" method="post">
                Name: <br>
                <input type="text" name="name" value="<?=$region->name?> "><br>
                Slug: <br>
                <input type="text" name="slug" value="<?=$region->slug?> "><br>
                
                <input type="submit" value="Update the DTB">
            </form>
            <a href="deletion.php?id=<?=$region->id?>">Delete</a>
        </div>
    </div>
   
<!-- //    $region = select(null, null, 'Region');

//    foreach($comments as $i => $value) {
//        echo "<h3 style='text-decoration: underline' >".$value->nickname."</h3>";
//        echo "<p>".$value->comment."</p>";
//    }
// //    var_dump($comments) -->
  
</body>
<?php

?>

</html>