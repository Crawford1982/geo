	$('#btnRun').click(function() {

		$.ajax({
			url: "geo/libs/php/getCountryInfo.php",
			type: 'POST',
			dataType: 'json',
			data: {
				title: $('#selTitle').val()
				
			},
			success: function(result) {

				console.log(JSON.stringify(result));

				if (result.status.name == "ok") {

					$('#txtSummary').html(result['data'][0]['summary']);
					

				}
			
			},
			error: function(jqXHR, textStatus, errorThrown) {
				// your error code
			}
		}); 
	
	});