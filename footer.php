<script>
	$( function() {

	var showOrHide = <?php
		$sQuery =
		"
			SELECT portlets_state,portlets_left,portlets_right
			FROM portlet_user
			WHERE user_id 				= " . fncSetInt($_SESSION["user_id"])	. ";
		";
		$oRecordset = fncQueryPg($sQuery);	
		if(!empty($oRecordset[0]["portlets_state"]["VALUE"]))
		{
			echo($oRecordset[0]["portlets_state"]["VALUE"]);
		} 
		else
		{
			if(!empty($oRecordset[0]["portlets_left"]["VALUE"]))
			{
				$portlet = explode(",", $oRecordset[0]["portlets_left"]["VALUE"]);
			}
			if(!empty($oRecordset[0]["portlets_right"]["VALUE"]))
			{
				$section_2 = explode(",", $oRecordset[0]["portlets_right"]["VALUE"]);
				for($z=0; $z<sizeof($section_2); $z++)
				{
					array_push($portlet,$section_2[$z]);
				}	
			}
			for($z=0; $z<sizeof($portlet); $z++)
			{
				$key = str_replace('portlet_','portlet-content-',$portlet[$z]);
				$aPortlet[$key] = 1;
			}	
			echo(json_encode($aPortlet));
		} ?>;
	
	$( ".column" ).sortable({		
		connectWith: ".column",
		handle: ".portlet-header",
		cancel: ".portlet-toggle",
		placeholder: "portlet-placeholder ui-corner-all",
        update: function (event, ui) {
			var list =  $(this).sortable("toArray").join(",");
			var data = { 
						'section': this.id,              
						'components': list
						}
			$.ajax({
				data: data,
				type: 'POST',
				url: '<?php echo("?" . S_PARAMETER_REDIRECTOR .S_FILE_PORTLET_UPDATE); ?>'
			}); 
		}
	});
	$( ".portlet" )
		.addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
		.find( ".portlet-header" )
		.addClass( "ui-widget-header ui-corner-all" )
		.prepend( "<span id='s1' class='ui-icon ui-icon-minusthick portlet-toggle'></span>");	
	$( ".portlet-toggle" ).on( "click", function() {
		var icon = $( this );
		icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
		icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
		var x = icon.closest( ".portlet" ).find( ".portlet-content" ).attr("id"); 

		if ( showOrHide[x] == 1 ) 
		{
			showOrHide[x] = 0;
		} 
		else if ( showOrHide[x] == 0 ) 
		{
			showOrHide[x] = 1;
		}		

		var data = { 
						'state' : JSON.stringify(showOrHide)					
					}
		$.ajax({
			data: data,
			type: 'POST',
			url: '<?php echo("?" . S_PARAMETER_REDIRECTOR .S_FILE_PORTLET_UPDATE); ?>'
		}); 		
	});
	$(window).ready(function()
	{
		for (var k in showOrHide)
		{
			var last2 = k.slice(-2);
			if (showOrHide.hasOwnProperty(k)) 
			{
				if (showOrHide[k] == 1 ) 
				{
					$('#' + k).show();
				} 
				else if (showOrHide[k] == 0 ) 
				{
					$('#' + k).hide();
					$('#portlet-header-' + last2 + ' #s1.ui-icon-minusthick').removeClass('ui-icon-minusthick').addClass('ui-icon-plusthick');
				}
			}
		}
	});
	});
</script>


