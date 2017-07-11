<?php
    $user = "root";
    $pass = "";
    $db = "fashion_club";
    $host = "localhost";
    $connected = connect_to_db($host, $user, $pass, $db);
    if(!empty($_GET["cart"])) {
        switch($_GET["cart"]) {
            case "add":
                if(!empty($_POST["qty_ordered"])) {
                    $result = mysqli_query($connected, "SELECT * FROM product_template WHERE id='" . $_GET["id"] . "'");
                    while($row=mysqli_fetch_assoc($result)) {
                        $resultset[] = $row;
                    }
                    $productByCode = $resultset;
                    $itemArray = array($productByCode[0]["id"]=>array(
                            'name'=>$productByCode[0]["name"],
                            'amount_untaxed'=>(($productByCode[0]["list_price"] / 1.1) * $_POST["qty_ordered"]),
                            'amount_tax'=>(($productByCode[0]["list_price"] * $_POST["qty_ordered"])-(($productByCode[0]["list_price"] / 1.1) * $_POST["qty_ordered"])),
                            'amount_total'=>($productByCode[0]["list_price"] * $_POST["qty_ordered"]),
                            'image'=>$productByCode[0]["image"],
                            'id'=>$productByCode[0]["id"],
                            'qty_ordered'=>$_POST["qty_ordered"],
                            'list_price'=>$productByCode[0]["list_price"],
                        ),
                    );
                    
                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode[0]["id"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                if($productByCode[0]["id"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["qty_ordered"])) {
                                        $_SESSION["cart_item"][$k]["qty_ordered"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["qty_ordered"] += $_POST["qty_ordered"];
                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                break;
            case "remove":
                if(!empty($_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                        if($_GET["id"] == $k)
                            unset($_SESSION["cart_item"][$k]);
                            if(empty($_SESSION["cart_item"]))
                                unset($_SESSION["cart_item"]);
                    }
                }
                break;
            case "empty":
                unset($_SESSION["cart_item"]);
                break;
        }
    }
?>
<div id="product-template-website-cart-view" mode="read">
    <div class="products">	 
    	<div class="container">  
            <?php
//             if(isset($_SESSION["cart_item"])){
                $amount_total = 0;
                $amount_untaxed = 0;
                $amount_tax = 0;
            ?>	
    		<div class="single-page">   		
    			<ol class="breadcrumb">
    			  <li><a href="index.php">Home</a></li>
    			  <li class="active"><i class="fa fa-shopping-cart" aria-hidden="true"></i> | Shopping Cart</li>
    			</ol>
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th >Product</th>
                                    <th class="text-center" colspan="2">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($_SESSION["cart_item"] as $item){
                                ?><tr>
                                    <td class="col-sm-8 col-md-6">
                                        <div class="media">
                                        	<div class="col-sm-3">
	                                            <a class="thumbnail pull-left" href="#">
                                            		<img class="media-object" src="../static/src/images/<?php echo $item['image'];?>" style="width: 72px; height: 72px;">
                                        		</a>
                                        	</div>
                                        	<div class="col-sm-5">
                                        		<p>
                                        			<strong class="item_name"><a href="#"><?php echo $item['name'];?></a></strong>	
                                        		</p>
		                                        <a href="index.php?mode=read&view_type=tree-view&model=product_template&cart=remove&id=<?php echo $item['id'];?>">
                                        			<i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp; Remove
                                    			</a>
                                        	</div>
                                        </div>
                                    </td>
                                    <td colspan="2" class="col-sm-1 col-md-2" style="text-align: center">
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                          	<a id="minus_qty_ordered" href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                          </span>
                                          		<input id="qty_ordered_field" disabled="disabled" type="text" class="form-control" name="qty_ordered" value="<?php echo $item['qty_ordered'];?>">
                                          <span class="input-group-addon">
                                          	<a id="plus_qty_ordered" href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                          </span>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 col-md-2 text-center"><strong><?php echo 'Rp. '.number_format($item['list_price'], 2).'';?></strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong><?php echo 'Rp. '.number_format($item['amount_untaxed'], 2).'';?></strong></td>
                                </tr>
                				<?php
                				    $amount_untaxed += $item['amount_untaxed'];
                				    $amount_tax += $item['amount_tax'];
                				    $amount_total += ($item["list_price"]*$item['qty_ordered']);
                    		      }
                        		?>
                                <tr>
                                    <td colspan="3">
                                    <td class="text-left"><h5>Subtotal</h5></td>
                                    <td class="text-right"><h5><strong><?php echo 'Rp. '.number_format($amount_untaxed, 2).'';?></strong></h5></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                    <td class="text-left"><h5>Tax</h5></td>
                                    <td class="text-right"><h5><strong><?php echo 'Rp. '.number_format($amount_tax, 2).'';?></strong></h5></td>
                                </tr>
                                <tr>
                                    <td colspan="3"/>
                                    <td class="text-left"><h4><strong>Total</strong></h4></td>
                                    <td class="text-right"><h4><strong><?php echo 'Rp. '.number_format($amount_total, 2).'';?></strong></h4></td>
                                </tr>
                                <tr>
                                    <td>
                                    <a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=2" class="btn btn-default">
                                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> &nbsp; Continue Shopping
                                    </a>   
                                    </td>
                                    <td colspan="3"/>
                                    <td>
                                    	<a href="index.php?mode=checkout-session&view_type=tree-view&model=product_template" type="button" class="btn btn-success">
                                        	Process Checkout &nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                    	</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    		</div>
    	</div>
    	<?php
    	     $_SESSION["order"] = array(
    	         'amount_untaxed'=>$amount_untaxed,
    	         'amount_tax'=>$amount_tax,
    	         'amount_total'=>$amount_total,
    	     );
//             }
    	?>
    </div>
</div>