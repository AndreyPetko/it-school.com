$(document).ready(function(){

	$(document).on('click', '.bid-delete-button', function(){
		id = $(this).data('courseid');
		$(this).parent().parent().hide();
		$.get('/ajax/cur-course-delete/' + id, function(data){
			$('#totalprice').val(data);
			$('.bid-form-totalprice').html('Сумма ' + data + 'р');
		});

	});


	$('.course-list-item2').click(function(){
		id = $(this).data('courseid');
		$.get('/ajax/cur-course-add/' + id, function(data){
			if(data == 0) {
				return false;
			}

			$('#current-courses-list').append(data);

			$.get('/ajax/current-total', function(data){
				$('#totalprice').val(data);
				$('.bid-form-totalprice').html('Сумма: ' + data + 'р');
			});

		});

	});
});