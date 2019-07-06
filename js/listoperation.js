var active_draft = null; 

$(document).ready( function () {
	$('#list_table').DataTable();
});

function reject(e) {
	swal("Provide the rejection message (or reason) :", {
		content: "input",
	})
	.then((value) => {
		console.log('value : '+value);
		if (value == "NA" || value == "na" || value == "" || value == null || value == undefined) {
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
				data: 'draft_id='+e+"&reject_msg="+value,
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
	$("#fwdModel").modal('show');
	active_draft = e;
}
function send_form(e) {
	console.log(e.forword_to.value + e.message.value + active_draft);

	if(!e.forword_to.value || !e.message.value || !active_draft){
		swal({
			dangerMode: true,
			title:"Unable to forword this application. Required fields are empty.",
		});
		return;
	}

	$.ajax({
		type: "POST",
		url: 'operation.php',
		data: 'draft_id=' + active_draft + "&forword_to=" + e.forword_to.value + "&forword_msg=" + e.message.value,
		dataType: 'HTML',
		success: function (res) {
			console.log(res);
			if (res == 'true') {

				$('.'+active_draft).hide();
				$('#fwdModel').modal('hide')
				$('.'+active_draft).hide();
				active_draft = null;

				swal({
					title:"Draft forworded",
					icon: "success"
				});
			}
			else{
				swal({
					dangerMode: true,
					title:"Unable to forword this application",
					icon: "error"
				});
			}
		},
		error: function (e, xhr, state) {
			$('.'+active_draft).hide();
			$('#fwdModel').modal('hide')
			active_draft = null;

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
function pass(e) {
	console.log(e);
	$("#passModel").modal('show');
	active_draft = e;
}

function pass_form(e) {
	console.log(e.vichel_no.value, active_draft);
	$('.'+active_draft).hide();
	$('#passModel').modal('hide');
	$.ajax({
		type: "POST",
		url: 'operation.php',
		data: 'draft_id=' + active_draft + "&vichel_no=" + e.vichel_no.value,
		dataType: 'HTML',
		success: function (res) {
			console.log(res);
			if (res == 'true') {

				$('.'+active_draft).hide();
				$('#fwdModel').modal('hide')
				$('.'+active_draft).hide();
				active_draft = null;

				swal({
					title:"Application approved",
					icon: "success"
				});
			}
			else{
				swal({
					dangerMode: true,
					title:"Unable to pass this application",
					icon: "error"
				});
			}
		},
		error: function (e, xhr, state) {
			$('.'+active_draft).hide();
			$('#fwdModel').modal('hide')
			active_draft = null;

			console.log('Error [core/listoperation.js] : ',e);
			swal({
				dangerMode: true,
				title:"Internal server error",
				text:"With status "+state+"\nView console log for more details, if you are a webmaster." ,
				icon: "error"
			});
		}
	});
	active_draft = null;
}
function view(e) {
	console.log(e);
	$.ajax({
		type: "GET",
		url: 'read_only_view.php',
		data: 'view_id='+e,
		dataType: 'HTML',
		success: function (res) {
			$('#applicationModel .modal-body').html(res)
			$('#applicationModel').modal('show')
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

function delete_application(draft_id) {
	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this draft!",
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