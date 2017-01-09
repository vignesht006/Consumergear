 <?php
include_once 'db.php';

$sql=mysqli_query($con,"select * from filters where id=".$_GET['id']);

$re=mysqli_fetch_assoc($sql);

$cat=explode(",",$re['category']);
?>
<script>
$(document).ready(function()
{
	$("#update_filter_form").submit(function(e) {
    e.preventDefault();
    var url = "update_filter.php"; // the script where you handle the form input.
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
            $('.content').load('filters.php');
           }
         });

     // avoid to execute the actual submit of the form.
});	


$('#c_filter').click(function()
{
	 $('.content').empty();
            $('.content').load('filters.php');
});	
});

</script>


 <div class="container" >

                        <div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Filters </h4>&nbsp;&nbsp;
                                          
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">New Filters</a>
                                        </li>
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       

                        <div class="row" style="background-color: white;overflow-y: scroll;">
						<div class="col-xs-6">
						<form name='new_filter' id='update_filter_form' >
						<input type='hidden' name='id' value='<?php echo $_GET['id'];?>'>
						  <fieldset class="form-group">
                           <label for="exampleSelect1"><b>Category</b></label>
                                                    <select class="form-control data" id="main_cat" multiple name='category'>
                                                       <?php
													   $html='';
													   $sql="select name, id from categories where active=1";
													    $qry=mysqli_query($con,$sql);
													   while($row=mysqli_fetch_assoc($qry))
													   {
														 if(in_array($row['id'],$cat))  
													      $html.='<option value="'.$row['id'].'" selected >'.$row['name'].'</option>';   
													  else
														  $html.='<option value="'.$row['id'].'"  >'.$row['name'].'</option>';   
													   }
													   echo $html;
													   
													   ?>
                                                    </select>
                                                    
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="name"><b>Title</b></label>
                                                    <input type="text" class="form-control" id="filter_name" value='<?php echo $re['name'];?>' name='filter_name'
                                                           placeholder="Enter Name">
                                                    
                                                </fieldset>
												<fieldset class="form-group">
                                                    <label for="name"><b>Value</b></label>
                                                    <input type="text" class="form-control" id="value" name='value' value='<?php echo $re['val']; ?>'
                                                           placeholder="Enter Name">
                                                    
                                                </fieldset>
												<div class="switchery-demo">
                                                        
                                                        <input type="checkbox"  data-plugin="switchery" <?php if($re['status']==1) echo "checked"; ?> name='active_filter' data-color="#1bb99a" id='active_filter'/> Active
                                                        
                                                    </div>
													
													<br>
                                                    <button type="submit" id='update_filter' class="btn btn-success waves-effect waves-light">Update </button>
													<button type="reset" id='c_filter' class="btn btn-danger waves-effect" >Cancel</button>
													</form>
													</div>
													<br>
													<br>
                        </div>


                    </div> 
             
				
				

									



