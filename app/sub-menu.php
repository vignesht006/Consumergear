 <?php
include_once 'db.php';


$sql="select s.id as cid, s.name as cname,s.active as s_status  from sub-categories as s where s.parent=".$_GET['id'];
$table=mysqli_query($con,$sql);
?> <div class="container" >

                        <div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Sub Categories  </h4>&nbsp;&nbsp;
                                         <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Category</button>
                                                &nbsp;&nbsp;<button type="button" class="btn btn-primary  waves-effect waves-light" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus"></i>  Sub-Category</button>      
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Sub-Categories</a>
                                        </li>
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       

                        <div class="row" style="background-color: white;">
						<div class="col-xs-12 table-responsive">
						 <table id="sub_list" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Status</th>
												<th>Action</th>
                                                <th>Main Category</th>
                                                
                                            </tr>
                                        </thead>


                                        <tbody>
										<?php
										$s='';
										while($row=mysqli_fetch_array($table))
										{
										if($row['s_status']==1)
										{
											$sstatus='<span style="color:green;font-weight:bold">Active</span>';
										}
										else
											$sstatus='<span style="color:red;font-weight:bold">Inactive</span>';
										
										
										$s.='<tr><td>'.$row['sid'].'</td><td>'.$row['sname'].'</td><td>'.$sstatus.'</td><td><p class="text-center"><span style="color: blue;cursor:pointer"><i class="fa fa-pencil-square edit_sub" id="subedit_'.$row['sid'].'" title="Edit"></i></span>&nbsp;<span style="color: red;cursor:pointer"><i class="fa fa-remove remove_cat" title="Remove" id="subremove_'.$row['sid'].'"></i></span></p></td></tr>';
										
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
	if ( $.fn.dataTable.isDataTable( '#sub_list' ) ) {
    table = $('#sub_list').DataTable();
}
else {
	$("#sub_list").dataTable({
        
       });
}
	 
		
		
		
		

		
});
</script>