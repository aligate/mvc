jQuery(document).ready(function($){


$('#user-form').on('click', '#user-create', function(e){
	e.preventDefault();
	$.ajax({
			url: '?/index/add',
			method: 'post',
			dataType: 'json',
			data: {
				login: $("#user-login").val(),
				password: $("#user-password").val()
			},
			success: function(res){
				$('#user-list').append('<p><li><a href="/?/index/show/id/'+ res.id + '">' + res.login + '</a></li><a href="?/index/delete/id/' + res.id + '" type="button" class="btn btn-danger">Delete</a></p>');
			}



	});
	});
















});