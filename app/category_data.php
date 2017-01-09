<?php
	require_once("db.php");
	$aColumns_select = array('cat_id','cat_name','cat_active','sub_name','sub_active');
	$aColumns_output = array('categories.id as cat_id','categories.name as cat_name','categories.active cat_active','sub_categories.name as sub_name','sub_categories.active as sub_active');
	$aColumns_where = array('categories.id as cat_id','categories.name as cat_name','categories.active cat_active','sub_categories.name as sub_name','sub_categories.active as sub_active');
	
	$sIndexColumn = "categories.id";
	
	$sTable = "categories";
	$sJoin = "inner join sub_categories on categories.id=sub_categories.parent";
	
	
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysqli_real_escape_string($con,$_GET['iDisplayStart']).", ".
			mysqli_real_escape_string($con,$_GET['iDisplayLength']);
	}
	
	
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns_output[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".mysqli_real_escape_string($con,$_GET['sSortDir_'.$i]) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}

	
	
	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns_where) ; $i++ )
		{
			$sWhere .= $aColumns_where[$i]." LIKE '%".mysqli_real_escape_string($con,$_GET['sSearch'])."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	for ( $i=0 ; $i<count($aColumns_where) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns_where[$i]." LIKE '%".mysqli_real_escape_string($con,$_GET['sSearch_'.$i])."%' ";
		}
	}
	
	
	if($sWhere=="")
	$sWhere=" ".$_REQUEST["where"];
	else
	$sWhere.=$_REQUEST["where"];
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns_output))."
		FROM   $sTable
		$sJoin
		$sWhere
		$sOrder
		$sLimit
	";
	

		$sQuery=stripslashes($sQuery);
	$rResult = mysqli_query($con,$sQuery);
	$sQuery = "SELECT FOUND_ROWS() as cnt";
	$rResultFilterTotal = mysqli_query($con,$sQuery);
	$aResultFilterTotal = mysqli_fetch_assoc($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal['cnt'];
	
	$sQuery = "SELECT COUNT(".$sIndexColumn.") as cnt FROM  $sTable";
	$rResultTotal = mysqli_query($con,$sQuery);
	$aResultTotal = mysqli_fetch_assoc($rResultTotal);
	$iTotal = $aResultTotal['cnt'];
	
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);

	while ($aRow=mysqli_fetch_assoc($rResult))
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumns_select) ; $i++ )
		{
			
		
				$row[] = ($aRow[$aColumns_select[$i]]?$aRow[$aColumns_select[$i]]:'0');
			
			
		}
		$output['aaData'][] = $row;
	}
	echo json_encode( $output );
?>