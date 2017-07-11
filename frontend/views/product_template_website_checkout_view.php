<div id="product-template-website-checkout-view" mode="read">
    <div class="products">	 
    	<div class="container">  
    		<div class="single-page">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-md-offset-1">
	                	<strong><h4>Your Address</h4></strong><hr/>
                    	<form action="index.php" method="POST">
                            <div class="form-group">
                            	<label for="email">Name:</label>
                            	<input required type="text" name="partner_name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                            	<label for="pwd">Phone:</label>
                            	<input required type="text" name="partner_phone" class="form-control" id="phone">
                            </div>
                            <div class="form-group">
                            	<label for="pwd">Email:</label>
                            	<input required type="text" name="partner_email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                            	<label for="pwd">Address:</label>
	                          	<textarea required placeholder="Your Address or Shipping Address Location" class="form-control" name="partner_address"></textarea>
                            </div>
                            <a href="#" class="btn btn-danger pull-left">Back</a>
                          	<button type="submit" name="submit-order" class="btn btn-success pull-right">Submit</button>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-3 col-md-offset-1">
	                	<strong><h4>Your Order</h4></strong><hr/>
                    	<div class="form-inline">
                            <div class="form-group">
                            	<label for="pwd">Taxes : </label> &nbsp; <span style="text-align:right;"><?php echo 'Rp. '.number_format($_SESSION["order"]['amount_tax'], 2).'';?></span>
                            </div>
                            <div class="form-group">
                            	<label for="email">Subtotal : </label> &nbsp;<span style="text-align:right;"><?php echo 'Rp. '.number_format($_SESSION["order"]['amount_untaxed'], 2).'';?></span>
                            </div><hr/>
                            <div class="form-group">
                            	<label for="pwd"><strong>Total : <?php echo 'Rp. '.number_format($_SESSION["order"]['amount_total'], 2).'';?></strong></label>
                            </div>
                        </div>
                    </div>
                </div>
    		</div>
    	</div>
    </div>
</div>