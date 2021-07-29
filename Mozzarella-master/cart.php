<?php
session_start();
require "./controller/controller.php";
$id = 1;
$data = "";
$arr = array();
$totalPrice = 0;
$item_array = array();

$food_ids = array();
$food_counts = array();

if (isset($_POST['txt_name']) && $_POST['txt_name'] != "[]") {
  $data = $_POST['txt_name'];
  $d = json_decode($data);

  for ($i = 0; $i < count($d); $i++) {
    array_push($arr, json_decode($d[$i]));
    //echo $arr[$i][0] . ' ' . $arr[$i][1] . ' ' . $arr[$i][2] . '<br>';
    $totalPrice += (int)$arr[$i][2];
    array_push($item_array, getItemById($arr[$i][0]));
  }
}
$id = $arr[0][3];



$description = "total cost:" . $totalPrice . ";";
$index = 0;
foreach ($item_array as $item) {
  $description = $description . $item['f_name'] . "(" . $arr[$index][1] . "); \n";
  $index++;
}
$json_array = array();
array_push($json_array, $description);
array_push($json_array, $totalPrice);
array_push($json_array, $id);
array_push($json_array, $data);
$json_string = json_encode($json_array);

if (isset($_GET['data'])) {
  $data = $_GET['data'];
  $array = json_decode($data);
  addOrderToQueue($array[0], $array[1], $array[2]);
}


?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Images/icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./CSS/cart.css">
  <title>Cart</title>
</head>

<body>
  <header style="background-color: #292938;">
    <h2 class="cart-header">My Cart</h2>
  </header>

  <div class="columns" id="div1">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Items</th>
          <th scope="col">Quantity</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $index = 0;
        foreach ($item_array as $item) {
        ?>
          <tr>
            <th scope="row"><?php echo $index + 1  ?></th>
            <td><?php echo $item['f_name']  ?></td>
            <td><?php echo $arr[$index][1]  ?></td>
            <td><?php echo $arr[$index][2]  ?></td>
          </tr>
        <?php $index++;
        }  ?>

      </tbody>
    </table>
  </div>
  <div class="columns" id="div2">
    <table class="table table-borderless">

      <tbody>
        <tr>
          <th scope="row"><label>Price:</label> Price</th>
          <td align="right"><label class="prices">0</label> </td>

        </tr>
        <tr>
          <th scope="row"><label>Delivery:</label> </th>
          <td align="right"><label class="prices">0</label> </td>

        </tr>
        <tr>
          <th scope="row"><label>VAT:</label></th>
          <td align="right"><label class="prices">0</label> </td>

        </tr>
      </tbody>
    </table>

    <table class="table table-borderless">

      <tbody>
        <tr>
          <th scope="row"><label>Price:</label> Price</th>
          <td align="right"><label class="prices">0</label> </td>

        </tr>
        <tr>
          <th scope="row"><label>Delivery:</label> </th>
          <td align="right"><label class="prices">0</label> </td>

        </tr>
        <tr>
          <th scope="row"><label>VAT:</label></th>
          <td align="right"><label class="prices">0</label> </td>

        </tr>
      </tbody>
    </table>

    <table class="table table-borderless">

      <tbody>
        <tr>
          <th scope="row"><label>Total Price:</label></th>
          <td align="right"><label id="total-price"><b><?php echo $totalPrice . "TK"  ?></b></label> </td>
        </tr>

        <tr>
          <td align="left" colspan="2">
            <button onclick="sendData()" name="confirm_btn" value="<?php?>" type="submit" class="button btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Confirm Order
            </button>
          </td>
          <td align="left" colspan="1">
            <form action="order.php">
              <button id="close_btn" type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Cancel
              </button>
            </form>
          </td>
        </tr>


      </tbody>
    </table>

  </div>
  <p id="hidden_p"><?php echo $json_string ?></p>
  <script src="./JS/cart.js"></script>

</body>

</html>