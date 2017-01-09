<?php
ini_set('max_file_size','60M');
ob_start();
session_start();
include_once('db.php');

if(isset($_GET) && !empty($_GET['id']))
{
	$data=mysqli_query($con, "select * from product_detail where id=".$_GET['id']);
	$res=mysqli_fetch_assoc($data);
	
	$filter=explode("|",$res['filter']);
	$sub_filter=explode("|",$res['sub_filter']);
	$cat_query=mysqli_query($con,"select * from categories where active=1");
	
	$images=mysqli_query($con,"select * from product_images where product_id=".$_GET['id']);
	if(mysqli_num_rows($images)>0)
	{
		$image_data=mysqli_fetch_array($images);
	}
}
else
{
	header("location: index.php");
	
}
if(mysqli_num_rows($data) <=0)
{
	echo "No more product is available";
	die();
}
else
{
$result=mysqli_fetch_array($data);
}


$bran=mysqli_query($con,"select * from brands");

$ret=mysqli_query($con,"select * from retailers");
?>
<script>
$(document).ready(function() {
			
				$('.date').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d',
	
});


$('.c').click(function()
{
	$('.content').empty();
            $('.content').load('product_list.php');
});
$("#update_product_form").submit(function(e) {
    e.preventDefault();
    var flag= true;
	 $('.r').each(function()
				{
			if($(this).val() =='')
			{
				flag = false;
				
			}
				});

if(!flag)
{
	alert("Some mandatory fields are missing . Please check!");
	 $('.r').each(function()
				{
			if($(this).val() =='')
			{
				$(this).css('border' ,'1px solid red');
				
			}
			else
				$(this).css('border','1px solid none');
				});
	
	return false;
}
else{
    var url = "update_products.php"; // the script where you handle the form input.
 var formData = new FormData($(this)[0]);
    $.ajax({
           type: "POST",
           url: url,
           data: formData,
async: false,
    cache: false,
    contentType: false,
    processData: false,		   // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
			   
			  $('.content').empty();
            $('.content').load('product_list.php');
           }
         });
}

     // avoid to execute the actual submit of the form.
});		



			});
		</script>
		<script>
    $(function() {
        $('#cp2').colorpicker();
    });
</script>

	
  <style>
  
   .entry:not(:first-of-type)
{
    margin-top: 10px;
}
  </style>
<div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Product  </h4>&nbsp;&nbsp;
                                         
                                                 
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">product</a>
                                        </li>
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
<div class="col-md-12 controls">
<form name="update_product" id='update_product_form'  enctype="multipart/form-data">
<input type='hidden' name='id' value='<?php echo $_GET['id'];?>'>
                                            <ul class="nav nav-pills " id="myTabalt" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home1"
                                                       role="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-cog"></i> General</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#image"
                                                       role="tab" aria-controls="images"><i class="fa fa-photo"></i> Images</a>
                                                </li>
												<li class="nav-item">
                                                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#manufacturer"
                                                       role="tab" aria-controls="profile"><i class="fa fa-info"></i> Manufacturer</a>
                                                </li>
												<li class="nav-item">
                                                    <a class="nav-link" id="profile-tab7" data-toggle="tab" href="#retailer"
                                                       role="tab" aria-controls="profile"><i class="fa fa-bank"></i> Retailer</a>
                                                </li>
                                                  <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab6" data-toggle="tab" href="#feature"
                                                       role="tab" aria-controls="profile"><i class="fa fa-magic"></i> Features</a>
                                                </li>
                                               <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#availability"
                                                       role="tab" aria-controls="profile"><i class="fa fa-shopping-cart"></i> Availability</a>
                                                </li>
												 <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#description"
                                                       role="tab" aria-controls="profile"><i class="fa fa-pencil"></i> Description</a>
                                                </li>
												 <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab5" data-toggle="tab" href="#seo"
                                                       role="tab" aria-controls="profile"><i class="fa fa-search"></i> Attributes</a>
                                                </li>
												<li class="nav-item">
                                                    <a class="nav-link" id="profile-tab8" data-toggle="tab" href="#filter"
                                                       role="tab" aria-controls="profile"><i class="fa fa-filter"></i> Filter</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabaltContent">
                                                <div role="tabpanel" class="tab-pane fade in active" id="home1"
                                                     aria-labelledby="home-tab">
													 <div class="col-md-8">
													 <table class="table t1">
													 <tbody>
													 <tr><td> <label>Title</label> </td><td><input type="text" value='<?php echo $res['title'];?>' name="p_title" class="form-control r"></td></tr>
													  <tr><td><label> Name </label></td><td><input type="text"  name="p_name" class="form-control r" value='<?php echo $res['name'];?>'></td></tr>
													  <tr><td><label> Category</label> </td><td>
													  <select id='p_cat' name="p_cat" class="form-control r" style="font-weight:bold">
													  <option value='' >--Choose Category--</option>
													  <?php
													  $html='';
													  while($row=mysqli_fetch_array($cat_query))
													  {
														  $html.='<option value="'.$row['id'].'"';
														  if($res['category']==$row['id'])
														  {
															  $html.=' selected ';
														  }
														  $html.='><b>'.$row['name'].'</b></option>';
														  
													  }
													  echo $html;
													  ?>
													  </select></td></tr>
													  <tr><td><label> Sub-Category </label></td><td>
													  <select id='p_sub' name="p_sub" class="form-control" style="font-weight:bold">
													   <option value='' >--Choose-Sub-Category--</option>
													  <?php
													  $html1='';
													  $sub_query=mysqli_query($con,"select id , name from sub_categories");
													  while($row=mysqli_fetch_array($sub_query))
													  {
														  $html1.='<option value="'.$row['id'].'"';
														  if($res['sub_category']==$row['id'])
														  {
															  $html1.=' selected ';
														  }
														  $html1.='><b>'.$row['name'].'</b></option>';
														  
													  }
													  echo $html1;
													  ?>
													  </select></td></tr>
													  <tr>
													  <td><label>Status</label></td>
													 <td> <label class="radio-inline"><input  type="radio" value='1' name="p_status" <?php if($res['status']=='1') echo 'checked'; ?>>Active</label>
<label class="radio-inline"><input type="radio" value='0' name="p_status" <?php if($res['status']=='0') echo 'checked'; ?>>Inactive</label></td>
													  </tr>
													  
													 </tbody>
													 </table>
													 <p class="text-center"><button  class="btn btn-success" name="new_update"><i class="fa fa-save"></i> Update</button>
													 <button type="reset" class="btn btn-danger c" name="cancel"><i class="fa fa-remove"></i> Cancel</button></p>
													 </div>
                                                    
                                                </div>
                                                <div class="tab-pane fade" id="image" role="tabpanel"
                                                     aria-labelledby="profile-tab">
													 <table class="table t2">
													 <tbody>
													 <tr>
													  <td><label>Main image: (max.: 4M)</label></td>
													  <td><input  type="file" name='p_main'></td><td><a href='#'><?php echo $image_data['main_image'];?></a></td>
													  </tr>
													  <tr>
													  <td><label>Image #1: (max.: 4M)</label></td>
													  <td><input type="file" name='p_sub1'></td><td><a href='#'><?php echo $image_data['image1'];?></a></td>
													  </tr>
													  <tr>
													  <td><label>Image #2: (max.: 4M)</label></td>
													  <td><input type="file" name='p_sub2'></td><td><a href='#'><?php echo $image_data['image2'];?></a></td>
													  </tr>
													  <tr>
													  <td><label>Image #3: (max.: 4M)</label></td>
													  <td><input type="file" name='p_sub3'></td><td><a href='#'><?php echo $image_data['image3'];?></a></td>
													  </tr>
													   <tr>
													  <td><label>Image #4: (max.: 4M)</label></td>
													  <td><input type="file" name='p_sub4'></td><td><a href='#'><?php echo $image_data['image4'];?></a></td>
													  </tr>
													  </tbody>
													  </table>
                                                    
													 <p class="text-center"><button  class="btn btn-success" name="new_update"><i class="fa fa-save"></i> Update</button>
													 <button type="reset" class="btn btn-danger c" name="cancel"><i class="fa fa-remove"></i> Cancel</button></p>
                                                </div>
												<div class="tab-pane fade" id="retailer" role="tabpanel"
                                                     aria-labelledby="profile-tab">
													 <div class="col-md-8">
													 <table class="table t1">
													 <tbody>
													
													   <tr>
													  <td><label>Retailer Name</label></td>
													  <td><select class="form-control r" name='retailer_name' id='retailer_name' >
													  <option value=''>--Choose Retailer--</option>
													  <?php
													  $html='';
													  while($b=mysqli_fetch_array($ret))
													  {
														  if($res['retailer']==$b['id'])
														$html.='<option value="'.$b['id'].'" path="'.$b['rt_path'].'" selected>'.$b['name'].'</option>';
													else
														$html.='<option value="'.$b['id'].'" path="'.$b['rt_path'].'" >'.$b['name'].'</option>';
                                                        														
													  }
													  echo $html;
													  ?>
													  </select>
													  </td>
													  <input type="hidden" name="retailer_path" value='' id='retailer_path' value='<?php echo $res['retailer_image'];?>'>
													  </tr>
													  <tr>
													  <td><label>Retailer URL</label></td>
													  <td><input type="text" class="form-control" name='retailer_url' value='<?php echo $res['retail_url'];?>'></td>
													  </tr>
													  </tr>
													  </tbody>
													  </table>
													   <p class="text-center"><button  class="btn btn-success" name="new_update"><i class="fa fa-save"></i> Update</button>
													 <button type="reset" class="btn btn-danger c" name="cancel"><i class="fa fa-remove"></i> Cancel</button></p>
													  </div>
													  </div>
													<div class="tab-pane fade" id="manufacturer" role="tabpanel"
                                                     aria-labelledby="profile-tab">
													 <div class="col-md-8">
													 <table class="table t1">
													 <tbody>
													 		  <tr>
													  <td><label>Brand Name</label></td>
													  <td><select class="form-control r" name='p_brand' id='brand_name' >
													  <option value=''>--Choose Brand--</option>

													   <?php
													  $html='';
													  while($b=mysqli_fetch_array($bran))
													  {
														  if($res['brand_name']==$b['id'])
														$html.='<option value="'.$b['id'].'" path="'.$b['bg_path'].'" selected>'.$b['name'].'</option>';
													else
														$html.='<option value="'.$b['id'].'" path="'.$b['bg_path'].'" >'.$b['name'].'</option>';
                                                        														
													  }
													  echo $html;
													  ?>
													  ?>
													  </select>
													  </td>
													  <input type="hidden" name="brand_path" value='' id='brand_path'  value='<?php echo $res['logo_path'];?>'>
													  </tr>
													  <tr>
													  <td><label>Manufacturer URL</label></td>
													  <td><input type="text" class="form-control" name='manufacturer_url'  value='<?php echo $res['manu_url'];?>'></td>
													  </tr>
													  <tr>
													  <td><label>Model No</label></td>
													  <td><input type="text" class="form-control" value='<?php echo $res['modelno'];?>' name='p_model'></td>
													  </tr>
									                  
													  
													  <tr>
													  <td><label>Price($)</label></td>
													  <td>
													  <select  class="form-control r"  name='p_price'>
													  
													   <option value=''>--Choose--</option>
													   <?php
													   $h='';
													   $qry=mysqli_query($con,"select * from price_list");
													   while($pr=mysqli_fetch_assoc($qry))
													   {
														   if($pr['id']==$res['price'])
														   {
															 $h.='<option value="'.$pr['id'].'" selected >'.$pr['name'].'</option>';
														   }
														   else
															   $h.='<option value="'.$pr['id'].'" >'.$pr['name'].'</option>';
													   }
													   echo $h;
													   ?>
													  
													  </select>
													  </td>
													  </tr>
													  <tr>
													  <td><label>UAN</label></td>
													  <td><input type="text" value='<?php echo $res['uan'];?>' class="form-control r" name='p_uan'></td>
													  </tr>
													  </div>
													 </tbody>
													 </table>
													 <p class="text-center"><button  class="btn btn-success" name="new_update"><i class="fa fa-save"></i> Update</button>
													 <button type="reset" class="btn btn-danger c" name="cancel"><i class="fa fa-remove"></i> Cancel</button></p>
                                                    
                                                </div>
												 
												</div>
												 <div class="tab-pane fade" id="availability" role="tabpanel"
                                                     aria-labelledby="profile-tab">
													<div class="col-md-8">
													 <table class="table t1">
													 <tbody>
													  <tr>
													  <td><label>User Groups</label></td>
													  <?php
													
													  $arr=explode(",",$res['usergroup']);
													  
													 
													  ?>
													  <td> <label class="checkbox-inline"><input type="checkbox" <?php if(in_array('all',$arr)) echo 'checked';?> name='p_user[]'value="all">All </label>
<label class="checkbox-inline"><input type="checkbox" <?php if(in_array('guest',$arr)) echo 'checked';?> value="guest"  name='p_user[]'>Guest</label>
<label class="checkbox-inline"><input type="checkbox" <?php if(in_array('user',$arr)) echo 'checked';?> value="user"  name='p_user[]'>Registered user </label></td>
													  </tr>
													  <tr>
													  <td><label>Creation date</label></td>
													  <td><div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control"  name='p_date' value='<?php echo date('m/d/Y',strtotime($res['creation_data']));?>'>
    <div class="input-group-addon">
        <span class="fa fa-calendar"></span>
    </div>
</div></td>
													  </tr>
									                 
													  
													  <tr>
													  <td><label>Out of stock actions</label></td>
													  <td><select  name="p_outstack" class="form-control">
													  <option value='' >--Choose Category--</option>
													  <option value='Yes' <?php if($res['outofstock']=='Yes') echo 'selected';?>>Yes</option>
													  <option value='No' <?php if($res['outofstock']=='No') echo 'selected';?>>No</option>
													  </select></td>
													  </tr>
													 
													 
													 </tbody>
													 </table>
													 <p class="text-center"><button  class="btn btn-success" name="new_update"><i class="fa fa-save"></i> Update</button>
													 <button type="reset" class="btn btn-danger c" name="cancel"><i class="fa fa-remove"></i> Cancel</button></p>
                                                    </div>
													 
                                                </div>
												 <div class="tab-pane fade" id="description" role="tabpanel"
                                                     aria-labelledby="profile-tab">
													 <div class="col-md-10">
													 <table class="table t1">
													 <tbody>
													  <tr>
													  <td><label>Short Description</label></td><td><textarea class="form-control" name='p_short'><?php echo $res['shortdesc'];?></textarea></td></tr>
													  <tr><td><label>Long Description</label></td><td>
                                                    <textarea  name='p_long' id="txtEditor" row="10" class="form-control l"><?php echo $res['longdesc'];?></textarea> </td></tr>
													</tbody>
													</table>
													<p class="text-center"><button  class="btn btn-success" name="new_update"><i class="fa fa-save"></i> Update</button>
													 <button type="reset" class="btn btn-danger c" name="cancel"><i class="fa fa-remove"></i> Cancel</button></p>
													</div>
													 
                                                </div>
												<div class="tab-pane fade" id="seo" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                     <div class="col-md-10">
													 <table class="table t1">
													 <tbody>
													 <tr>
													  <td><label>Height</label></td>
													  <td><input type="text" value='<?php echo $res['height'];?>' name='p_height' class="form-control"></td>
													  </tr>
													  <tr>
													  <td><label>Width</label></td>
													  <td><input type="text"  name='p_width' value='<?php echo $res['width'];?>' class="form-control"></td>
													  </tr>
													  <tr>
													  <td><label>Weight</label></td>
													  <td><input type="text" value='<?php echo $res['weight'];?>' name='p_weight' class="form-control"></td>
													  </tr>
													  <tr>
													  <td><label>Color Code</label></td>
													  <td><div id="cp2" class="input-group colorpicker-component">
    <input type="text" value='<?php echo $res['color_code'];?>' class="form-control"  name='p_color_code'  />
    <span class="input-group-addon"><i></i></span>
</div>
</td>
													  </tr>
													   <tr>
													  <td><label>General Color</label></td>
													  <td><input type="text" value='<?php echo $res['color_general'];?>' name='p_color' class="form-control"></td>
													  </tr>
													 </tbody>
													 </table>
													  <p class="text-center"><button  class="btn btn-success" name="new_update"><i class="fa fa-save"></i> Update</button>
													 <button type="reset" class="btn btn-danger c" name="cancel"><i class="fa fa-remove"></i> Cancel</button></p>
													 </div>

                                                </div>
												<div class="tab-pane fade" id="feature" role="tabpanel" aria-labelledby="profile-tab">
                                                     <div class="col-md-8">
                                                     <p>Custom Features </p>
                                                     
                                                     <div class='f'>
                                                     <?php 
                                                     $fields='';
                                                     $query=mysqli_query($con,"select features from features where product_id=".$_GET['id']);
                                                     if(mysqli_num_rows($query) > 0)
                                                     {
                                                     	
                                                     	$feature=mysqli_fetch_assoc($query);
                                                     	$ans=explode("|",$feature['features']);
                                                     	for($i=0;$i<count($ans);$i++)
                                                     	{
                                                     	?><div class="entry input-group col-xs-12 ">
                                                     <input class="form-control" name="fields[]" type="text" placeholder="Type something" value="<?php echo $ans[$i];?>" />
                    	                             <span class="input-group-btn">
                                                     <button class="btn btn-danger btn-remove" type="button">
                                                      <span class="fa fa-minus"></span>
                                                      </button>
                                                      </span>
                                                      </div>
                                                      <?php 
                                                     		
                                                     	} ?>
                                                     <div class="entry input-group col-xs-12 ">
                                                     <input class="form-control" name="fields[]" type="text" placeholder="Type something" />
                    	                             <span class="input-group-btn">
                                                     <button class="btn btn-success btn-add" type="button">
                                                      <span class="fa fa-plus"></span>
                                                      </button>
                                                      </span>
                                                      </div>
                                                   <?php 
                                                     	
                                                     }
                                                     else
                                                     {
                                                     	
                                                    ?>
                                                     <div class="entry input-group col-xs-12 ">
                                                     <input class="form-control" name="fields[]" type="text" placeholder="Type something" />
                    	                             <span class="input-group-btn">
                                                     <button class="btn btn-success btn-add" type="button">
                                                      <span class="fa fa-plus"></span>
                                                      </button>
                                                      </span>
                                                      </div>
                                                      <?php }?>
                                                      </div>
                                                      <br>
                                                      <p class="text-center"><button  class="btn btn-success" name="new_submit"><i class="fa fa-save"></i> Update</button>
													 <button type="reset" class="btn btn-danger c" name="cancel"><i class="fa fa-remove"></i> Cancel</button></p>
                                                     </div>
                                                     </div>
                                                     <div class="tab-pane fade" id="filter" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                     <div class="col-md-8">
													 
													 <table class="table t1">
													  <tbody>
													 <tr>
													 <td><label>Filters</label></td>
													  <td>
													  <select  class="form-control" name='filter[]' multiple>
													  <option value=''>--Choose--</option>
													  <?php
													   $h='';
													   $qry=mysqli_query($con,"select * from filters");
													   while($pr=mysqli_fetch_assoc($qry))
													   {
                                                               if(in_array($pr['id'],$filter))
															   $h.='<option value="'.$pr['id'].'" selected >'.$pr['name'].'</option>';
														   else
															   $h.='<option value="'.$pr['id'].'"  >'.$pr['name'].'</option>';
															   
													   }
													   echo $h;
													   ?>
													  </select></td>
													
													 
													 </tr>
													  <tr>
													 <td><label>Sub Filters</label></td>
													  <td>
													  <select  class="form-control" name='sub_filter[]' multiple>
													  <option value=''>--Choose--</option>
													  <?php
													   $h='';
													   $qry=mysqli_query($con,"select * from sub_filters");
													   while($pr=mysqli_fetch_assoc($qry))
													   {
                                                               if(in_array($pr['id'],$sub_filter))
															   $h.='<option value="'.$pr['id'].'" selected >'.$pr['name'].'</option>';
														   else
															   $h.='<option value="'.$pr['id'].'"  >'.$pr['name'].'</option>';
															   
													   }
													   echo $h;
													   ?>
													  </select></td>
													
													 
													 </tr>
													 </tbody>
													 </table>
													 <p class="text-center"><button  class="btn btn-success" name="new_submit"><i class="fa fa-save"></i> Update</button>
													 <button type="reset" class="btn btn-danger c" name="cancel"><i class="fa fa-remove"></i> Cancel</button></p>
													 </div>
													 </div>
                                                     
                                                     
												</div>
                                                
                                           
                                        
                                    

</form>
</div>
