<!DOCTYPE html>
<html>

<head>

	<title>Sinple Ajax</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	
</head>

<body>

	<div class="container">
	
	@yield('content')

	</div>

</body>

<!-- Latest compiled and minified jQuery -->
<script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<!-- Latest compiled and minified JavaScript -->
<script language="JavaScript" type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
	
//Edit Data (Modal and function edit data)
$(document).on('click', '.edit-modal', function(){


	$('#footer_action_button').text("Update");

	$('#footer_action_button').addClass("glyphicon-check");

	$('#footer_action_button').removeClass("glyphicon-trash");

	$('.actionBtn').addClass("btn-success");

	$('.actionBtn').removeClass("btn-danger");

	$('.actionBtn').addClass("edit");

	$('.modal-title').text("Edit");

	$('.deleteContent').hide();

	$('.form-horizontal').show();

	$('#fid').val($(this).data('id'));

	$('#t').val($(this).data('title'));

	$('#d').val($(this).data('description'));

	$('#myModal').modal('show');

});

$('.model-footer').on('click', '.edit', function(){

	$.ajax({

		type:'POST',

		url: '/editItem',

		data: {

			'_token': $('input[name=_token]').val(),

			'id': $('#fid').val(),

			'title': $('#t').val(),

			'description': $('#d').val()

		},

		success:function(data){

			console.log(data);

			$(".item" + data.id).replaceWith("<tr class='item'" + data.id + "><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.description + "</td><td><button class='edit-modal btn btn-info data-id='" + data.id + "' data-title=" + data.title + "data-desciption='" + data.description + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title= '" + data.title + "' data-desciption='" + data.description + "'> <span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
		}

	});

});

//Edit Data (Modal and function edit data)
$(document).on('click', '.edit-modal', function(){


	$('#footer_action_button').text("Update");

	$('#footer_action_button').addClass("glyphicon-check");

	$('#footer_action_button').removeClass("glyphicon-trash");

	$('.actionBtn').addClass("btn-success");

	$('.actionBtn').removeClass("btn-danger");

	$('.actionBtn').addClass("edit");

	$('.modal-title').text("Edit");

	$('.deleteContent').hide();

	$('.form-horizontal').show();

	$('#fid').val($(this).data('id'));

	$('#t').val($(this).data('title'));

	$('#d').val($(this).data('description'));

	$('#myModal').modal('show');

});


// Add function  + ajax

$('#add').on('click', function(){

	 // alert('sas');

	$.ajax({

		type:'POST',

		url: '/addItem',

		data: {

			'_token': $('input[name=_token]').val(),

			'title': $('input[name=title]').val(),

			'description': $('input[name=description]').val()

		},

		success:function(data){

			 console.log(data);

			if ((data.errors)){

				console.log(data.errors);

				$('.error').removeClass('hidden');

				$('.error').text('data.errors.title');

				$('.error').text('data.errors.description');	

			}else{

				$('.error').remove();
				$('.table').append("<tr class='item'" + data.id + "><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.description + "</td><td><button class='edit-modal btn btn-info data-id='" + data.id + "' data-title=" + data.title + "data-desciption='" + data.description + "'><span class='glyphicon glyphicon-edit'></span> De</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title= '" + data.title + "' data-desciption='" + data.description + "'> <span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>")

			}
		}

	});

	$('#title').val('');
	$('#description').val('');

});



//Delete (Modal and function edit data)
$(document).on('click', '.delete-modal', function(){


	$('#footer_action_button').text("Delete");

	$('#footer_action_button').removeClass('glyphicon-check');

	$('#footer_action_button').addClass('glyphicon-trash');

	$('.actionBtn').removeClass('btn-success');

	$('.actionBtn').addClass('btn-danger');

	$('.actionBtn').addClass('delete');

	$('.modal-title').text('Delete');

	$('.id').text($(this).data('id'));

	$('.deleteContent').show();

	$('.form-horizontal').hide();

	$('.title').html($(this).data('title'));

	$('#myModal').modal('show');

});

$('.model-footer').on('click', '.delete', function(){

	// alert('sas');

	$.ajax({

		type: 'post',

		url: '/deleteItem',

		data: {

			'_token': $('input[name=_token]').val(),

			'id': $('.id').text()


		},

		success:function(data){



			$('.item' + $('.id').text()).remove();

			console.log(data);

		}


	});


});

</script>

</html>