<?php
session_start();
if (!isset($_SESSION["empname"]) || $_SESSION["emptype"] != "cashier") {
    header("Location: index.php");
}
require "./controller/controller.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $data=getOrderById($id);
    updateAdminDataTotalSell((int)$data["totalCost"]);
    updateCustomerTotalCost((int)$data["customer_id"],(int)$data["totalCost"]);
    removeOrderById($id);
}
$orders = getAllOrders();
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
    <script src="./JS/FileSaver.js"></script>
    <link rel="stylesheet" href="./CSS/queue.css">
    <title>Queue</title>
</head>

<body>
    <header style="background-color: #292938;">
        <h2 class="cart-header">Order Queue</h2>
        <a href="cashier_order.php" style="float: right;" class="btn btn-outline-danger btn-lg " role="button" aria-pressed="true">Back</a>
    </header>

    <div class="columns" id="div_main">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Description</th>
                    <th scope="col">Order Cost</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Time</th>
                    <th scope="col">
                        Done Button
                    </th>
                    <th>Cancel Button</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($orders as $order) {

                ?>
                    <form action="queue.php" method="POST">
                        <tr>
                            <input class="hidden" name="id" type="text" width="10px" value="<?php echo $order["id"] ?>">
                            <th><?php echo $order["id"] ?></th>
                            <th id="dcp_<?php echo $order["id"] ?>"><?php echo $order["description"] ?></th>
                            <th><?php echo $order["totalCost"] . "TK" ?></th>
                            <th><?php echo $order["customer_id"] ?></th>
                            <th><?php echo $order["orderTime"] ?></th>
                            <th>
                                <button onclick='saveTxt("<?php echo $order["id"] ?>")' type="submit" id="done_btn_<?php echo $order["id"] ?>" class="btn btn-info p_btn">Done</button>
                            </th>
                            <th><button type="submit" id="cancel_btn_<?php echo $order["id"] ?>" class="btn btn-danger p_btn">Cancel</button>
                            </th>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
<script src="JS/queue.js"></script>

</html>