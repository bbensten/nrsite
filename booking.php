	<!DOCTYPE HTML>
	<!--
		Helios by HTML5 UP
		html5up.net | @n33co
		Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	-->
	<html>
		<head>
			<title></title>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<meta name="description" content="" />
			<meta name="keywords" content="" />
			<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.dropotron.min.js"></script>
			<script src="js/jquery.scrolly.min.js"></script>
			<script src="js/jquery.onvisible.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/skel-layers.min.js"></script>
			<script src="js/init.js"></script>
			<script type="text/javascript" src="js/jssor.js"></script>
			<script type="text/javascript" src="js/jssor.slider.js"></script>
			<script type="text/javascript" src="booking/scripts/dateTimePicker.min.js"></script>
	

			<script src="js/booking-feed.js"></script>
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
			<script >
			
			
			var pid = <?php echo $_REQUEST['pid'];?>;
			$.ajax({
            url: "proxy-php/data-feed.php?pid="+pid,
            cache: false,
            dataType: "json",
            complete: function(data) {
                           			 
			 var data2=data.responseJSON;
			 //console.log(data2);
			var val=data2.categorydata[0];	
				
					
					//console.log(val2);
												
						$('#nr_property_title').html(val.categoryname);
						$('#nr_property_teaser').html(val.teaser);
						
						$('#nr_property_summary').html(val.description);
						
						var items2='';
						var imgpath;
						$.each(val.features, function (key2, val2) {
				imgpath  = val2.url;
				
				items2 +='<li> <img alt="" src="'+imgpath+'">'+val2.feature_name+'</li>';
				
			});

			if(items2 != ''){
			$('#nr_features_list').html(items2);
			}
            var locname = val.categoryname.split('-');
			if(locname[0] == ''){
				locname[0] = val.categoryname;
			}
			//$('#map-container').html('<iframe src="http://maps.google.com/maps?q='+val.categoryname+'+ON&loc:'+val.latitude+'+'+val.longitude+'&z=10&output=embed" width="1366" height="500" frameborder="0" style="border:0"></iframe>');
			

		
        var mapOptions = {
            center: new google.maps.LatLng(val.latitude, val.longitude),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var map = new google.maps.Map(document.getElementById("map-container"), mapOptions);
		var myLatlng = new google.maps.LatLng(val.latitude, val.longitude);
        var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: val.categoryname
            });
		/* google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(val.teaser);
                    infoWindow.open(map, marker);
                }); */


			
			var items3='';
			var imgpath;
			$.each(val.images, function (key3, val3) {
				imgpath  = val3.url;
				
				items3 +='<div> <img alt="" src="'+imgpath+'">   </div>';
				
			});
			if(items3 != ''){
			$('#main-slider').html(items3);
			jQuery(document).ready(function initslider($) {
            var options = {
                $AutoPlay: true,

                $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slideshow is auto playing, default value is false

                $ArrowKeyNavigation: true,   			            //Allows arrow key to navigate or not
                $SlideWidth: 600,                                   //[Optional] Width of every slide in pixels, the default is width of 'slides' container
                //$SlideHeight: 300,                                  //[Optional] Height of every slide in pixels, the default is width of 'slides' container
                $SlideSpacing: 0, 					                //Space between each slide in pixels
                $DisplayPieces: 2,                                  //Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 100,                                //The offset position to park slide (this options applys only when slideshow disabled).

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.min(parentWidth, 1366));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
			}
			
			}
			});
			
		
    
$(document).ready(function()
{
var items3='';
$.getJSON('https://nres.naturalretreats.com/rest/ews/getcategories_full?p_site=1&p_category='+pid+'&p_key=TASD234DFH&p_searchdate=12-JUN-2015&p_cal=Y', function (data) {
  
	$.each(data.categorydata, function (key, val) {
	//console.log(val);
		
		//console.log(val2);
			items3='';
			var mon;
			$.each(val.availability, function (key2, val2) {			
				if(val2.available ==0){
				var from = val2.caldate.split("-");
				
				switch(from[1]){
				case "JAN":
				mon = '01';
				break;
				
				case "FEB":
				mon = '02';
				break;
				
				case "MAR":
				mon = '03';
				break;
				
				case "APR":
				mon = '04';
				break;
				
				case "MAY":
				mon = '05';
				break;
				
				case "JUN":
				mon = '06';
				break;
				
				case "JUL":
				mon = '07';
				break;
				
				case "AUG":
				mon = '08';
				break;
				
				case "SEP":
				mon = '09';
				break;
				
				case "OCT":
				mon = '10';
				break;
				
				case "NOV":
				mon = '11';
				break;
				
				default :
				mon = '12';
				break;
				}
				
				items3 += "'20"+from[2]+"-"+mon+"-"+from[0]+"' ,";
				
				}
				
			});
		
	});
	items3 = items3.slice(0,-2);
	//alert(items3);
      $('#basic').calendar({
	  	unavailable: [ '2015-06-12' ,'2015-06-13' ,'2015-06-26' ,'2015-06-27' ,'2015-06-28' ,'2015-06-29' ,'2015-06-30' ],
		onSelectDate: function(date, month, year){
		var mon ;
				
				switch(month){
				case 1:
				mon = 'JAN';
				break;
				
				case 2:
				mon = 'FEB';
				break;
				
				case 3:
				mon = 'MAR';
				break;
				
				case 4:
				mon = 'APR';
				break;
				
				case 5:
				mon = 'MAY';
				break;
				
				case 6:
				mon = 'JUNE';
				break;
				
				case 7:
				mon = 'JUL';
				break;
				
				case 8:
				mon = 'AUG';
				break;
				
				case 9:
				mon = 'SEP';
				break;
				
				case 10:
				mon = 'OCT';
				break;
				
				case 11:
				mon = 'NOV';
				break;
				
				default :
				mon = 'DEC';
				break;
				}
          //alert([year, mon, date].join('-') + ' is: ' + this.isAvailable(date, month, year));
		  $('#arrDate').val([date , mon, '15'].join('-'));		  
		  //$('#nr_booking_detail').html('Arrival Date: '+[date , mon, '15'].join('-'));
		  $('td', this.$element).filter('.available, .unavailable').removeClass('mark').filter(function(){
			var data = $(this).data();
			return data.date == date && data.month == month && data.year == year;
			}).addClass('mark');
		  }
	}); 
	
	

});



});

</script>
        
        
       
			<noscript>
				<link rel="stylesheet" href="css/skel.css" />
				<link rel="stylesheet" href="css/style.css" />
				<link rel="stylesheet" href="css/style-desktop.css" />
				<link rel="stylesheet" href="css/style-noscript.css" />
			</noscript>
			
			<link rel="stylesheet" href="booking/assets/dateTimePicker.css">
				<link rel="stylesheet" href="css/kmp.css" />
				<link rel="stylesheet" href="css/bootstrap.css" />
				<link rel="stylesheet" href="css/override.css" />
				
				
							
				
			<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		</head>
		<body class="left-sidebar">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							<header>
								<h1><a href="index.php" id="logo"><img src="images/logo.png"></a></h1>
							<hr>
							</header>
						</div>
					
			

		<!-- Nav -->
						<nav id="nav">
							
						</nav>


				</div>
				
				
				
				
			<!-- Main1 Start -->
				
				
	<section class="retreat-overview clearfix" style="padding: 0 0 0 0;margin-top:50px;">

  <div class="retreat-overview__wrap clearfix">

    
    <div class="col-xs-12 col-sm-8 retreat-overview__description-social red-ul-wrapper">

      <h1 class="h1-reset retreat-overview__title" id="nr_property_title"></h1>
		<div id="nr_property_teaser">  </div> 
      <div id="nr_property_summary">  </div>   
    </div>

          <div class="col-xs-12 col-sm-4 retreat-overview__booking-info">

        
        
                        <div id="nr_booking_form_booknow_wrapper"><div>
						<div style="text-align:center;"><h3>Availability</h3></div>
</div><div id="basic" data-toggle="calendar" ></div>

<form action="https://www.naturalretreats.com/us/booking/agent" method="post" id="nr_booking_form">
<input type="hidden" value="USSV" name="AgentRef">
<input type="hidden" value="2" name="GuestAdults">
<input type="hidden" value="" name="GuestInfants">
<input type="hidden" value="" name="GuestPets">
<input type="hidden" value="" name="Nights">
<input type="hidden" value="3" name="RegionId">
<input type="hidden" value="306" name="ResortId">
<input type="hidden" value="" name="ArrivalDate" id="arrDate">
<input type="hidden" value="<?php echo $_REQUEST['pid'];?>" name="CategoryId" id="edit-CategoryId">

<fieldset id="edit-summary" style="display: none;" class="nr_booknow-summary panel panel-default form-wrapper">
      <div class="panel-body">
        </div>
  </fieldset>
<div class="retreat-overview__booking-info__list retreat-overview__booking-info__list--book-now"><button type="submit" value="Book Now" name="booknow" id="edit-booknow" class="button btn--colour-seventeen btn--full-width nr_booknow-btn">BOOK NOW</button>
</div>
</form>
<div id="nr_booking_phone"><h3>Or Call 844.862.8253</h3></div>
<div class="table-responsive"><table class="table table-condensed nr_calendar-key"><tbody><tr><td>Available to Book</td><td><span class="nr_calendar-key-colour nr_calendar-status-A"></span></td></tr><tr><td>Occupied</td><td><span class="nr_calendar-key-colour nr_calendar-status-O"></span></td></tr></tbody></table></div>
</div></div>
      </div>
      
  </div>

</section>			
	
				
				
				
				
				
			<!--Main1 Close-->	

			<!--Main2 Strat-->
<div class="wrapper style1" >
 
<section id="features" class="container special">
					<header>
						
						<p></p>
					</header>
					<!--<div class="row" id="nr_featured">
						
					</div>-->
                    
				</section>  
<section class="container1" >

<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 800px;
        height: 300px; overflow: hidden;">
        <!-- Slides Container -->
        <div u="slides" id="main-slider" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 800px; height: 600px;
            overflow: hidden;">
                        
        </div>
        <style>
            /* jssor slider arrow navigator skin 13 css */
            /*
            .jssora13l                  (normal)
            .jssora13r                  (normal)
            .jssora13l:hover            (normal mouseover)
            .jssora13r:hover            (normal mouseover)
            .jssora13l.jssora13ldn      (mousedown)
            .jssora13r.jssora13rdn      (mousedown)
            */
            .jssora13l, .jssora13r {
                display: block;
                position: absolute;
                /* size of arrow element */
                width: 40px;
                height: 50px;
                cursor: pointer;
                background: url(img/a13.png) no-repeat;
                overflow: hidden;
            }
            .jssora13l { background-position: -10px -35px; }
            .jssora13r { background-position: -70px -35px; }
            .jssora13l:hover { background-position: -130px -35px; }
            .jssora13r:hover { background-position: -190px -35px; }
            .jssora13l.jssora13ldn { background-position: -250px -35px; }
            .jssora13r.jssora13rdn { background-position: -310px -35px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora13l" style="top: 123px; left: 30px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora13r" style="top: 123px; right: 30px;">
        </span>
        
    </div>
	

</section>
</div>

			<!--Main2 Stop-->

			
			<div class="wrapper style1" >
    <section style="clear:both;padding:0 0 0 0;">

      
  <div class="container1">
  <section class="accommodation-location widget-outermost">
    <div style="text-align:center;"><h2>The Location</h2></div>
    <div class="section-subtitle"></div>
    <div class="map accommodation-location-map" style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;" class="gm-style" id="map-container"></div></div>
  </section>
</div>

</section> <!-- /.block -->
  </div>
  
  
  <section class="retreat-accommodation-info" style="clear:both;padding:0 0 0 0;">

        <div class="retreat-accommodation-info__wrap clearfix">

		<div class="col-sm-4 retreat-accommodation-info__col">

            <div class="retreat-accommodation-info__title">Features &amp; extras</div>

            <ul class="list-unstyled retreat-accommodation-info__list" id="nr_features_list">
               <li><img src="images/ICONS/NR_hotel-01.png">Bedrooms: 1</li><li><img src="images/ICONS/NR_hotel-01.png">Sleeps: 2</li><li><li><img src="images/ICONS/NR_hotel-01.png">All linen</li>      </ul>

          </div>
		
		
          <div class="col-sm-4 retreat-accommodation-info__col">

            <div class="retreat-accommodation-info__title">Essentials</div>

            <ul class="list-unstyled retreat-accommodation-info__list">
              <li><img src="images/ICONS/NR_hotel-01.png">Bedrooms: 1</li><li><img src="images/ICONS/NR_hotel-01.png">Sleeps: 2</li><li><li><img src="images/ICONS/NR_hotel-01.png">All linen</li>            </ul>

          </div>
		  

          <div class="col-sm-4 retreat-accommodation-info__col">

            <div class="retreat-accommodation-info__title">Facilities</div>

            <ul class="list-unstyled retreat-accommodation-info__list" >
              <li><img src="images/ICONS/NR_hotel-01.png">Bedrooms: 1</li><li><img src="images/ICONS/NR_hotel-01.png">Sleeps: 2</li><li><li><img src="images/ICONS/NR_hotel-01.png">All linen</li>          
			  </ul>

          </div>

          

        </div>


      </section>
				
			  

<?php include('footer.php');?>