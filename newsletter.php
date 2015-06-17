				
		<?php include('header.php');?>				
			
			<script >
			
		$(document).on('click','#reg_submit1',function(e){
						
			var p_title = $('#p_title1').val();
			var p_firstname = $('#p_firstname1').val();
			var p_lastname = $('#p_lastname1').val();
			var p_email = $('#p_email1').val();
			
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
		<!-- Main -->
			<div class="wrapper style1">

				<div class="container">
					<div class="row 200%">
						
						<div class="8u important(collapse)" id="content">
							<article id="main">
								<header id="banner_title">
									<h2><a href="#">Newsletter Sign-Up</a></h2>
						
								</header>
															
								<section id="nr_summary">
									<div id="content" >
									<article id="main"> <header>Sign up for our regular newsletter and we'll keep you up to date with our latest offers and details of our featured properties.</header> 
										<section class="8u important(collapse) newsletter-section">
											<form method="get" action="#">
												<select name="p_title" id="p_title1"><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option></select>
												<input type="text" required="" placeholder="First name" name="p_firstname" id="p_firstname1">
												<input type="text" required="" placeholder="Last name" name="p_lastname" id="p_lastname1">
												<input type="text" required="" placeholder="Your email" name="p_email" id="p_email1">
												<input type="button"  name="reg_submit" id="reg_submit1" value="Sign Up" class="button-news">
											</form>
										</section> 
									</article>
									</div>
								</section>
							</article>
						</div>
						<?php include('sidebar.php');?>
					</div>
					
				</div>

			</div>
			
		<?php include('footer.php');?>	