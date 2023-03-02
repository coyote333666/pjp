<?php
	
	if(isset($_POST["components"]) && isset($_POST["section"]))
	{
		$sListePortlet = preg_replace('/\,+/', ',', trim($_POST["components"],','));
		if($_POST["section"] == 'section-1')
		{
			$sQuery =
			"
				UPDATE portlet_user
				SET portlets_left	= " . fncSetString($sListePortlet) . "
				WHERE user_id 				= " . fncSetInt($_SESSION["user_id"])	. ";
			";
			fncQueryPg($sQuery);
		}
		if($_POST["section"] == 'section-2')
		{
			$sQuery =
			"
				UPDATE portlet_user
				SET portlets_right	= " . fncSetString($sListePortlet) . "
				WHERE user_id 				= " . fncSetInt($_SESSION["user_id"])	. "
			";
			fncQueryPg($sQuery);
		}
	}
	if(isset($_POST["state"]))
	{
		$sQuery =
		"
			UPDATE portlet_user
			SET portlets_state			= " . fncSetString($_POST["state"]) . "
			WHERE user_id 				= " . fncSetInt($_SESSION["user_id"])	. ";
		";
		fncQueryPg($sQuery);
	}
?>