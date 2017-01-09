 <?php
include_once 'db.php';


$sql="select c.id as cid, c.name as cname,c.active as cstatus ,c.hasub as has_sub, c.sort_order as sorder  from categories as c ";

$table=mysqli_query($con,$sql);
?> <div class="container" >

                        <div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Categories  </h4>&nbsp;&nbsp;
                                         <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Category</button>
                                                &nbsp;&nbsp;<button type="button" class="btn btn-primary  waves-effect waves-light" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus"></i>  Sub-Category</button>      
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Categories</a>
                                        </li>
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       

                        <div class="row" style="background-color: white;overflow-y: scroll;">
						<div class="col-xs-12 table-responsive">
						 <table id="cat_list" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Main Category</th>
                                                <th>Status</th>
												<th>Action</th>
												<th>Sort Order</th>
                                                <th>Sub-Category</th>
                                                
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
										
										
										$s.='<tr><td>'.$row['cid'].'</td><td>'.$row['cname'].'</td><td>'.$cstatus.'</td><td><p class="text-center"><span style="color: blue;cursor:pointer"><i class="fa fa-pencil-square  edit_cat" id="catedit_'.$row['cid'].'" title="Edit"></i></span>&nbsp;&nbsp;<span style="color: red;cursor:pointer"><i class="fa fa-remove remove_cat" title="Remove" id="catremove_'.$row['cid'].'"></i></span></p></td>';
										$s.='<td>'.$row['sorder'].'</td>';
										if($row['has_sub']!=0)
											$s.='<td><button type="button" class="btn btn-info viewsub" id="viewsub_'.$row['cid'].'" title="Sub-Category List"><i class="fa fa-eye"></i> Sub-Category</button></td></tr>';
										else
											$s.='<td> No Sub-Category</td></tr>';
										
										
										
										}
										echo $s;
										?>
										</tbody>
										</table>
						</div>
                        </div>

                       
                           



   


                    </div> <!-- container -->

                </div> <!-- content -->
				
				
				 <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">New Category</h4>
                                                </div>
												<label id='um' style='display:none;color:red;'></label>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                            
                                                <fieldset class="form-group">
                                                    <label for="name"><b>Title</b></label>
                                                    <input type="text" class="form-control" id="title_cat"
                                                           placeholder="Enter Title">
                                                    
                                                </fieldset>
												 <div class="switchery-demo">
                                                        
                                                        <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" id='active_cat'/> Active
                                                        
                                                    </div>

                                  
                                                
                                            </form>
                        				</div><!-- end col -->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" id='save_cat' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
									
									
									
									<div id="myModal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">New Sub-Category</h4>
                                                </div>
												<label id='sum' style='display:none;color:red;'></label>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                             <fieldset class="form-group">
                                                   <label for="exampleSelect1"><b>Category</b></label>
                                                    <select class="form-control data" id="main_cat">
                                                       <?php
													   $html='<option value="">--Choose Category--</option>';
													   $sql="select name, id from categories where active=1";
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
                                                    <input type="text" class="form-control" id="title_sub"
                                                           placeholder="Enter Title">
                                                    
                                                </fieldset>
												 <div class="switchery-demo">
                                                        
                                                        <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a" id='active_sub'/> Active
                                                        
                                                    </div>

                                  
                                                
                                            </form>
                        				</div><!-- end col -->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" id='save_sub' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
									<script>
$(document).ready(function(){
	if ( $.fn.dataTable.isDataTable( '#cat_list' ) ) {
    table = $('#cat_list').DataTable({"order": [[ 1, 'desc' ]]});
	
}
else {
	$("#cat_list").dataTable({"order": [[ 4, 'asc' ]]
        
       });
}
	 
		


		 
		
		

		
});
</script>




				
				 <div id="update_cat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Modify Category</h4>
                                                </div>
												<input type="hidden" id='hcat_id' value=''>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                            
                                                <fieldset class="form-group">
                                                    <label for="name"><b>Title</b></label>
                                                    <input type="text" class="form-control" id="title_cat_update"
                                                           placeholder="Enter Title">
                                                    
                                                </fieldset>
												 <div class="switchery-demo">
                                                        
                                                        <input type="checkbox"  data-plugin="switchery" data-color="#1bb99a" id='active_cat_update'/> Active
                                                        
                                                    </div>

                                  
                                                
                                            </form>
                        				</div><!-- end col -->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" id='update_cat1' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->