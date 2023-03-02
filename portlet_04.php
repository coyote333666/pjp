<?php

	$sQuery =
	"
		SELECT 	header
		FROM portlet
		WHERE portlet_name = 'portlet_04'
	";
	
	$oRecordset = fncQueryPg($sQuery);
	$header ='';
	if(sizeof($oRecordset) > 0)
	{
		$header = $oRecordset[0]["header"]["VALUE"];
	}
	
?>
	<div class="portlet" id="portlet_04">
		<div class="portlet-header" id="portlet-header-04"><?php echo($header); ?></div>
		<div class="portlet-content" id="portlet-content-04">
		<h2> This is portlet_04 </h2>
        <br>
        <h3> lorem ipsum </h3>
		</div>
	</div>


