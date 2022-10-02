$(document).ready(function() {
	var items = $('#gallery li'),
			itemsByTags = {};
	
	//Loop through tags
	items.each(function(i) {
		var elem = $(this),
		tags = elem.data('tags').split(',');
	
	//add data attribute for quicksand
	elem.attr('data-id', i);
		
		$.each(tags,function(key,value){
			//remove whitespace
			value = $.trim(value);
			
			if(!(value in itemsByTags)){
				//Add empty value
				itemsByTags[value] = [];
				 }
			//Add image to array
			itemsByTags[value].push(elem);
		});
		});
	
	//create "all items" option
	createList('VIEW ALL',items);
	
	$.each(itemsByTags, function(k, v){
		createList(k,v);
	});
	
	//Click handler
	$('#navbar_w a').on('click',null, function(e){
		var link = $(this);
		
		//add active class
		link.addClass('active').siblings().removeClass('active');
		
		$('#gallery').quicksand(link.data('list').find('li'));
		e.preventDefault();
	});
	$('#navbar_w a:first').click();
	
	//Create list
	function createList(text,items){
		//create empty ul
		var ul = $('<ul>',{'class':'hidden'});
		$.each(items,function(){
			$(this).clone().appendTo(ul)
		});
		//add gallery div
		ul.appendTo('#gallery');
		
		//create menu item
		var a = $('<a>',{
			html:text,
			href:'#',
			data:{list:ul}
		}).appendTo('#navbar_w');
	}
});