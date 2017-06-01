<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<div class="modal fade" id="modal-container-401542" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<form class="form-horizontal" role="form" id="form_change_password">
                        {{ csrf_field() }}
						<div class="modal-header">
							 
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								Change Password
							</h4>
						</div>
						<div class="modal-body">
									<div class="alert alert-danger" id="alertChangePassword" style="display: none">
									</div>
                                    <div class="form-group">
                                        <label for="currentpassword" class="col-md-4 control-label">Current Password</label>
                                        <div class="col-md-6">
                                            <input id="currentpassword" type="password" class="form-control" name="current_password" value="" placeholder="Current Password" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpassword" class="col-md-4 control-label">New Password</label>
                                        <div class="col-md-6">
                                            <input id="newpassword" type="password" class="form-control" name="password" value="" placeholder="New Password" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmpassword" class="col-md-4 control-label">Confirm Password</label>
                                        <div class="col-md-6">
                                            <input id="confirmpassword" type="password" class="form-control" name="password_confirmation" value="" placeholder="Confirm Password" required >
                                        </div>
                                    </div>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Close
							</button> 
							<button type="submit" class="btn btn-danger">
								Save New Password
							</button>
						</div>
                       </form>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>