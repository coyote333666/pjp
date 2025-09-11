<div class="column" id="section-1">
<?php
	/**
	 * pjp - PHP Jquery UI portal
	 *
	 * @see https://github.com/coyote333666/pjp The pjp GitHub project
	 *
	 * @author    Vincent Fortier <coyote333666@gmail.com>
	 * @copyright 2022 Vincent Fortier
	 * @license   http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
	 * @note      This program is distributed in the hope that it will be useful - WITHOUT
	 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
	 * FITNESS FOR A PARTICULAR PURPOSE.
	 */

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
			$filename = $portlet[$z] . ".php";
			if (file_exists($filename))
			{
				require_once($filename);
			}
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
			$filename = $portlet[$z] . ".php";
			if (file_exists($filename))
			{
				require_once($filename);
			}
		}
	}
?>
</div>


