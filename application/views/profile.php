<div class="single-product-tab-area mg-tb-15">
	<!-- Single pro tab review Start-->
	<div class="single-pro-review-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="review-tab-pro-inner">
						<ul id="myTab3" class="tab-review-design">
							<li class="active"><a href="#orderT" id="order">Profile</a></li>
						</ul>
						<div id="myTabContent" class="tab-content custom-product-edit">
							<?= $this->session->flashdata("msg")?>
							<div class="product-tab-list tab-pane fade active in" id="orderT">
								<div class="hpanel">
									<div class="panel-body">
										<form action="<?= base_url("Home/update_profile")?>" id="loginForm"
											method="POST" id="regist">
											<div class="row">
												<div class="form-group col-lg-12">
													<label>Username / Nama Toko</label>
													<input required class="form-control" readonly name="username" value="<?= $seller["name"]?>">
												</div>
												<div class="form-group col-lg-6">
													<label>Email Address</label>
													<input required class="form-control" name="email" type="email" value="<?= $seller["email"]?>">
												</div>
												<div class="form-group col-lg-6">
													<label>No Telp</label>
													<input required class="form-control" name="no_telp" type="number"
														minlength="6" value="<?= $seller["no_telp"]?>">
												</div>
												<div class="form-group col-lg-6">
													<label>Alamat</label>
													<textarea class="form-control" name="alamat"><?= $seller["address"]?></textarea>
												</div>
												<div class="form-group col-lg-6">
													<button type="button" data-toggle="modal" data-target=".modal-pwd"
														class="btn btn-block btn-success">reset_password</button>
												</div>

											</div>
											<div class="text-center">
												<button type="submit" id="submit"
													class="btn btn-success loginbtn">Update</button>
												<hr>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="DangerModalhdbgcl" class="modal-pwd modal modal-adminpro-general FullColor-popup-DangerModal fade"
	role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-4">
				<h4 class="modal-title">Upload Resi</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<form action="<?= base_url("Home/reset_password")?>" method="post">
							<div class="form-group">
								<label>Old Password</label>
								<input type="password" name="pwd1" class="form-control" placeholder="old password"
									required>
							</div>
							<div class="form-group">
								<label>New Password</label>
								<input type="password" name="pwd2" class="form-control" placeholder="new password"
									required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-block btn-danger">Change Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
