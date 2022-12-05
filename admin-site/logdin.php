<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="file-css.css">
</head>
<body>
    <div class="choose-wrapper">
        <div class="options">
            <a href="upload.php" class = "log-out" >Gallary</a>
            <a href="loggout.php" class = "log-out">Log out</a>
        </div>
        <form action="file-upload.php" method="POST" enctype="multipart/form-data" class = "product-form">
            <label for="file" class ="label-file">Välj file</label>
            <input type="file" name="file" class = "ghost">
            <label for="description" class = "label-file">Description</label>
            <input type="text" name = "description">
            <label for="title" class = "label-file">Title</label>
            <input type="text" name = "title">
            <label for="price" class = "label-file">Price</label>
            <input type="text" name = "price">
            <input type="submit" value="submit file" name="submit">
           
        </form>
       
    </div>
</body>
</html>