				
		<?php include('header.php');?>				
		<script type="text/javascript" src="js/jssor.js"></script>
			<script type="text/javascript" src="js/jssor.slider.js"></script>
	

			
<script >
			
			
			
			
   $.ajax({
            url: "proxy-php/gallery-feed.php",
            cache: false,
            dataType: "json",
            complete: function(data) {
                           			 
			 var data2=data.responseJSON;
			 //console.log(data2);
				
				
					
					//console.log(data2);
												
			
			
					var items3='';
			var imgpath;
			$.each(data2, function (key, val) {
			$.each(val.tagdata, function (key5, val5) {
			console.log(val5);
				imgpath  = val5.tagcontent;
				
				items3 +='<div> <img alt="" src="'+imgpath+'">   </div>';
				});
			});
			if(items3 != ''){
			$('#main-slider').html(items3);
			$(document).ready(function initslider($) {
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
				
			
			
    </script>
		
		<!--Main1 Close-->	

			<!--Main2 Strat-->
<div class="wrapper style1" >
 
<section id="features" class="container special">
					<header>
						<h2>The Gallery</h2>
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

			
		<?php include('footer.php');?>	