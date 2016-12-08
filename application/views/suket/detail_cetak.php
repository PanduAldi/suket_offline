<div class="box">
	<div class="box-header">
		<h3 class="box-title">
			Detail Surat Keterangan KTP El : <?php echo $d->no_suket ?>
		</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<td><label for="" class="control-label">NIK</label></td>
						<td>:</td>
						<td><?php echo $d->bio_nik ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Nama</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_nama) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Tempat, Tanggal Lahir</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_tempat_lahir).", ".tgl_indo($d->bio_tanggal_lahir) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Jenis Kelamin</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_jk) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Alamat</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_alamat) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">RT/RW</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_rt_rw) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Desa/Kelurahan</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_desa) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Kecamatan</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_kecamatan) ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-6">
				<table class="table">
					<tr>
						<td><label for="" class="control-label">Agama</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_agama) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Status Perkawinan</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_status_perkawinan) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Pekerjaan</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_pekerjaan) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Kewarganegaraan</label></td>
						<td>:</td>
						<td><?php echo strtoupper($d->bio_kewarganegaraan) ?></td>
					</tr>
					<tr>
						<td><label for="" class="control-label">Waktu Cetak </label></td>
						<td>:</td>
						<td><?php echo tgl_indo($d->suket_date)." ".$d->suket_time ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>