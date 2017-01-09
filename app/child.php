 <?php
include_once 'db.php';


$sql="select c.id as cid, c.name as cname,c.active as cstatus, c.haschild as child , c.prev as prev  from sub_categories as c  where c.prev=".$_GET['id'];
$sql_main="select name from sub_categories where id=".$_GET['id'];
$main_name=mysqli_fetch_array(mysqli_query($con,$sql_main)); 

print_r($main_name);
$table=mysqli_query($con,$sql);
?> <div class="container"  >
<input type='hidden' id='parent' value='<?php echo $_GET['id'];?>'>
                        <div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">child Categories  </h4>&nbsp;&nbsp;
                                         
                                                &nbsp;&nbsp;<button type="button" class="btn btn-primary  waves-effect waves-light" data-toggle="modal" data-target="#myModal_child"><i class="fa fa-plus"></i>  Child-Category</button>      
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Child Categories</a>
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
                                                 <th>Name</th>
                                              
                                                <th>Status</th>
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
										
										
										$s.='<tr><td>'.$row['cid'].'</td><td>'.$row['cname'].'</td><td>'.$cstatus.'</td><td><p class="text-center"><span style="color: blue;cursor:pointer"><i class="fa fa-pencil-square edit_child" id="childdit_'.$row['cid'].'" title="Edit"></i></span>&nbsp;&nbsp;&nbsp;<span style="color: red;cursor:pointer"><i class="fa fa-remove remove_child" title="Remove" id="childremove_'.$row['cid'].'" parent="'.$_GET['id'].'"></i></span></p></td><td>'.$main_name['name'].'</td>';
										
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
                                                    <h4 class="modal-title" id="myModalLabel">New Child-Category</h4>
                                                </div>
												<label id='sum' style='display:none;color:red;'></label>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                             <fieldset class="form-group">
                                                   <label for="exampleSelect1"><b>Category</b></label>
                                                    <select class="form-control data" id="main_sub">
                                                       <?php
													   $html='<option value="">--Choose Category--</option>';
													   $sql="select name, id from sub_categories where active=1 and prev=".$_GET['id'];
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
                                                    <button type="button" id='save_child' class="btn btn-success waves-effect waves-light">Save changes</button>
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


<div id="update_child" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">Modify Child-Category</h4>
                                                </div>
												<input type="hidden" id='hchild_id' value=''>
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                            
                                                <fieldset class="form-group">
                                                    <label for="name"><b>Title</b></label>
                                                    <input type="text" class="form-control" id="title_child_update"
                                                           placeholder="Enter Title">
                                                    
                                                </fieldset>
												 <div class="switchery-demo">
                                                        
                                                        <input type="checkbox"  data-plugin="switchery" data-color="#1bb99a" id='active_child_update'/> Active
                                                        
                                                    </div>

                                  
                                                
                                            </form>
                        				</div><!-- end col -->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" id='update_child1' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->