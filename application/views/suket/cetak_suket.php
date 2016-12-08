<style>
	.form_cetak td{
		padding : 5px;
	}
</style>

<div class="row">
	<div class="col-md-7">
		<div class="box">
			<div class="box-header with-border">
              <h3 class="box-title">SURAT KETERANGAN KTP ELEKTRONIK</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>		
			</div>
			<div class="box-body">
				<form action="<?php echo site_url('print_suket') ?>" method="post" onsubmit="clear()"> 
					<table class="form_cetak">
						<tr>
							<td width="150"><label for="" class="control-label">NIK</label></td>
							<td width="10">:</td>
							<td width="360">
								<input type="text" class="form-control text-uppercase" name="nik" id="nik" required>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><button type="button" id='cari' class="btn btn-primary"><i class="fa fa-search"></i> Cari NIK</button><span class="load_biodata" required></span></td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Nama</label></td>
							<td>:</td>
							<td><input type="text" name="nama" id="nama" class="form-control text-uppercase" required></td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Tempat Lahir</label></td>
							<td>:</td>
							<td><input type="text" name="tempat_lahir" class="form-control text-uppercase" id="tempat_lahir" required></td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Tanggal Lahir</label></td>
							<td>:</td>
							<td><input type="text" name="tanggal_lahir" class="form-control text-uppercase" data-inputmask="'alias' : 'dd-mm-yyyy'" id="tanggal_lahir" required></td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Jenis Kelamin</label></td>
							<td>:</td>
							<td>
								<select name="jk" id="jk" class="form-control text-uppercase" required>
									<option value="">-- Pilih Jenis Kelamin -- </option>
									<option value="laki-laki">laki-laki</option>
									<option value="perempuan">perempuan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Alamat</label></td>
							<td>:</td>
							<td><input type="text" name="alamat" id="alamat" class="form-control text-uppercase" required></td>
						</tr>
						<tr>
							<td><label for="" class="control-label">RT / RW</label></td>
							<td>:</td>
							<td><input type="text" class="form-control"  name="rt_rw" id="rt_rw" required></td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Desa / Kel</label></td>
							<td>:</td>
							<td><input type="text" name="desa" id="desa" class="form-control text-uppercase" required></td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Kecamatan</label></td>
							<td>:</td>
							<td><input type="text" name="kecamatan" id="kecamatan" class="form-control text-uppercase" required></td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Agama</label></td>
							<td>:</td>
							<td>
								<select name="agama" id="agama" class="form-control text-uppercase" required>
									<option value="">-- Pilih Agama -- </option>
									<option value="islam">islam</option>
									<option value="kristen">kristen</option>
									<option value="katolik">katolik</option>
									<option value="hindu">hindu</option>
									<option value="budhda">budha</option>
								</select>		
							</td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Status Perkawinan</label></td>
							<td>:</td>
							<td>
								<select name="status" id="status" class="form-control text-uppercase" required>
									<option value="">-- Pilih Status Perkawinan-- </option>
									<option value="kawin">kawin</option>
									<option value="belum kawin">belum kawin</option>
								</select>		
							</td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Pekerjaan</label></td>
							<td>:</td>
							<td><input type="text" name="pekerjaan" id="pekerjaan" class="form-control text-uppercase" required></td>
						</tr>
						<tr>
							<td><label for="" class="control-label">Kewarganegaraan</label></td>
							<td>:</td>
							<td><input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control text-uppercase" required></td>
						</tr>
						<tr>
							<td colspan="3">
								<button type='submit'  name="cetak" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>	
							</td>
						</tr>
					</table>
				</form>
			</div>	
		</div>
	</div>

	<div class="col-md-5">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Table History</h3>
			</div>
			<div class="box-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>No Surat</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody class="history">
						<tr><td colspan='3'>Tidak ada history</td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

    <!-- InputMask -->
    <script src="http://localhost/assets/adminlte/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="http://localhost/assets/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="http://localhost/assets/adminlte/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<script>
	$(function(){
		$("#tanggal_lahir").inputmask("dd-mm-yyyy", {"placeholder" : "dd-mm-yyyy"});
		$("#rt_rw").inputmask("099/099", {"placeholder" :"000/000"});
	})

	$(document).ready(function(){
		$("#cari").click(function(){
			var nik = $("#nik").val();

			$.ajax({
				url : "<?php echo site_url('cek_biodata') ?>",
				type: "POST",
				data : {
					nik : nik
				},
				dataType : "JSON",
				beforeSend : function(){
					$(".load_biodata").html(" Mencari Biodata . . .");
				},
				success : function(msg){
					if (msg.status == "success") 
					{
						$(".load_biodata").html("");
						$(".history").html("");
						//history
						$.each(msg.history, function(i, v){
								h = "<tr>";
								h += "	<td>"+this.no+"</td>";
								h += "	<td>"+this.no_surat+"</td>";
								h += "	<td>"+this.cek_detail+"</td>";
								h += "</tr>";
							$(".history").append(h);
						});
						$("#nama").val(msg.data.nama);
						$("#tempat_lahir").val(msg.data.tempat);
						$("#tanggal_lahir").val(msg.data.tl);
						$("#jk").val(msg.data.jk);
						$("#alamat").val(msg.data.alamat);
						$("#rt_rw").val(msg.data.rt_rw);
						$("#desa").val(msg.data.desa);
						$("#kecamatan").val(msg.data.kecamatan);
						$("#agama").val(msg.data.agama);
						$("#status").val(msg.data.status);
						$("#pekerjaan").val(msg.data.pekerjaan);
						$("#kewarganegaraan").val(msg.data.kewarganegaraan);
					}
					else
					{
						alert(msg.message);
						$("#nama").val("");
						$("#tempat_lahir").val("");
						$("#tanggal_lahir").val("");
						$("#jk").val("");
						$("#alamat").val("");
						$("#rt_rw").val("");
						$("#desa").val("");
						$("#kecamatan").val("");
						$("#agama").val("");
						$("#status").val("");
						$("#pekerjaan").val("");
						$("#kewarganegaraan").val("");
						$("#nik").focus();
						$(".load_biodata").html("");
						$(".history").html("<tr><td colspan='3'>Tidak ada history</td></tr>");
					}
				},
				error : function(XMLHttpRequest){
					alert(XMLHttpRequest.responseText);
				}
			})
		});
	})

	$(function(){
		$("#nik").val("");
		$("#nama").val("");
		$("#tempat_lahir").val("");
		$("#tanggal_lahir").val("");
		$("#jk").val("");
		$("#alamat").val("");
		$("#rt_rw").val("");
		$("#desa").val("");
		$("#kecamatan").val("");
		$("#agama").val("");
		$("#status").val("");
		$("#pekerjaan").val("");
		$("#kewarganegaraan").val("");
		$("#nik").focus();			
	})
</script>