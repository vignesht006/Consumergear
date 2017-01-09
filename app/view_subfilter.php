<?php
include_once 'db.php';


$sql="select * from sub_filters where parent_filter=".$_GET['id'];

$table=mysqli_query($con,$sql);
?>
<div class="container" >
<input type='hidden' id='parent' value='<?php echo $_GET['id']?>'>
                        <div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Sub Filters  </h4>&nbsp;&nbsp;
                                          
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Sub Filter</a>
                                        </li>
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       

                        <div class="row" style="background-color: white;overflow-y: scroll;">
						<div class="col-xs-12 table-responsive">
						 <table id="sub_fil_list" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th> Name</th>
												<th>Status</th>
                                                <th>Value</th>
												<th>Action</th>											
                                               
                                                
                                            </tr>
                                        </thead>


                                        <tbody>
										<?php
										$s='';
										while($row=mysqli_fetch_array($table))
										{
											
											
										
										if($row['status']==1)
										{
											$status='<span style="color:green;font-weight:bold">Active</span>';
										}
										else
											$status='<span style="color:red;font-weight:bold">Inactive</span>';
										
										
										$s.='<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td><td>'.$status.'</td>';
										
										$s.='<td>'.$row['value'].'</td>';
										$s.='<td><p class="text-center"><span style="color: blue;cursor:pointer"><i class="fa fa-pencil-square  edit_subfilter" id="filter_'.$row['id'].'" title="Edit"></i></span>&nbsp;&nbsp;<span style="color: red;cursor:pointer"><i class="fa fa-remove remove_subfilter" title="Remove" id="remove_'.$row['id'].'"></i></span></p></td>';
									
											$s.='</tr>';
										
										
										
										
										
										}
										echo $s;
										?>
										</tbody>
										</table>
						</div>
                        </div>

                       
                           



   


                    </div> <!-- container -->

                </div> <!-- content -->
				

				
				<div id="update_sub_filter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Modify Sub-Filter</h4>
                                                </div>
												<label id='sum' style='display:none;color:red;'></label>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                             <fieldset class="form-group">
                                                   <label for="exampleSelect1"><b>Filter</b></label>
                                                    <select class="form-control data" id="main_filter">
                                                       <?php
													   $html='<option value="">--Choose Category--</option>';
													   $sql="select name, id from filters where status=1";
													    $qry=mysqli_query($con,$sql);
													   while($row=mysqli_fetch_assoc($qry))
													   {
													   	if($row['id'] == $_GET['id'])
													$html.='<option value="'.$row['id'].'" selected style="font-weight:bold"><strong>'.$row['name'].'</strong></option>';
													   	else 
													   		$html.='<option value="'.$row['id'].'"  style="font-weight:bold"><strong>'.$row['name'].'</strong></option>';
													   }
													   echo $html;
													   
													   ?>
                                                    </select>
                                                    
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="name"><b>Title</b></label>
                                                    <input type="text" class="form-control" id="title_sub_filter"
                                                           placeholder="Enter Title">
                                                    
                                                </fieldset>
                                                
                                                 <fieldset class="form-group">
                                                    <label for="name"><b>Value</b></label>
                                                    <input type="text" class="form-control" id="title_value" name='title_value'
                                                           placeholder="Enter value">
                                                    
                                                </fieldset>
												     <div class="switchery-demo">
                                                        
                                                        <input type="checkbox"  data-plugin="switchery" data-color="#1bb99a" id='active_sub_filter'/> Active
                                                        
                                                     </div>
                                               
                                    
                                    <inpu type='hidden' id='hsub_filter_id' value=''>
                                                
                                            </form>
                        				</div><!-- end col -->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" id='update_sub_filter_val' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->	
				
				
				
				
				
				
				
									<script>
$(document).ready(function(){
	if ( $.fn.dataTable.isDataTable( '#sub_fil_list' ) ) {
    table = $('#sub_fil_list').DataTable();
	
}
else {
	$("#sub_fil_list").dataTable();
}
	 
		


		 
		
		

		
});
</script>




				
			