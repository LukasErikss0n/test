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
        <a href="logdin.php" id="upload-btn" class="go-back margin-top" >Upload</a>


        <div class="gallary">
            <form onsubmit="return askUser()" action='status.php' method='POST' enctype='multipart/form-data' class="gallary-form">
            <div class="styling-form">
            <?php

            include "server-connect.php";
            session_start();


            if (isset($_SESSION['user_id'])) {
                $sesion = $_SESSION['user_id']; 
                $grab_data = "SELECT id, user_id, file_name, description, title, price, status  from upload ";
                //WHERE user_id=$sesion"
                $result = $con->query($grab_data);


                $uppload = [];
                if (mysqli_num_rows($result) > 0) {
                while ($obj = mysqli_fetch_assoc($result)) {

                    $fileName = $obj['file_name'];
                    $id = $obj['id'];
                    $dsc = $obj['description'];
                    $title = $obj['title'];
                    $price = $obj['price'];
                    $status = $obj['status'];
            

                    $uppload = [$fileName => [$dsc, $title, $price, $id, $status]];
                    
                    foreach ($uppload as $file => [$dsc, $title, $price, $id, $status]) {
                        echo "<div class = 'card-wrapper' >";
                        echo "<input type='checkbox' name='del-status[]' class='checkbox' value='$id'>";
                        echo "<p class = '$status status'>$status</p>";
                        echo "<img src = 'uploads/$file' alt = '$title' class = 'img-start-side'>";

                        echo "<div class = 'info-wrapper' >";
                        echo "<p>$title</p>";
                        echo "<p>$$price</p>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class = 'info-side none' >";
                        echo "<a class = 'go-back return'>Go back</a>";
                        echo "<div class = 'info-card-wrapper' >";
                        echo "<img src = 'uploads/$file' alt = '$title' class = 'info-card-img'>";
                        echo "<div class = 'product-info' >";
                        echo "<h2>$title</h2>";
                        echo "<p> $$price</p>";
                        echo "<p>Tax included</p>";

                        echo "<button>Add to cart</button>";
                        echo "</div>";
                        echo "</div>"; 
                        echo "</div>";

                        

                    }  

                }
                
                }
            
            }else{
                echo "not loggd in";
            }
            $con->close();
            ?>
            </div>
             <div class="placment-btn">
                <button id='btn' class="btn" type= 'submit' name="del">Delet</button>
                <button id='btn-status' type="" name="status">Change status</button>
             </div>
            <!-- <div id= "btn-activ-hidden">
                <form action="status.php" method="POST" enctype="multipart/form-data">
                    <button  type="submit" name="active">Active</button>
                    <button type="submit" name = "hidden" >Hidden</button>
                </form>    
             </div>-->
            </form>
           
        </div>  
        <script src="product-info.js"></script>
    </body>

</html>