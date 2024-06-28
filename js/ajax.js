$('form').on('submit', function (e) {
	e.preventDefault();

	$.ajax({
		type: 'post',
		url: this.action,
		data: $('form').serialize(),
		success: function (response, status) {
			if (response.status == "success") {
				var id = $('input[name="id"]').val();
				if (id == "") {
					$('form')[0].reset();
				}
				$('.message').html("<h3 class='success'>" + response.message + "</h3>");
			} else {
				$('.message').html("<h3 class='failed'>" + response.message + "</h3>");
			}

		},
		error: function (xhr, status, error) {
			console.log(error);
		}
	});

});


$('.delete-record').on('click', function (e) {
	e.preventDefault();

	var id = $(this).data('id');
	var action = $(this).data('action');

	$.ajax({
		type: 'post',
		url: action + ".php",
		data: { 'id': id },
		success: function (response, status) {
			const jsonObj = JSON.parse(response);
			if (jsonObj.status == "success") {
				$('.message').html("<h3 class='success'>" + jsonObj.message + "</h3>");
				if (jsonObj.data) {
					$('#example').html(jsonObj.data);
				}
			} else {
				$('.message').html("<h3 class='failed'>" + jsonObj.message + "</h3>");
			}
		},
		error: function (xhr, status, error) {
			console.log(error);
		}
	});
});

