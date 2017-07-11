<?php
    session_start();
    $user = "root";
    $pass = "";
    $db = "fashion_club";
    $host = "localhost";
    
    include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/frontend/models/koneksi.php");
    
    $connected = connect_to_db($host, $user, $pass, $db);

    if(isset($_POST['submit-order'])){
        include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/frontend/models/process.php");
        $model = 'sale_order';
        create($model, $connected);
        unset($_SESSION["cart_item"]);
        unset($_SESSION["order"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Homepage | Fashion Club</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script type="application/x-javascript"> 
			addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ 
				window.scrollTo(0,1); 
			} 
		</script>

		<!-- css -->
		<link rel="stylesheet" href="../static/src/css/bootstrap.css" type="text/css" media="all" />
		<link rel="stylesheet" href="../static/src/css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="../static/src/css/font-awesome.min.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="../static/src/css/flexslider.css" type="text/css" media="screen" />
		<!-- //css -->

		<!-- font -->
		<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
		<!-- //font -->

		<!-- JS Source -->
		<script src="../static/src/js/jquery-1.11.1.min.js"></script>
		<script src="../static/src/js/bootstrap.js"></script>
		<script defer src="../static/src/js/jquery.flexslider.js"></script>
		<!-- //JS Source -->
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function() {
			  $('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			  });
			});
		</script>
		<!--flex slider-->
		
		<script src="../static/src/js/imagezoom.js"></script>
		<!-- //JS Source -->
	</head>
	<body>
    	<div class="header-top-w3layouts">
        	<div class="container">
        		<div class="col-md-6 logo-w3">
        			<a href="index.php">
        				<img src="../static/src/images/logo2.png" alt=""/><h1>FASHION<span>CLUB</span></h1>
        			</a>
        		</div>
        		<div class="clearfix"></div>
        	</div>
        </div>
        <div class="header-bottom-w3ls">
        	<div class="container">
        		<div class="col-md-7 navigation-agileits">
        			<nav class="navbar navbar-default">
        				<div class="navbar-header nav_2">
        					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        						<span class="sr-only">Toggle navigation</span>
        						<span class="icon-bar"></span>
        						<span class="icon-bar"></span>
        					</button>
        				</div> 
        				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
        					<ul class="nav navbar-nav ">
        						<li class="active"><a href="../lesson_web_mobile/index.php" class="hyper "><span>Home</span></a></li>	
        						<li class="dropdown ">
        							<a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span>Wanita<b class="caret"></b></span></a>
        							<ul class="dropdown-menu multi">
        								<div class="row">
        									<div class="col-sm-4">
        										<ul class="multi-column-dropdown">
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=2"><i class="fa fa-angle-right" aria-hidden="true"></i>Pakaian</a></li>
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=3"><i class="fa fa-angle-right" aria-hidden="true"></i>Sepatu</a></li>
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=4"><i class="fa fa-angle-right" aria-hidden="true"></i>Jam Tangan</a></li>
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=5"><i class="fa fa-angle-right" aria-hidden="true"></i>Aksesoris</a></li>
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=6"><i class="fa fa-angle-right" aria-hidden="true"></i>Tas</a></li>
        										</ul>
        									</div>
        									<div class="col-sm-4 w3l">
        										<a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=1"><img src="../static/src/images/menu1.jpg" class="img-responsive" alt=""></a>
        									</div>
        									<div class="clearfix"></div>
        								</div>
        							</ul>
        						</li>
        						<li class="dropdown">
        							<a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span>Pria<b class="caret"></b></span></a>
        							<ul class="dropdown-menu multi">
        								<div class="row">
        									<div class="col-sm-4">
        										<ul class="multi-column-dropdown">
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=6"><i class="fa fa-angle-right" aria-hidden="true"></i>Pakaian</a></li>
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=7"><i class="fa fa-angle-right" aria-hidden="true"></i>Sepatu</a></li>
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=8"><i class="fa fa-angle-right" aria-hidden="true"></i>Jam Tangan</a></li>
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=9"><i class="fa fa-angle-right" aria-hidden="true"></i>Aksesoris</a></li>
        											<li><a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=10"><i class="fa fa-angle-right" aria-hidden="true"></i>Tas</a></li>
        										</ul>
        									</div>
        									<div class="col-sm-4 w3l">
        										<a href="index.php?mode=read&view_type=kanban-view&model=product_template&categ_id=6"><img src="../static/src/images/menu3.jpg" class="img-responsive" alt=""></a>
        									</div>
        									<div class="clearfix"></div>
        								</div>
        							</ul>
        						</li>
        						<li><a href="../lesson_web_mobile/about-us.php" class="hyper"><span>Tentang Kami</span></a></li>
        						<li><a href="../lesson_web_mobile/contact-us.php" class="hyper"><span>Kontak Kami</span></a></li>
        					</ul>
        				</div>
        			</nav>
        		</div>
        		<script>
        				$(document).ready(function(){
        					$(".dropdown").hover(            
        						function() {
        							$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
        							$(this).toggleClass('open');        
        						},
        						function() {
        							$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
        							$(this).toggleClass('open');       
        						}
        					);
        				});
        		</script>
        		<div class="col-md-4 search-agileinfo">
        			<form action="#" method="post">
        				<input type="search" name="Search" placeholder="Cari Produk..." required="">
        				<button type="submit" class="btn btn-default search" aria-label="Left Align">
        					<i class="fa fa-search" aria-hidden="true"> </i>
        				</button>
        			</form>
        		</div>
        		<div class="col-md-1 cart-wthree">
        			<div class="cart"> 
        				<form action="#" method="post" class="last"> 
        					<input type="hidden" name="cmd" value="_cart" />
        					<input type="hidden" name="display" value="1" />
        					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
        				</form>  
        			</div>
        		</div>
        		<div class="clearfix"></div>
        	</div>
        </div>
        
        <?php
            /* Import Product Template Tree View & Product Template Form View */
            include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/frontend/views/product_template_website_main_view.php");
            include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/frontend/views/product_template_website_kanban_view.php");
            include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/frontend/views/product_template_website_form_view.php");
            include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/frontend/views/product_template_website_cart_view.php");
            include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/frontend/views/product_template_website_checkout_view.php");    
        ?>

        <?php
          if(isset($_GET['view_type'], $_GET['model'], $_GET['mode'])){
              if($_GET['view_type'] == 'kanban-view' && $_GET['model'] == 'product_template'){
        ?>
            	<script type="text/javascript">
                	$(document).ready(function(){
                	    $("#product-template-website-kanban-view[mode='read']").show();
                	    $("#product-template-website-form-view[mode='read']").hide();       	    
                	    $("#product-template-website-main-view").hide();
                	    $("#product-template-website-cart-view[mode='read']").hide();
                	    $("#product-template-website-checkout-view[mode='read']").hide();
                	});
            	</script>
        <?php 
              }elseif($_GET['view_type'] == 'form-view' && $_GET['model'] == 'product_template'){
        ?>
            	<script type="text/javascript">
                	$(document).ready(function(){
                	    $("#product-template-website-kanban-view[mode='read']").hide();
                	    $("#product-template-website-form-view[mode='read']").show();
                	    $("#product-template-website-cart-view[mode='read']").hide();      	    
                		$("#product-template-website-main-view[mode='read']").hide();
                		$("#product-template-website-checkout-view[mode='read']").hide();
                	});
            	</script>
        <?php 
              }elseif($_GET['view_type'] == 'main-view'){
        ?>
            	<script type="text/javascript">
                	$(document).ready(function(){
                	    $("#product-template-website-kanban-view[mode='read']").hide();
                	    $("#product-template-website-form-view[mode='read']").hide();
                	    $("#product-template-website-cart-view[mode='read']").hide();   	    
                		$("#product-template-website-main-view[mode='read']").show();
                		$("#product-template-website-checkout-view[mode='read']").hide();
                	});
            	</script>
        <?php
              }elseif($_GET['view_type'] == 'tree-view'){
                  if($_GET['mode'] == 'cart-session'){
        ?>
            	<script type="text/javascript">
                	$(document).ready(function(){
                	    $("#product-template-website-kanban-view[mode='read']").hide();
                	    $("#product-template-website-form-view[mode='read']").hide();
                	    $("#product-template-website-cart-view[mode='read']").show();        	    
                		$("#product-template-website-main-view[mode='read']").hide();
                		$("#product-template-website-checkout-view[mode='read']").hide();
                	});
            	</script>
        <?php
                  }else{
        ?>          
            	<script type="text/javascript">
                	$(document).ready(function(){
                	    $("#product-template-website-kanban-view[mode='read']").hide();
                	    $("#product-template-website-form-view[mode='read']").hide();
                	    $("#product-template-website-cart-view[mode='read']").hide();        	    
                		$("#product-template-website-main-view[mode='read']").hide();
                		$("#product-template-website-checkout-view[mode='read']").show();
                	});
            	</script>        			
        <?php     }
              }
          }else{
        ?>
        	<script type="text/javascript">
            	$(document).ready(function(){
            	    $("#product-template-website-kanban-view[mode='read']").hide();
            	    $("#product-template-website-form-view[mode='read']").hide();        	    
            	    $("#product-template-website-main-view[mode='read']").show();
            	    $("#product-template-website-cart-view[mode='read']").hide();
            		$("#product-template-website-checkout-view[mode='read']").hide();
            	});
        	</script>
        <?php
          }
        ?>

        <!-- newsletter -->
        <div class="newsletter">
        	<div class="container">
        		<div class="col-md-6 w3agile_newsletter_left">
        			<h3>Newsletter</h3>
        			<p>Untuk Layanan Informasi Terbaru silahkan Subscribe.</p>
        		</div>
        		<div class="col-md-6 w3agile_newsletter_right">
        			<form action="#" method="post">
        				<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
        				<input type="submit" value="Subscribe" />
        			</form>
        		</div>
        		<div class="clearfix"> </div>
        	</div>
        </div>
        <!-- //newsletter -->
        
        <!-- Footer -->
        <div class="footer">
        	<div class="container">
        		<div class="col-md-3 footer-grids fgd1">
        		<a href="index.html"><img src="../static/src/images/logo2.png" alt=" " /><h3>FASHION<span>CLUB</span></h3></a>
        		<ul>
        			<li>Pandana Merdeka</li>
        			<li>Semarang, Indonesia</li>
        			<!--<li><a href="https://github.com/adhamhayukalbu">github.com/adhamhayukalbu/</a></li>-->
        			<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        			<a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
        			<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        			<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
        		</ul>
        		</div>
        		<div class="col-md-3 footer-grids fgd2">
        			<h4>Information</h4> 
        			<ul>
        				<li><a href="../lesson_web_mobile/about-us.php">Tentang Kami</a></li>
        				<li><a href="../lesson_web_mobile/contact-us.php">Kontak Kami</a></li>
        			</ul>
        		</div>
        		<div class="col-md-3 footer-grids fgd3">
        			<h4>Shop</h4> 
        			<ul>
        				<li><a href="../lesson_web_mobile/content/wanita/baju/index.php">Pakaian</a></li>
        				<li><a href="../lesson_web_mobile/content/wanita/jam_tangan/index.php">Jam Tangan</a></li>
        				<li><a href="../lesson_web_mobile/content/wanita/sepatu/index.php">Sepatu</a></li>
        				<li><a href="../lesson_web_mobile/content/wanita/aksesoris/index.php">Aksesoris</a></li>
        				<li><a href="../lesson_web_mobile/content/wanita/tas/index.php">Tas</a></li>
        			</ul>
        		</div>
        		<div class="col-md-3 footer-grids fgd4">
        			<h4>My Account</h4> 
        			<ul>		
        				<li><a href="../lesson_web_mobile/login.php">Login</a></li>
        				<li><a href="../lesson_web_mobile/register.php">Register</a></li>
        			</ul>
        		</div>
        		<div class="clearfix"></div>
        		<p class="copy-right">© 2017 Fashion Club . All rights reserved | Design by #RizkaFitiraniHadi.</a></p>
        	</div>
        </div>
        <!-- //Footer -->
        
        <!-- cart-js -->
        <script src="../static/src/js/minicart.js"></script>
        <script>
           w3ls1.render();
        
           w3ls1.cart.on('w3sb1_checkout', function (evt) {
           	var items, len, i;
        
           	if (this.subtotal() > 0) {
           		items = this.items();
        
           		for (i = 0, len = items.length; i < len; i++) {
           			items[i].set('shipping', 0);
           			items[i].set('shipping2', 0);
           		}
           	}
           });
        </script>  
        <!-- //cart-js -->
	</body>
</html>