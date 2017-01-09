<?php
session_start();
include_once 'db.php';

?><!DOCTYPE html>
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

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

       

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body style="background-color: rgb(43,61,81) !important">

        
        <div class="clearfix"></div>
        <div class="wrapper-page">

        	<div class="account-bg">
                <div class="card-box m-b-0" style="border-color: rgb(43,61,81) !important">
                    <div class="text-xs-center m-t-20">
                        <a href="index.html" class="logo">
                            <i class="zmdi zmdi-group-work icon-c-logo"></i>
                            <span>Consumer Gear</span>
                        </a>
                    </div>
                    <div class="m-t-30 m-b-20">
                        <div class="col-xs-12 text-xs-center">
                          
							<?php if($_SESSION['fail']==1 && isset($_SESSION['fail'])) {?> 	
 <h6 class="text-muted text-uppercase m-b-0 m-t-0" style="color: red !important;font-weight: bold">							
 <i class="ace-icon fa fa-times red"></i>	Invalid Username or Password</h6>
 <?php } else {?>
                         <h6 class="text-muted text-uppercase m-b-0 m-t-0"                      
										 <i class="ace-icon  green"></i>
												Sign In
												</h6>
												<?php }?>
                        </div>
                        <form class="form-horizontal m-t-20" action="login_process.php" method="POST">

                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" required="" name='username' placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" name='password' required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-xs-12">
                                    <div class="checkbox checkbox-custom">
                                        <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup">
                                            Remember me
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group text-center m-t-30">
                                <div class="col-xs-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-30 m-b-0">
                                <div class="col-sm-12">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                </div>
                            </div>

                            

                        </form>

                    </div>
                </div>
            </div>
            <!-- end card-box-->

           
        </div>
        <!-- end wrapper page -->


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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>