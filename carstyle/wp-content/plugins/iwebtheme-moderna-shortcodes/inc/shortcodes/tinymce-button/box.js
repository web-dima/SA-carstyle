(function($){
	$('html').themeshortcode({
		id							: 'box',
		title 						: 'Insert content box',			
		image						: 'block.png',
		showWindow					: true,	
		fields						: [	{type : 'text'  , name : 'Box title'     		, id: 'title'}, 
										{type : 'textarea'  , name : 'Box content'     	, id: 'content'}, 
										{type : 'spacer'  , name : 'spacer'}, 
		      						   								
										{type : 'text'  , name : 'Box icon (font-awesome icon e.g fa-desktop)'    , id: 'icon'}, 
										{type : 'spacer'  , name : 'spacer'}, 
										{type : 'text'  , name : 'Box button text'     		, id: 'btntxt'},
										{type : 'text'  , name : 'Box button link url'     		, id: 'url'} ]
	}, 
	function(ed, url, options) 
	{
		var title		= $('#'+options.pluginprefix + 'title').val();
		var content		= $('#'+options.pluginprefix + 'content').val();
		var icon		= $('#'+options.pluginprefix + 'icon').val();
		var btntxt		= $('#'+options.pluginprefix + 'btntxt').val();
		var url		= $('#'+options.pluginprefix + 'url').val();

		var html = '[box title="'+ title +'" icon="'+ icon +'" button="'+ btntxt +'" url="'+ url +'" content="'+ content +'"]<br />';

				
		ed.execCommand('mceInsertContent', false, html);
	});
})(jQuery);