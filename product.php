<?php 
ob_start();
session_start();
include_once 'app/db.php';
$menu=mysqli_query($con,"select * from categories");


$img1=mysqli_query($con,"select * from backgrounds where id=2");

$bg1=mysqli_fetch_assoc($img1);
if($bg1['type']=='0')
	$img_bg1='app/'.$bg1['image_path'];
	else
		$img_bg1=$bg1['image_path'];


$products=mysqli_query($con,"select *  from product_detail  where id=".$_GET['id1']);
$spec=mysqli_query($con,"select title,name,brand_name,modelno,price,uan,creation_data,outofstock,shortdesc,
longdesc,height,width,weight,color_code  from product_detail  where id=".$_GET['id1']);

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
    <script src="app.js"></script>
<script src="https://apis.google.com/js/client.js?onload=init"></script>
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
   .dropdown-menu > li
 {
	  border:1px solid white !important;
 }
  .alink
{
color: black;
text-decoration: none !important;
}
.tab  .active a
{
	background-color: black !important;
	color: white !important;
	opacity: 0.5;
}
.tab > li a
{
	background-color: black !important;
	color: white !important;
}
ul.nav-tabs > li {
  width: 24%;
  text-align: center;
}
ul > li:last-child ul{
    right: 4px !important;
    
}

.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
</style>
<script>
$(document).ready(function()
{
       $('.gsc-search-box').hide();
	   $('#search').hide();
	   $('#sub').hide();
	$('#gsc-i-id1').css('background','');
	$('#gsc-i-id1').val('<?php echo $_GET['m'];?>');
	$('#search').val('<?php echo $_GET['m'];?>');


});

document.onreadystatechange = function(){
     if(document.readyState === 'complete'){

$('.gsc-search-button').trigger('click');
setTimeout(function(){
 $('#sub').trigger('click');
}, 5000);
     }
}

//gsc-i-id1
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
   $ban=mysqli_query($con,"select image_path from sub_categories where parent=".$_GET['cat']);
   
   if(mysqli_num_rows($ban)>0)
   {
	  $path=mysqli_fetch_assoc($ban); 
	  
	  if(isset($path['image_path']))
	  {
	 echo "
	   <div >
	  <img src='app/".$path['image_path']."' class='img-responsive wide'  style='padding-top:2px'> 
	  </div>";
	  
	  }
   }
   else 
   	echo '<div ><br></br></div><br>';
   
  
   ?>
 
 </div>

<br>

<?php  if(mysqli_num_rows($products) > 0){?>
 <div class="col-md-12" style="background-color:white !important">
<div class="col-md-3">
<?php 
    $p_image=mysqli_query($con,"select main_image_path,image1_path,image2_path,image3_path,image4_path from product_images where product_id=".$_GET['id1']);
	
    if(mysqli_num_rows($p_image) > 0)
      {
$row=mysqli_fetch_assoc($p_image);		  
    $s='<img class="img-responsive" src="app/'.$row['main_image_path'].'" height="250">';
	echo $s;

	  } else
	  {?>
  <div class="panel panel-default">

<div class="panel-body">
<img class="img-responsive" src="no_image.jpeg" height="250">

</div>
</div>
	  <?php }
	  
?>

</div>
<?php	  
	  
	  
	  while($row=mysqli_fetch_assoc($products))
{ $html.='<div class="col-md-6">';
	$html.='<h3 style="color:black;font-weight:bold"><a href="#" class="alink">'.strtoupper($row['title']).'</a></h3>';
	$html.='<h4 style="color:grey">Model : '.$row['modelno'].'</h4>';
	$html.='<h4 style="color:grey">Budget : $'.$row['price'].'</h4>';

	$fields='<br>';
	$query=mysqli_query($con,"select features from features where product_id=".$row['id']);
	
	if(mysqli_num_rows($query) > 0)
	{
	
		$feature=mysqli_fetch_assoc($query);
		$ans=explode("|",$feature['features']);
		for($i=0;$ans[$i]!='';$i++)
		{
		   $fields.='<h5  style="color:grey;font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-angle-right fa-2x"></span> '.$ans[$i].'</h5>';
		}
		
		$html.=$fields;
	}
	$p='<br><p>';
	
	$sl="select avg(rate) as  mark , count(*) as numreviews from reviews  where product_id=".$_GET['id1']." group by product_id ";
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

	$html.='<div class="col-md-3" >';
	$html.='<p><button type="button" class="btn btn-inverse btn-block" onclick="window.open(\''.$row['manu_url'].'\', \'_blank\')"  style="background-color:black;padding:5px !important;color:white">
	VISIT WEBSITE</button></p><p><img src="app/'.$row['logo_path'].'"  class="img-thumbnail" alt="Logo Not Avialable"  width="285px" height="135" ></p>
	<p><button type="button" class="btn btn-inverse btn-block" onclick="window.open(\''.$row['retailer_url'].'\', \'_blank\')"  style="background-color:black;padding:5px !important;color:white">
	WHERE TO BUY</button></p><p><img src="app/'.$row['retailer_image'].'"  class="img-thumbnail" alt="Logo Not Avialable" width="285px" height="135" ></p>
	<p><button type="button" class="btn btn-inverse btn-block" style="background-color:black;padding:5px !important;color:white">
	ADD TO WISHLIST</button></p>
	<p><button type="button" onclick="window.location.href=\'review.php?id='.$_GET['id'].'&id1='.$row['id'].'&name='.$row['name'].'\'" class="btn btn-inverse btn-block" style="background-color:black;padding:5px !important;color:white">
	RATE & REVIEW</button></p>
	</div>';
	
}
echo $html.'</div>';
 
 ?>
 <div class="clear-fix"></div>
 <br>
 <div class="col-md-12">
 <div class="col-md-9">
 <ul class="nav nav-tabs tab">
    <li class="active"><a data-toggle="tab" href="#overview">WEB SEARCH</a></li>
   
    <li><a data-toggle="tab" href="#review">REVIEWS</a></li>
	<li><a data-toggle="tab" href="#videos">RECOMMENDED VIDEOS</a></li>
    <li><a data-toggle="tab" href="#where">WHERE TO BUY</a></li>
  </ul>
  <div class="tab-content">
    <div id="overview" class="tab-pane fade in active">
    <div class="container">
    <div id="cse" style="width: 100%;">Loading</div>
<script src="https://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
  google.load('search', '1', {language : 'en'});
  google.setOnLoadCallback(function() {
    var customSearchControl = new google.search.CustomSearchControl('003282759179042030736:yakrm3r0gr8');
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    var options = new google.search.DrawOptions();
    options.setAutoComplete(true);
    customSearchControl.draw('cse', options);
  }, true);



</script>

</div>

	</div>

	 <div id="review" class="tab-pane fade in active">
<br>
	 <div class="col-md-12">
<div class="col-md-12">
 <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#all" aria-controls="home" role="tab" data-toggle="tab"><span style="color: green !important">Most Helpful</span></a></li>
                                        <li role="presentation"><a href="#positive" aria-controls="profile" role="tab" data-toggle="tab"><span style="color: green !important">Positive</span></a></li>
                                        <li role="presentation"><a href="#negative" aria-controls="messages" role="tab" data-toggle="tab"><span style="color: red !important">Negative</span></a></li>
                                        <li role="presentation"><a href="#recent" aria-controls="settings" role="tab" data-toggle="tab"><span style="color: blue !important">Most Recent</span></a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="all">
										
										
										<?php 
$sl="select rate as  mark, comments as cmt , username,dateof from reviews as r  where r.product_id=".$_GET['id1']." order by r.dateof desc";
$review=mysqli_query($con,$sl);
while($r1=mysqli_fetch_array($review))
{
	if($r1['mark']>=4){
   $s='<hr style="border:1px solid green"><div class="row" style="margin-left:1%;margin-right:1%;">
<div class="col-md-2">
<i class=" fa fa-user-circle fa-3x"></i>
</div>';
$star='';

for($i=1;$i<=5;$i++)
{
	if($i<=$r1['mark'])
	   $star.=' <span class="fa fa-cog fa-2x" style="color:rgb(206, 12, 93);"></span>';
    else
		$star.=' <span class="fa fa-cog fa-2x" style="color:grey"></span>';
	   
}

$s.='<div class="col-md-10"><p>'.$star.' <span style="color:black"></span></p><p style="text-indent: 30pt;text-align:left">'.$r1['cmt'].'</p><p style="color:black;font-weight:bold">Review by <span style="color:rgb(3,66,176)">'.$r1['username'].'</span> on <span style="color:green">'.$r1['dateof'].'</span></p>';
$s.='</div></div>';
echo $s;

	
	}	
	
	
	
}

?>
										
										</div>
                                        <div role="tabpanel" class="tab-pane" id="positive">
										
											
										<?php 
$sl="select rate as  mark, comments as cmt , username,dateof from reviews as r  where r.product_id=".$_GET['id1']." order by r.dateof desc";
$review=mysqli_query($con,$sl);
while($r1=mysqli_fetch_array($review))
{
	if($r1['mark']>=3){
   $s='<hr style="border:1px solid green"><div class="row" style="margin-left:1%;margin-right:1%;">
<div class="col-md-2">
<i class=" fa fa-user-circle fa-3x"></i>
</div>';
$star='';

for($i=1;$i<=5;$i++)
{
	if($i<=$r1['mark'])
	   $star.=' <span class="fa fa-cog fa-2x" style="color:rgb(206, 12, 93);"></span>';
    else
		$star.=' <span class="fa fa-cog fa-2x" style="color:grey"></span>';
	   
}

$s.='<div class="col-md-10"><p>'.$star.' <span style="color:black"></span></p><p style="text-indent: 30pt;text-align:left">'.$r1['cmt'].'</p><p style="color:black;font-weight:bold">Review by <span style="color:rgb(3,66,176)">'.$r1['username'].'</span> on <span style="color:green">'.$r1['dateof'].'</span></p>';
$s.='</div></div>';
echo $s;

	
	}	
	
	
	
}

?>
										
										
										
										</div>
										   <div role="tabpanel" class="tab-pane" id="negative">
										   	
										<?php 
$sl="select rate as  mark, comments as cmt  username,dateof from reviews as r  where r.product_id=".$_GET['id1']." order by r.dateof desc";
$review=mysqli_query($con,$sl);
while($r1=mysqli_fetch_array($review))
{
	if($r1['mark']<=2){
   $s='<hr style="border:1px solid red"><div class="row" style="margin-left:1%;margin-right:1%;">
<div class="col-md-2">
<i class=" fa fa-user-circle fa-3x"></i>
</div>';
$star='';

for($i=1;$i<=5;$i++)
{
	if($i<=$r1['mark'])
	   $star.=' <span class="fa fa-cog fa-2x" style="color:rgb(206, 12, 93);"></span>';
    else
		$star.=' <span class="fa fa-cog fa-2x" style="color:grey"></span>';
	   
}

$s.='<div class="col-md-10"><p>'.$star.' <span style="color:black"></span></p><p style="text-indent: 30pt;text-align:left">'.$r1['cmt'].'</p><p style="color:black;font-weight:bold">Review by <span style="color:rgb(3,66,176)">'.$r1['username'].'</span> on <span style="color:green">'.$r1['dateof'].'</span></p>';
$s.='</div></div>';
echo $s;

	
	}	
	
	
	
}

?>
										   
										   
										   
										   
										   
										   </div>
										      <div role="tabpanel" class="tab-pane" id="recent">
											  
											  	
										<?php 
$sl="select rate as  mark, comments as cmt , username,dateof from reviews as r  where r.product_id=".$_GET['id1']." order by r.dateof desc limit 10";
$review=mysqli_query($con,$sl);
while($r1=mysqli_fetch_array($review))
{
	
   $s='<hr style="border:1px solid blue"><div class="row" style="margin-left:1%;margin-right:1%;">
<div class="col-md-2">
<i class=" fa fa-user-circle fa-3x"></i>
</div>';
$star='';

for($i=1;$i<=5;$i++)
{
	if($i<=$r1['mark'])
	   $star.=' <span class="fa fa-cog fa-2x" style="color:rgb(206, 12, 93);"></span>';
    else
		$star.=' <span class="fa fa-cog fa-2x" style="color:grey"></span>';
	   
}

$s.='<div class="col-md-10"><p>'.$star.' <span style="color:black"></span></p><p style="text-indent: 30pt;text-align:left">'.$r1['cmt'].'</p><p style="color:black;font-weight:bold">Review by <span style="color:rgb(3,66,176)">'.$r1['username'].'</span> on <span style="color:green">'.$r1['dateof'].'</span></p>';
$s.='</div></div>';
echo $s;

	

	
	
	
}

?>
											  
											  
											  </div>
                                        
                                    </div>


</div>
</div>	
	 
	 
	 
	 
	</div>
	<div id="videos" class="tab-pane fade in active">
	<form action='#' >
<p><input type='text' id='search' value='' /></p>
<p><input type='submit' value='search' id='sub'  /></p>

</form>
<div id='results'>
</div>
	</div>
	
 </div>
 </div>
 <div class="col-md-3">
 
 </div>
 </div>
 <?php
}
?>




