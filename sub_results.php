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


if(!isset($_GET['cat'])){
	$search_term=$_POST['keyword'];
	$_SESSION['keyword']=$_POST['keyword'];

	$products=mysqli_query($con,"select p.* , pi.main_image_path from product_detail p left join product_images pi on p.id=pi.product_id where title like '%$search_term%' or name like '%$search_term%'");
}
else
{


	$products=mysqli_query($con,"select p.* , pi.main_image_path  from product_detail p left join product_images pi on p.id=pi.product_id where p.sub_category=".$_GET['cat']);
}

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
   
    width:30%;
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
   .dropdown-menu > li
 {
	  border:1px solid white !important;
 }
</style>
<script>

$(document).ready(function()
		{


	$('form#fil_form').submit(function(e)
			{

             e.preventDefault();
             
             $.ajax({

url:'apply_filter.php',
type:'post',
data:$(this).serialize(),
success:function(data)
{
$('#result').empty();
$('#result').append(data);
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
<body>
 <body>
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
  
   <?php
   $ban=mysqli_query($con,"select image_path from sub_categories where id=".$_GET['cat']);
   
   if(mysqli_num_rows($ban)>0)
   {
	  $path=mysqli_fetch_assoc($ban); 
	  
	  if(isset($path['image_path']))
	  {
	  	echo "
	   <div style=''><br>
	  <img src='app/".$path['image_path']."' class='img-responsive wide'  style='padding-top:2px' height='180' width='100%'>
	  </div>";
	  
	  }
   }
   else 
   	echo '<div ><br></br></div><br>';
   
  
   ?>
 
 </div>
 <br>
 <br>
 <div class="col-md-12" style="background-color:white !important">
<div class="col-md-3">
<form name='filter'  id="fil_form">

<ul class="list-group">
  <li class="list-group-item" data-toggle="collapse" data-target="#mny" >PRICE<span class="fa fa-chevron-down pull-right"></span></li>
  <div id="mny" class="collapse">
  
   <?php
   $chek='';
   $price=mysqli_query($con,"select * from price_list");
   //$row=mysqli_fetch_assoc($brands);
   if(mysqli_num_rows($price)>0){

   while($row=mysqli_fetch_assoc($price))
   {
	   if($row['name'] !='')
	   $chek.='<li class="list-group-item "><span class="text-center"> <input type="checkbox" name="price[]" value="'.$row['id'].'" > '.$row['name'].' </span></li>';
   }
  
   }
  
	 $chek.=' <li class="list-group-item "><span class="text-center"> <input type="checkbox" name="price[]" value="" > '.All.' </span></li> ';
  
   echo $chek;?>
   
   </div>

 
  <li class="list-group-item" data-toggle="collapse" data-target="#brand" >BRAND<span class="fa fa-chevron-down pull-right"></span></li>
   <div id="brand" class="collapse">
   <?php
   $chek='';
   $brands=mysqli_query($con,"select * from brands");
   //$row=mysqli_fetch_assoc($brands);
   if(mysqli_num_rows($brands)>0){

   while($row=mysqli_fetch_assoc($brands))
   {
	   if($row['name'] !='')
	   $chek.='<li class="list-group-item "><span class="text-center"> <input type="checkbox" name="brand[]" value="'.$row['id'].'" > '.$row['name'].' </span></li>';
   }
  
   }
  
	 $chek.=' <li class="list-group-item "><span class="text-center"> <input type="checkbox" name="brand[]" value="" > '.All.' </span></li> ';
  
   echo $chek;?>
   
   </div>
  
    <li class="list-group-item" data-toggle="collapse" data-target="#color" >COLOR<span class="fa fa-chevron-down pull-right"></span></li>
   <div id="color" class="collapse">
   <?php
   $col='';
   $colors=mysqli_query($con,"select distinct color_general from product_detail");
   if(mysqli_num_rows($colors)>0){
   while($row=mysqli_fetch_assoc($colors))
   {
	   if($row['color_general'] !='')
	   $col.='<li class="list-group-item "><span class="text-center"> <input type="checkbox" name="color[]" value="'.$row['color_general'].'" > '.$row['color_general'].' </span></li>';
   }
   }
   else
   {
	 $col.='<li class="list-group-item "><span class="text-center"> <input type="checkbox" name="color[]" value="" > '.All.' </span></li> ';
   }
   echo $col;
   ?>
   </div>
  <li class="list-group-item" data-toggle="collapse" data-target="#width">SCREEN<span class="fa fa-chevron-down pull-right"></span></li>
  <div id="width" class="collapse">
   <?php
   $col='';
   $colors=mysqli_query($con,"select distinct width from product_detail");
   if(mysqli_num_rows($colors)>0){
   while($row=mysqli_fetch_assoc($colors))
   {
	   if($row['width'] !='')
	   $col.='<li class="list-group-item "><span class="text-center"> <input type="checkbox" name="width[]" value="'.$row['width'].'" > '.$row['width'].' cm</span></li>';
   }
   }
   else
   {
	 $col.='<li class="list-group-item "><span class="text-center"> <input type="checkbox" name="width[]" value="" > '.All.' </span></li> ';
   }
   echo $col;
   ?>
   </div>
  <li class="list-group-item" data-toggle="collapse" data-target="#re" >DISCOUNTS<span class="fa fa-chevron-down pull-right"></span></li>
  <div id="re" class="collapse">
  <li class="list-group-item  "><span class="text-center"> <input type="radio" name="discount" value="60" > 60% OFF </span></li>
  <li class="list-group-item "><span class="text-center"> <input type="radio" name="discount" value="40" > 40% OFF </span></li>
  
 </div>
 
 <?php 
 
 $custom_filter=mysqli_query($con,"select * from filters where find_in_set('".$_GET['parent']."', category) and status=1");
 if(mysqli_num_rows($custom_filter)>0)
 {
 	$list='';
 	
 	while($row=mysqli_fetch_assoc($custom_filter))
 	{
 		$list.='
 		<li class="list-group-item" data-toggle="collapse" data-target="#'.$row['id'].'" >'.ucfirst($row['name']).'<span class="fa fa-chevron-down pull-right"></span></li>';
 		
 		$iner=mysqli_query($con,"select * from sub_filters where parent_filter=".$row['id']." and status=1");
 		if(mysqli_num_rows($iner)>0)
 		{
 			$list.='<div id="'.$row['id'].'" class="collapse">';
 		
 			while($rin=mysqli_fetch_assoc($iner))
 			{
 				$list.='<li class="list-group-item  "><span class="text-center"> <input type="checkbox" name="custom[]" value="'.$rin['id'].'" >&nbsp;'.ucfirst($rin['name']).' - '.$rin['value'].'</span></li>';
 			}
 			$list.='</div>';
 		}
 		
 		
 		
 		
 	}
 	echo $list;
 	
 	
 	
 }
 
 
 
 ?>
</ul>
<p class="text-center">
<input type='hidden' name='cat' value='<?php echo $_GET['cat'];?>'>
<button type="submit" class="btn btn-primary" id='filter'> <span class="fa fa-filter"></span> Apply Filters</button></p> 
</form>
</div>
<div class="col-md-9" id='result'>
<?php
if(mysqli_num_rows($products)>0){
while($row=mysqli_fetch_assoc($products))
{
	$price=mysqli_query($con,"select name from price_list where id=".$row['price']);
	$range=mysqli_fetch_array($price);
	$html='<div class="row"><div class="col-md-3"><br>';
	$html.='<img class="img-responsive"  src="app/'.$row['main_image_path'].'" height="150" ></div>';
	$html.='<div class="col-md-6">';
	$html.='<h3 style="color:black"><a href="product.php?id='.$_GET['cat'].'&id1='.$row['id'].'&m='.$row['name'].'" class="alink">'.strtoupper($row['title']).'</a></h3>';
	$html.='<h4 style="color:grey">Model : '.$row['modelno'].'</h4>';
	$html.='<h4 style="color:grey">Budget : '.$range['name'].'</h4>';

	$fields='<br><h4>Features</h4>';
	$query=mysqli_query($con,"select features from features where product_id=".$row['id']);
	
	if(mysqli_num_rows($query) > 0)
	{
	
		$feature=mysqli_fetch_assoc($query);
		$ans=explode("|",$feature['features']);
		for($i=0;$i<count($ans);$i++)
		{
		   $fields.='<p style="color:grey;;font-weight:bold"><span class="fa fa-angle-right"></span> '.$ans[$i].'</p>';
		}
		
		$html.=$fields;
	}
	
$p='';
		$sl="select avg(rate) as  mark , count(*) as numreviews from reviews  where product_id=".$row['id']." group by product_id ";
$re=mysqli_query($con,$sl);
$avg=mysqli_fetch_assoc($re);


	for($i=1;$i<=5;$i++)
	{
		if($i<=ceil($avg['mark']))
		$p.='<span class="fa fa-cog fa-2x" style="color:rgb(206, 12, 93);"></span>';
	else
        $p.=' <span class="fa fa-cog fa-2x" style="color:grey"></span>';
	}
	if($avg['mark']>0)
	$html.=$p.' &nbsp;&nbsp;<span style="color:red;font-weight:bold;font-size:150%">( #'.$avg['numreviews'].' Reviews)</span></p>';
else
	$html.=$p.' &nbsp;&nbsp;<span style="color:red;font-weight:bold;font-size:150%">( 0 Reviews)</span></p>';
		$html.='</div>';

	$html.='<div class="col-md-3">';
	$html.='<p><button type="button" class="btn btn-inverse btn-block" onclick="window.open(\''.$row['manu_url'].'\', \'_blank\')" style="background-color:black;padding:5px !important;color:white">
VISIT WEBSITE</button></p><p><img src="app/'.$row['logo_path'].'"  class="img-thumbnail" alt="No logo"  height="250" ></p>
	<p><button type="button" class="btn btn-inverse btn-block" onclick="window.open(\''.$row['retail_url'].'\', \'_blank\')" style="background-color:black;padding:5px !important;color:white">
	WHERE TO BUY</button></p>
	<p><button type="button" class="btn btn-inverse btn-block" style="background-color:black;padding:5px !important;color:white">
	ADD TO WISHLIST</button></p>
	<p><button type="button" onclick="window.location.href=\'review.php?id='.$row['id'].'&name='.$row['name'].'\'" class="btn btn-inverse btn-block" style="background-color:black;padding:5px !important;color:white">
	RATE & REVIEW</button></p>
	</div></div>';
	$html.='<div class="row" style="border-bottom:2px solid black"><button type="button" onclick="window.location.href=\'product.php?id='.$_GET['cat'].'&id1='.$row['id'].'&m='.$row['name'].'\'" class="btn btn-inverse btn-inline btn-xl" style="background-color:black;padding:5px !important;color:white">
WEBSEARCH</button> <button type="button" class="btn btn-inverse btn-inline btn-xl" style="background-color:black;padding:5px !important;color:white" onclick="window.location.href=\'product.php?id='.$_GET['cat'].'&id1='.$row['id'].'&m='.$row['name'].'\'">
	RECOMMENDED VIDEOS</button> <button type="button" class="btn btn-inverse btn-inline btn-xl" style="background-color:black;padding:5px !important;color:white" onclick="window.location.href=\'product.php?id='.$_GET['cat'].'&id1='.$row['id'].'&m='.$row['name'].'\'">
	WHERE TO BUY</button><br><br></div><br>';
	echo $html;
}
}
else 
{
	$html.='<h3>No Products Matches</h3>';
	echo $html;
}


?>
</div>

</div>
</body>

 

</html>

  