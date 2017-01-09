<?php 
ob_start();
session_start();
include_once 'app/db.php';

$img1=mysqli_query($con,"select * from backgrounds where id=2");

$bg1=mysqli_fetch_assoc($img1);
if($bg1['type']=='0')
	$img_bg1='app/'.$bg1['image_path'];
	else
		$img_bg1=$bg1['image_path'];
$menu=mysqli_query($con,"select * from categories");


$_SESSION['ul']='';
function get_child($id,$parent)
{
	global $con;


	$d=mysqli_query($con,"select * from sub_categories where prev=".$id);

	$_SESSION['ul'].='<ul class="dropdown-menu">';
	while($d1=mysqli_fetch_assoc($d))
	{
			
		$_SESSION['ul'].='<li class="dropdown-submenu"><a href="#" >'.ucfirst($d1['name']).'</a></li>';
	}
	//$_SESSION['ul'].='</ul>';
	//$_SESSION['ul'].='</li>';
	$_SESSION['ul'].='</ul>';

	return $_SESSION['ul'];

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
 
.dropdown-submenu  .dropdown-menu {
	
    top: 0;
    left: 100%;
    margin-top: -1px;
	display:none !important;
}

.dropdown-submenu:hover .dropdown-menu
 {
    display: block !important;
	
 }
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
  <script>

$(document).ready(function()
		{


	$('#keyword').keyup(function(e)
			{

              if($(this).val().length >0)
              {
                  $('.s').attr('disabled',false);
              }
              else
            	  $('.s').attr('disabled',true);
		
			});
		});

</script>
</head>

<body  >
<input type='hidden' id='parent' value='<?php echo $_GET['id'];?>'>
 <nav class="navbar navbar-inverse " style="background-color: rgb(0,0,0) !important">
  <div class="container-fluid">
  
    <div class="navbar-header ">
       <img src='<?php echo $img_bg1;?>' onclick="window.location.href='home.php'" style="float:left;margin-left:-19px !important;cursor:pointer" width="285px" height="135">
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
         <input type="text" class="form-control pull-left" style='width: 100%;height: 50px;' name="keyword" id='keyword' placeholder="Enter keyword or Item #" />
         <span class="input-group-btn">
         <button class="btn btn-inverse s" type="button" style="height: 50px;" disabled>
          <i class="fa fa-microphone fa-2x " ></i>
         </button>
		 <button class="btn btn-inverse s" type="submit" style="background-color: black !important;color:white;height: 50px;border: 1px solid white;" disabled>
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
 
 <ul class="nav navbar-nav menu" id="grad" style='width: 130%'>
    
	<?php
    $main='';
$i=1;	
    while($row=mysqli_fetch_array($menu))
    {
		if($i<=7)
		{
    	$main.='<li class="dropdown" style="width: 10%"><a  href="#" >'.$row['name'].'</a>';
    	
    	$sub=mysqli_query($con,"select * from sub_categories where parent=".$row['id']);
    	if(mysqli_num_rows($sub) > 0)
    	{
    	  $sub_menu='<ul class="dropdown-menu">';
    	   while($r1=mysqli_fetch_array($sub))
    	   {
			if($r1['haschild']!=0)
			{
			$_SESSION['ul']='';
                $sub_menu.='<li class="dropdown-submenu"> <a href="#" ">'.ucfirst($r1['name']).'</a>';
     			$rec=get_child($r1['id'],$row['id']);
				$sub_menu.=$rec;
				$sub_menu.='</li>';
				
			}
			else
    	   	$sub_menu.='<li ><a href="#" >'.ucfirst($r1['name']).'</a></li>';
    	  
    	   
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
			$main.='<li class="dropdown "  style="padding:0px 36px 0px 36px !important;width:10%"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> More </a>';
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
  
  </div>
  <br>
  <br>
<?php

$products=mysqli_query($con,"select p.name,p.price,pd.main_image_path  from product_detail p left join product_images pd on p.id=pd.product_id  where p.id=".$_GET['id1']);
$data=mysqli_fetch_assoc($products);
?>

<div class="col-md-12">
<div class="col-md-2">

<?php echo '<img src="app/'.$data["main_image_path"].'" class="img-responsive" height="80" width="100">';?>
</div>
<div class="col-md-10">
<h4 style="color:#03429b"><strong><?php echo $data['name'];?></strong></h4>



</div>
</div>



<div class="col-md-12">

<div class="col-md-10">
<form name='review' id='review' method='post'>


  
 
<h4 style="color:#03429b"><b>Select your Rating</b></h4>
 <span class="fa fa-cog fa-2x starcs " d='1' id='1'></span>
  <span class="fa fa-cog fa-2x starcs" d='2' id='2'></span>
   <span class="fa fa-cog fa-2x starcs" d='3' id='3'></span>
    <span class="fa fa-cog fa-2x starcs" d='4' id='4'></span>
     <span class="fa fa-cog fa-2x starcs" d='5' id='5'></span>
     
 <p></p>
  <div class="form-group">
  <label for='comment' style="color:#03429b;">Comments</label>
  <textarea class="form-control hresize" id="review" name='comment' row="6" placeholder="Type Your Comments Here" required style="height:150px"></textarea>
  
  
  </div>
  <div class="form-group">
  <input type='hidden' id='rate' name='rate' value='1'>
  <input type='hidden' id='id' name='id' value='<?php echo $_GET['id1'];?>'>
  <input type='hidden' id='name'  name='name' value='<?php echo $_GET['name'];?>'>
  <button type='button' class="btn btn-default btn-primary" id='re' name="save"  style='' ><b> Post Review</b></button>
  <button class="btn btn-default" name="cancel" type="reset" style='color:black' id='c'>Clear</button>
  
  </div>
  

</form>





</div>
</div>


