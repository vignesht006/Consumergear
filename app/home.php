<?php
ob_start();
session_start();
include_once 'db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>CONSUMER GEAR</title>

        <!--Morris Chart CSS -->
		
		 <link href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
           <!-- DataTables -->
		   
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		

        <!-- Switchery css -->
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <link href="bootstrap-colorpicker.min.css" rel="stylesheet">
    
   
		
        <script src="assets/js/modernizr.min.js"></script>
<style>
.has_sub > a:hover
{
	color: white !important;
	background-color: rgb(43,61,81) !important;
}
</style>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <i class="zmdi zmdi-group-work icon-c-logo"></i>
                        <span>CONSUMERGEAR</span></a>
                </div>


                <nav class="navbar navbar-custom">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                        </li>
                        <li class="nav-item hidden-mobile">
                            <form role="search" class="app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav pull-right">
                

                        <li class="nav-item dropdown notification-list">
                            <a class="nav-link waves-effect waves-light right-bar-toggle" href="javascript:void(0);">
                                <i class="zmdi zmdi-format-subject noti-icon"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/avatar-1.jpg" alt="user" class="img-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Welcome ! <?php echo $_SESSION['username'];?></small> </h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-settings"></i> <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-lock-open"></i> <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="logout.php" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="home.php" class="waves-effect active"><span class="label label-pill label-primary pull-xs-right">1</span><i class="zmdi zmdi-view-dashboard"></i><span> Dashboard </span> </a>
                            </li>

                            <li class="has_sub">
                                <a  class="waves-effect"><i class="fa fa-cubes"></i> <span> Products</span> <span class="menu-arrow"></span></a>
								
								 <ul class="list-unstyled ">
                                    <li class="waves-effect"><a href="#" id='newproduct' class="waves-effect"><i class="fa fa-cube"></i> New Product</a></li>
                                    <li class="waves-effect"><a href="#" id='product' class="waves-effect"><i class="fa fa-list"></i> Product list</a></li>
                                </ul>
								
								</li>
                               

                            <li class="has_sub">
                                <a href="javascript:void(0);" id='menu' class="waves-effect"><i class="ion-navicon-round"></i> <span> Categories</span> </a>
                                             </li>
											  <li class="has_sub">
                                <a  class="waves-effect"><i class="fa fa-list"></i> <span> Sort Order</span> <span class="menu-arrow"></span></a>
								
								 <ul class="list-unstyled ">
                                    <li class="waves-effect"><a href="#" id='cat_order' class="waves-effect"><i class="fa fa-th"></i> Categories</a></li>
                                    <li class="waves-effect"><a href="#" id='sub_order' class="waves-effect"><i class="fa fa-list-ol"></i> Sub Categories</a></li>
                                </ul>
								
								</li>
											  <li class="has_sub">
                                <a href="javascript:void(0);" id='brand' class="waves-effect"><i class="fa fa-shield"></i> <span> Brand</span> </a>
                                             </li>
                                <li class="has_sub">
                                <a href="javascript:void(0);" id='retail' class="waves-effect"><i class="fa fa-bank"></i> <span>Retailers</span> </a>
                                             </li>
								<li class="has_sub">
                                <a  class="waves-effect"><i class="fa fa-filter"></i> <span> Filter</span> <span class="menu-arrow"></span></a>
								
								 <ul class="list-unstyled ">
                                    <li class="waves-effect"><a href="#" id='add_filter' class="waves-effect"><i class="fa fa-plus"></i> Add Filter</a></li>
                                    <li class="waves-effect"><a href="#" id='view_filter' class="waves-effect"><i class="fa fa-eye"></i> View Filter</a></li>
                                </ul>
								
								</li>
											 
                            <li class="has_sub">
                                <a href="javascript:void(0);" id='images' class="waves-effect"><i class="ion-image"></i><span> Gallery </span> </a>
                            </li>
                          <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="zmdi zmdi-calendar"></i><span> Calendar </span> </a>
                            </li>

                            
                           

                           

                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page" style="overflow-y: scroll;">
                <!-- Start content -->
                <div class="content" >
                    <div class="container">

                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Dashboard  </h4>
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="#">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       

                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-layers pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">Orders</h6>
                                    <h2 class="m-b-20" data-plugin="counterup">1,587</h2>
                                    <span class="label label-success"> +11% </span> <span class="text-muted">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-paypal pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">Revenue</h6>
                                    <h2 class="m-b-20">$<span data-plugin="counterup">46,782</span></h2>
                                    <span class="label label-danger"> -29% </span> <span class="text-muted">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-chart pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">Average Price</h6>
                                    <h2 class="m-b-20">$<span data-plugin="counterup">15.9</span></h2>
                                    <span class="label label-pink"> 0% </span> <span class="text-muted">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-rocket pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">Product Sold</h6>
                                    <h2 class="m-b-20" data-plugin="counterup">1,890</h2>
                                    <span class="label label-warning"> +89% </span> <span class="text-muted">Last year</span>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                       
                           



   


                    </div> <!-- container -->

                </div> <!-- content -->



            </div>
            <!-- End content-page -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <div class="nicescroll">
                    <ul class="nav nav-tabs text-xs-center">
                        <li class="nav-item">
                            <a href="#home-2"  class="nav-link active" data-toggle="tab" aria-expanded="false">
                                Activity
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages-2" class="nav-link" data-toggle="tab" aria-expanded="true">
                                Settings
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home-2">
                            <div class="timeline-2">
                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">5 minutes ago</small>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">30 minutes ago</small>
                                        <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">59 minutes ago</small>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">1 hour ago</small>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">3 hours ago</small>
                                        <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">5 hours ago</small>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="messages-2">

                            <div class="row m-t-20">
                                <div class="col-xs-8">
                                    <h5 class="m-0">Notifications</h5>
                                    <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-xs-8">
                                    <h5 class="m-0">API Access</h5>
                                    <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-xs-8">
                                    <h5 class="m-0">Auto Updates</h5>
                                    <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-xs-8">
                                    <h5 class="m-0">Online Status</h5>
                                    <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end nicescroll -->
            </div>
            <!-- /Right-bar -->

            <footer class="footer text-right">
                2016 © Consumer Gear            </footer>


        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>



        <!-- Counter Up  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
		
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> 
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
 <script src="bootstrap-colorpicker.js"></script>
        <!-- Page specific js -->
        <script src="assets/pages/jquery.dashboard.js"></script>
		
<script>
$(document).ready(function()
{
	$('.waves-effect').click(function()
	{
		$('.waves-effect').removeClass('active');
		$(this).addClass('active');
		
	});
	
	$('#view_filter').click(function()
	{
		$('.content').empty();
		$('.content').load('filters.php');
		
	});
	
	$('#add_filter').click(function()
	{
		$('.content').empty();
		$('.content').load('new_filter.php');
		
	});
	$('#product').click(function()
	{
		$('.content').empty();
		$('.content').load('product_list.php');
		
	});
	$('#menu').click(function()
	{
		$('.content').empty();
		$('.content').load('menus.php');
		
	});
	$('#newproduct').click(function()
	{
		$('.content').empty();
		$('.content').load('newproduct.php');
		
	});
	$('#images').click(function()
			{
				$('.content').empty();
				$('.content').load('image_gallery.php');
				
			});
			
			
	$('#brand').click(function()
	{
		$('.content').empty();
		$('.content').load('brands.php');
		
	});
	
	$('#retail').click(function()
	{
		$('.content').empty();
		$('.content').load('retail.php');
		
	});
});
</script>
<script>
									$(document).ready(function()
									{
										$(document).delegate('#save_cat','click',function ()
										{
											var c='';
											if($('#active_cat').prop('checked'))
											{
												c=1;
											}
											else
												c=0;
											
											if($('#title_cat').val()=='')
											{
												$('#title_cat').css('border','1px solid red');
												return false;
											}
											else
											{
												$.ajax({
													url:'save_category.php',
													type:'post',
													data:{'name':$('#title_cat').val(),'active':c,'cat':0},
													success:function(data)
													{
														alert(data);
														$('.close').click();
				                                        $('.modal-backdrop').remove();
														$('.content').empty();
		                                                $('.content').load('menus.php');
													}
													
												});
												
											}
											
										});
										
										
										
										
										//sub cat
										$(document).delegate('#save_sub','click',function ()
										{
											var c='';
											if($('#active_cat').prop('checked'))
											{
												c=1;
											}
											else
												c=0;
											if($('#main_cat').val()=='')
											{
												$('#main_cat').css('border','1px solid red');
												return false;
											}
											
											if($('#title_sub').val()=='')
											{
												$('#title_sub').css('border','1px solid red');
												return false;
											}
											else
											{
												$.ajax({
													url:'save_category.php',
													type:'post',
													data:{'name':$('#title_sub').val(),'active':c,'main':$('#main_cat').val(),'cat':1},
													success:function(data)
													{
														alert(data);
														$('.close').click();
				                                         $('.modal-backdrop').remove();
														$('.content').empty();
		                                                $('.content').load('menus.php');
													}
													
												});
												
											}
											
										});
										
										$(document).delegate('.data','change',function()
										{
											if($(this).val() !='')
											{
												$(this).css('border','1px solid grey');
											}
										});
										
										$(document).delegate('#title_cat','keyup',function(){
		
		                           if($(this).val() !='')
		                                 {
			
			                               $.ajax({
				
				                           url:'check_category.php',
				                           type:'post',
				                           data:{'func':'category','name':$(this).val()},
				                           success:function(data)
				                             {
					                           if(data=='1')
					                           {
					
                                                 $('#um').text("Given Expense type is already exists. Please use another name");
                                                  $('#um').css('display','block');					  
					                           }
					                      else
						                     $('#um').css('display','none');
				                            }
				
			                            });
		                             }
									 
	                                  });
									  
									  
									  $(document).delegate('#title_sub','keyup',function(){
		
		                           if($(this).val() !='')
		                                 {
			
			                               $.ajax({
				
				                           url:'check_category.php',
				                           type:'post',
				                           data:{'func':'sub_category','name':$(this).val()},
				                           success:function(data)
				                             {
					                           if(data=='1')
					                           {
					
                                                 $('#sum').text("Given Sub-Category is already exists. Please use another name");
                                                  $('#sum').css('display','block');					  
					                           }
					                      else
						                     $('#sum').css('display','none');
				                            }
				
			                            });
		                             }
									 
	                                  });
										
									$(document).delegate('.remove_product','click' , function()
			{
				var temp=$(this).attr('id');
				var d=temp.split("_");
				if(confirm("Do you want to delete this product permanently?"))
				{
					$.ajax({
						url:'remove_product.php',
						type:'post',
						data:{'id':d[d.length-1]},
						
						success:function(data)
						{
							if(data==1)
							{
								alert("Product Deleted Successfully");
							$('.content').empty();
                            $('.content').load('product_list.php');
							}
						}
					});
				}
				else
				{
					return false;
				}			
			});
			$(document).delegate('.view_product','click', function()
			{
				var temp=$(this).attr('id');
				var d=temp.split("_");
				$('.content').empty();
				$('.content').load("product.php?id="+d[d.length-1]);
			});	
			
			$(document).delegate('#new_product','click', function()
			{
				
				$('.content').empty();
				$('.content').load("newproduct.php");
			});	

$(document).delegate('#list_product','click',function()
{
	
	$('.content').empty();
	$('.content').load('product_list.php');
});			

$(document).delegate('#cancel','click',function ()
{
	$('.content').empty();
				$('.content').load("product_list.php");
});		
									
									
				
$(document).delegate('.viewsub','click', function()
			{
				var temp=$(this).attr('id');
				var d=temp.split("_");
				$('.content').empty();
				$('.content').load("sub-menus.php?id="+d[d.length-1]);
			});		

$(document).delegate('#show-file','click', function()
		{
	        $('#show-file').hide();
			$('.hf').show();
			$('#url').attr('disabled',false);
		});		

$(document).delegate('#show-file_logo','click', function()
		{
	        $('#show-file_logo').hide();
			$('.hf_logo').show();
			$('#url_logo').attr('disabled',false);
		});		

$(document).delegate('#can-fil_logo','click', function()
		{
	        $('#show-file_logo').show();
			$('.hf_logo').hide();
			$('#url_logo').attr('disabled',true);
		});	
		
$(document).delegate('.remove_sub','click' , function()
		{
			var temp=$(this).attr('id');
			var parent=$(this).attr('parent');
			var d=temp.split("_");
			if(confirm("Do you want to delete this sub-category permanently?"))
			{
				$.ajax({
					url:'remove_menu.php',
					type:'post',
					data:{'id':d[d.length-1],'cat':'1'},
					
					success:function(data)
					{
						if(data==1)
						{
							alert("Sub Category Deleted Successfully");
						$('.content').empty();
                        $('.content').load('sub-menus.php?id='+parent);
						}
					}
				});
			}
			else
			{
				return false;
			}			
		});


$(document).delegate('.remove_cat','click' , function()
		{
			var temp=$(this).attr('id');
			var parent=$(this).attr('parent');
			var d=temp.split("_");
			if(confirm("It will delete all the sub-categories under this category . Is that Ok?"))
			{
				$.ajax({
					url:'remove_menu.php',
					type:'post',
					data:{'id':d[d.length-1],'cat':'0'},
					
					success:function(data)
					{
						if(data==1)
						{
							alert("Category Deleted Successfully");
						$('.content').empty();
                        $('.content').load('menus.php');
						}
					}
				});
			}
			else
			{
				return false;
			}			
		});

$(document).delegate('#save-fil','click',function(){
	 var formData=new FormData();
		formData.append('image',$('input[type=file]')[0].files[0]);
		formData.append('save','1');
		formData.append('url',$('#url').val());
	$.ajax({
		url:'save_background.php',
		type:'post',
		data: formData,
		contentType:false,
		cache:false,
		processData:false,
		success:function(data)
		{
			if(data==1)
			{
				alert("Image Saved Successfully");
			$('.content').empty();
            $('.content').load('image_gallery.php');
			}
			
			
			
		}
	});
});

$(document).delegate('#save_logo','click',function(){
	 var formData=new FormData();
		formData.append('image',$('input[type=file]')[1].files[0]);
		formData.append('save','1');
		formData.append('url',$('#url_logo').val());
	$.ajax({
		url:'save_logo.php',
		type:'post',
		data: formData,
		contentType:false,
		cache:false,
		processData:false,
		success:function(data)
		{
			if(data==1)
			{
				alert("Logo Saved Successfully");
			$('.content').empty();
           $('.content').load('image_gallery.php');
			}
			
			
			
		}
	});
});
	
	$(document).delegate('#update_cat1','click',function ()
										{
											var c='';
											id=$('#hcat_id').val();
											if($('#active_cat_update').prop('checked'))
											{
												c=1;
											}
											else
												c=0;
											
											if($('#title_cat_update').val()=='')
											{
												$('#title_cat_update').css('border','1px solid red');
												return false;
											}
											else
											{
												$.ajax({
													url:'update_category.php',
													type:'post',
													data:{'name':$('#title_cat_update').val(),'active':c,'cat':0,'id':id},
													success:function(data)
													{
														alert(data);
														$('.close').click();
				                                        $('.modal-backdrop').remove();
														$('.content').empty();
		                                                $('.content').load('menus.php');
													}
													
												});
												
											}
											
										});
	
	$(document).delegate('.edit_cat','click',function()
	 {
		var add_x=$(this).attr('id');
		
		var temp=add_x.split("_");
		$.ajax({
			
			url:'edit_category.php',
						type:'post',
						data:{'id':temp[temp.length-1],'type':'0'},
						async:false,
						
						success:function(data)
						{
							var obj=$.parseJSON(data);
							
				           $('#title_cat_update').val(obj.name);
						   if(obj.status==1)
						   {
							   $('#active_cat_update').attr('checked',true);
						   }
						   $('#hcat_id').val(obj.id);
				           $('#update_cat').modal('show');
							
						}
		});
			
		 
	 });
	 
	 
	 
	 $(document).delegate('#update_sub1','click',function ()
										{
											var c='';
											parent=$('#parent').val();
											id=$('#hsub_id').val();
											if($('#active_sub_update').prop('checked'))
											{
												c=1;
											}
											else
												c=0;
											
											if($('#title_sub_update').val()=='')
											{
												$('#title_sub_update').css('border','1px solid red');
												return false;
											}
											else
											{
												$.ajax({
													url:'update_category.php',
													type:'post',
													data:{'name':$('#title_sub_update').val(),'active':c,'cat':1,'id':id},
													success:function(data)
													{
														alert(data);
														$('.close').click();
				                                        $('.modal-backdrop').remove();
														$('.content').empty();
		                                                $('.content').load('sub-menus.php?id='+parent);
													}
													
												});
												
											}
											
										});
	
	$(document).delegate('.edit_sub','click',function()
	 {
		var add_x=$(this).attr('id');
		
		var temp=add_x.split("_");
		$.ajax({
			
			url:'edit_category.php',
						type:'post',
						data:{'id':temp[temp.length-1],'type':'1'},
						async:false,
						
						success:function(data)
						{
							var obj=$.parseJSON(data);
							
				           $('#title_sub_update').val(obj.name);
						   if(obj.status==1)
						   {
							   $('#active_sub_update').attr('checked',true);
						   }
						   $('#hsub_id').val(obj.id);
				           $('#update_sub').modal('show');
							
						}
		});
			
		 
	 });

	 $(document).delegate('.btn-add','click',function(e)
		      {
		          e.preventDefault();

		          var controlForm = $('.controls').find('.f:first'),
		              currentEntry = $(this).parents('.entry:first'),
		              newEntry = $(currentEntry.clone()).appendTo(controlForm);

		          newEntry.find('input').val('');
		          controlForm.find('.entry:not(:last) .btn-add')
		              .removeClass('btn-add').addClass('btn-remove')
		              .removeClass('btn-success').addClass('btn-danger')
		              .html('<span class="fa fa-minus"></span>');
		      });
			$(document).delegate('.btn-remove','click',  function(e)
		      {
		  		$(this).parents('.entry:first').remove();

		  		e.preventDefault();
		  		return false;
		  	});



			//sub cat
			$(document).delegate('#save_child','click',function ()
			{
				parent=$('#parent').val();
				var c='';
				if($('#active_child').prop('checked'))
				{
					c=1;
				}
				else
					c=0;
				if($('#main_sub').val()=='')
				{
					$('#main_sub').css('border','1px solid red');
					return false;
				}
				
				if($('#title_child').val()=='')
				{
					$('#title_child').css('border','1px solid red');
					return false;
				}
				else
				{
					$.ajax({
						url:'save_category.php',
						type:'post',
						data:{'name':$('#title_child').val(),'active':c,'prev':$('#main_sub').val(),'cat':2},
						success:function(data)
						{
							alert(data);
							$('.close').click();
                             $('.modal-backdrop').remove();
							$('.content').empty();
                            $('.content').load('child.php?id='+parent);
						}
						
					});
					
				}
				
			});


			$(document).delegate('.viewchild','click', function()
					{
						var temp=$(this).attr('id');
						var d=temp.split("_");
						$('.content').empty();
						$('.content').load("child.php?id="+d[d.length-1]);
					});

			$(document).delegate('.edit_child','click',function()
					 {
						var add_x=$(this).attr('id');
						
						var temp=add_x.split("_");
						$.ajax({
							
							url:'edit_category.php',
										type:'post',
										data:{'id':temp[temp.length-1],'type':'1'},
										async:false,
										
										success:function(data)
										{
											var obj=$.parseJSON(data);
											
								           $('#title_child_update').val(obj.name);
										   if(obj.status==1)
										   {
											   $('#active_child_update').attr('checked',true);
										   }
										   $('#hchild_id').val(obj.id);
								           $('#update_child').modal('show');
											
										}
						});
							
						 
					 });
			
			
			$(document).delegate('#update_child1','click',function ()
					{
						var c='';
						parent=$('#parent').val();
						id=$('#hchild_id').val();
						if($('#active_child_update').prop('checked'))
						{
							c=1;
						}
						else
							c=0;
						
						if($('#title_child_update').val()=='')
						{
							$('#title_child_update').css('border','1px solid red');
							return false;
						}
						else
						{
							$.ajax({
								url:'update_category.php',
								type:'post',
								data:{'name':$('#title_child_update').val(),'active':c,'cat':2,'id':id},
								success:function(data)
								{
									alert(data);
									$('.close').click();
                                    $('.modal-backdrop').remove();
									$('.content').empty();
                                    $('.content').load('child.php?id='+parent);
								}
								
							});
							
						}
						
					});
					
					
					
					
		$(document).delegate('#save_child1','click',function ()
			{
				parent=$('#parent').val();
				var c='';
				if($('#active_child').prop('checked'))
				{
					c=1;
				}
				else
					c=0;
				if($('#main_sub').val()=='')
				{
					$('#main_sub').css('border','1px solid red');
					return false;
				}
				
				if($('#title_child').val()=='')
				{
					$('#title_child').css('border','1px solid red');
					return false;
				}
				else
				{
					$.ajax({
						url:'save_category.php',
						type:'post',
						data:{'name':$('#title_child').val(),'active':c,'prev':$('#main_sub').val(),'cat':2},
						success:function(data)
						{
							alert(data);
							$('.close').click();
                             $('.modal-backdrop').remove();
							$('.content').empty();
                            $('.content').load('sub-menus.php?id='+parent);
						}
						
					});
					
				}
				
			});
			
			
			
			$(document).delegate('.remove_child','click' , function()
		{
			var temp=$(this).attr('id');
			var parent=$(this).attr('parent');
			var d=temp.split("_");
			if(confirm("Do you want to delete this child-category permanently?"))
			{
				$.ajax({
					url:'remove_menu.php',
					type:'post',
					data:{'id':d[d.length-1],'cat':'1'},
					
					success:function(data)
					{
						if(data==1)
						{
							alert("Child Category Deleted Successfully");
						$('.content').empty();
                        $('.content').load('child.php?id='+parent);
						}
					}
				});
			}
			else
			{
				return false;
			}			
		});
		
		$(document).delegate('.remove_brand','click' , function()
		{
			var temp=$(this).attr('id');
			
			var d=temp.split("_");
			if(confirm("Do you want to delete this brand permanently?"))
			{
				$.ajax({
					url:'remove_brand.php',
					type:'post',
					data:{'id':d[d.length-1]},
					
					success:function(data)
					{
						if(data==1)
						{
							alert("Brand Deleted Successfully");
						$('.content').empty();
                        $('.content').load('brands.php');
						}
					}
				});
			}
			else
			{
				return false;
			}			
		});	
		
		
		$(document).delegate('.remove_retail','click' , function()
		{
			var temp=$(this).attr('id');
			
			var d=temp.split("_");
			if(confirm("Do you want to delete this Retailer permanently?"))
			{
				$.ajax({
					url:'remove_retailer.php',
					type:'post',
					data:{'id':d[d.length-1]},
					
					success:function(data)
					{
						if(data==1)
						{
							alert("Retailer Deleted Successfully");
						$('.content').empty();
                        $('.content').load('retail.php');
						}
					}
				});
			}
			else
			{
				return false;
			}			
		});	
		
		
		$(document).delegate('#brand_name','change',function()
{
if($(this).val()!=''){	
var op=$(this)[0].selectedOptions;
var path=op[0].getAttribute('path');
$('#brand_path').val(path);
}	
});


$(document).delegate('#retailer_name','change',function()
{
if($(this).val()!=''){	
var op=$(this)[0].selectedOptions;
var path=op[0].getAttribute('path');
$('#retailer_path').val(path);
}

});




	$(document).delegate('.copy_sub','click',function()
	 {
		var add_x=$(this).attr('id');
		
		var temp=add_x.split("_");
		$.ajax({
			
			url:'duplicate_category.php',
						type:'post',
						data:{'id':temp[temp.length-1]},
						async:false,
						
						success:function(data)
						{
							var obj=$.parseJSON(data);
							 $('#dup_sub').empty();
						   $('#dup_sub').append(obj.parent);
						   $('#hdup_id').val(obj.id);
				           $('#copy_modal').modal('show');
							
						}
		});
			
		 
	 });
	 
	 
	 $(document).delegate('#save_dup','click',function ()
					{
						parent=$('#parent').val();
						if($('#dup_sub').val()=='')
						{
							$('#dup_sub').css('border','1px solid red');
							return false;
						}
						else
						{
							$.ajax({
								url:'save_duplicate.php',
								type:'post',
								data:{'parent':$('#dup_sub').val(),'id':$('#hdup_id').val()},
								success:function(data)
								{
									alert(data);
									 $('.modal-backdrop').remove();
							$('.content').empty();
                            $('.content').load('sub-menus.php?id='+parent);
									
								}
								
							});
							
						}
						
					});
	 
	 
$(document).delegate('.ban_sub','click',function()
	 {
		var add_x=$(this).attr('id');
		
		var temp=add_x.split("_");
		
						   $('#ban_sub_id').val(temp[temp.length-1]);
						  
				           $('#modal_banner').modal('show');
	
			
		 
	 });
	 
	 $(document).delegate('.remove_filter','click' , function()
		{
			var temp=$(this).attr('id');
			
			var d=temp.split("_");
			if(confirm("Are you sure want to delete the Filter"))
			
			{
				$.ajax({
					url:'remove_filter.php',
					type:'post',
					data:{'id':d[d.length-1]},
					
					success:function(data)
					{
						if(data==1)
						{
							alert("Filter Deleted Successfully");
						$('.content').empty();
                        $('.content').load('filters.php');
						}
					}
				});
			}
			else
			{
				return false;
			}			
		});
	
	
	$(document).delegate('.edit_filter','click' , function()
		{
			var temp=$(this).attr('id');
			
			var d=temp.split("_");
         $('.content').empty();
                        $('.content').load('view_filter.php?id='+d[d.length-1]);
			
			
			
			
			
		}
		);

	$(document).delegate('#c_filter','click',function()
			{
				 $('.content').empty();
			            $('.content').load('filters.php');
			});

	//sub cat
	$(document).delegate('#save_sub_filter','click',function ()
	{
		
		var c='';
		if($('#active_sub_filter').prop('checked'))
		{
			c=1;
		}
		else
			c=0;
		if($('#main_filter').val()=='')
		{
			$('#main_filter').css('border','1px solid red');
			return false;
		}
		
		if($('#title_sub_filter').val()=='')
		{
			$('#title_sub_filter').css('border','1px solid red');
			return false;
		}

		if($('#title_value').val()=='')
		{
			$('#title_value').css('border','1px solid red');
			return false;
		}
		
		else
		{
			$.ajax({
				url:'save_sub_filter.php',
				type:'post',
				data:{'name':$('#title_sub_filter').val(),'status':c,'parent_filter':$('#main_filter').val(),'value':$('#title_value').val()},
				success:function(data)
				{
					alert(data);
					$('.close').click();
                     $('.modal-backdrop').remove();
					$('.content').empty();
                    $('.content').load('filters.php');
				}
				
			});
			
		}
		
	});

	

	$(document).delegate('.viewsub_filter','click', function()
			{
				var temp=$(this).attr('id');
				var d=temp.split("_");
				$('.content').empty();
				$('.content').load("view_subfilter.php?id="+d[d.length-1]);
			});
	
	$(document).delegate('.edit_subfilter','click',function()
			 {
				var add_x=$(this).attr('id');
				
				var temp=add_x.split("_");
				$.ajax({
					
					url:'edit_subfilter.php',
								type:'post',
								data:{'id':temp[temp.length-1]},
								async:false,
								
								success:function(data)
								{
									var obj=$.parseJSON(data);
									
						           $('#title_sub_filter').val(obj.name);
						           $('#title_value').val(obj.ans);
						           $('#main_filter').val(obj.parent);
								   if(obj.status==1)
								   {
									   $('#active_sub_filter').attr('checked',true);
								   }
								   $('#hsub_filter_id').val(obj.id);
						           $('#update_sub_filter').modal('show');
									
								}
				});
					
				 
			 });


	//sub cat
	$(document).delegate('#update_sub_filter_val','click',function ()
	{
		parent=$('#parent').val();
		var c='';
		if($('#active_sub_filter').prop('checked'))
		{
			c=1;
		}
		else
			c=0;
		if($('#main_filter').val()=='')
		{
			$('#main_filter').css('border','1px solid red');
			return false;
		}
		
		if($('#title_sub_filter').val()=='')
		{
			$('#title_sub_filter').css('border','1px solid red');
			return false;
		}

		if($('#title_value').val()=='')
		{
			$('#title_value').css('border','1px solid red');
			return false;
		}
		
		else
		{
			$.ajax({
				url:'update_subfilter.php',
				type:'post',
				data:{'id':$('#hsub_filter_id').val(),'name':$('#title_sub_filter').val(),'status':c,'parent_filter':$('#main_filter').val(),'value':$('#title_value').val()},
				success:function(data)
				{
					alert(data);
					$('.close').click();
                     $('.modal-backdrop').remove();
					$('.content').empty();
                    $('.content').load('view_subfilter.php?id='+parent);
				}
				
			});
			
		}
		
	});


	$(document).delegate('.remove_subfilter','click' , function()
			{
		parent=$('#parent').val();
				var temp=$(this).attr('id');
				
				var d=temp.split("_");
				if(confirm("Are you sure want to delete the Filter"))
				
				{
					$.ajax({
						url:'remove_subfilter.php',
						type:'post',
						data:{'id':d[d.length-1]},
						
						success:function(data)
						{
							if(data==1)
							{
								alert("Filter Deleted Successfully");
							$('.content').empty();
	                        $('.content').load('view_subfilter.php?id='+parent);
							}
						}
					});
				}
				else
				{
					return false;
				}			
			});
		
	
});
									</script>
    </body>
</html>