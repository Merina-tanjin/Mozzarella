<?php



session_start();

if(isset($_GET['emp']) && isset($_GET['type'] )){
  $_SESSION["empname"]=$_GET['emp'];
  $_SESSION["emptype"]=$_GET['type'];
}

if(!isset($_SESSION["empname"]) || $_SESSION["emptype"]!="admin"){
  header("Location: index.php");
}

require "./includes/db_connect.inc.php";
$msg = "";
include "filter_helper.php";

$i = 0;
$j = 5;

session_unset();
session_destroy();

$sql = "select emp_name, emp_username, emp_phone_number, emp_email,emp_type from employee LIMIT $i, $j;";
$sqlTotalRows = "select count(*) as total_rows from employee;";

$result = mysqli_query($conn, $sql);
$rowCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTotalRows));
$pgNmbr = ceil($rowCount['total_rows']/$j);
$curr_pg = ($i/$j) + 1;

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="CSS/adminStyle.css">
    <link rel="icon" href="Images/icon.png">
    

 

</head>

<body class="index-pages">
    <header>
        <h2 style="margin-left: 10%;">Mozzarella</h2>
    </header>
<div >

    <div class="bar">
      <a href="admin_emp.php?emp=empname&type=admin">Empolyee</a>
      <a href="admin_cus.php?emp=empname&type=admin">Customer</a>
      <a href="logout.php">Log out</a>
    </div>

    <div class="columns">


        <div class="admin_pages">
          <h1>Employees</h1>
          <div class="per_page_control ">
            <label style="color:white; font-weight: bold;">Records Per Page: </label>
            <select name="records_per_page " class="custom-select" >
              <option value="" disabled selected>Select number of records per page</option>
              <option value="5" <?php if(isset($_POST['records_per_page']) && ($_POST['records_per_page'] == "5")) echo "selected";?>>5</option>
              <option value="10" <?php if(isset($_POST['records_per_page']) && ($_POST['records_per_page'] == "10")) echo "selected";?>>10</option>
              <option value="20" <?php if(isset($_POST['records_per_page']) && ($_POST['records_per_page'] == "20")) echo "selected";?>>20</option>
            </select>
          </div>
          <div class="filtering_parameters">
            <label style="color:white; font-weight: bold;">Filter by:</label>
            <select name="type_filter" class="custom-select">
              <option value="" disabled selected>By type</option>
              <option value="admin" <?php if(isset($_POST['type_filter']) && ($_POST['type_filter'] == "admin")) echo "selected";?>>admin</option>
              <option value="cashier" <?php if(isset($_POST['type_filter']) && ($_POST['type_filter'] == "cashier")) echo "selected";?>>cashier</option>
              <option value="controller" <?php if(isset($_POST['type_filter']) && ($_POST['type_filter'] == "controller")) echo "selected";?>>controller</option>
              <option value="deliveryma" <?php if(isset($_POST['type_filter']) && ($_POST['type_filter'] == "deliveryma")) echo "selected";?>>deliveryma</option>
            </select>
  
            <button type="submit" name="filter_btn" class="btn btn-secondary" value="submit"> Filter </button>
            <div class="filter_error_msg">
              <?php echo $msg; ?>
            </div>
          </div>
          <div id="ajax_div">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th>E Name</th>
                  <th>E Username</th>
                  <th>phone</th>
                  <th>email</th>
                  <th>type</th>
                </tr>
              </thead>
              <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                  <tr>
                    <td><?php echo $row['emp_name']; ?></td>
                    <td><?php echo $row['emp_username']; ?></td>
                    <td><?php echo $row['emp_phone_number']; ?></td>
                    <td><?php echo $row['emp_email']; ?></td>
                    <td><?php echo $row['emp_type']; ?></td>
  
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="pagination_btns btn-group"  align="center">
              <?php if($i > 0){ ?>
                <button type="submit" class="btn btn-secondary"  name="prev_btn" value="<?php echo ($i-$j); ?>"> Previous </button>
              <?php } ?>
  
              <?php if($pgNmbr > 1) { for ($p=0; $p<$pgNmbr; $p++) { ?>
                <button type="submit" class="btn btn-secondary" name="pg_btn" value="<?php echo ($p*$j); ?>"><?php echo ($p+1); ?></button>
              <?php } } ?>
  
              <?php if($i < ($rowCount['total_rows'] - $j)){ ?>
                <button type="submit" class="btn btn-secondary" name="next_btn" value="<?php echo ($i+$j); ?>"> Next </button>
              <?php } ?>
            </div>
          </div>
        </div>
      

    </div>

    <div class="form" >
    <a href="emp_signup.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">ADD EMPLOYEE</a>
    <a style="margin-left: 20px;" href="emp_update.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">UPDATE EMPLOYEE</a>

    </div>
</div>

<script type="text/javascript"> 
  
  function ajaxFilteredContent(params){
    var xhr = new XMLHttpRequest();
    xhr.open('GET','ajax_filter.php?'+params,true);
    xhr.send();

    xhr.onload = function(){
      if(xhr.status == 200){
        document.getElementById('ajax_div').innerHTML = this.responseText;
      }else if(this.status == 404){
        document.getElementById('ajax_div').innerHTML = '<h1>404 - NOT FOUND</h1>';
      }
    };
  }

  function recordsPerPage(){
    var perPage = document.getElementsByClassName('per_page_control')[0].children[1];
    perPage.onchange = function(){
      var parameters = "recordsPerPage="+(perPage.value);
      ajaxFilteredContent(parameters);
    };
  }

  function filterAjax(){
    var filterBtn = document.getElementsByName('filter_btn')[0];
    filterBtn.onclick = function(){
      var fBtnVal = filterBtn.value;
      
      var typeFilter = document.getElementsByName('type_filter')[0].value;
  
      var parameters = "type_filter="+typeFilter+"&filter_btn="+fBtnVal;
      ajaxFilteredContent(parameters);
    };
  }

  function paginationAjax(){
    var paginationBtns = document.getElementById('ajax_div'); //event delegation
    paginationBtns.addEventListener('click',function(e){
      if(e.target.nodeName == "BUTTON"){
        var btn = e.target;
        var btnVal = btn.value;
        var btnName = btn.name;

        var typeFilter = document.getElementsByName('type_filter')[0].value;
        var parameters = btnName + "=" + btnVal + "&type_filter="+typeFilter;
        ajaxFilteredContent(parameters);
      }
    });
  }

  window.onload = function(){
    recordsPerPage();
    filterAjax();
    paginationAjax();
  };
</script>
   


</body>

</html>