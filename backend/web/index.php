<?php 
    $user = "root";
    $pass = "";
    $db = "fashion_club";
    $host = "localhost";
    
    include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/backend/models/koneksi.php");
    
    $connected = connect_to_db($host, $user, $pass, $db);
    
    if(isset($_POST['submit-save'])){
        include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/backend/models/process.php");
        $mode = $_POST['mode'];
        $model = $_POST['model'];
//         echo $mode;
        if ($mode == 'new'){
//             echo "CREATE";
            create($model, $connected);
        }else if($mode == 'edit'){
//             echo "WRITE";
            $id = $_POST['id'];
            write($id, $model, $connected);
        }
        
    }
    if(isset($_POST['submit-delete'])){
        include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/backend/models/process.php");
        $model = $_POST['model'];
        for($i = 0; $i < count($_POST['table_records']); $i++){
            $id = $_POST['table_records'][$i];
            delete($id, $model, $connected);
        }      
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Products | Fashion Club </title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build//css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <!-- 
            	<div class="navbar nav_title" style="border: 0;">
              		<a href="index.html" class="site_title"><i class="fa fa-diamond"></i> <span>Fashion Club</span></a>
            	</div>
			-->

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Administrator</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bar-chart-o"></i> Sales <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?view_type=tree_view&model=product_template">Products</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cog"></i> Configuration <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Products<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                           	<li><a href="index.php?view_type=tree_view&model=product_category">Product Categories</a></li>
                            <li><a href="index.php?view_type=tree_view&model=product_uom">Unit of Measure Categories</a></li>
                          </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/user.png" alt="">Administrator
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Preferences</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php
                /* Import Product Template Tree View & Product Template Form View */
                include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/backend/views/product_template_tree_view.php");
                include($_SERVER['DOCUMENT_ROOT'] . "/fashion-club/backend/views/product_template_form_view.php");
            ?>
            </div>
      	</div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powered by <a href="https://github.com/adhamhayukalbu/learn-and-share"> Adham Hayukalbu</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
  	</div>


    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../vendors/Flot/jquery.flot.js"></script>
    <script src="../../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="../../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build//js/custom.min.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){
    	    $("#product-template-form-view[mode='read']").hide();
    	    $("#product-template-form-view[mode='create-edit']").hide();
    	});
	</script>
    	
    <?php
      if(isset($_GET['view_type'], $_GET['model'])){
          if($_GET['view_type'] == 'form-view' && $_GET['model'] == 'product_template'){
              if($_GET['mode'] == 'read'){
    ?>
    	<script type="text/javascript">
        	$(document).ready(function(){
        	    $("#product-template-form-view[mode='read']").show();
        	    $("#product-template-form-view[mode='create-edit']").hide();        	    
        	    $("#product-template-tree-view").hide();
        	});
    	</script>
    <?php 
              }else{
    ?>
             	<script type="text/javascript">
                	$(document).ready(function(){
                	    $("#product-template-form-view[mode='create-edit']").show();
                	    $("#product-template-form-view[mode='read']").hide();
                	    $("#product-template-tree-view").hide();
                	});
            	</script>
    <?php             
              }
          }elseif($_GET['view_type'] == 'tree-view'){
    ?>
    	<script type="text/javascript">
        	$(document).ready(function(){
        	    $("#product-template-tree-view").show();
        	    $("#product-template-form-view[mode='read']").hide();
        	    $("#product-template-form-view[mode='create-edit']").hide();
        	});
    	</script>
    <?php
          }
      }
    ?>
    
	<script type="text/javascript">
    	$(document).ready(function(){
    	    $("#save").click(function(){        
        	    $("#product-form-button-submit").click();
    	    });
    	    $("#delete_multi").click(function(){        
        	    $("#product-tree-button-submit").click();
    	    });
    	});
	</script>
  </body>
</html>