$(document).ready(function() {
	$('#cities').change(showSuburbs);
});

function showSuburbs() {
	var CityID = $(this).val();

	if(isNaN(CityID)) {
		return;
	}

	$.ajax({
		type: 'get',
		url: 'app/cities-suburbs.php?cityID='+CityID,
		success: function(dataFromServer){

			$('#suburb').html('');
			$('#suburb').append('<option value='+'>'+'Please select a suburb'+'</option>')

			if(dataFromServer != 'error'){
				for(var i=0; i<dataFromServer.length; i++) {
					$('#suburb').append('<option value='+dataFromServer[i].SuburbID+'>'+dataFromServer[i].SuburbName+'</option>')
				}
			} else {
				$('#suburb').append('<option value='+'>There are no suburbs</option>')
			}

		},
			error: function(){
			console.log('Cannot connect to server.... ');
		}
	})
}