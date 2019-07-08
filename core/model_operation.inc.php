<?php
	require_once "core/user.db.php";
	$u = new User($host, $db_name, $db_user, $db_pass);
	$admin_list = $u->getAdmins($_SESSION['auth_level']);
?>
<form>
	<div class="modal fade" id="fwdModel" tabindex="-1" role="dialog" aria-labelledby="fwdModelLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="fwdModelLabel">Forword this application</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label">Forword To</label>
						<div class="col-sm-9">
							<select name="forword_to" class="form-control" id="vichelNum">
								<?php foreach ($admin_list as $key => $value): ?>
									<option value="<?=$value['id']?>"><?=$value['name']?> (<?=$value['department']?>)</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputPassword3" class="col-sm-3 col-form-label">Message</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputPassword3" name="message" placeholder="Message">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success" onclick="send_form(this.form)">Send</button>
				</div>
			</div>
		</div>
	</div>
</form>
<form>
	<div class="modal fade" id="applicationModel" tabindex="-1" role="dialog" aria-labelledby="applicationModelLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="applicationModelLabel">Application</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				</div>
			</div>
		</div>
	</div>
</form>
<form>
	<div class="modal fade" id="passModel" tabindex="-1" role="dialog" aria-labelledby="passModelLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="passModelLabel">Approve this application</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group row">
						<label for="vichelNum" class="col-sm-5 col-form-label">Vichel Number</label>
						<div class="col-sm-7">
							<select name="vichel_no" class="form-control vichelList" id="vichelNum">
								
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" onclick="pass_form(this.form)">Approve</button>
				</div>
			</div>
		</div>
	</div>
</form>
