$.getJSON('https://nres.naturalretreats.com/rest/ews/gettagdata?p_site=1&p_key=TASD234DFH', function (data) {
 
 $.each(data, function (key, val) {
	 
		if(val.tagname == "Nav"){
		var items = [],items2='' ,  $ul;
		 $.each(val.tagdata, function (key2, val2) {
			//console.log(val2);
			//alert(val2.tagcontent);
			(val2.taglink == null)? val2.taglink='#' : '';
			//items.push('<li><a href="'+val2.taglink+'">'+val2.tagcontent+'</a>');
			var items2='';
			$.each(val2.tagdata, function (key3, val3) {
				
				items2 +='<li><a href="'+val3.taglink+'">'+val3.tagcontent+'</a></li>';
				
			});
			if(items2 != ''){
			items2 = '<ul>'+items2+'</ul>';
			}
				items.push('<li><a href="'+val2.taglink+'">'+val2.tagcontent+'</a>'+items2+'</li>');
		 });
		 $ul = $('<ul />').appendTo('#nav');
					
		//append list items to list
		$ul.append(items);
		}
		
		if(val.tagname == "Title" && val.pagename == 'Booking'){
		 $.each(val.tagdata, function (key2, val2) {
			//console.log(val2);
			$('#banner_title').html('<h2>'+val2.tagcontent+' by <strong>Natural Retreats</strong>.</h2>');
					 
		 });		 
		
		}
		
		if(val.tagname == "Banner" && val.pagename == "Home"){
		  var val2 = val.tagdata[0];
			//console.log(val2);
			$('#header').css("background", "url("+val2.tagcontent+") no-repeat");
					 
		 
		 }
		 
		 if(val.tagname == "Summary" && val.pagename == 'Booking'){
		  $.each(val.tagdata, function (key2, val2) {
			//console.log(val2);
			$('#banner_desc').html('<p>'+val2.tagcontent+' </p>');
					 
		 });
		 }
		$('#nav > ul').dropotron({
				mode: 'fade',
				speed: 350,
				noOpenerFade: true,
				alignment: 'center'
			});
	 
 });
// everything inside here happens once the data is successfully returned        
 
});





