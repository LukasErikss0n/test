<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="product.css">
</head>

    <body>
        <a href="logdin.php" class="go-back margin-top" >Upload</a>

        <div class="gallary">
            <?php

            include "server-connect.php";
            session_start();


            if (isset($_SESSION['user_id'])) {
                $sesion = $_SESSION['user_id']; 
                $grab_data = "SELECT user_id, file_name, description, title, price  from upload WHERE user_id=$sesion";
                $result = $con->query($grab_data);

                $uppload = [];
                if (mysqli_num_rows($result) > 0) {
                while ($obj = mysqli_fetch_assoc($result)) {

                    $fileName = $obj['file_name'];
                    $id = $obj['user_id'];
                    $dsc = $obj['description'];
                    $title = $obj['title'];
                    $price = $obj['price'];
            

                    $uppload = [$fileName => [$dsc, $title, $price]];
                    
                    foreach ($uppload as $file => [$dsc, $title, $price]) {
                
                        echo "<div class = 'card-wrapper' >";
                        echo "<img src = 'uploads/$file' alt = '$title' >";
                        echo "<div class = 'info-wrapper' >";
                        echo "<p>$title</p>";
                        echo "<p>$price$</p>";
                        echo "</div>";
                        echo "</div>";

                    }  
                }
                }
            
            }else{
                echo "error";
            }
            ?>
        </div>  
    </body>
</html>