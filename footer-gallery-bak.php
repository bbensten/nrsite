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
			var count=1;
			items3 +='<div class="row 25% no-collapse">';
			$.each(val.tagdata, function (key5, val5) {
			//console.log(val5);
				imgpath  = val5.tagcontent;
				if(count % 2 == 0){
				items3 +='<div class="6u"><img alt="" src="'+imgpath+'" width="100%"> </div></div><div class="row 25% no-collapse">';
				count++;
				}
				else{
				items3 +='<div class="6u"><img alt="" src="'+imgpath+'" width="100%"> </div>';
				count++;
				}
				});
				items3 +='</div>';
				
			});
			
			if(items3 != ''){
			$('#nr_footer_gallery').html(items3);
						
			}
			}
			});