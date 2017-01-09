 <?php
include_once 'db.php';


$sql="select c.id as cid, c.name as cname,c.active as cstatus, c.haschild as child , c.prev as prev ,image_path  from sub_categories as c  where find_in_set('".$_GET['id']."',parent)";
//echo $sql;die();
$sql_main="select name from categories where id=".$_GET['id'];
$main_name=mysqli_fetch_array(mysqli_query($con,$sql_main)); 
$table=mysqli_query($con,$sql);
?> 
<script>

$(document).ready(function()
{
	parent=$('#parent').val();
	$("#banner_form").submit(function(e) {
    e.preventDefault();
    var url = "save_banner.php"; // the script where you handle the form input.
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
			  $('.close').click();
		     $('.modal-backdrop').remove(); 
			$('.content').empty();
            $('.content').load('sub-menus.php?id='+parent);
           }
         });

     // avoid to execute the actual submit of the form.
});		
});


</script>

<div class="container"  >
<input type='hidden' id='parent' value='<?php echo $_GET['id'];?>'>
                        <div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Sub Categories  </h4>&nbsp;&nbsp;
                                         
                                                &nbsp;&nbsp;<button type="button" class="btn btn-primary  waves-effect waves-light" data-toggle="modal" data-target="#myModal_child"><i class="fa fa-plus"></i>  Child-Category</button>      
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Sub Categories</a>
                                        </li>
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       

                        <div class="row" style="background-color: white;overflow-y: scroll;">
						<div class="col-xs-12 table-responsive">
						 <table id="sub_list" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                 <th>Sub-Category</th>
                                              
                                                <th>Status</th>
												<th>Banner Image</th>
												<th>Action</th>
                                                 <th>Parent Category</th>
                                                  <th>Child Category</th>
                                                
                                            </tr>
                                        </thead>


                                        <tbody>
										<?php
										$s='';
										while($row=mysqli_fetch_array($table))
										{
										if($row['cstatus']==1)
										{
											$cstatus='<span style="color:green;font-weight:bold">Active</span>';
										}
										else
											$cstatus='<span style="color:red;font-weight:bold">Inactive</span>';
										
										
										$s.='<tr><td>'.$row['cid'].'</td><td>'.$row['cname'].'</td><td>'.$cstatus.'</td>';
										
										
											$s.='<td><img src="'.$row['image_path'].'"  class="img-thumbnail" alt="No banner Image" width="100" height="100" ></td>'
											;
										
											
										$s.='<td><p class="text-center"><span style="color: blue;cursor:pointer"><i class="fa fa-pencil-square edit_sub" id="subdit_'.$row['cid'].'" title="Edit"></i></span>&nbsp;&nbsp;<span style="color: green;cursor:pointer"><i class="fa fa-copy copy_sub" title="Duplicate" id="copy_'.$row['cid'].'" parent="'.$_GET['id'].'"></i></span>&nbsp;&nbsp;<span style="color: blue;cursor:pointer"><i class="fa fa-photo ban_sub" title="Banner" id="banner_'.$row['cid'].'"></i></span>&nbsp;&nbsp;&nbsp;<span style="color: red;cursor:pointer"><i class="fa fa-remove remove_sub" title="Remove" id="subremove_'.$row['cid'].'" parent="'.$_GET['id'].'"></i></span></p></td><td>'.$main_name['name'].'</td>';
										
										if($row['child'] != 0)
											$s.='<td><button type="button" class="btn btn-info viewchild" id="viewchild_'.$row['cid'].'" title="Child-Category List"><i class="fa fa-eye"></i> Child-Category</button></td></tr>';
										
										else 
											$s.='<td> 0 </td></tr>';
										
										
										}
										echo $s;
										?>
										</tbody>
										</table>
						</div>
                        </div>

                       
                           



   


                    </div> <!-- container -->

                </div> <!-- content -->
				
				
				 
									
									
									
									<div id="myModal_child" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">New Child Category</h4>
                                                </div>
												<label id='sum' style='display:none;color:red;'></label>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                             <fieldset class="form-group">
                                                   <label for="exampleSelect1"><b>Category</b></label>
                                                    <select class="form-control data" id="main_sub">
                                                       <?php
													   $html='<option value="">--Choose Category--</option>';
													   $sql="select name, id from sub_categories where active=1 and  parent=".$_GET['id'];
													    $qry=mysqli_query($con,$sql);
													   while($row=mysqli_fetch_assoc($qry))
													   {
													$html.='<option value="'.$row['id'].'" style="font-weight:bold"><strong>'.$row['name'].'</strong></option>';   
													   }
													   echo $html;
													   
													   ?>
                                                    </select>
                                                    
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="name"><b>Title</b></label>
                                                    <input type="text" class="form-control" id="title_child"
                                                           placeholder="Enter Title">
                                                    
                                                </fieldset>
												 <div class="switchery-demo">
                                                        
                                                        <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" id='active_child'/> Active
                                                        
                                                    </div>

                                  
                                                
                                            </form>
                        				</div><!-- end col -->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" id='save_child1' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
									<script>
$(document).ready(function(){
	if ( $.fn.dataTable.isDataTable( '#sub_list' ) ) {
    table = $('#sub_list').DataTable();
}
else {
	$("#sub_list").dataTable({
        
       });
}
	 
		
		
		
		

		
});
</script>


<div id="update_sub" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Modify Sub-Category</h4>
                                                </div>
												<input type="hidden" id='hsub_id' value=''>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                            
                                                <fieldset class="form-group">
                                                    <label for="name"><b>Title</b></label>
                                                    <input type="text" class="form-control" id="title_sub_update"
                                                           placeholder="Enter Title">
                                                    
                                                </fieldset>
												 <div class="switchery-demo">
                                                        
                                                        <input type="checkbox"  data-plugin="switchery" data-color="#1bb99a" id='active_sub_update'/> Active
                                                        
                                                    </div>

                                  
                                                
                                            </form>
                        				</div><!-- end col -->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" id='update_sub1' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
									
									
									
									<div id="copy_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Duplicate Category</h4>
                                                </div>
												<input type="hidden" id='hdup_id' value=''>
                                        <div class="modal-body">  
                                             <fieldset class="form-group">
                                                   <label for="exampleSelect1"><b>Category</b></label>
                                                    <select class="form-control data" id="dup_sub" multiple>
                                                      
                                                    </select>
                                                    
                                                </fieldset>
                                               
											</div>
                                  
                                                
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" id='save_dup' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
									
									
									
									
									
									
									
									<div id="modal_banner" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form name="new_banner" id='banner_form'  enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Banner Image</h4>
                                                </div>
												
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                               <input type='hidden' id='ban_sub_id' value='' name='banner_id'>
												<fieldset class="form-group">
                                                    <label for="name"><b>Logo</b></label>
                                                    <input  type="file" name='p_banner' required>
                                                    
                                                </fieldset>
                                  
                                                
                                            
                        				          </div><!-- end col -->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" id='save_banner' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->