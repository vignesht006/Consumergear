<?php

ob_start();
session_start();

include_once 'app/db.php';

if(isset($_POST))
{
	
	if($_POST['cat'] !='')
	$query="select p.* , pi.main_image_path  from product_detail p left join product_images pi on p.id=pi.product_id where p.category= ".$_POST['cat'];
	
	else 
		$query="select p.* , pi.main_image_path  from product_detail p left join product_images pi on p.id=pi.product_id where title like '%".$_SESSION['keyword']."%'
				 or name like '%".$_SESSION['keyword']."%'";
		
	
	
	
	if(isset($_POST['price']) && !empty($_POST['price']))
	{
	
		if(count($_POST['price'])>1){
			$price="'".implode("'".','."'",$_POST['price'])."'";
			$query.=" and price in (".$price.") ";
		}
		else if(count($_POST['price'])==1)
		{
			$query.=" and price ='".$_POST['price'][0]."' ";
		}
		else
		{
			$query.=" and price in ('".$_POST['price']."') ";
		}
	}
	
	if(isset($_POST['custom']) && !empty($_POST['custom']))
	{
	
		if(count($_POST['custom'])>1){
			$custom="'".implode("'".','."'",$_POST['custom'])."'";
			$query.=" and sub_filter in (".$custom.") ";
		}
		else if(count($_POST['custom'])==1)
		{
			$query.=" and sub_filter ='".$_POST['custom'][0]."' ";
		}
		else
		{
			$query.=" and sub_filter in ('".$_POST['custom']."') ";
		}
	}
	
	
	if(isset($_POST['brand']) && !empty($_POST['brand']))
	{
		
		if(count($_POST['brand'])>1){
		$brand="'".implode("'".','."'",$_POST['brand'])."'";
		$query.=" and brand_name in (".$brand.") ";
		}
		else if(count($_POST['brand'])==1)
		{
			$query.=" and brand_name ='".$_POST['brand'][0]."' ";
		}
		else
		{
			$query.=" and brand_name in ('".$_POST['brand']."') ";
		}
	}
	
	if(isset($_POST['color']) && !empty($_POST['color']))
	{
		
		if(count($_POST['color'])>1){
		$color="'".implode("'".','."'",$_POST['color'])."'";
		$query.=" and color_general in (".$color.") ";
		}
		else if(count($_POST['color'])==1)
		{
			$query.=" and color_general ='".$_POST['color'][0]."' ";
		}
		else
		{
			$query.=" and color_general in ('".$_POST['color']."') ";
		}
	}
	
	if(isset($_POST['width']) && !empty($_POST['width']))
	{
		
		if(count($_POST['width'])>1){
		$width="'".implode("'".','."'",$_POST['width'])."'";
		$query.=" and width in (".$width.") ";
		}
		else if(count($_POST['width'])==1)
		{
			$query.=" and width ='".$_POST['width'][0]."' ";
		}
		else
		{
			$query.=" and width in ('".$_POST['width']."') ";
		}
	}
	//if($price !='')
	

$query_res=mysqli_query($con,$query);



	$html='';
	
	if(mysqli_num_rows($query_res)>0){
	while($row=mysqli_fetch_assoc($query_res))
{
	$html.='<br><br><div class="row"><div class="col-md-3"><br>';
	$html.='<img class="img-responsive"  src="app/'.$row['main_image_path'].'" height="150" ></div>';
	$html.='<div class="col-md-6">';
	$html.='<h3 style="color:black"><a href="product.php?id='.$row['id'].'" class="alink">'.strtoupper($row['title']).'</a></h3>';
	$html.='<h4 style="color:grey">Model : '.$row['modelno'].'</h4>';
	$html.='<h4 style="color:grey">Price : $'.$row['price'].'</h4>';

	$fields='<br><h4>Features</h4>';
	$query1=mysqli_query($con,"select features from features where product_id=".$row['id']);
	
	if(mysqli_num_rows($query1) > 0)
	{
	
		$feature=mysqli_fetch_assoc($query1);
		$ans=explode("|",$feature['features']);
		for($i=0;$i<count($ans);$i++)
		{
		   $fields.='<p style="color:grey;;font-weight:bold"><span class="fa fa-angle-right"></span> '.$ans[$i].'</p>';
		}
		
		$html.=$fields;
	}
	
		$html.='</div>';

	$html.='<div class="col-md-3">';
	$html.='<p><button type="button" class="btn btn-inverse btn-block" style="background-color:black;padding:5px !important;color:white">
	FEATURED RETAILER</button></p><p><img src="" class="img-reponsive" height="100"></p>
	<p><button type="button" class="btn btn-inverse btn-block" style="background-color:black;padding:5px !important;color:white">
	WHERE TO BUY</button></p>
	<p><button type="button" class="btn btn-inverse btn-block" style="background-color:black;padding:5px !important;color:white">
	ADD TO WISHLIST</button></p>
	<p><button type="button" class="btn btn-inverse btn-block" style="background-color:black;padding:5px !important;color:white">
	RATE & REVIEW</button></p>
	</div></div>';
	$html.='<div class="row" style="border-bottom:2px solid black"><button type="button" class="btn btn-inverse btn-inline" style="background-color:black;padding:5px !important;color:white">
	PRODUCT OVERVIEW</button> <button type="button" class="btn btn-inverse btn-inline" style="background-color:black;padding:5px !important;color:white">
	SPECIFICATIONS</button> <button type="button" class="btn btn-inverse btn-inline" style="background-color:black;padding:5px !important;color:white">
	RECOMMENDED VIDEOS</button><br><br></div><br>';
	
}


echo $html;

}

else {
	$html.='<h3>No Products Matches</h3>';
	echo $html;
}


}

?>