<div class="data-table-area mg-tb-15">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="sparkline13-list">
					<div class="sparkline13-hd">
						<div class="main-sparkline13-hd">
							<h1>Daftar Produk</h1>
						</div>
					</div>
					<div class="sparkline13-graph">
						<?= $this->session->flashdata("msg")?>
						<div class="datatable-dashv1-list custom-datatable-overright">
							<div id="toolbar">
								<a class="btn btn-info" href="<?= base_url("Home/add_produk")?>">Tambah Produk</a>
							</div>
							<table id="table" data-toggle="table" data-pagination="true" data-search="true"
								data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false"
								data-key-events="true" data-show-toggle="true" data-resizable="false" data-cookie="true"
								data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="false"
								data-toolbar="#toolbar">
								<thead>
									<tr>
										<th data-field="Nama Produk" data-editable="false">Nama Produk</th>
										<th data-field="Image Produk" data-editable="false">Image Produk</th>
										<th data-field="Stok" data-editable="false">Stok</th>
										<th data-field="Harga" data-editable="false">Harga</th>
										<th data-field="date" data-editable="false">Date</th>
										<th data-field="Terjual" data-editable="false">Terjual</th>
										<th data-field="Total Sales" data-editable="false">Total Sales</th>
										<th data-field="sale" data-editable="false">Sale / Discount</th>
										<th data-field="action">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($produk as $p){?>
									<tr>
										<td><?= $p->name?></td>
										<td>
											<center>
												<img src="<?= base_url("upload/product/").$p->image_url ?>"
													style="width:60px" />
										</td>
										</center>
										<td><?= $p->amount_of_stock?></td>
										<td>Rp. <?= $p->price?></td>
										<td><?= substr($p->date_of_sell,0,10)?></td>
										<td><?= $p->nItem?></td>
										<td><?= (int)$p->nItem * (int)$p->price?></td>
										<td><?= $p->on_sale?> %</td>
										<td class="datatable-ct">
											<a href="<?=base_url("Home/edit_produk/".$p->id)?>" class="btn btn-success"
												title="edit"><i class="fa fa-edit"></i></a>
											<button onclick="del('<?=base_url("Home/delete_produk/".$p->id)?>')"
												class="btn btn-danger" title="delete"><i
													class="fa fa-trash"></i></button>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function del(url) {
		var c = confirm("Yakin untuk menghapus produk ini ?");
		if (confirm) {
			window.location.href = url;
		}
	}

</script>
