$(document).ready( function () {
	$('#list_table').DataTable();
});

function reject(e) {

	swal("Provide the rejection message (or reason) :", {
		content: "input",
	})
	.then((value) => {
		console.log(value);
		if (value == "NA" || value == "na" || value == "") {
			swal("Invalid rejection message");
			swal({
				dangerMode: true,
				text:"Invalid rejection message" ,
				icon: "warning"
			});
		}else {
			$.ajax({
				type: "POST",
				url: 'operation.php',
				data: 'reject='+e,
				dataType: 'HTML',
				success: function (res) {
					console.log(res);
					if (res) {$('.'+e).hide();}
					else{
						swal({
							dangerMode: true,
							title:"Unable to reject this application",
							icon: "error"
						});
					}
				},
				error: function (e, xhr, state) {
					console.log('Error [core/listoperation.js] : ',e);
					swal({
						dangerMode: true,
						title:"Internal server error",
						text:"With status "+state+"\nView console log for more details, if you are a webmaster." ,
						icon: "error"
					});
				}
			});
		}
		
	});
	
}

function forword(e) {
	console.log(e);
	$('.'+e).hide();
}
function pass(e) {
	console.log(e);
	$('.'+e).hide();
}
function view(e) {
	console.log(e);
	$('.'+e).hide();
}

function delete_application(draft_id) {
	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this draft!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then((willDelete) => {
		console.log(willDelete);
		if (willDelete) {
			$.ajax({
					type: "POST",
					url: 'operation.php',
					data: 'draft_id='+draft_id+"&delete=-",
					dataType: 'HTML',
					success: function (res) {
						console.log(res);
						if (res == 'true') {
							$('.'+draft_id).hide();
							swal({
								dangerMode: true,
								title:"Draft succesfully deleted",
								icon: "success"
							});
						}
						else{
							swal({
								dangerMode: true,
								title:"Unable to delete this draft",
								icon: "error"
							});
						}
					},
					error: function (e, xhr, state) {
						console.log('Error [core/listoperation.js] : ',e);
						swal({
							dangerMode: true,
							title:"Internal server error",
							text:"With status "+state+"\nView console log for more details, if you are a webmaster." ,
							icon: "error"
						});
					}
				});
				
		}
	});
	
}