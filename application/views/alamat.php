<div class="col-md-12 col-sm-12 ">

	<nav aria-label="breadcrumb" class="main-breadcrumb ">
		<ol class="breadcrumb bg-primary text-white">
			<li> <i class="fa fa-map"></i> Informasi Data Alamat & Transportasi</li>
		</ol>
	</nav>

	<table>
		<form action="<?= base_url('Profil-info-alamat-save'); ?>" method="POST">
			<div class="col-md-12 ">
				<div class="x_panel">
					<div class="card-body ">
                        <span class="badge badge-primary">Data Domisili/Tempat Tinggal</span>
						<hr>
						<div class="row">
							<div class="col-sm-4">
								<h6 class="mb-0">Provinsi</h6>
							</div>
							<div class="col-8 text-secondary">
								<select class="form-control select2" name="provinsi" id="provinsi" >
									<option value="">-- Pilih --</option>
									<?php foreach($provinsi as $row):?>
									<option value="<?php echo $row->id_prov;?>"><?php echo $row->nama;?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
                        <hr>
						<div class="row">
							<div class="col-sm-4">
								<h6 class="mb-0">Kota/Kabupaten</h6>
							</div>
							<div class="col-8 text-secondary">
								<select class="form-control select2" id="kabupaten" name="kabupaten" >
									<option value="">-- Pilih --</option>
								</select>
							</div>
						</div>
                        <hr>
						<div class="row">
							<div class="col-sm-4">
								<h6 class="mb-0">Kecamatan</h6>
							</div>
							<div class="col-8 text-secondary">
								<select class="form-control select2" id="kecamatan" name="kecamatan" >
									<option value="">-- Pilih --</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-4">
								<h6 class="mb-0">Kelurahan</h6>
							</div>
							<div class="col-8 text-secondary">
								<select class="form-control select2" id="kelurahan" name="kelurahan" >
									<option value="">-- Pilih --</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-4">
								<h6 class="mb-0">Kode Pos </h6>
							</div>
							<div class="col-8 text-secondary">
								<input type="text" class="form-control" name="kode_pos" id="kode_pos"
									value="<?= $mhs->kode_pos; ?>">
							</div>
						</div>
						<hr>
						<div class="row">
							<label onclick="history.go(-1);" class="btn"><i class="fa fa-backward"></i> Kembali </label>
							<button class="btn btn-success"><i class="fa fa-save"></i> Simpan Perubahan</button>
						</div>
		</form>
	</table>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url().'template/build/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function () {

		$('#provinsi').change(function () {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Profil/get_kabupaten');?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_kab + '>' + data[i].nama +
							'</option>';
					}
					$('#kabupaten').html(html);
				}
			});
			return false;
		});

        $('#kabupaten').change(function () {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Profil/get_kecamatan');?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_kec + '>' + data[i].nama +
							'</option>';
					}
					$('#kecamatan').html(html);
				}
			});
			return false;
		});

        $('#kecamatan').change(function () {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('Profil/get_kelurahan');?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function (data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_kel + '>' + data[i].nama +
							'</option>';
					}
					$('#kelurahan').html(html);
				}
			});
			return false;
		});
	});

</script>
