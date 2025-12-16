<?php

if (!defined('WHMCS')) {
        exit('This file cannot be accessed directly');
}

/**
 * Module Log: sort by ID (found in the a href)
 */
add_hook('AdminAreaFooterOutput', 100, function($vars){

	if ($vars['pagetitle'] == 'System Module Debug Log'):

$output = <<<HTML
<script>
/* Hook: moduleLogSortById */
jQuery(document).ready(function($) {
    if ( $('#tblModuleLog tbody tr').length < 2 ) return;
	//Add ID column header
	$('#tblModuleLog thead tr').prepend('<th width="20">ID</th>');
	//Add ID column values
	$('#tblModuleLog tbody tr').each(function(){
  		href = $(this).find('td a').attr('href');
		id = href.split('/').pop();
		$(this).prepend('<td>' + id + '</td>');
	});
    //Sort by first column
    tbody = $('#tblModuleLog').find('tbody');
    tbody.find('tr').sort(function(a, b) {
        return $('td:first', a).text().localeCompare($('td:first', b).text(), undefined, {'numeric': true});
    }).appendTo(tbody);
});
</script>
HTML;

		return $output;
	endif;

});