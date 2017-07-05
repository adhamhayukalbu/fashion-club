<?php 
    $user = "root";
    $pass = "";
    $db = "fashion_club";
    $host = "localhost";
    $connected = connect_to_db($host, $user, $pass, $db);
?>
<div id="sale-order-tree-view">
	<div class="page-title"><div class="clearfix"></div></div>
	<div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
      		<h4 style="margin-left:5px;">Sales Orders</h4>
      		<div class="x_title">
<!--       			<div class="btn-group"> -->
<!--       				<a href="?mode=new&view_type=form-view&model=sale_order" class="btn btn-success"><i class="fa fa-plus-circle"></i> Create </a> -->
<!--         		</div> -->
        		<ul class="nav navbar-right panel_toolbox">
          			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          			<li class="dropdown">
            			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            			<ul class="dropdown-menu" role="menu">
              				<li><a id="action_published" href="#">Published</a></li>
              				<li><a id="action_unpublished" href="#">Unpublished</a></li>
              				<li class="divider"></li>
              				<li><a id="action_delete" href="#">Delete</a></li>
            			</ul>
          			</li>
          			<li><a class="close-link"><i class="fa fa-close"></i></a></li>
    			</ul>
        		<div class="clearfix"></div>
      		</div>
      		<div class="x_content">
        		<div class="table-responsive">
	  				<form action="../web/index.php" method="post" id="sale-order-view" class="form-horizontal form-label-left">          		        			
              			<input type="hidden" name="model" value="sale_order">
              			<table id="sale-order-table" class="table table-striped jambo_table bulk_action">
                			<thead>
                  				<tr class="headings">
                    				<th>
                      					<input type="checkbox" id="check-all" class="flat">
                   		 			</th>
                    				<th class="column-title">Order Number</th>
                                    <th class="column-title">Customer</th>
                                    <th class="column-title">Customer Email</th>
                                    <th class="column-title">Order Date</th>
                                    <th class="column-title">Total</th>
                                    <th class="column-title">Action</th>
                    				<th class="bulk-actions" colspan="8">
                      					<a class="antoo" style="color:#fff; font-weight:500;">Batch Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    				</th>
                  				</tr>
                			</thead>
                            <tbody>
                              <?php 
                                $query = mysqli_query($connected, "SELECT 
                                        sale_order.id, sale_order.name, 
                                        sale_order.order_date, sale_order.amount_untaxed,
                                        sale_order.partner_name as customer, sale_order.amount_total,
                                        sale_order.partner_email
                                FROM sale_order") or die(mysqli_error($connected));
                          
                                if(mysqli_num_rows($query) == 0){
                                  echo '<tr><td colspan=8">There is no records</td></tr>';                                  
                                }else{
                                    while($data = mysqli_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
                                        echo '<tr>';
                                        echo '<td class="a-center ">
                                                <input id="multi-checkbox" type="checkbox" value='.$data['id'].' class="flat" name="table_records[]"/>
                                             </td>';
                                        echo '<td>'.$data['name'].'</td>';
                                        echo '<td>'.$data['customer'].'</td>';
                                        echo '<td>'.$data['partner_email'].'</td>';
                                        echo '<td class="a-right a-right">'.$data['order_date'].'</td>';
                                        echo '<td> Rp. '.number_format($data['amount_total'], 2).'</td>';
                                        echo '<td class="a-center">
                                                <a href="?mode=read&view_type=form-view&model=sale_order&id='.$data['id'].'">View</a>
                                             </td>';
                                        echo '</tr>';
                                    }
                                }
                                mysqli_close($connected);
                            ?>
                            </tbody>
              			</table>
	              		<input id="sale-order-tree-button-submit" name="submit-delete" type="submit" style="display:none;" class="btn btn-success">              			
	              		<input id="sale-order-tree-button-submit" name="submit-published" type="submit" style="display:none;" class="btn btn-success">              			
	              		<input id="sale-order-tree-button-submit" name="submit-unpublished" type="submit" style="display:none;" class="btn btn-success">              			
          			</form>
        		</div>
      		</div>
    	</div>
  	</div>
</div>