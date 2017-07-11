<?php 
    if(isset($_GET['mode'])){
        $mode = $_GET['mode'];
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = mysqli_query($connected, "SELECT * FROM product_template WHERE id='$id'") or die(mysqli_error($connected));
    
        if(mysqli_num_rows($query) == 0){
            echo '<script>window.history.back()</script>';
        }else{
            $data = mysqli_fetch_assoc($query);
        }
        mysqli_close($connected);
    }
?>
<div id="product-template-website-form-view" mode="read">
    <div class="products">	 
    	<div class="container">  
    		<div class="single-page">
    			<ol class="breadcrumb">
    			  <li><a href="index.php">Home</a></li>
    			  <li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=2">Pakaian Wanita</a></li>
    			  <li class="active"><?php echo $data['name'];?></li>
    			</ol>
    			<div class="single-page-row" id="detail-21">
    				<div class="col-md-6 single-top-left">	
    					<div class="flexslider">
    						<ul class="slides">
    							<li data-thumb="../static/src/images/<?php echo $data['optional_image_2'];?>">
    								<div class="thumb-image detail_images"> <img src="../static/src/images/<?php echo $data['optional_image_2'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
    							</li>
    							<li data-thumb="../static/src/images/<?php echo $data['optional_image_3'];?>">
    								 <div class="thumb-image"> <img src="../static/src/images/<?php echo $data['optional_image_3'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
    							</li>
    							<li data-thumb="../static/src/images/<?php echo $data['optional_image_4'];?>">
    							   <div class="thumb-image"> <img src="../static/src/images/<?php echo $data['optional_image_4'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
    							</li> 
    						</ul>
    					</div>
    				</div>
    				<div class="col-md-6 single-top-right">
    					<h3 class="item_name"><?php echo $data['name'];?></h3>
    					<p>Estimasi Pengiriman : Di area Semarang 1-2 Hari Kerja, Di luar Semarang 3 - 5 Hari Kerja. </p>
    					<div class="single-rating">
    						<ul>
    							<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
    							<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
    							<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
    							<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
    							<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
    							<li class="rating">20 reviews</li>
    							<li><a href="#">Add your review</a></li>
    						</ul> 
    					</div>
    					<div class="single-price">
    						<ul>
    							<li><?php echo 'Rp. '.number_format($data['list_price'], 0).'';?></li>
    							<li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i> Coupon</a></li>
    						</ul>	
    					</div> 
    					<p class="single-price-text">Harga Terjangkau, Barang Berkualitas.</p>
    					<form action="#" method="post">
    						<input type="hidden" name="cmd" value="_cart"/>
    						<input type="hidden" name="add" value="1" /> 
    						<input type="hidden" name="w3ls1_item" value="<?php echo $data['name']?>" /> 
    						<input type="hidden" name="amount" value="<?php echo $data['list_price']?>" /> 
    						<button style="display:none;" class="w3ls-cart" type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
    					</form>
    					<form action="index.php?mode=cart-session&view_type=tree-view&model=product_template&cart=add&id=<?php echo $id;?>" method="post">
     						<input type="hidden" name="qty_ordered" value="1"/>
     						<button class="w3ls-cart" name="action_order" type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>   					
    					</form>
    				</div>
    			   <div class="clearfix"> </div>  
    			</div>
    		</div>
    
    			
    		<!-- collapse-tabs -->
    		<div class="collpse tabs">
    			<br/><br/><br/><br/>
    			<ul class="nav nav-tabs success" role="tablist">
    			  <li role="presentation" class="active"><a role="tab" data-toggle="tab" href="#1">Rincian</a></li>
    			  <li role="presentation"><a role="tab" data-toggle="tab" href="#2">Detail Ukuran</a></li>
    			  <li role="presentation"><a role="tab" data-toggle="tab" href="#3">Info Pengiriman</a></li>
    			</ul><br/>
    			<div class="tab-content">
    			  	<div class="tab-pane active" id="1">
              			<div class="row">
              				<div class="col-md-12">
    							<p>
    								<b>SKU (simple)</b> : <?php echo $data['default_code']?><br/>
    								<b>Warna</b> : 	Pastel Ombre<br/>
    								<b>Petunjuk Perawatan</b> : Cuci dengan mesin air hangat, Hindari pemutih, Jangan dikeringkan dimesin, Jangan disterika, Hindari dry clean<br/><br/>
    							</p>
    						</div>
              			</div>
    				</div>
    				<div class="tab-pane" id="2">
    					<div class="row">
              				<div class="col-md-6">
    							<p>
    								Panjang lengan x Lingkar Dada x Lingkar Pinggang x Lingkar Pinggul x Panjang <br/>
    								- L (57.5cm x 94cm x 77cm x 126cm x 147cm) <br/>
    								- XL (59cm x 100cm x 81cm x 132cm x 148.5cm) <br/>
    							</p>
    						</div>
    						<div class="col-md-6">
    							<p>
    								<b>Ukuran badan model</b> : <br/><br/>
    								Tinggi: 175cm <br/>
    								Lingkar Dada: 81cm <br/>
    								Lingkar Pinggang: 59cm <br/>
    								Lingkar Pinggul: 90cm <br/><br/>
    								Size yang dikenakan model S
    							</p>
    						</div>
              			</div>
              		</div>
            		<div class="tab-pane" id="3">
    					<div class="row">
              				<div class="col-md-12">
    							<p>
    								<b>GRATIS ke seluruh Indonesia</b>, dengan ketentuan sebagai berikut: <br/><br/>
    								GRATIS biaya pengiriman buat kamu jika beli produk kami dengan total di atas Rp.300.000 ATAU beli produk SATU seller dengan total diatas Rp. 200.000. Total order dihitung secara terpisah antara barang yang dijual oleh kami dan masing-masing seller (penjual).<br/><br/> 
    								Untuk barang yang dijual oleh seller (penjual) di kami, kamu akan menikmati pengiriman gratis jika kamu memesan setidaknya senilai Rp 200.000 dari setiap penjual. Apabila kamu melakukan pemesanan barang dari kami dan beberapa penjual yang berbeda, kamu mungkin dibebankan biaya pengiriman untuk setiap penjual. Pengiriman akan dilakukan jasa kurir pengiriman yang terpercaya.
    							</p>
              				</div>
              			</div>
              		</div>
    			</div>
    		</div>
    		<!-- //collapse --> 
    	</div>
    </div>
</div>