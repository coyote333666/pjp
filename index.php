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

	session_start();
	$_SESSION["user_id"]	= "10";

	define("FILE_FUNCTION"			, "function.php");
	define("FILE_BODY"				, "body.php");
	define("FILE_FOOTER"			, "footer.php");
	define("S_FILE_PORTLET_01"		, "portlet_01.php");
	define("S_FILE_PORTLET_02"		, "portlet_02.php");
	define("S_FILE_PORTLET_03"		, "portlet_03.php");
	define("S_FILE_PORTLET_04"		, "portlet_04.php");
	define("S_FILE_PORTLET_UPDATE"	, "portlet_update.php");
	define("FILE_HEADER"			, "header.html");
	define("PG_SERVER"				, "localhost");
	define("PG_USERNAME"			, "test");
	define("PG_PASSWORD"			, "test");
	define("PG_DATABASE"			, "test");
	define("PG_PORT"				, "5432");						
	define("S_DIR_JQUERY_UI"		, "jquery-ui-1.13.1.custom/");
	define("S_DIR_JQUERY"			, "jquery-ui-1.13.1.custom/external/jquery/");
	define("S_FILE_JQUERY"			, S_DIR_JQUERY	. "jquery.js");
	define("S_FILE_JQUERY_UI_JS"	, S_DIR_JQUERY_UI	. "jquery-ui.min.js");
	define("S_FILE_JQUERY_UI_CSS"	, S_DIR_JQUERY_UI	. "jquery-ui.min.css");
	define("S_PARAMETER_REDIRECTOR"	, "page=");


	require_once(FILE_FUNCTION);

	require_once(FILE_HEADER);

	echo('</head>');
	echo('<body>');
	
	require(FILE_BODY);

	if(isset($_GET["page"]))
	{
		require_once($_GET["page"]);
	}

	require(FILE_FOOTER);
	
	echo('</body>');
	echo('</html>');
?>
