<?php

session_start();
require "./includes/db_connect.inc.php";
include "filter_helper.php";

$i = 0;
$j = 5;

if($_SERVER["REQUEST_METHOD"]=="GET" && count($_GET)>0){

  if(isset($_GET['prev_btn'])){
    $i = $_GET['prev_btn'];
  }elseif(isset($_GET['next_btn'])){
    $i = $_GET['next_btn'];
  }elseif(isset($_GET['pg_btn'])){
    $i = $_GET['pg_btn'];
  }elseif(isset($_GET['recordsPerPage'])){
    $_SESSION['per_page'] = $_GET['recordsPerPage'];
  }elseif(isset($_GET['filter_btn'])){
    filterData($_GET);
  }

  if(isset($_SESSION['per_page'])){
    $j = $_SESSION['per_page'];
  }

  $sql = prepareFilterQueries($_GET, $i, $j);
  $sqlTotalRows = prepareCountFilterQueries($_GET);

}else{
  header("Location: admin_emp.php");
}

$result = mysqli_query($conn, $sql);
$rowCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTotalRows));
$pgNmbr = ceil($rowCount['total_rows']/$j);
$curr_pg = ($i/$j) + 1;

$pgNmbr;
$curr_pg;

?>

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
<div class="pagination_btns btn-group" align="center">
  <?php if($i > 0){ ?>
    <button type="submit" name="prev_btn" class="btn btn-secondary" value="<?php echo ($i-$j); ?>"> Previous </button>
  <?php } ?>

  <?php if($pgNmbr > 1) { for ($p=0; $p<$pgNmbr; $p++) { ?>
    <button type="submit" name="pg_btn" class="btn btn-secondary" value="<?php echo ($p*$j); ?>"><?php echo ($p+1); ?></button>
  <?php } } ?>

  <?php if($i < ($rowCount['total_rows'] - $j)){ ?>
    <button type="submit" name="next_btn" class="btn btn-secondary" value="<?php echo ($i+$j); ?>"> Next </button>
  <?php } ?>

  <input type="hidden" name="pg_nmbr" value="<?php echo $pgNmbr; ?>">
  <input type="hidden" name="curr_pg" value="<?php echo $curr_pg; ?>">
</div>
