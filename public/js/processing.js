	$(document).ready(function(){  

//===============================================================================
//===============================================================================
//===============================================================================


		$("form#idEP").submit(function() {  

			// we want to store the values from the form input box, then send via ajax below 

			var pname = $('#pname').val();
			var qty = $('#qty').val();
			var price = $('#price').val();
			var token = $('#token').val();

			if(pname == "" || qty == "" || price ==""){
				$('#idMsgEP').show();
				$('#idMsgEP').css( "background-color","#f00" );
				$('#idMsgEP').css( "color","#fff" );
				$('#idMsgEP').html("Failed! fill up all fields");
				return false;
			}

			$.ajax({  
				type: "POST",  
				url: "/createXMLFile",  
				data: "pname="+pname+"&qty="+qty +"&price="+price+"&_token="+token,
				success: function(returned_html){  

					// don't cache ajax or content won't be fresh
					$.ajaxSetup ({
						cache: false
					});
					var ajax_load = "<img src='' alt='loading...' />";

					// load() functions
					var loadUrl = "/readingXML";
					$("#result").html(ajax_load).load(loadUrl);

				}
			});  
			return false;  
		});  



//===============================================================================
//===============================================================================
//===============================================================================

	});



