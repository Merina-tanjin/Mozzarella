<?php


session_start();

require "includes/db_connect.inc.php";


$i = 0;
$j = 5;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['prev_btn'])) {
    $i = $_POST['prev_btn'];
  } elseif (isset($_POST['next_btn'])) {
    $i = $_POST['next_btn'];
  } elseif (isset($_POST['pg_btn'])) {
    $i = $_POST['pg_btn'];
  } elseif (isset($_POST['perpg_btn']) && !empty($_POST['records_per_page'])) {
    $_SESSION['per_page'] = $_POST['records_per_page'];
  }

  if (isset($_SESSION['per_page']))
    $j = $_SESSION['per_page'];
} else {
  session_unset();
  session_destroy();
}

$sql = "select cus_name, cus_phone_number, cus_email, cus_address from customers LIMIT $i, $j;";
$result = mysqli_query($conn, $sql);

$sqlTotalRows = "select count(*) as total_rows from customers;";
$rowCount = mysqli_fetch_assoc(mysqli_query($conn, $sqlTotalRows));
$pgNmbr = ceil($rowCount['total_rows'] / $j);

?>
<!DOCTYPE html>

<head>
  <link rel="icon" href="Images/icon.png">
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
  <div>

    <div class="bar">
      <a href="admin_emp.php?emp=empname&type=admin">Empolyee</a>
      <a href="admin_cus.php?emp=empname&type=admin">Customer</a>
      <a href="logout.php">Log out</a>
    </div>

    <div class="columns">


      <div class="admin_pages">
        <h1>Customers</h1>
        <h4>page <?php echo ($i / $j) + 1; ?> of <?php echo $pgNmbr; ?> </h4>
        <div class="per_page_control ">
          <label style="color:white; font-weight: bold;">Records Per Page: </label>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <select name="records_per_page" class="custom-select">
              <option value="" disabled selected>Select records per page</option>
              <option value="5" <?php if (!empty($_POST['records_per_page']) && $_POST['records_per_page'] == 5) echo "selected"; ?>>5</option>
              <option value="10" <?php if (!empty($_POST['records_per_page']) && $_POST['records_per_page'] == 10) echo "selected"; ?>>10</option>
              <option value="20" <?php if (!empty($_POST['records_per_page']) && $_POST['records_per_page'] == 20) echo "selected"; ?>>20</option>
            </select>
            <button type="submit" name="perpg_btn" class="btn btn-secondary" value="submit">Filter</button>
            <table class="table table-dark">
              <thead>
                <tr>
                  <th>C Name</th>
                  <th>phone</th>
                  <th>email</th>
                  <th>address</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td><?php echo $row['cus_name']; ?></td>
                    <td><?php echo $row['cus_phone_number']; ?></td>
                    <td><?php echo $row['cus_email']; ?></td>
                    <td><?php echo $row['cus_address']; ?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="pagination_btns btn-group" align="center">
              <?php if ($i > 0) { ?>
                <button type="submit" class="btn btn-secondary" name="prev_btn" value="<?php echo ($i - $j); ?>"> Previous </button>
              <?php } ?>

              <?php if ($pgNmbr > 1) {
                for ($p = 0; $p < $pgNmbr; $p++) { ?>
                  <button type="submit" class="btn btn-secondary" name="pg_btn" value="<?php echo ($p * $j); ?>"><?php echo ($p + 1); ?></button>
              <?php }
              } ?>

              <?php if ($i < ($rowCount['total_rows'] - $j)) { ?>
                <button type="submit" class="btn btn-secondary" name="next_btn" value="<?php echo ($i + $j); ?>"> Next </button>
              <?php } ?>
            </div>
          </form>
        </div>


      </div>



</body>

</html>