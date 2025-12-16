<?php

if (!defined('WHMCS')) {
        exit('This file cannot be accessed directly');
}

/**
 * Module Log: sort by ID (found in the a href)
 */
add_hook('AdminAreaFooterOutput', 100, function($vars){

	if ($vars['filename'] == 'logs/module-log'):

$output = <<<HTML
<script>
jQuery(document).ready(function($) {
	//Add ID column header
	$('#tblModuleLog thead tr').prepend('<th width="20">ID</th>');
	//Add ID column values
	$('#tblModuleLog tbody tr').each(function(){
  		href = $(this).find('td a').attr('href');
		id = href.split('/').pop();
		$(this).prepend('<td>' + id + '</td>');
	});
	new DataTable('#tblModuleLog', {
    	order: [[0, 'asc']]
	});
});
</script>
HTML;

		return $output;
	endif;

});