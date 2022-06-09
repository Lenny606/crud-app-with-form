<!-- form with edit , after submit redirect -->
<?php
require_once 'Region.php';
require_once 'DB.php';

$success = DB::connect(
    'localhost',        
    'world',        
    'root',         
    '');


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
            </form>
            
        </div>
    </div>
   
<!-- //    $region = select(null, null, 'Region');

//    foreach($comments as $i => $value) {
//        echo "<h3 style='text-decoration: underline' >".$value->nickname."</h3>";
//        echo "<p>".$value->comment."</p>";
//    }
// //    var_dump($comments) -->
  
</body>
</html>