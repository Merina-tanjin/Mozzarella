<?php

require "./controller/controller.php";

$id=$_GET['id'];

$item=getItemById($id);

$add_ons=getAllAddOns();

$add_ons_table='';

foreach($add_ons as $add_on){
    $add_ons_table=$add_ons_table.'<tr>
    <th>
        <input class="addon_class" onclick="add_cb('.$add_on["id"].')" id="addon_'.$add_on["id"].'" type="checkbox">
        <label for="garlic">'.$add_on["addon_name"].'</label>
    </th>
    <th>
    <i id="addon_price_'.$add_on["id"].'">
    '.$add_on["price"].'
    </i>TK
    </th>
    </tr>';
}


echo '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Order Option</h5>
                            <button id="cross_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group w-100">
                                <li id="info_li" class="list-group-item modal_length">

                                    <img src="Images/'.$item["image"].'.png" class="container_div p_img popup" height="40" width="60">
                                    <div class="container_div popup" id="p_price_div">
                                        <h6 id="p_name">'.$item["f_name"].'</h6>
                                        <p id="p_price">TK: <i id="price_txt">'.$item["price"].'</i></p>
                                    </div>
                                    <div class="container_div">
                                        <input type="number" id="p_input" max="50" min="1" disabled>
                                        <button onclick="incCount()" id="p_plus_btn" class="btn btn-info p_btn">+</button>
                                        <button onclick="decCount()" id="p_minus_btn" class="btn btn-danger p_btn">-</button>
                                    </div>

                                </li>
                                <li id="spice_li" class="list-group-item modal_length">
                                    <div>
                                        <lable style="font-weight: bolder;">Spicy Levels: </lable> &nbsp; &nbsp;
                                        <input id="regular" type="radio" value="regular" name="r_brn">
                                        <label for="regular">Regular</label> &nbsp;
                                        <input id="spicy" type="radio" value="spicy" name="r_brn">
                                        <label for="spicy">Spicy</label> &nbsp;
                                        <input id="extra_spicy" type="radio" value="extra_spicy" name="r_brn">
                                        <label for="extra_spicy">Extra spicy</label> &nbsp;
                                    </div>
                                </li>
                                <li id="addon_li" class="list-group-item modal_length">
                                    <div>
                                        <table class="table">
                                            <tr>
                                                <th> Add-ons </th>
                                                <th> Cost</th>
                                            </tr>
                                            '.$add_ons_table.'
                                                <th>
                                                    <b>Total Cost:</b>
                                                </th>
                                                <th>
                                                <b id="t_cost_txt">  0 TK </b>
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                </li>
                            </ul>
                            <div class="modal-footer">
                                <button onclick="cancleClick()" id="close_btn" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Item</button>
                                <button onclick="addClick()" id="add_btn" type="button" class="btn btn-primary">Add Item</button>
                            </div>
                        </div>
                    </div>
                </div>;'

                ?>