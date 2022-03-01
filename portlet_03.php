<?php

	$sQuery =
	"
		SELECT 	header
		FROM portlet
		WHERE portlet_name = 'portlet_03'
	";
	
	$oRecordset = fncQueryPg($sQuery);
	$header ='';
	if(sizeof($oRecordset) > 0)
	{
		$header = $oRecordset[0]["header"]["VALUE"];
	}
	
?>
	<div class="portlet" id="portlet_03">
		<div class="portlet-header" id="portlet-header-03"><?php echo($header); ?></div>
		<div class="portlet-content" id="portlet-content-03">
		<h2> This is portlet_03 </h2>
        <br>
        <h3> lorem ipsum </h3>
		</div>
	</div>


