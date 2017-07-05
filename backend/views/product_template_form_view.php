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
        $model = $_GET['model'];
        $query = mysqli_query($connected, "SELECT * FROM product_template WHERE id='$id'") or die(mysqli_error($connected));
    
        if(mysqli_num_rows($query) == 0 && $model == 'product_template'){
            echo '<script>window.history.back()</script>';
        }else{
            $data = mysqli_fetch_assoc($query);
        }
        mysqli_close($connected);
    }
?>
<!--  Form View Create / Edit Mode -->
<div id="product-template-form-view" mode="create-edit">
	<div class="page-title"><div class="clearfix"></div></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
        	<h4 style="margin-left:5px;"><a href="?view_type=tree-view&model=product_template">Products</a> / <span><?php echo $data['name']; ?></span></h4>
          	<div class="x_title">
      			<a id="save" href="#" class="btn btn-success"> Save </a>
      			<a href="?view_type=tree-view&model=product_template" class="btn btn-default"> Discard </a>
            	<ul class="nav navbar-right panel_toolbox">
              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              		<li class="dropdown">
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                		<ul class="dropdown-menu" role="menu">
                  			<li><a href="#">Delete</a></li>
                		</ul>
              		</li>
              		<li><a class="close-link"><i class="fa fa-close"></i></a></li>
            	</ul>
            	<div class="clearfix"></div>
          	</div>
    
          	<div class="x_content">
          		<br/>
  				<form enctype="multipart/form-data" action="../web/index.php" method="post" id="product-form-view" class="form-horizontal form-label-left">          		
          			<input type="hidden" name="id" value="<?php echo $id; ?>">
          			<input type="hidden" name="mode" value="<?php echo $mode; ?>">
          			<input type="hidden" name="model" value="product_template">
          			<div class="row">
          				<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-4 col-sm-4 col-xs-12">
    	                        <div class="thumbnail">
    	                          <span class="label label-primary">Primary Image</span>
                                  <div class="image view view-first">
                                    <img style="width: 100%; display: block;" src="../images/<?php echo $data['image']?>" alt="image" />
                                    <div class="mask">
                                      <p><?php echo $data['name']; ?></p>
                                      <div class="tools tools-bottom">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="caption">
                                    <p><input type="file" name="image" id="demo-fileInput-lesson-one"></p>
                                  </div>
                                </div>
                            </div>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
                      			<div class="form-group">
                      				<input type="text" value="<?php echo $data['name']; ?>" name="name" class="form-control" placeholder="Product Name">
                          		</div>
  		                        <div class="form-group">  
                                	<div style="margin-left: -2.6%" class="checkbox">
                                    	<label>
                                      		<input type="checkbox" name="sale_ok" class="flat" checked="<?php echo $data['sale_ok']; ?>"> &nbsp; <strong> Can be Sold </strong>
                                    	</label>
                                  	</div>
                              		<div style="margin-left: -2.6%" class="checkbox">
                                    	<label>
                                      		<input type="checkbox" name="purchase_ok" checked="<?php echo $data['purchase_ok']; ?>" class="flat"> &nbsp; <strong> Can be Purchased </strong>
                                    	</label>
                                  	</div>
                                  	<div style="margin-left: -2.6%" class="checkbox">
                                    	<label>
                                      		<input type="checkbox" name="website_published" class="flat" checked="<?php echo $data['website_published']; ?>"> &nbsp; <strong> Published on Website </strong>
                                    	</label>
                                  	</div>
                          		</div> 
                                <div class="col-md-12">
                                	<h4>Optional Images</h4>
                              		<div class="col-md-4">
                                  		<div class="thumbnail">
            	                          <span class="label label-default">Optional 2nd Image</span>
                                          <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="../images/<?php echo $data['optional_image_2']?>" alt="image" />
                                            <div class="mask">
                                              <p><?php echo $data['name']; ?></p>
                                              <div class="tools tools-bottom">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="caption">
                                            <p><input type="file" name="optional_image_2" id="demo-fileInput-lesson-one"></p>
                                          </div>
                                        </div>
                              		</div>
                              		<div class="col-md-4">                        		
                                  		<div class="thumbnail">
            	                          <span class="label label-default">Optional 3rd Image</span>
                                          <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="../images/<?php echo $data['optional_image_3']?>" alt="image" />
                                            <div class="mask">
                                              <p><?php echo $data['name']; ?></p>
                                              <div class="tools tools-bottom">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="caption">
                                            <p><input type="file" name="optional_image_3" id="demo-fileInput-lesson-one"></p>
                                          </div>
                                        </div>
                              		</div>
                              		<div class="col-md-4">                        		
                                  		<div class="thumbnail">
            	                          <span class="label label-default">Optional 4th Image</span>
                                          <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="../images/<?php echo $data['optional_image_4']?>" alt="image" />
                                            <div class="mask">
                                              <p><?php echo $data['name']; ?></p>
                                              <div class="tools tools-bottom">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="caption">
                                            <p><input type="file" name="optional_image_4" id="demo-fileInput-lesson-one"></p>
                                          </div>
                                        </div>
                              		</div> 
                                </div>                         		                        
                        	</div>
          				</div>
          			</div>
    	  			<br/>
                  	<div class="" role="tabpanel" data-example-id="togglable-tabs">
                    	<ul id="myTab" class="nav nav-tabs bar_tabs left" role="tablist">
                        	<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">General Information</a></li>
                        	<li role="presentation"><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Notes</a></li>                                
                      	</ul>
                      	<div id="myTabContent" class="tab-content">
                        	<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        		<div style="text-align: left;"  class="row">
    								<div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Product Type</strong></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            	<select name="product_type_id" class="form-control">
                                                	<option value="1">Stockable</option>
                                                	<option value="2">Consumeable</option>
                                                	<option value="3">Service</option>
                                            	</select>
                                          	</div>
                                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Internal Category</strong></label>
                                            <div class="col-md-8s col-sm-8 col-xs-12">
                                            	<select name="categ_id" class="form-control">
                                                	<option value="1">Wanita</option>
                                                	<option value="2">Wanita / Pakaian</option>
                                            	</select>
                                          	</div>
                                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Internal Reference</strong></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            	<div class="input-group">
                                                	<input value="<?php echo $data['default_code']; ?>" name="default_code" type="text" class="form-control">
                                          		</div>
                                          	</div>
                                        </div>                                 
    								</div>
    								<div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Sale Price</strong></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            	<div class="input-group">
                                                	<input value="<?php echo $data['list_price']; ?>" name="list_price" type="text" class="form-control">
                                          		</div>
                                          	</div>
                                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Cost</strong></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            	<div class="input-group">
                                                	<input value="<?php echo $data['standard_price']; ?>" name="standard_price" type="text" class="form-control">
                                          		</div>
                                          	</div>
                                        </div>                                 
    								</div>								
                        		</div>
                          	</div>
                            
                        	<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="home-tab">
                          		<h2><strong>Description For Product</strong></h2>
	                          	<textarea placeholder="This note will be displayed on the website" class="form-control" name="description_sale"></textarea>
                          		<h2><strong>Description For Shipping</strong></h2>
                          		<textarea placeholder="This note will be displayed on the website" class="form-control" name="description_picking"></textarea>
                        	</div>
                      	</div>
            		</div>
              		<div class="ln_solid"></div>
              		<input id="product-form-button-submit" name="submit-save" type="submit" style="display:none;" class="btn btn-success">
              	</form>
    		</div>
		</div>
	</div>
</div>


<!--  Form View Readonly Mode -->
<div id="product-template-form-view" mode="read">
	<div class="page-title"><div class="clearfix"></div></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
    	<div class="x_panel">
        	<h4 style="margin-left:5px;"><a href="?view_type=tree-view&model=product_template">Products</a> / <span><?php echo $data['name']; ?></span></h4>
          	<div class="x_title">
      			<a href="?mode=edit&view_type=form-view&model=product_template&id=<?php echo $id;?>" class="btn btn-success"> Edit </a>
      			<a href="?mode=new&view_type=form-view&model=product_template" class="btn btn-default"><i class="fa fa-plus-circle"></i> Create </a>
            	<ul class="nav navbar-right panel_toolbox">
              		<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              		<li class="dropdown">
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                		<ul class="dropdown-menu" role="menu">
                  			<li><a href="#">Delete</a></li>
                		</ul>
              		</li>
              		<li><a class="close-link"><i class="fa fa-close"></i></a></li>
            	</ul>
            	<div class="clearfix"></div>
          	</div>
    
          	<div class="x_content">
          		<br/>
  				<form enctype="multipart/form-data" action="../web/index.php" method="post" id="product-form-view" class="form-horizontal form-label-left">          		
          			<input type="hidden" name="id" value="<?php echo $id; ?>">
          			<input type="hidden" name="model" value="product_template">
          			<div class="row">
          				<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-4 col-sm-4 col-xs-12">
    	                        <div class="thumbnail">
    	                          <span class="label label-primary">Primary Image</span>
                                  <div class="image view view-first">
                                    <img style="width: 100%; display: block;" src="../images/<?php echo $data['image']?>" alt="image" />
                                    <div class="mask">
                                      <p><?php echo $data['name']; ?></p>
                                      <div class="tools tools-bottom">
                                        <a href="#"><i class="fa fa-link"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="caption">
                                    <p><input disabled="disabled" type="file" name="uploaded-file" id="demo-fileInput-lesson-one"></p>
                                  </div>
                                </div>
                            </div>
	                        <div class="col-md-8 col-sm-8 col-xs-12">
                      			<div class="form-group">
                  					<input disabled="disabled" type="text" value="<?php echo $data['name']; ?>" name="name" class="form-control" placeholder="Product Name">
                          		</div>
  		                        <div class="form-group">  
                                	<div style="margin-left: -2.6%" class="checkbox">
                                    	<label>
                                      		<input disabled="disabled" type="checkbox" name="sale_ok" class="flat" checked="<?php echo $data['sale_ok']; ?>"> &nbsp; <strong> Can be Sold </strong>
                                    	</label>
                                  	</div>
                              		<div style="margin-left: -2.6%" class="checkbox">
                                    	<label>
                                      		<input disabled="disabled" type="checkbox" name="purchase_ok" checked="<?php echo $data['purchase_ok']; ?>" class="flat"> &nbsp; <strong> Can be Purchased </strong>
                                    	</label>
                                  	</div>
                                  	<div style="margin-left: -2.6%" class="checkbox">
                                    	<label>
                                      		<input disabled="disabled" type="checkbox" name="website_published" class="flat" checked="<?php echo $data['website_published']; ?>"> &nbsp; <strong> Published on Website </strong>
                                    	</label>
                                  	</div>
                          		</div>                        		
                                <div class="col-md-12">
                                	<h4>Optional Images</h4>
                              		<div class="col-md-4">
                                  		<div class="thumbnail">
            	                          <span class="label label-default">Optional 2nd Image</span>
                                          <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="../images/<?php echo $data['optional_image_2']?>" alt="image" />
                                            <div class="mask">
                                              <p><?php echo $data['name']; ?></p>
                                              <div class="tools tools-bottom">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="caption">
                                            <p><input disabled="disabled" type="file" name="uploaded-file" id="demo-fileInput-lesson-one"></p>
                                          </div>
                                        </div>
                              		</div>
                              		<div class="col-md-4">                        		
                                  		<div class="thumbnail">
            	                          <span class="label label-default">Optional 3rd Image</span>
                                          <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="../images/<?php echo $data['optional_image_3']?>" alt="image" />
                                            <div class="mask">
                                              <p><?php echo $data['name']; ?></p>
                                              <div class="tools tools-bottom">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="caption">
                                            <p><input disabled="disabled" type="file" name="uploaded-file" id="demo-fileInput-lesson-one"></p>
                                          </div>
                                        </div>
                              		</div>
                              		<div class="col-md-4">                        		
                                  		<div class="thumbnail">
            	                          <span class="label label-default">Optional 4th Image</span>
                                          <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="../images/<?php echo $data['optional_image_4']?>" alt="image" />
                                            <div class="mask">
                                              <p><?php echo $data['name']; ?></p>
                                              <div class="tools tools-bottom">
                                                <a href="#"><i class="fa fa-link"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="caption">
                                            <p><input disabled="disabled" type="file" name="uploaded-file" id="demo-fileInput-lesson-one"></p>
                                          </div>
                                        </div>
                              		</div> 
                                </div>                      		                        
                        	</div>
          				</div>
          			</div>
    	  			<br/>
                  	<div class="" role="tabpanel" data-example-id="togglable-tabs">
                    	<ul id="myTab" class="nav nav-tabs bar_tabs left" role="tablist">
                        	<li role="presentation" class="active"><a href="#read-tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">General Information</a></li>
                        	<li role="presentation"><a href="#read-tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Notes</a></li>                                
                      	</ul>
                      	<div id="myTabContent" class="tab-content">
                        	<div role="tabpanel" class="tab-pane fade active in" id="read-tab_content1" aria-labelledby="home-tab">
                        		<div style="text-align: left;"  class="row">
    								<div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Product Type</strong></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            	<select disabled="disabled" name="product_type_id" class="form-control">
                                                	<option value="1">Stockable</option>
                                                	<option value="2">Consumeable</option>
                                                	<option value="3">Service</option>
                                            	</select>
                                          	</div>
                                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Internal Category</strong></label>
                                            <div class="col-md-8s col-sm-8 col-xs-12">
                                            	<select disabled="disabled" name="categ_id" class="form-control">
                                                	<option value="1">Wanita</option>
                                                	<option value="2">Wanita / Pakaian</option>
                                            	</select>
                                          	</div>
                                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Internal Reference</strong></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            	<div class="input-group">
                                                	<input disabled="disabled" value="<?php echo $data['default_code']; ?>" name="default_code" type="text" class="form-control">
                                          		</div>
                                          	</div>
                                        </div>                                 
    								</div>
    								<div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Sale Price</strong></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            	<div class="input-group">
                                                	<input disabled="disabled" value="<?php echo $data['list_price']; ?>" name="list_price" type="text" class="form-control">
                                          		</div>
                                          	</div>
                                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-4 col-sm-4 col-xs-12"><strong>Cost</strong></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            	<div class="input-group">
                                                	<input disabled="disabled" value="<?php echo $data['standard_price']; ?>" name="standard_price" type="text" class="form-control">
                                          		</div>
                                          	</div>
                                        </div>                                 
    								</div>								
                        		</div>
                          	</div>
                            
                        	<div role="tabpanel" class="tab-pane fade" id="read-tab_content2" aria-labelledby="home-tab">
                          		<h2><strong>Description For Product</strong></h2>
	                          	<textarea disabled="disabled" placeholder="This note will be displayed on the website" class="form-control" name="description_sale"></textarea>
                          		<h2><strong>Description For Shipping</strong></h2>
                          		<textarea disabled="disabled" placeholder="This note will be displayed on the website" class="form-control" name="description_picking"></textarea>
                        	</div>
                      	</div>
            		</div>
              		<div class="ln_solid"></div>
              	</form>
    		</div>
		</div>
	</div>
</div>