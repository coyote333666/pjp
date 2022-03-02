<?php

	$sQuery =
	"
		SELECT 	header
		FROM portlet
		WHERE portlet_name = 'portlet_01'
	";
	
	$oRecordset = fncQueryPg($sQuery);
	$header ='';
	$header = $oRecordset[0]["header"]["VALUE"];
	if(sizeof($oRecordset) > 0)
	{
		$header = $oRecordset[0]["header"]["VALUE"];
	}
	
?>
	<div class="portlet" id="portlet_01">
		<div class="portlet-header" id="portlet-header-01"><?php echo($header); ?></div>
		<div class="portlet-content" id="portlet-content-01">
		<?php
			$sQuery = "SELECT * FROM portlet
				";
				$oPortlet = fncQueryPg($sQuery);
				fncEchoArray($oPortlet);
		
		?>
		</div>
	</div>
