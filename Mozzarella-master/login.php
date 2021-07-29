<?php
require "./includes/db_connect.inc.php";

session_start();

$cus_phone_req=$cus_password_req=$pass_in_db="";
$cus_phone_err=$cus_password_err="";

if($_SERVER['REQUEST_METHOD']== "POST"){
    if(empty($_POST['cus_phone'])){
      $cus_phone_err = "Phone Number cannot be empty!";}
    else{
      $cus_phone_req = $_POST['cus_phone'];
    }


    if(empty($_POST['cus_password'])){
        $cus_password_err = "Password cannot be empty!";
    }
    else{
        $cus_password_req = $_POST['cus_password'];
    }

    if(!empty($cus_phone_req) && !empty($cus_password_req)){
        $sqlUserCheck = "select id, cus_password from customers where cus_phone_number = '$cus_phone_req';";
  
        $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
        $userCount = mysqli_num_rows($resultUserCheck);
  
        if($userCount < 1){
          $cus_phone_err = "User does not exist";
        }else{
          while($row = mysqli_fetch_assoc($resultUserCheck)){
            $pass_in_db = $row['cus_password'];
            $customer_id = $row['id'];
          }
  
          if(password_verify($cus_password_req, $pass_in_db)){
            $_SESSION["user_number"] = $cus_phone_req;
            $_SESSION["user_id"]=$customer_id;
            // echo  $_SESSION["user_id"];
            header("Location: order.php");
          }else{
            $cus_password_err = "Wrong password!";
          }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="Images/icon.png">
</head>
<body class="index-pages">
    <header>
        <div class="on-nav">
        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Back</a></li>
                
            </ul>
        </nav>
        </div>
    </header>
    <div class="container">
        <section class="columns">
            <h1>Log In and Start Ordering!</h1>
        </section>
        <form class="form" name="index_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input-group">
                <label class="index_label" >Phone No:</label> <br> 
                <input class="index_input" type="text" name="cus_phone" value="<?php echo $cus_phone_req; ?>" required >
                <span style="color:red;"><b><?php echo $cus_phone_err; ?></b></span>
            </div>

            <div class="input-group">
                <label class="index_label"  >Password:</label> <br> 
                <input class="index_input" type="password" name="cus_password"  value="<?php echo $cus_password_req; ?>" required > 
                <span style="color:red;"><b><?php echo $cus_password_err; ?></b></span>
            </div>

            <div class="input-group">
                <button class="btn" type="submit" name="btn_submit" value="submit">Login</button>
            </div>

        </form>
    </div>

    <script type="text/javascript" src="./JS/login_validation.js"></script>
    
</body>
</html>