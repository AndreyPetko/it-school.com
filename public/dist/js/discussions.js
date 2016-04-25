$(document).ready(function(){
	$('#course').change(function(){
		$("#lesson").prop('disabled', false);


		$.get('/ajax/course-lessons/' + $(this).val(), function(data){
			// for (var i = data.length - 1; i >= 0; i--) {
				// alert(data.2);
			// }
			
		})
	});
});