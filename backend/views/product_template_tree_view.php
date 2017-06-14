<div id="product-template-tree-view">
	<div class="page-title"><div class="clearfix"></div></div>
	<div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
      		<h4 style="margin-left:5px;">Products</h4>
      		<div class="x_title">
      			<div class="btn-group">
      				<a href="?mode=new&view_type=form-view&model=product_template" class="btn btn-success"><i class="fa fa-plus-circle"></i> Create </a>
        		</div>
        		<ul class="nav navbar-right panel_toolbox">
          			<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          			<li class="dropdown">
            			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            			<ul class="dropdown-menu" role="menu">
              				<li><a href="#">Published</a></li>
              				<li><a href="#">Unpublished</a></li>
              				<li class="divider"></li>
              				<li><a id="delete_multi" href="#">Delete</a></li>
            			</ul>
          			</li>
          			<li><a class="close-link"><i class="fa fa-close"></i></a></li>
    			</ul>
        		<div class="clearfix"></div>
      		</div>
      		<div class="x_content">
        		<div class="table-responsive">
	  				<form action="../web/index.php" method="post" id="product-tree-view" class="form-horizontal form-label-left">          		        			
              			<input type="hidden" name="model" value="product_template">
              			<table id="datatable-buttons" class="table table-striped jambo_table bulk_action">
                			<thead>
                  				<tr class="headings">
                    				<th>
                      					<input type="checkbox" id="check-all" class="flat">
                   		 			</th>
                    				<th class="column-title">Reference</th>
                                    <th class="column-title">Name</th>
                                    <th class="column-title">Sale Price</th>
                                    <th class="column-title">Cost</th>
                                    <th class="column-title">Category</th>
                                    <th class="column-title">Product Type</th>
                                    <th class="column-title">Visible in Website</th>
                                    <th class="column-title">Action</th>
                    				<th class="bulk-actions" colspan="7">
                      					<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    				</th>
                  				</tr>
                			</thead>
                            <tbody>
                              <?php 
                                $query = mysqli_query($connected, "SELECT 
                                        product_template.id, product_template.name, 
                                        product_template.list_price, product_template.standard_price,
                                        product_template.default_code, categ_id.display_name as categ_id_display_name,
                                        product_type_id.name as product_type_id_name,
                                        product_template.website_published
                                FROM product_template,
                                    (SELECT * FROM product_category) categ_id,
                                    (SELECT * FROM product_type) product_type_id
                                WHERE product_template.categ_id = categ_id.id
                                AND product_template.product_type_id = product_type_id.id") or die(mysqli_error());
                          
                                if(mysqli_num_rows($query) == 0){
                                  echo '<tr><td colspan=8">There is no records</td></tr>';                                  
                                }else{
                                    while($data = mysqli_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
                                        echo '<tr>';
                                        echo '<td class="a-center ">
                                                <input id="multi-checkbox" type="checkbox" value='.$data['id'].' class="flat" name="table_records[]"/>
                                             </td>';
                                        echo '<td>'.$data['default_code'].'</td>';
                                        echo '<td>'.$data['name'].'</td>';
                                        echo '<td> Rp. '.number_format($data['list_price'], 2).'</td>';
                                        echo '<td> Rp. '.number_format($data['standard_price'], 2).'</td>';
                                        echo '<td>'.$data['categ_id_display_name'].'</td>';
                                        echo '<td class="a-right a-right">'.$data['product_type_id_name'].'</td>';
                                        echo '<td class="a-right a-right">
                                                <input disabled="disabledd" checked="1" type="checkbox" class="flat" name="website_published"/>
                                             </td>';
                                        echo '<td class="a-center">
                                                <a href="?mode=read&view_type=form-view&model=product_template&id='.$data['id'].'">View</a>
                                             </td>';
                                        echo '</tr>';
                                    }
                                }
                                mysqli_close($connected);
                            ?>
                            </tbody>
              			</table>
	              		<input id="product-tree-button-submit" name="submit-delete" type="submit" style="display:none;" class="btn btn-success">              			
          			</form>
        		</div>
      		</div>
    	</div>
  	</div>
</div>