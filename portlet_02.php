<?php

	$sQuery =
	"
		SELECT 	header
		FROM portlet
		WHERE portlet_name = 'portlet_02'
	";
	
	$oRecordset = fncQueryPg($sQuery);
	$header ='';
	if(sizeof($oRecordset) > 0)
	{
		$header = $oRecordset[0]["header"]["VALUE"];
	}
	
?>
	<div class="portlet" id="portlet_02">
		<div class="portlet-header" id="portlet-header-02"><?php echo($header); ?></div>
		<div class="portlet-content" id="portlet-content-02">
		<?php
			$sQuery = "SELECT * FROM portlet_user
				";
				$oUser = fncQueryPg($sQuery);
				fncEchoArray($oUser);
		
		?>
		</div>
	</div>
