(function($){
	$('html').themeshortcode({
		id							: 'container',
		title 						: 'Insert content container',			
		image						: 'container.png',
		showWindow					: true,
		windowWidth					: 800,
		fields						: [ {type : 'select', name : 'Select container style', id : 'select-style' , option : ['white background', 'no background']} ,					
										{type : 'select'  , name : 'Add additional container margin bottom'     , id: 'select-mbot' , option : ['0','15px', '20px', '25px', '30px', '35px', '50px', '135px']},
										{type : 'select'  , name : 'Container padding'     , id: 'select-pad' , option : ['none','padding left right 5px', 'padding left right 15px', 'padding bottom 20px', 'padding all 15px']},
										{type : 'select'  , name : 'Add clearfix'     , id: 'select-clear' , option : ['no','clearfix']}
										] 
	}, 
	function(ed, url, options) 
	{	
		var constyle 	= $('#'+options.pluginprefix + 'select-style').val();
		var conmbot 	= $('#'+options.pluginprefix + 'select-mbot').val();
		var conpad 	= $('#'+options.pluginprefix + 'select-pad').val();
		var conclear 	= $('#'+options.pluginprefix + 'select-clear').val();
		
	
		var mbotclass = '';
		if(conmbot == "0") {
			mbotclass = 'no';
		} else if(conmbot == "15px") {
			mbotclass = 'm-bot-15';
		} else if(conmbot == "20px") {
			mbotclass = 'm-bot-20';
		} else if(conmbot == "25px") {
			mbotclass = 'm-bot-25';
		} else if(conmbot == "30px") {
			mbotclass = 'm-bot-30';
		} else if(conmbot == "35px") {
			mbotclass = 'm-bot-35';
		} else if(conmbot == "50px") {
			mbotclass = 'm-bot-50';
		} else if(conmbot == "135px") {
			mbotclass = 'm-bot-135';
		}
		
		var classbg = '';
		if(constyle == "white background") {
			classbg = 'content-container-white';
		} else if(constyle == "no background") {
			classbg = 'content-container';
		}
		
		var classpad = '';
		if(conpad == "none") {
			classpad = 'nopadding';
		} else if(conpad == "padding left right 5px") {
			classpad = 'pad-l-r-5';
		} else if(conpad == "padding left right 15px") {
			classpad = 'padding-l-r-15';
		} else if(conpad == "padding all 15px") {
			classpad = 'padding-all-15';
		} else if(conpad == "padding bottom 20px") {
			classpad = 'padding-bot-20';
		}


var html = '[container style="'+ classbg +'" padding="'+ classpad +'" marginbottom="'+ mbotclass +'" clear="'+ conclear +'"]<br />';
	html += 'your content here';
	html += '<br />[/container]';

		ed.execCommand('mceInsertContent', false, html);
	});
})(jQuery);