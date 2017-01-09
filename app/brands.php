 <?php
include_once 'db.php';


$sql="select * from brands";

$table=mysqli_query($con,$sql);

?>
<script>
$(document).ready(function()
{
	$("#brand_form").submit(function(e) {
    e.preventDefault();
    var url = "save_brand.php"; // the script where you handle the form input.
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
            $('.content').load('brands.php');
           }
         });

     // avoid to execute the actual submit of the form.
});		
});


</script>

 <div class="container"  >
                        <div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title"> Brands </h4>&nbsp;&nbsp;
                                         
                                                &nbsp;&nbsp;<button type="button" class="btn btn-primary  waves-effect waves-light" data-toggle="modal" data-target="#modal_brand"><i class="fa fa-shield"></i>  New Brand</button>      
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">Brand</a>
                                        </li>
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->
                       

                        <div class="row" style="background-color: white;overflow-y: scroll;">
						<div class="col-xs-12 table-responsive">
						 <table id="brand_list" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                  <th>ID</th>
                                                  <th>Name</th>
												  <th>Logo</th>
                                                  <th>Action</th>                                             
                                            </tr>
                                        </thead>


                                        <tbody>
										<?php
										$s='';
										while($row=mysqli_fetch_array($table))
										{
											
										$s.='<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td></td><td><img src="'.$row['bg_path'].'"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100" ></td><td><span style="color: blue;cursor:pointer"><i class="fa fa-pencil-square edit_logo" id="logoedit_'.$row['cid'].'" title="Edit"></i></span>&nbsp;&nbsp;&nbsp;<span style="color: red;cursor:pointer"><i class="fa fa-remove remove_brand" title="Remove" id="logoremove_'.$row['id'].'" ></i></span></p></td></tr>';
										
										
										
										
										}
										echo $s;
										?>
										</tbody>
										</table>
						</div>
                        </div>

                       
                           



   


                    </div> <!-- container -->

                </div> <!-- content -->
				
				
				 
									
									
									
									<div id="modal_brand" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
											<form name="new_brand" id='brand_form'  enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="myModalLabel">New Brand</h4>
                                                </div>
												
                                                <div class="modal-body">
                                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                                <fieldset class="form-group">
                                                    <label for="name"><b>Name</b></label>
                                                    <input type="text" name='brand_name' class="form-control" id="brand_name"
                                                           placeholder="Enter Title" required>
                                                    
                                                </fieldset>
												
												<fieldset class="form-group">
                                                    <label for="name"><b>Logo</b></label>
                                                    <input  type="file" name='p_logo' required>
                                                    
                                                </fieldset>
                                  
                                                
                                            
                        				          </div><!-- end col -->
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" id='save_brand' class="btn btn-success waves-effect waves-light">Save changes</button>
                                                </div>
												</form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
									<script>
$(document).ready(function(){
	if ( $.fn.dataTable.isDataTable( '#brand_list' ) ) {
    table = $('#brand_list').DataTable();
}
else {
	$("#brand_list").dataTable({
        
       });
}
	 
		
});
</script>


