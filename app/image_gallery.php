 <?php
include_once 'db.php';
$img=mysqli_query($con,"select * from backgrounds where id=1");
$result=mysqli_fetch_assoc($img);

$img2=mysqli_query($con,"select * from backgrounds where id=2");
$result2=mysqli_fetch_assoc($img2);

?> <div class="container" >

                        <div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Image Gallery  </h4>&nbsp;&nbsp;
                                               
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Images</a>
                                        </li>
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       

                       <div class="row" style="background-color: white;" height="100% !important">

						<div class="col-xs-5 ">
						<br>
						<h4 style="color:green">Background Image</h4>
						 <img src="<?php echo $result['image_path'];?>" class="img-thumbnail" id='preview' alt="Cinque Terre" width="100%" height="1005">
						<br>
						 <p></p>
						 <p class="hf" style="color: blue">New Image: <input type="file" class="form-control hf" id="image1"></p>
						 
						 or
						 <div class="form-group">
						 <label> Enter Background Imgae URL</label>
						 <input type='text' class="form-control" id='url' value='<?php echo $result['image_path'];?>' disabled>
						 </div>
						 <p class="text-center" style="height: 15vh !important"><button type="button" class="btn btn-primary" id='show-file'><span class="glyphicon glyphicon-pencil"></span> Edit</button>
						 
                         <button type="button" id='save-fil' class="btn btn-success hf"><span class="glyphicon glyphicon-save" ></span> Save</button>
						  <button type="button" class="btn btn-danger hf" id='can-fil'><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						  </p>
						 </div>
						 
						 <div class="col-xs-5 ">
						<br>
						<h4 style="color:green">Logo Image</h4>
						 <img src="<?php echo $result2['image_path'];?>" class="img-thumbnail" id='preview_logo' alt="Cinque Terre" width="285px" height="135">
						<br>
						 <p></p>
						 <p class="hf_logo" style="color: blue">New Logo: <input type="file" class="form-control hf_logo" id="image2"></p>
						 
						 or
						 <div class="form-group">
						 <label> Enter Logo Imgae URL</label>
						 <input type='text' class="form-control" id='url_logo' value='<?php echo $result2['image_path'];?>' disabled>
						 </div>
						 <p class="text-center" style="height: 15vh !important"><button type="button" class="btn btn-primary" id='show-file_logo'><span class="glyphicon glyphicon-pencil"></span> Edit</button>
						 
                         <button type="button" id='save_logo' class="btn btn-success hf_logo"><span class="glyphicon glyphicon-save" ></span> Save</button>
						  <button type="button" class="btn btn-danger hf_logo" id='can-fil_logo'><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						  </p>
						 </div>
                        </div>
                        
                        
                        
						</div>
						
						 <script>
$(document).ready(function()
		{
  $('.hf').hide();
  $('.hf_logo').hide();

  $('#image1').change(function(){
		 var formData=new FormData();
			formData.append('file',$('input[type=file]')[0].files[0]);
			
		$.ajax({
			url:'file_preview.php',
			type:'post',
			data: formData,
			contentType:false,
			cache:false,
			processData:false,
			success:function(data)
			{
				
				$('#preview').attr('src',data);
				
				
			}
		});

	
		});



  $('#image1').change(function(){
		 var formData=new FormData();
			formData.append('file',$('input[type=file]')[1].files[0]);
			
		$.ajax({
			url:'file_preview.php',
			type:'post',
			data: formData,
			contentType:false,
			cache:false,
			processData:false,
			success:function(data)
			{
				
				$('#preview_logo').attr('src',data);
				
				
			}
		});

	
		});
  

	
		});

						</script>						
						
						
						



                       
                           



   


                    </div> <!-- container -->


				
				