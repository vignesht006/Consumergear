<?php
include_once 'db.php';
?>
<script>
$(document).ready(function(){
	if ( $.fn.dataTable.isDataTable( '#product_list' ) ) {
		table = $('#product_list').DataTable();
	}
	else
	{
	$("#product_list").dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "product_table.php?where=",
        "fnDrawCallback" : function(data)
         {
         }
       });
	}
	 
		
		
});
</script>
<div class="row" >
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Products  </h4>&nbsp;&nbsp;
                                         <button type="button" class="btn btn-success waves-effect waves-light" id='new_product'><i class="fa fa-cube"></i> New Product</button>
                                                 
                                    <ol class="breadcrumb p-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">products</a>
                                        </li>
                                        
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
						 <div class="row" style="background-color: white">
						 <div class="col-xs-12">
<table class="container table table-bordered" id='product_list'>
    <thead>
      <tr>
       
        <th>Name</th>
		<th>Brand</th>
		<th>UAN</th>
		<th>Price($)</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
	</div>
	</div>