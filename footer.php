
			<!-- Footer -->
<!-- icon options see http://fortawesome.github.io/Font-Awesome/cheatsheet/ -->
			<div style="clear:both"></div>
			<section  id="nr_xplore" >
				<div class="xplore1"><img src="images/xplore.jpg" width="100%"></div>
					<div class="xplore2">	
						<h2>Your Xplore Team</h2>
						<p></p>
				  <p>The members of the Xplore Team serve as our in house Travel Experts. Champions of customer service and gurus of all things Natural Retreats, they have been to every location and know cycling and hiking routes, where to sample local produce and are full of tips to help you better enjoy your North Lake Tahoe vacation. In addition to helping you plan, the Xplore Team is available throughout your journey.</p>
				  <div class="call-xplore"><h3>844.862.8253</h3></div>
					<div class="email-xplore"><a href="mailto:concierge@naturalretreats.com" class="xplore-mail"><h3>concierge@naturalretreats.com</h3></a></div>
				</div>
				<div style="clear:both"></div>
			</section>
			
			<div id="footer-new">
			<div class="container1">
				<div class="footer-top">
				<div class="footer-left">
				<header>
				<h3>Follow Us</h3>
				</header>
				<ul class="icons" id="nr_footer_social">
					<li><a href="https://twitter.com/naturalretreats" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="https://www.facebook.com/naturalretreats" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="https://instagram.com/naturalretreats/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="https://www.youtube.com/user/ByNaturalRetreats" class="icon fa-youtube"><span class="label">Youtube</span></a></li>
				</ul>
				
				
				<div style="clear:both;"></div>
				
				<div><p>Sierra Vacations by Natural Retreats offers a unique variety of vacation rentals in North Lake Tahoe and Northstar California™. Ranging from deluxe Lakefront and Lakeview cabins to elegant mountaintop homes and condos, Sierra Vacations by Natural Retreats will assist you in choosing a perfect rental for you and your family. Let us help you create the adventure of a lifetime in one of our premier North Lake Tahoe vacation homes!
				</p></div>
				
				</div>
				<div class="footer-right">
				
					<header>
						<h3 >Newsletter</h3>
	  
					</header>
					<ul class="divided">
						<li>
							<article class="tweet">
										
								<form action="#" method="get">
											
										
									<select name="p_title" id="p_title" style="display:none;">
									<option value="Mr">Mr</option>
									<option value="Mrs">Mrs</option>
									<option value="Ms">Ms</option>
									
									</select>
									
									<input type="text" name="p_firstname" id="p_firstname" placeholder="First name" required>
									<input type="text" name="p_lastname" id="p_lastname" placeholder="Last name" required>    
									<input type="text" name="p_email" id="p_email" placeholder="Email Address" type="email" required>      
											
									<input type="button" value="Sign Up" name="reg_submit"  id="reg_submit" class="button-news">
											
								</form>


							</article>
						</li>
						
					</ul>
							
				</div>
				<div style="clear:both;"></div>
				<div id="nav-footer"></div>
				<div style="clear:both;"></div>
				</div>
				<div class="footer-bottom">
				&copy; Natural Retreats. All rights reserved. &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.naturalretreats.com/us/terms-and-conditions">Terms & conditions</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.naturalretreats.com/us/privacy-policy">Privacy Policy</a>
				</div>
			</div>
		<script >
			
		$(document).on('click','#reg_submit',function(e){
			
			
			var p_title = $('#p_title').val();
			var p_firstname = $('#p_firstname').val();
			var p_lastname = $('#p_lastname').val();
			var p_email = $('#p_email').val();
			
			$(function () {
				var customer = {"Email": p_email,
								"FirstName": p_firstname,
								"LastName": p_lastname,
								"Title": p_title,
								"MailingListCode":"USSIERRA"};
				$.ajax({
					type: "POST",
					data :JSON.stringify(customer),
					url: "https://nres.naturalretreats.com/rest/ews/register",
					contentType: "application/json",
					headers: {"KEY" : "TASD234DFH"},
					complete: function(data) {
                           			 
			 var data2=data.responseJSON;
			 //console.log(data2);
			 alert("You have registered successfully");
			 }
			 
				});
			});
			
				
		});
	
			
    </script>
   <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-W8M9Q2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W8M9Q2');</script>
<!-- End Google Tag Manager -->
	</body>
</html>