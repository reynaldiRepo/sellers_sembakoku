<div class="single-product-tab-area mg-tb-15">
	<!-- Single pro tab review Start-->
	<div class="single-pro-review-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="review-tab-pro-inner">
						<ul id="myTab3" class="tab-review-design">
							<li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i>
									Product Edit</a></li>
						</ul>
						<div id="myTabContent" class="tab-content custom-product-edit">
							<?= $this->session->flashdata("msg")?>
							<div class="product-tab-list tab-pane fade active in" id="description">
								<?php echo form_open_multipart('Home/edit_produk_pros/'.$produk["id"]);?>
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="review-content-section">
												<div class="input-group mg-b-pro-edt">
													<center>
														<h4>Foto Produk</h4>
														<img class="img-fluid" id="image-preview"
															src="<?= base_url("upload/product/".$produk["image_url"])?>"
															style="width: 200px;">
														<hr>
													</center>
													<div class="form-group">
														<input type="file" class="form-control" id="img-in" name="image"
															 accept="image/*">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
											<div class="review-content-section">

												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon">Jenis Barang </span>
													<select class="form-control" required name="tipe_barang">
														<option>Jenis Barang</option>
														<?php foreach($item_type as $it){?>
														<option value="<?= $it->id?>" 
                                                        <?php if($produk["itemtype_id"] == $it->id){echo "selected";}?>
                                                        ><?= $it->information?></option>
														<?php } ?>
													</select>
												</div>
												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon">Nama Produk</span>
													<input type="text" class="form-control" required name="name"
														placeholder="Nama Produk" value="<?=$produk["name"]?>">
												</div>
												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon">(Harga) Rp.</span>
													<input type="text" class="form-control" required name="harga"
														placeholder="Harga" value="<?=$produk["price"]?>">
												</div>
												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon">Deskripsi</span>
													<textarea class="form-control" required name="desc"
														placeholder="Deskripsi"><?=$produk["detail"]?></textarea>
												</div>
												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon">Stok</span>
													<input type="number" min=1 class="form-control" required name="stok"
														placeholder="Jumlah Stok" value="<?=$produk["amount_of_stock"]?>">
												</div>
												<div class="input-group mg-b-pro-edt">
													<span class="input-group-addon">Diskon</span>
													<input type="number" min=0 max=100 class="form-control" required
														name="on_sale" placeholder="diskon" value=0 value="<?=$produk["on_sale"]?>">
													<span class="input-group-addon">%</span>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="text-center mg-b-pro-edt custom-pro-edt-ds">
												<button class="btn btn-primary waves-effect waves-light m-r-10"
													type="submit">Save
												</button>
												<a href="<?= base_url("Home/produk")?>"
													class="btn btn-warning bg-warning">Discard
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

<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$("#image-preview").attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}

	$("#img-in").change(function () {
		readURL(this);
	});

</script>
