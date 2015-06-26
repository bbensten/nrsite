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
			checkMobileNav()
			function checkMobileNav(){
				$ww = $(window).width();
				if($ww < 768){
					$('#nav li a').addClass('link depth-0');
					$('#nav li li a').addClass('link depth-1');
					$('#nav li li a').removeClass('depth-0');
					if($('div[data-args="nav"]').html() == ''){
						$mobileNavHTML	= '<nav>';
						$('#nav li').each(function(){
							$mobileNavHTML	+= $(this).html();
						});
						$mobileNavHTML	+= '</nav>';
						$('div[data-args="nav"]').html($mobileNavHTML);
						$('div[data-args="nav"] a.depth-1').prepend('<span class="indent-1"></span>');
					}
				}
			}
			$(window).resize(function(){
				checkMobileNav();
			});
			
			}
	});


$.getJSON('https://nres.naturalretreats.com/rest/ews/getcategories_full?p_site=1&p_rows=3&p_rowset=1&p_key=TASD234DFH', function (data) {
//console.log(data);
var count=0;
$('#featured-sidebar').html('');
	$.each(data.categorydata, function (key, val) {
	//console.log(val);
		
		//console.log(val2);
		
		
		
			//$('#nr_featured').append('<article > <a href="#" class="image featured"><img src="'+imgpath+'" alt="" /></a> 	<header> <h3> <a href="#" >'+val.categoryname+'</a></h3>	</header> <p>'+val.headline+' <strong>More...</strong></p> </article>');
			
			//$('#nr_slider').append('<article class="4u special"> <a href="booking.php?pid='+val.categoryid+'" class="image featured"><img src="'+imgpath+'" alt="" /></a> 	<header> <h3> <a href="booking.php?pid='+val.categoryid+'" >'+catname+'</a></h3>	</header> <p>'+val.headline.substr(0,70)+' </p> </article>');
			
			
			
			if(val.images.length > 0){
			var imgpath  = val.images[0].url;
			}
			else{
			var imgpath  = '';
			}
			
			$('#propertyList').append('<div  class="villa villa-featured" id="H-'+val.categoryid+'">         <div class="villaImageContainer villaImageContainer1">             <a href="booking.php?pid='+val.categoryid+'" id="villaLinkImage'+val.categoryid+'" class="villaLink villaLinkImage">                           <img alt="" style="" src="'+imgpath+'" >                            <div class="villaPromo "></div>                      </a> </div>                    <div class="villaDescription">                        <h3 itemprop="name"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkTitle">'+val.categoryname+'</a></h3>                        <p class="service"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkDestination">Sleeps: '+val.sleeps+', Bedrooms: '+val.bedrooms+' </a></p>                        <p class="pricing"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkRates">From: $<span class="biggerText">'+val.fromprice+'</span> / night</a></p>                        <a href="booking.php?pid='+val.categoryid+'" class="villaLink viewVillaButton viewVillaButton1 button small buttonPrimary" >VIEW HOME</a>                    </div>               </div>');
			
			
			$('#featured-sidebar').append('<div  class="villa villa-featured" id="H-'+val.categoryid+'">         <div class="villaImageContainer villaImageContainer1">             <a href="booking.php?pid='+val.categoryid+'" id="villaLinkImage'+val.categoryid+'" class="villaLink villaLinkImage">                           <img alt="" style="" src="'+imgpath+'" >                            <div class="villaPromo "></div>                      </a> </div>                    <div class="villaDescription">                        <h3 itemprop="name"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkTitle">'+val.categoryname+'</a></h3>                        <p class="service"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkDestination">Sleeps: '+val.sleeps+', Bedrooms: '+val.bedrooms+' </a></p>                        <p class="pricing"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkRates">From: $<span class="biggerText">'+val.fromprice+'</span> / night</a></p>                        <a href="booking.php?pid='+val.categoryid+'" class="villaLink viewVillaButton viewVillaButton1 button small buttonPrimary" >VIEW HOME</a>                    </div>               </div>');
			
	});						
});
});


	
$.getJSON('https://nres.naturalretreats.com/rest/ews/getlocations?p_site=1&p_key=TASD234DFH', function (data) {
 
	$.each(data.locationdata, function (key, val) {
					
			$('#selLoc').append('<option  value="accommodation.php?locid='+val.locationid+'">'+val.locationname+'</option>');
		
	});

});




$.getJSON('https://nres.naturalretreats.com/rest/ews/getcategories?p_site=1&p_key=TASD234DFH', function (data) {
 
 
	var items2='';
			$.each(data.categorydata, function (key, val) {
				
				items2 +='<option  value="booking.php?pid='+val.categoryid+'">'+val.categoryname+'</option>';
				
			});
			if(items2 != ''){
			$('#selProp').append(items2);

			}


});
