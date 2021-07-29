<?php
require "./includes/db_connect.inc.php";

session_start();

$emp_username_req=$emp_password_req=$pass_in_db=$emp_type_req="";
$emp_username_err=$emp_password_err=$emp_type_err="";
$emp_status="";

if($_SERVER['REQUEST_METHOD']== "POST"){
    if(empty($_POST['emp_username'])){
      $emp_username_err = "Username cannot be empty!";}
    else{
      $emp_username_req = $_POST['emp_username'];
    }


    if(empty($_POST['emp_password'])){
        $emp_password_err = "Password cannot be empty!";
    }
    else{
        $emp_password_req = $_POST['emp_password'];
    }

    if(empty($_POST['emp_type'])){
        $emp_type_err = "Employee Type cannot be empty!";}
      else{
        $emp_type_req = $_POST['emp_type'];
      }

    if(!empty($emp_username_req) && !empty($emp_password_req) && !empty($emp_type_req)){
        $sqlUserCheck = "select emp_password from employee where emp_username = '$emp_username_req' and emp_type = '$emp_type_req';";
  
        $resultUserCheck = mysqli_query($conn, $sqlUserCheck);
        $userCount = mysqli_num_rows($resultUserCheck);
  
        if($userCount < 1){
          $emp_username_err = "User does not exist";
        }else{
          while($row = mysqli_fetch_assoc($resultUserCheck)){
            $pass_in_db = $row['emp_password'];
          }
  
          if(password_verify($emp_password_req, $pass_in_db)){
            $_SESSION["empname"] = $emp_username_req;
            $_SESSION["emptype"] = $emp_type_req;
            if($_SESSION["emptype"]=="cashier"){
              header("Location: cashier_order.php");
            }elseif($_SESSION["emptype"]=="deleveryman"){
              $emp_status= "Deliveryman can not enter";
            }elseif($_SESSION["emptype"]=="controller"){
            header("Location: controller_food.php");
            }elseif($_SESSION["emptype"]=="admin"){
            header("Location: admin_emp.php");
            }else{
            $emp_password_err = "Wrong password!";
          }
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
    <title>Employee Login Page</title>
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

            <h1>Back to Work Are We!</h1>
            <h1><?php echo $emp_status ?></h1>
        </section>
        <form class="form" name="index_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">           
            <div class="input-group">
                <label class="index_label" >Employee Username:</label> <br> 
                <input class="index_input" type="text" name="emp_username" value="<?php echo $emp_username_req; ?>" required >
                <span style="color:red;"><b><?php echo $emp_username_err; ?></b></span>
            </div>

            <div class="input-group">
                <label class="index_label"  >Password:</label> <br> 
                <input class="index_input" type="password" name="emp_password"  value="<?php echo $emp_password_req; ?>" required > 
                <span style="color:red;"><b><?php echo $emp_password_err; ?></b></span>
            </div>

            <div>
                <label class="index_label"  >Employee Type:</label> <br> 
                <input class="index_input radio" type="radio" name="emp_type"  value="cashier" <?php if($emp_type_req == "cashier") echo "checked";?> required >Cashier</input>
                <input class="index_input radio" type="radio" name="emp_type"  value="controller" <?php if($emp_type_req == "controller") echo "checked";?> required >Controller</input>
                <input class="index_input radio" type="radio" name="emp_type"  value="deliveryman" <?php if($emp_type_req == "deliveryman") echo "checked";?> required >Deliveryman</input>
                <input class="index_input radio" type="radio" name="emp_type"  value="admin" <?php if($emp_type_req == "admin") echo "checked";?> required >Admin</input>
                <span style="color:red;"><b><?php echo $emp_type_err; ?></b></span>
            </div>

            <div class="input-group">
                <button class="btn" type="submit" name="btn_submit" value="submit">Login</button>
            </div>



        </form>
    </div>

    <script type="text/javascript" src="./JS/login_validation.js"></script>
    
</body>
</html>