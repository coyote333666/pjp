<div class="column" id="section-1">
<?php
	$sQuery =
	"
		SELECT portlets_left,portlets_right
		FROM portlet_user
		WHERE user_id 				= " . fncSetInt($_SESSION["user_id"])	. ";
	";
	$oRecordset = fncQueryPg($sQuery);
	$section_1 = $oRecordset[0]["portlets_left"]["VALUE"];
	$section_2 = $oRecordset[0]["portlets_right"]["VALUE"];

	if(!empty($section_1))
	{
		$portlet = explode(",", $section_1);
		for($z=0; $z<sizeof($portlet); $z++)
		{
			require_once($portlet[$z] . ".php");
		}
	}
	
?>
</div>
<div class="column" id="section-2">
<?php
	if(!empty($section_2))
	{
		$portlet = explode(",", $section_2);
		for($z=0; $z<sizeof($portlet); $z++)
		{
			require_once($portlet[$z] . ".php");
		}
	}
?>
</div>


