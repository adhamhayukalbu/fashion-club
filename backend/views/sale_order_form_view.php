<?php 
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_GET['id'])){
        $user = "root";
        $pass = "";
        $db = "fashion_club";
        $host = "localhost";
        $connected = connect_to_db($host, $user, $pass, $db);

        $id = $_GET['id'];
        $query = mysqli_query($connected, "SELECT * FROM sale_order WHERE id='$id'") or die(mysqli_error($connected));
    
        if(mysqli_num_rows($query) == 0 && $model == 'sale_order'){
            echo '<script>window.history.back()</script>';
        }else{
            $data = mysqli_fetch_assoc($query);
        }
        mysqli_close($connected);
    }
?>
<div id="sale-order-form-view">
    <div class="page-title">
        <div class="clearfix"></div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
        	<h4 style="margin-left:5px;"><a href="?view_type=tree-view&model=sale_order">Sales Orders</a> / <span><?php echo $data['name']; ?></span></h4>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <section class="content invoice">
              <!-- title row -->
              <div class="row">
                <div class="col-xs-12 invoice-header">
                  <h1><span><?php echo $data['name']; ?></h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <!-- /.col -->
                <div class="col-sm-8 invoice-col">
                  <strong>Customer : </strong><?php echo $data['partner_name'];?>
                  <br/><b>Customer Phone : </b><?php echo $data['partner_phone'];?>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
				  <b>Email : </b><?php echo $data['partner_email'];?>
                  <br/>
                  <b>Order Date :</b> <?php echo $data['order_date'];?>
                </div>
                <!-- /.col -->
              </div><br/>
              <!-- /.row -->

              	<div class="" role="tabpanel" data-example-id="togglable-tabs">
                	<ul id="myTab" class="nav nav-tabs bar_tabs left" role="tablist">
                    	<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Order Lines</a></li>
                  	</ul>
                  	<div id="myTabContent" class="tab-content">
                    	<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  	
                          <!-- Table row -->
                          <div class="row">
                            <div class="col-xs-12 table">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Product</th>
                                    <th>Ordered Qty</th>
                                    <th>Unit Price</th>
                                    <th>Subtotal</th>
                                  </tr>
                                </thead>
                                <tbody>
                              	<?php
                              	    $order_id = $data['id'];                              	    
                              	    $connected = connect_to_db($host, $user, $pass, $db);
                                    $query = mysqli_query($connected, "SELECT 
                                         product_template.name as product_name, sale_order_line.qty_ordered,
                                         sale_order_line.price_unit, sale_order_line.amount_untaxed
                                    FROM sale_order_line JOIN product_template 
                                    ON sale_order_line.product_id = product_template.id
                                    WHERE order_id = '$order_id'") or die(mysqli_error($connected));
                              
                                    if(mysqli_num_rows($query) == 0){
                                      echo '<tr><td colspan=8">There is no records</td></tr>';                                  
                                    }else{
                                        while($line = mysqli_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
                                            echo '<tr>';
                                            echo '<td>'.$line['product_name'].'</td>';
                                            echo '<td>'.$line['qty_ordered'].'</td>';
                                            echo '<td> Rp. '.number_format($line['price_unit'], 2).'</td>';
                                            echo '<td> Rp. '.number_format($line['amount_untaxed'], 2).'</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    mysqli_close($connected);
                                ?>
                                </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                      	</div>
                  	</div>
        		</div>
          		<div class="ln_solid"></div><br/>

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6"></div>
                <!-- /.col -->
                <div class="col-xs-6">
              	  <p class="lead"><strong>Summary Information</strong></p>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th style="width:50%">Untaxed Amount</th>
                          <td><?php echo 'Rp. '.number_format($data['amount_untaxed'], 2).'';?></td>
                        </tr>
                        <tr>
                          <th>Taxes</th>
                          <td><?php echo 'Rp. '.number_format($data['amount_tax'], 2).'';?></td>
                        </tr>
                        <tr class="table-danger">
                          <th>Total</th>
                          <td ><?php echo 'Rp. '.number_format($data['amount_total'], 2).'';?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-xs-12">
                  <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                  <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                  <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
</div>