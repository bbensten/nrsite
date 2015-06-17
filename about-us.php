				
		<?php include('header.php');?>				
		<script>
		$.getJSON('https://nres.naturalretreats.com/rest/ews/gettagdata?p_site=1&p_page=101&p_key=TASD234DFH', function (data) {

 $.each(data, function (key, val) {
	 
		
		if(val.tagname == "Title" ){
		 $.each(val.tagdata, function (key2, val2) {
			//console.log(val2);
			$('#banner_title').html('<h2>'+val2.tagcontent+'</h2>');
					 
		 });
		 	
		}
		if(val.tagname == "Summary" ){
		 $.each(val.tagdata, function (key2, val2) {
			//console.log(val2);
			$('#nr_summary').html(val2.tagcontent);	
					 
		 });
		 	
		}
		
		
	 
 });
// everything inside here happens once the data is successfully returned        
 
});
		</script>	
		<!-- Main -->
			<div class="wrapper style1">

				<div class="container">
					<div class="row 200%">
						
						<div class="8u important(collapse)" id="content">
							<article id="main">
								<header id="banner_title">
									<h2><a href="#">Page Title</a></h2>
						
								</header>
															
								<section id="nr_summary">
									
								</section>
							</article>
						</div>
						<?php include('sidebar.php');?>
					</div>
					
				</div>

			</div>
			
		<?php include('footer.php');?>	