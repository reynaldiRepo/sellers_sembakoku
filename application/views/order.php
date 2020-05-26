<div class="single-product-tab-area mg-tb-15">
	<!-- Single pro tab review Start-->
	<div class="single-pro-review-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="review-tab-pro-inner">
						<ul id="myTab3" class="tab-review-design">
							<li class="active"><a href="#orderT" id="order">Order</a></li>
							<li><a href="#dikirimT" id="dikirim">Dikirm</a></li>
							<li><a href="#diterimaT" id="diterima">Diterima</a></li>
							<li><a href="#gagalT" id="gagal">Tranksaksi Gagal</a></li>
						</ul>
						<div id="myTabContent" class="tab-content custom-product-edit">
						<?= $this->session->flashdata("msg")?>

							<div class="product-tab-list tab-pane fade active in" id="orderT">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Order Date</th>
											<th>Produk</th>
											<th>Jumlah</th>
											<th>Total Pembayaran</th>
											<th>Penerima</th>
											<th>Alamat Penerima</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($order as $o){ ?>
										<tr>
											<td><?=$o->date_status?></td>
											<td><?=$o->produk?></td>
											<td><?=$o->total_item?></td>
											<td>Rp. <?=$o->payment_amount?></td>
											<td><?=$o->pembeli?></td>
											<td><?=$o->address?></td>
											<td>

												<?php if($o->tssend_id == ""){?>
												<button type="button" class="btn-resi" data-toggle="modal"
													data-target=".modal-resi" data="<?=$o->ts_id?>"><i class="fa fa-upload"></i> Resi</button>
												<?php } else{ ?>
												Telah dikirim<?php } ?>
											</td>

										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
							<!-- ============================= -->
							<div class="product-tab-list tab-pane fade" id="dikirimT">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Send Date</th>
											<th>Produk</th>
											<th>Jumlah</th>
											<th>Total Pembayaran</th>
											<th>Penerima</th>
											<th>Alamat Penerima</th>
											<th>Resi</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($dikirim as $dk){ ?>
										<tr>
											<td><?=$dk->date_status?></td>
											<td><?=$dk->produk?></td>
											<td><?=$dk->total_item?></td>
											<td>Rp. <?=$dk->payment_amount?></td>
											<td><?=$dk->pembeli?></td>
											<td><?=$dk->address?></td>
											<td><img src="<?=base_url("upload/resi/".$dk->resi)?>" alt="" style="width:100px">
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
							<!-- ============================= -->
							<!-- ============================= -->
							<div class="product-tab-list tab-pane fade" id="diterimaT">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Recieve Date</th>
											<th>Produk</th>
											<th>Jumlah</th>
											<th>Total Pembayaran</th>
											<th>Penerima</th>
											<th>Alamat Penerima</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($diterima as $dt){ ?>
										<tr>
											<td><?=$dt->date_status?></td>
											<td><?=$dt->produk?></td>
											<td><?=$dt->total_item?></td>
											<td>Rp. <?=$dt->payment_amount?></td>
											<td><?=$dt->pembeli?></td>
											<td><?=$dt->address?></td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
							<!-- ============================= -->
							<!-- ============================= -->
							<div class="product-tab-list tab-pane fade" id="gagalT">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Cancel Date</th>
											<th>Produk</th>
											<th>Jumlah</th>
											<th>Total Pembayaran</th>
											<th>Penerima</th>
											<th>Alamat Penerima</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($gagal as $gg){ ?>
										<tr>
											<td><?=$gg->date_status?></td>
											<td><?=$gg->produk?></td>
											<td><?=$gg->total_item?></td>
											<td>Rp. <?=$gg->payment_amount?></td>
											<td><?=$gg->pembeli?></td>
											<td><?=$gg->address?></td>
										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
							<!-- ============================= -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(
		function () {
			var state = "<?= $state?>";
			$("#" + state).click();
		}
	)

</script>

<div id="DangerModalhdbgcl" class="modal-resi modal modal-adminpro-general FullColor-popup-DangerModal fade"
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
						<form action="" id="send_resi" enctype="multipart/form-data" method="post"
							accept-charset="utf-8">

							<center>
								<div class="input-group mg-b-pro-edt">
									<center>
										<h4>Resi Pengiriman</h4>
										<img class="img-fluid" id="image-preview"
											src="<?= base_url("Asset/")?>/img/product-none.png" style="width: 200px;">
										<hr>
									</center>
									<div class="form-group">
										<input type="file" class="form-control" id="img-in" name="image" required
											accept="image/*">
									</div>
								</div>
								<button class="btn btn-danger" type="submit">Kirim Barang</button>
							</center>
						</form>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

<script>
$(".btn-resi").click(
	function(){
		var url = "<?= base_url("Home/send_resi/")?>"+$(this).attr("data");
		$("#send_resi").attr("action", url);
	}
);
</script>


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
