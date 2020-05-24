<div class="single-product-tab-area mg-tb-15">
	<!-- Single pro tab review Start-->
	<div class="single-pro-review-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="review-tab-pro-inner">
						<ul id="myTab3" class="tab-review-design">
							<li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i>
									Product Detail</a></li>
						</ul>
						<div id="myTabContent" class="tab-content custom-product-edit">
							<div class="product-tab-list tab-pane fade active in" id="description">
								<form action="<?= base_url("Home/add_produk_pros")?>" method="POST">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="review-content-section">
												<div class="input-group mg-b-pro-edt">
													<div class="image-crop" hidden>
														<img src="img/product-none.png" alt="" style="width: 100%;">
													</div>
													<center>
														<h4>Foto Produk</h4>
														<img class="img-fluid"
															src="<?= base_url("Asset/")?>/img/product-none.png"
															style="width: 200px;">
														<hr>
													</center>
													<div class="form-group">
														<input type="file" class="form-control" id="img-in" name="image"
															required accept="image/*">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="review-content-section">

												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon"><i class="fa fa-shopping-bag"
															aria-hidden="true"></i></span>
													<select class="form-control" required name="tipe_barang">
														<option>Jenis Barang</option>
														<option value="1">Bahan Pokok</option>
														<option value="2">Bahan Lauk Pauk</option>
														<option value="3">Buah</option>
														<option value="4">Sayur</option>
														<option value="5">Bumbu Dapur</option>
													</select>
												</div>
												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon"><i class="fa fa-pencil"
															aria-hidden="true"></i></span>
													<input type="text" class="form-control" required name="name"
														placeholder="Nama Produk">
												</div>
												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon">Rp.</span>
													<input type="text" class="form-control" required name="harga"
														placeholder="Harga">
												</div>
												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon"><i class="fa fa-sticky-note-o"
															aria-hidden="true"></i></span>
													<textarea class="form-control" required name="Desc"
														placeholder="Deskripsi"></textarea>
												</div>
												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon"><i class="fa fa-qrcode"
															aria-hidden="true"></i></span>
													<input type="text" class="form-control" required name="stok"
														placeholder="Jumlah Stok">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
													<span class="input-group-addon"><i class="fa fa-qrcode"
															aria-hidden="true"></i></span>
													<input type="text" class="form-control" required name="stok"
														placeholder="Jumlah Stok">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="text-center mg-b-pro-edt custom-pro-edt-ds">
												<button type="button"
													class="btn btn-primary waves-effect waves-light m-r-10"
													type="submit">Save
												</button>
												<a href="<?= base_url("Home/produk")?>" class="btn btn-warning bg-warning">Discard
												</a>
											</div>
										</div>
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
