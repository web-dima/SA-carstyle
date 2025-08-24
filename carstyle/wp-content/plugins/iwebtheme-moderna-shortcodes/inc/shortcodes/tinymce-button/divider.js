(function($){
	$('html').themeshortcode({
		id							: 'divider',
		title 						: 'Divider',			
		image						: 'enter.png',
		showWindow					: true,
		fields						: [ { type : 'select' , name : 'Divider type'	, id: 'select-type', option : ['solidline', 'dottedline', 'dashedline', 'blankline']}
										] 
	}, 
	function(ed, url, options) 
	{
		var type 	= $('#'+options.pluginprefix + 'select-type').val();
		
		var html = '[dividerline type="'+type+'"]<br />';		
		ed.execCommand('mceInsertContent', false, html);
	});
})(jQuery);