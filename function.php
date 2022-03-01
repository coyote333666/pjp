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

	function fncQueryPg
	(
		$pQuery		= "SELECT 1"
		, $pServer		= PG_SERVER
		, $pUsername	= PG_USERNAME
		, $pPassword	= PG_PASSWORD
		, $pDatabase	= PG_DATABASE
		, $pPort		= PG_PORT		
	)
	{

		$ressource	= array();
		$row		= array();
		$recordset	= array();
		
		$connection = pg_connect("host=" . $pServer . " port=" . $pPort . " dbname=" . $pDatabase . " user=" . $pUsername . " password=" . $pPassword);

		if( $connection === false ) 
		{
    	die( print_r( pg_last_error(), true));
		}
 		$ressource = pg_query($connection, $pQuery);
		$num_rows = pg_num_rows($ressource);

		if(!is_bool($ressource))
		{
			$y = 0;	
			while($row = pg_fetch_array($ressource, null, PGSQL_ASSOC))
			{			
				for($x=0; $x<pg_num_fields($ressource); $x++)
				{
					$fieldName	= pg_field_name($ressource, $x);

					if($y == 0)
					{
						$fieldType	= pg_field_type($ressource, $x);
						$fieldSize	= pg_field_size($ressource, $x);
					
						$recordset[$y][$fieldName]['FIELD_NAME']	= $fieldName;
						$recordset[$y][$fieldName]['FIELD_TYPE']	= $fieldType;
						$recordset[$y][$fieldName]['FIELD_SIZE']	= $fieldSize;
					}
					
					$recordset[$y][$fieldName]['VALUE'] = $row[$fieldName];
				}
				
				$y ++;
			}
	
			pg_free_result($ressource);
		}
		pg_close($connection);
		
		unset($row);
		unset($ressource);
		
		return($recordset);
	}

	function fncSetInt($psString)
	{
		if(strlen($psString) > 0)
		{
			$psString = intval($psString);
			return($psString);
		}
		
		else
		{
			return("NULL");
		}
	}

	function fncSetString($psString = "", $pbReplace = true)
	{
		if(strlen($psString) > 0)
		{
			$psString = trim($psString);
			
			if($pbReplace == true)
			{
				$psString = str_replace("*", "%", $psString);
				$psString = str_replace("?", "_", $psString);
				$psString = str_replace("‘", "'", $psString);
				$psString = str_replace("’", "'", $psString);
				$psString = str_replace(";", "", $psString);
			}
						
			// Replace single quotes with double quotes
			$psString = str_replace("'", "''", $psString);
			
			// Add quotes to the string in order to be able to send it to the database server
			$psString = "'" . $psString . "'";
		}
		
		else
		{
			$psString = "NULL";
		}
		
		return($psString);
	}

	// Displaying a simplified table
	function fncEchoArray($poResult = array(), $psTitle = "")
	{
		if(sizeof($poResult) > 0)
		{
			$iColSpan = sizeof($poResult[0]);
		}
		else
		{
			$iColSpan = 1;
		}
		
		$sContent = "<p>"; 
		$sContent .= "<table border='1px' cellpadding='0px' cellspacing='0px'>";
		
		// *****************************************************************************
		// display of a title
		if(strlen($psTitle) > 0)
		{
			$sContent .= "<tr>";
			$sContent .= "<th colspan='" . $iColSpan . "' class='data'>" . $psTitle . "</th>";
			$sContent .= "</tr>";
		}
		// *****************************************************************************
		
		// If results are present in the batch of records...
		if(sizeof($poResult))
		{
			// *****************************************************************************
			// Display of field names
			$sContent .= "<tr>";
			
			foreach($poResult[0] as $sKey => $sValue)
			{
				$sContent .= "<th>" . $sKey . "</th>";
			}
			
			$sContent .= "</tr>";
			// *****************************************************************************
			
			for($y=0; $y<sizeof($poResult); $y++)
			{
				$sContent .= "<tr class='alternate'>";
				
				foreach($poResult[$y] as $sKey => $sValue)
				//for($x=0; $x<sizeOf($poResult[$y]); $x++)
				{
					$sContent .= "<td>" . $poResult[$y][$sKey]['VALUE'] . "</td>";
				}
				
				$sContent .= "</tr>";
			}
			
			$sContent .= "</table>";
			$sContent .= "</p>";
		}
		
		// If no results are present in the batch of records...
		else
		{
			$sContent .= "<tr>";
			$sContent .= "<td>0 résultat</td>";
			$sContent .= "</tr>";
		}
		
		$sContent .= "</table>";
		$sContent .= "</p>";
		
		echo($sContent);
	}	

?>

