(function($){
	$('html').themeshortcode({
		id							: 'break',
		title 						: 'Insert break <br>',			
		image						: 'enter.png',
		showWindow					: true,		
		fields						: [ {type : 'label', name : 'insert break <br> into content', id : 'txt'} ] 
	}, 
	function(ed, url, options) 
	{	
	
		var html = '[break]';
		ed.execCommand('mceInsertContent', false, html);
	});
})(jQuery);