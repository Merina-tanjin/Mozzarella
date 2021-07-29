<?php
require "./includes/db_connect.inc.php";

session_start();
$cus_name_req=$cus_phone_req=$cus_email_req=$cus_address_req=$cus_password_req=$cus_confirm_password_req="";
$cus_name_err=$cus_phone_err=$cus_email_err=$cus_address_err=$cus_password_err=$cus_confirm_password_err="";
$errExists = 0;
$regSuccessful = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(empty($_POST['cus_name'])){
        $cus_name_err = "Name cannot be empty!";
        $errExists = 1;
    }
      else{
        $cus_name_req = mysqli_real_escape_string($conn, $_POST['cus_name']);
    }

    if(empty($_POST['cus_phone'])){
        $cus_phone_err = "Phone Number cannot be empty!";
        $errExists = 1;
    }
      else{
        $cus_phone_req = mysqli_real_escape_string($conn, $_POST['cus_phone']);
    }

    if(empty($_POST['cus_email'])){
        $cus_email_err = "Email cannot be empty!";
        $errExists = 1;
    }
      else{
        $cus_email_req = mysqli_real_escape_string($conn, $_POST['cus_email']);
    }

    if(empty($_POST['cus_address'])){
        $cus_address_err = "Address cannot be empty!";
        $errExists = 1;
    }
      else{
        $cus_address_req = mysqli_real_escape_string($conn, $_POST['cus_address']);
    }

    if(empty($_POST['cus_password'])){
        $cus_password_err = "Password  cannot be empty!";
        $errExists = 1;
    }
      else{
        $cus_password_req = mysqli_real_escape_string($conn, $_POST['cus_password']);
    }

    if(empty($_POST['cus_confirm_password'])){
        $cus_confirm_password_err = "Confirm password cannot be empty!";
        $errExists = 1;
    }
      else{
        $cus_confirm_password_req = mysqli_real_escape_string($conn, $_POST['cus_confirm_password']);
    }

    if($cus_password_req != $cus_confirm_password_req){
        $cus_confirm_password_err="Passwords do not match";
        $errExists = 1;
    }

    $uPassToDb = password_hash($cus_password_req, PASSWORD_DEFAULT);

    if($errExists != 1){

        $sqlUers = "select cus_phone_number from customers where cus_phone_number = '$cus_phone_req'";
        $results = mysqli_query($conn, $sqlUers);
  
        $rowCount = mysqli_num_rows($results);
  
        if($rowCount > 0){
          $cus_phone_err = "User already exists!";
        }
        else{
          $sqlUserInsert = "insert into customers (cus_name, cus_phone_number, cus_password, cus_email, cus_address)
          values ('$cus_name_req', '$cus_phone_req', '$uPassToDb', '$cus_email_req', '$cus_address_req');";
  
          mysqli_query($conn, $sqlUserInsert);
  
          $regSuccessful = "Registration was successful";

          header("refresh:2; url=login.php");
        }
      }




}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Signup Page</title>
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
    <h3 style="color:green;"><?php echo $regSuccessful; ?></h3>
        <section class="columns">
            <h1>Your First step towards wholesome Awesomeness</h1>
        </section>
        <form class="form" id="signup-form" name="index_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input-group">
                <label class="index_label" >Name:</label> <br> 
                <input class="index_input" type="text" name="cus_name" value="<?php echo $cus_name_req; ?>" required >
                <span style="color:red;"><b><?php echo $cus_name_err; ?></b></span>
                
            </div>

            <div class="input-group">
                <label class="index_label" >Phone No:</label> <br> 
                <input class="index_input" type="text" name="cus_phone" value="<?php echo $cus_phone_req; ?>" required >
                <span style="color:red;"><b><?php echo $cus_phone_err; ?></b></span>
            </div>

            <div class="input-group">
                <label class="index_label" >Email:</label> <br> 
                <input class="index_input" type="email" name="cus_email" value="<?php echo $cus_email_req; ?>" required >
                <span style="color:red;"><b><?php echo $cus_email_err; ?></b></span>
            </div>

            <div class="input-group">
                <label class="index_label" >Address:</label> <br> 
                <input class="index_input" type="text" name="cus_address" value="<?php echo $cus_address_req; ?>" required >
                <span style="color:red;"><b><?php echo $cus_address_err; ?></b></span>
            </div>



            <div class="input-group">
                <label class="index_label" >Password:</label> <br> 
                <input class="index_input" type="password" name="cus_password" value="<?php echo $cus_password_req; ?>" required >
                <span style="color:red;"><b><?php echo $cus_password_err; ?></b></span>
            </div>

            <div class="input-group">
                <label class="index_label" >Confirm Password:</label> <br> 
                <input class="index_input" type="password" name="cus_confirm_password" value="<?php echo $cus_confirm_password_req; ?>" required >
                <span style="color:red;"><b><?php echo $cus_confirm_password_err; ?></b></span>
            </div>


            <div class="input-group">
                <button class="btn" type="submit" name="btn_submit" value="submit">Sign Up</button>
            </div>

        </form>
    </div>

    <script type="text/javascript" src="./JS/login_validation.js"></script>
    
</body>
</html>