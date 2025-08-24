(function($){
	$('html').themeshortcode({
			id							: 'latestposts',
			title 						: 'Insert latest posts slider (works in fullwidth page without sidebar)',			
			image						: 'posts.png',
			showWindow					: true,	
			fields						: [ {type : 'label',      name : 'Latest posts within carousel slider'	, id: 'info'},
											{type : 'text'  , name : 'Latest posts numbers in slide (number only)'    , id: 'tescount'}]
		}, 
		function(ed, url, options) 
		{
			var title 			= $('#'+options.pluginprefix + 'testitle').val();
			var count 			= $('#'+options.pluginprefix + 'tescount').val();

			
			var html = '[latestposts count="'+count+'"]LATEST POSTS[/latestposts]';			
			ed.execCommand('mceInsertContent', false, html);
		});
})(jQuery);