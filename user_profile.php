<?php 
ob_start();
session_start();
include_once 'app/db.php';
$menu=mysqli_query($con,"select * from categories");

if($_SESSION['tb']=='1')
{
	$usr=mysqli_query($con,"select * from users where id=".$_SESSION['id']);
	
	$data=mysqli_fetch_array($usr);
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ConsumerGear</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 <style>
 .btn-xl {
    
    font-size: 15px;
   
    width:18%;
}
 .dropdown-menu > li
 {
	  border:1px solid white !important;
 }
 .c > li
 {
	 color: white !important;
	 padding: 8px !important;
	 font-weight: bold;
	 
 }

 
 .c1 > li > a
 {
	 color: white !important;
	 
	 font-weight: bold;
 }
  .con
  {
   background: #525659; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#525659, black); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#525659, black); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#525659, black); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#525659, black); /* Standard syntax */
  }
  .menu
  {
	  background-color:  rgb(82, 86, 89); !important;
	  color: white !important;
	  
      font-size: 14px !important;
	  
  }
  .menu > li  > a
  {
	  text-decoraion: none;
	  	  color: white !important;
		  font-weight: bold;
		  text-transform: uppercase;
		font-size: 14px !important;
		 padding-top: 8px !important;
	 padding-bottom: 8px !important;
	 
  }
  .menu > li 
  {
	 
	  	  border:1px solid white !important;
		  
	  
  }
 #grad {
    background: #525659; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#525659, black); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#525659, black); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#525659, black); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#525659, black); /* Standard syntax */
	margin: -0.5px -15px;
}
#grad li :hover
{
background-color: black !important;
color: white !important;	
}
.bg
{
 background-image:url('images/d.jpg');

	
}
.dropdown-menu > li > a:hover
 {
	 background-color: white !important; 
	 color : black !important;
	 
 }
 .dropdown:hover .dropdown-menu
 {
    display: block;
	
 }
 .dropdown-menu > li > a
 {
	  
	  color: white !important;
      font-weight: bold; 
    padding-top: 8px !important;
	 padding-bottom: 8px !important;
 }
 .dropdown-menu
 {
	 
	  background: #525659; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#525659, black); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#525659, black); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#525659, black); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#525659, black); /* Standard syntax */
	
 }

 .nav .open > a, .nav .open > a:focus, .nav .open > a:hover
 {
	  background-color: black !important;
	  color: white !important;
 }
 .menu .open > a, .menu .open > a:focus, .menu .open > a:hover
 {
	  background-color: black !important;
	  color: white !important;
 }
 
 .dropdown-menu > li > a:focus
 {
	 background-color: black !important;
	  color: white !important;
 }
 img.wide {
  
    max-width: 100%;
    max-height: 100%;
    height: auto;
}
 .bt > li > a
 {
	 color: white !important;
font-weight: bold;	 
 }
 .list-group-item
 {
	 background-color: black !important;
	  color: white !important;
 }
 ul > li:last-child ul{
    right: 4px !important;
    left: auto !important;
}

 .con
  {
   background: #525659; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#525659, black); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#525659, black); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#525659, black); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#525659, black); /* Standard syntax */
  }



  .starcs
  {
  font-size:200%;
  cursor:pointer;
  color: grey;
  }
  .mark
  {
  color:rgb(206, 12, 93);
  }

  </style>
  <script>
$(document).ready(function()
		{
	$('.full').css('background-image','url("app/<?php echo $result['image_path'];?>")');
		});

  </script>
   <script>
$(document).ready(function(){
$('.starcs').removeClass('mark');
	$('.starcs').hover(function(){

		
		var c=$('.starcs');
		var d=$(this).attr('d');

		
		
		for(i=d;i<=c.length;i++)
		{
			$('#'+i).removeClass('mark');
		}

		
		
		for(i=1;i<=d;i++)
		{
			
		    $('#'+i).addClass('mark');
		}

		$('#rate').val($('.mark').length);
		});	
 
   $('#c').click(function(){
	   $('.starcs').removeClass('mark');
	   	   $('#review').val('');
	   
   });
   
   $('#re').click(function(e)
   {
	  
	   
	   $.ajax({
		  type:'post',
          url:"save_review.php",		  
		  data:$('#review').serialize(),
		  success:function(data)
		     {
			   if(data==1)
			    {
				  alert('Thanks for your Review');
				 // window.location.href="product.php?id="+$('#parent').val()+"&id1="+$('#id').val()+"&m="+$('#name').val();
				  window.location.href="home.php";
				  
			    }
		     }
	   });
	   
	   
	   
   });
   
	
});


  </script>
</head>

<body  >
<input type='hidden' id='parent' value='<?php echo $_GET['id'];?>'>
 <nav class="navbar navbar-inverse " style="background-color: rgb(0,0,0) !important">
  <div class="container-fluid">
  
    <div class="navbar-header ">
      <img src='images/logo.PNG' style="float:left;margin-left:-19px !important;">
    </div>
   	<div class="col-md-9">	
	<div class="row pull-right">
	<ul class="list-inline c" >
  <li>Brands</li>
  <li>Retailers</li>
  <li>User Profiles</li>
  <li>News Feeds</li>
  <li>Coupons</li>
  <li>Buying Guides</li>
  <li>Discussion Boards</li>
</ul>
	</div>
<div class="clear-fix"></div>
<br><br><br>
	<div class="row">
	<div class="col-md-9">
    <form name="search" action="search_results.php" method="post">
     
        
		<div class="input-group " >
         <input type="text" class="form-control pull-left" style='width: 100%;height: 50px;' name="keyword" placeholder="Enter keyword or Item #" />
         <span class="input-group-btn">
         <button class="btn btn-inverse" type="button" style="height: 50px;">
          <i class="fa fa-microphone fa-2x " ></i>
         </button>
		 <button class="btn btn-inverse" type="submit" style="background-color: black !important;color:white;height: 50px;border: 1px solid white;">
         <i class="fa fa-search fa-2x  "></i> 
         </button>
         </span>
         </div>
     
      
    </form>
	</div>
	<div class="col-md-3">
	<ul class = "nav navbar-nav navbar-right" >
 <li class = "dropdown" >
            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown" style='font-weight:bold;color:white !important;'>
              &nbsp; Hello.<?php echo $_SESSION['username'];?>
			  <p>Create Account
               <i class="fa fa-angle-down "></i></p>
            </a>
            
            <ul class = "dropdown-menu user">
               <li  class="list-group-item"><a href = "#"><i class="fa fa-address-card-o"></i> Profile</a></li>
               <li  class="list-group-item"><a href = "logout.php"><i class="fa fa-sign-out"></i> Signout</a></li>
               
            </ul>
            
         </li>
			
      </ul>
	</div>
	</div>
	</div>
	
	
  </div>
</nav>

 <div class="col-md-12 con" style='margin-top:-17px'>
 
  <ul class="nav navbar-nav menu" id="grad">
    <li ><a  href="home.php"><i class="fa fa-home"></i> Home</a>
	<?php
    $main='';
$i=1;	
    while($row=mysqli_fetch_array($menu))
    {
		if($i<=7)
		{
    	$main.='<li class="dropdown"><a  href="search_results.php?cat='.$row['id'].'">'.ucfirst($row['name']).'</a>';
    	
    	$sub=mysqli_query($con,"select * from sub_categories where parent=".$row['id']);
    	if(mysqli_num_rows($sub) > 0)
    	{
    	  $sub_menu='<ul class="dropdown-menu">';
    	   while($r1=mysqli_fetch_array($sub))
    	   {
    	   	$sub_menu.='<li ><a href="sub_results.php?id='.$r1['id'].'&parent='.$row['id'].'">'.ucfirst($r1['name']).'</li>';
    	  
    	   
    	   }
    	   $sub_menu.='</ul>';
    	   $main.=$sub_menu;
    	}
    	
    	$main.='</li>';
		}
		else
		{
		if($i==8)
		{
			$main.='<li class="dropdown " style="padding:0px 36px 0px 36px !important"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> More </a>';
			$sub_menu='<ul class="dropdown-menu dropdown-menu-left">';
		}
		
		
		
		$sub_menu.='<li  ><a href="#" cat="'.$row['id'].'">'.ucfirst($row['name']).'</a></li>';
		
		}
    	$i++;
    	
    	
    }
	$sub_menu.='</ul>';
    	   $main.=$sub_menu;
		   $main.='</li>';
    echo $main;
    
    
    ?>
     
  </ul>
  </nav>
  </div>
 




<div class="col-md-12">


</div>


