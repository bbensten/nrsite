$(document).ready(function()
{
$.ajax({
            url: "proxy-php/nav-feed.php",
            cache: false,
            dataType: "json",
            complete: function(data) {
                           			 
			 var data2=data.responseJSON;
			 //console.log(data2);
				
						
			var items3='';
			var imgpath;
			$.each(data2, function (key, val) {
			var items = [],items2='' , items3='' ,  $ul, $ul2;
				 $.each(val.tagdata, function (key2, val2) {
					//console.log(val2);
					//alert(val2.tagcontent);
					(val2.taglink == null)? val2.taglink='#' : '';
					items3 +='<li><a href="'+val2.taglink+'">'+val2.tagcontent+'</a></li>';
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
				 $ul2 = $('<ul />').appendTo('#nav-footer');			
				//append list items to list
				$ul.append(items);
				$ul2.append(items3);
			});
			
			$('#nav > ul').dropotron({
				mode: 'fade',
				speed: 350,
				noOpenerFade: true,
				alignment: 'center'
			});
			
			}
	});


$.getJSON('https://nres.naturalretreats.com/rest/ews/gettagdata?p_site=1&p_key=TASD234DFH', function (data) {
 
 $.each(data, function (key, val) {
	 
				
		if(val.tagname == "Title" && val.pagename == 'Accommodation'){
		 $.each(val.tagdata, function (key2, val2) {
			//console.log(val2);
			$('#banner_title').html('<h2>'+val2.tagcontent+'</h2>');
					 
		 });		 
		
		}
		
		if(val.tagname == "Banner" && val.pagename == 'Accommodation'){
		  var val2 = val.tagdata[0];
			//console.log(val2);
			$('#header').css("background", "url("+val2.tagcontent+") no-repeat");
					 
		 
		 }
		 
		 if(val.tagname == "Summary" && val.pagename == 'Accommodation'){
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
			
		$(function() {
			$( "#datepicker" ).datepicker();
		  });	
	 
 });
// everything inside here happens once the data is successfully returned        
 
});
});

/* $.getJSON('https://nres.naturalretreats.com/rest/ews/getcategories_full?p_site=1&p_rows=5&p_rowset=1&p_key=TASD234DFH', function (data) {
//console.log(data);
	$.each(data.categorydata, function (key, val) {
	//console.log(val);
		
		//console.log(val2);
		var imgpath  = val.images[0].url;
		
			
			$('#nr_slider').append('<article class="4u special"> <a href="#" class="image featured"><img src="'+imgpath+'" alt="" /></a> 	<header> <h3> <a href="#" >'+val.categoryname.substr(0,20)+'</a></h3>	</header> <p>'+val.headline.substr(0,70)+' </p> </article>');
		
	});						
}); */


function searchProperties(){

		 var ploc= '';
		 var pbeds = 0;
		 var pdate='';
		 var str='';
		 
			ploc = $('#selLocation').val();
			pbeds = $('#edit-bedrooms').val();
			pdate = $('#datepicker').val().toUpperCase();
			
			if(pdate !=''){
			str = "pdate="+pdate+"&pnight=1";
			}
			$('#resultLoading').css({
					'background':'#fff',
					'opacity':'0.5',
					'width':'100%',
					'height':'100%',
					'position':'absolute',
					'top':'0',
					'z-index':'999'
					
				});
				$('#resultLoading').fadeIn(300);
				$.ajax({
					url: "proxy-php/data-feed.php?"+str,
					cache: false,
					dataType: "json",
					complete: function(data) {
					
					$('#propertyList').html('');
					var data2=data.responseJSON;
						var count=0;
						//console.log(data2);
						$.each(data2.categorydata, function (key, val) {
						
						if(ploc == '' || val.locationid == ploc){
						
							if(val.bedrooms > pbeds){
								
							
							if(val.images.length > 0){
							var imgpath  = val.images[0].url;
							}
							else{
							var imgpath  = '';
							}
									
						
						$('#propertyList').append('<div  class="villa" id="H-'+val.categoryid+'">         <div class="villaImageContainer">             <a href="booking.php?pid='+val.categoryid+'" id="villaLinkImage'+val.categoryid+'" class="villaLink villaLinkImage">                           <img alt="" style="" src="'+imgpath+'" >                            <div class="villaPromo "></div>                      </a> </div>                    <div class="villaDescription">                        <h3 itemprop="name"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkTitle">'+val.categoryname+'</a></h3>                        <p class="service"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkDestination">Sleeps: '+val.sleeps+', Bedrooms: '+val.bedrooms+' </a></p>                        <p class="pricing"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkRates">From: $<span class="biggerText">'+val.fromprice+'</span> / night</a></p>                        <a href="booking.php?pid='+val.categoryid+'" class="villaLink viewVillaButton button small buttonPrimary" >VIEW HOME</a>                    </div>               </div>');
									
								count++;
								}
								}
							});
						$('#resultsNumber').html(count);
						$('#resultLoading').fadeOut();
					}
				});
				
			}
