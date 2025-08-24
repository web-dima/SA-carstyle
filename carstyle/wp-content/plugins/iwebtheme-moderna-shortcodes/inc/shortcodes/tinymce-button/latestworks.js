(function($){
	$('html').themeshortcode({
			id							: 'latestworks',
			title 						: 'Insert latest works (works in 12 columns size)',			
			image						: 'works.png',
			showWindow					: true,	
			fields						: [ {type : 'label',      name : 'Latest works'	, id: 'info'},
											{type : 'text'  , name : 'Latest works title'    , id: 'workstitle'},
											{type : 'text'  , name : 'Latest works numbers (number only)'    , id: 'workscount'}]
		}, 
		function(ed, url, options) 
		{
			var title 			= $('#'+options.pluginprefix + 'workstitle').val();
			var count 			= $('#'+options.pluginprefix + 'workscount').val();

			
			var html = '[latestworks title="'+title+'" count="'+count+'"]';			
			ed.execCommand('mceInsertContent', false, html);
		});
})(jQuery);