<?php
require_once "Region.php";
require_once 'DB.php';
require_once 'Session.php';
$success = DB::connect(
    'localhost',        
    'world',        
    'root',         
    '');
// finds id according to query string id
$id = $_GET['id']?? null;
//if id exists finds from dtb else created new
if($id) {
    $region = find($id, "Region");
} else {
    $region = new Region;
}

//selects all data from Dtb

$data = DB::select('SELECT * FROM `regions2` WHERE 1');

//validation shows message if input is wrong
$errors = Session::instance()->get('errors', []);
$success_message = Session::instance()->get('success', []);
?>


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
    <!-- validation messages  -->
    <?php foreach ($errors as $error) : ?>
        <div class="message message_error">
            <?= $error ?>
        </div>
    <?php endforeach; ?>

    <?php foreach ($success_message as $success) : ?>
        <div class="message message_error">
            <?= $success ?>
        </div>
    <?php endforeach; ?>
   
    <div class="comments">
        <h2>Insert Region:</h2>

        <!-- your code here -->
        <div>
            <form action="save.php" method="post">
                Name: <br>
                <input type="text" name="name"> <br>
                Slug: <br>
                <input type="text" name="slug"> <br>
                
                <input type="submit" value="Send to the DTB">
                <a href="deletion.php?id="></a>
                
            </form>
            
        </div>
    </div>

<!-- list of the dtb -->

   <?php foreach($data as $value) : ?>
        <?= "<p>$value->name</p>" ?>
        <?= "<p>$value->slug</p>" ?>
       
        <?php endforeach; ?>
    
<!-- //    $region = select(null, null, 'Region');

//    foreach($comments as $i => $value) {
//        echo "<h3 style='text-decoration: underline' >".$value->nickname."</h3>";
//        echo "<p>".$value->comment."</p>";
//    }
// //    var_dump($comments)
//     -->
</body>
</html>