<?php 
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
?>
<div id="product-template-website-kanban-view" mode="read">
    <div class="sub-banner my-banner2"></div>
    <div class="content">
    	<div class="container">
    		<ol class="breadcrumb">
    		  <li><a href="index.php">Home</a></li>
    		  <li class="active">Pakaian Wanita</li>
    		</ol>
    		<div class="col-md-4 w3ls_dresses_grid_left">
    			<div class="w3ls_dresses_grid_left_grid">
    				<h3>List Produk</h3>
    				<div class="w3ls_dresses_grid_left_grid_sub">
    					<div class="ecommerce_dres-type">
    						<ul>
    							<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=1">Pakaian</a></li>
    							<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=2">Sepatu</a></li>
    							<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=3">Aksesories</a></li>
    							<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=4">Jam Tangan</a></li>
    							<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=5">Tas</a></li>
    						</ul>
    					</div>
    				</div>
    			</div>
    			<div class="w3ls_dresses_grid_left_grid">
    				<h3>Size</h3>
    				<div class="w3ls_dresses_grid_left_grid_sub">
    					<div class="ecommerce_color ecommerce_size">
    						<ul>
    							<li><a href="#">Medium</a></li>
    							<li><a href="#">Large</a></li>
    							<li><a href="#">Extra Large</a></li>
    							<li><a href="#">Small</a></li>
    						</ul>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-8 col-sm-8 women-dresses">
    			<div class="women-set1">
    				<?php 
        				if(isset($_GET['categ_id'])){    				    
        				    $categ_id = $_GET['categ_id'];
        				    $query = mysqli_query($connected, "SELECT * From product_template WHERE website_published = 1 AND categ_id = '$categ_id'") or die(mysqli_error());
  
        				    if(mysqli_num_rows($query) == 0){
        				        echo '<tr><td colspan=8">There is no records</td></tr>';
        				    }else{
        				        while($data = mysqli_fetch_assoc($query)){
                    ?>
					<div class="col-md-4 women-grids wp1 animated wow slideInUp" data-wow-delay=".5s">
    					<a href="index.php?mode=read&view_type=form-view&model=product_template&id=<?php echo $data['id'];?>">
        					<div class="product-img">
        						<img src="../static/src/images/<?php echo $data['image']; ?>" alt="" />
        						<div class="p-mask">
        							<form action="#" method="post">
        								<input type="hidden" name="cmd" value="_cart" />
        								<input type="hidden" name="add" value="1" /> 
        								<input type="hidden" name="w3ls1_item" value="<?php echo $data['name'];?>" /> 
        								<input type="hidden" name="amount" value="<?php echo $data['list_price']; ?>"/> 
        								<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
        							</form>
        						</div>
    						</div>
    					</a>
    					<h4><?php echo $data['name'];?></h4>
    					<h5><?php echo 'Rp. '.number_format($data['list_price'], 2).''?></h5><br/>
    				</div>                   
                    <?php                    
                    
        				        }
        				    }
        				    mysqli_close($connected);
        				}
    				?>
    				<div class="clearfix"></div>
    			</div>
    		</div>
    	</div>
    </div>
</div>