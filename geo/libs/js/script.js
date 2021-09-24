$('#btnRun').click(function() {

	$.ajax({
		url: "C:\Users\Family\Documents\GitHub\geo\geo\libs\php\findnearbyWiki.php",
		type: 'POST',
		dataType: 'json',
		data: {
			title: $('#selTitle').val(),
			lang: $('#selLanguage').val()
			
			
		},
		success: function(result) {

			console.log(JSON.stringify(result));

			if (result.status.name == "ok") {

				$('#txtSummary').html(result['data'][0]['summary']);
				$('#txtLanguages').html(result['data'][0]['languages']);
				

			}
		
		},
		error: function(jqXHR, textStatus, errorThrown) {
			// your error code
		}
	}); 

}); i 