<?php
require "./includes/db_connect.inc.php";

$emp_name_req=$emp_phone_req=$emp_email_req=$emp_address_req=$emp_password_req=$emp_confirm_password_req=$emp_username_req=$emp_type_req="";
$emp_name_err=$emp_phone_err=$emp_email_err=$emp_address_err=$emp_password_err=$emp_confirm_password_err=$emp_username_err=$emp_type_err="";
$regSuccessful = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    if(!empty($_POST['emp_name'])){

        $emp_name_req = mysqli_real_escape_string($conn, $_POST['emp_name']);

        
    }

    if(!empty($_POST['emp_username'])){

        $emp_username_req = mysqli_real_escape_string($conn, $_POST['emp_username']);

    }

    if(!empty($_POST['emp_phone'])){

        $emp_phone_req = mysqli_real_escape_string($conn, $_POST['emp_phone']);

    }

    if(!empty($_POST['emp_email'])){

        $emp_email_req = mysqli_real_escape_string($conn, $_POST['emp_email']);

    }

    if(!empty($_POST['emp_address'])){

        $emp_address_req = mysqli_real_escape_string($conn, $_POST['emp_address']);

    }


    if(!empty($_POST['emp_type'])){

        $emp_type_req = $_POST['emp_type'];

    }

        $sqlUers = "select emp_username from employee where emp_username = '$emp_username_req'";
        $results = mysqli_query($conn, $sqlUers);
  
        $rowCount = mysqli_num_rows($results);
  
        if($rowCount > 0){
            

  
          $sqlUserUpdate = " UPDATE employee SET emp_name = '$emp_name_req' ,   emp_phone_number = '$emp_phone_req' , emp_email= '$emp_email_req' , emp_address = '$emp_address_req' , emp_type= '$emp_type_req' where emp_username = '$emp_username_req' ;";

          if(mysqli_query($conn, $sqlUserUpdate)){
            $regSuccessful = "Update was successful";
            header("refresh:2; url=admin_emp.php");
          }
          else{
            $regSuccessful = "Update Unsuccessful";
          }
  
        
        }
        else{
            $emp_username_err="User does not exist";
        }
      




}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Signup Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="Images/icon.png">
</head>
<body class="index-pages">
    <header>
        <div class="on-nav">
        <nav class="main-nav">
            <ul>
                <li><a href="admin_emp.php">Back</a></li>
                
            </ul>
        </nav>
        </div>
    </header>
    <div class="container">
    <h3 style="color:green;"><?php echo $regSuccessful; ?></h3>
        <section class="columns">
            <h1>Modification?</h1>
        </section>
        <form class="form" id="signup-form" name="index_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input-group">
                <label class="index_label" >Name:</label> <br> 
                <input class="index_input" type="text" name="emp_name" value="<?php echo $emp_name_req; ?>" required  >
                <span style="color:red;"><b><?php echo $emp_name_err; ?></b></span>
                
            </div>

            <div class="input-group">
                <label class="index_label" >Username:</label> <br> 
                <input class="index_input" type="text" name="emp_username" value="<?php echo $emp_username_req; ?>" required  >
                <span style="color:red;"><b><?php echo $emp_username_err; ?></b></span>
                
            </div>

            <div class="input-group">
                <label class="index_label" >Phone No:</label> <br> 
                <input class="index_input" type="text" name="emp_phone" value="<?php echo $emp_phone_req; ?>" required  >
                <span style="color:red;"><b><?php echo $emp_phone_err; ?></b></span>
            </div>

            <div class="input-group">
                <label class="index_label" >Email:</label> <br> 
                <input class="index_input" type="email" name="emp_email" value="<?php echo $emp_email_req; ?>" required  >
                <span style="color:red;"><b><?php echo $emp_email_err; ?></b></span>
            </div>

            <div class="input-group">
                <label class="index_label" >Address:</label> <br> 
                <input class="index_input" type="text" name="emp_address" value="<?php echo $emp_address_req; ?>" required  >
                <span style="color:red;"><b><?php echo $emp_address_err; ?></b></span>
            </div>

            <div>
                <label class="index_label"  >Employee Type:</label> <br> 
                <input class="index_input radio" type="radio" name="emp_type"  value="cashier" <?php if($emp_type_req == "cashier") echo "checked";?> required  >Cashier</input>
                <input class="index_input radio" type="radio" name="emp_type"  value="controller" <?php if($emp_type_req == "controller") echo "checked";?> required  >Controller</input>
                <input class="index_input radio" type="radio" name="emp_type"  value="deliveryman" <?php if($emp_type_req == "deliveryman") echo "checked";?> required  >Deliveryman</input>
                <input class="index_input radio" type="radio" name="emp_type"  value="admin" <?php if($emp_type_req == "admin") echo "checked";?> required  >Admin</input>
                <span style="color:red;"><b><?php echo $emp_type_err; ?></b></span>
            </div>


            <div class="input-group">
                <button class="btn" type="submit" name="btn_submit" value="submit">Update</button>
            </div>

        </form>
    </div>

    
</body>
</html>