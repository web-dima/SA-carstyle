(function($){
	$('html').themeshortcode({
		id							: 'pricingbox',
		title 						: 'Insert pricing box (one by one package table)',			
		image						: 'pricingbox.png',
		showWindow					: true,	
		fields						: [ 								 
										{ type : 'select' , name : 'Table column type'	, id: 'select-type', option : ['normal', 'special']},
										{type : 'text'  , name : 'Package title'     , id: 'packtitle'},
										{type : 'text'  , name : 'Currency'     , id: 'currency'},
										{type : 'text'  , name : 'Price'     , id: 'price'},
										{type : 'text'  , name : 'Pricing period (e.g monthly)'     , id: 'period'},
										{type : 'text'  , name : 'Button Url'     , id: 'btnurl'},
										{type : 'text'  , name : 'Button Text'    , id: 'btntxt'}] 
	}, 
	function(ed, url, options) 
	{
		var type 	= $('#'+options.pluginprefix + 'select-type').val();
		var packtitle = $('#'+options.pluginprefix + 'packtitle').val();
		var currency = $('#'+options.pluginprefix + 'currency').val();	
		var price = $('#'+options.pluginprefix + 'price').val();	
		var period = $('#'+options.pluginprefix + 'period').val();	
		var url = $('#'+options.pluginprefix + 'btnurl').val();
		var btntxt = $('#'+options.pluginprefix + 'btntxt').val();

		
		var html = '[pricingtable type="'+type+'"]<br />';

			html += '[pricing-heading type="special" title="'+packtitle+'" curr="'+currency+'" price="'+price+'" period="'+period+'"]<br />';

			
			html += '[pricing-features]<br />';

			html += '[pricing-list]3 Users[/pricing-list]<br />';
			html += '[pricing-list]2 Domains[/pricing-list]<br />';
			html += '[pricing-list]2 Databases[/pricing-list]<br />';
			html += '[pricing-list]4 Email accounts[/pricing-list]<br />';

			html += '[/pricing-features]<br />';

			html += '[pricing-button text="'+btntxt+'" url="'+url+'"]<br />';


			
			html += '[/pricingtable]';
			
		ed.execCommand('mceInsertContent', false, html);
	});
})(jQuery);