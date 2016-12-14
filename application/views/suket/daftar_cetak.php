<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">
			Daftar Suket Tercetak
		</h3>
	</div>
	<div class="box-body">
			<table class="table table-bordered" id="tabel">
				<thead>
					<tr>
						<th>Nomor Surat</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Tanggal Cetak</th>
					</tr>
				</thead>
			</table>
		</div>
	
</div>

<script>
	$(function(){
        $('#tabel').dataTable({
            "processing" : true,
            "serverSide" : true,
            "ajax" : {
                "url" : "<?php echo site_url('suket_json') ?>",
                "type" : "POST"
            },
            "columns" : [
                            { data : 'no_surat'},
                            { data : 'nik'},
                            { data : 'nama'},
                            { data : 'tanggal_cetak'}, 
                        ],
            "scrollX" : true,
            "language" : {
                "lengthMenu" : "_MENU_",
                'infoEmpty' : "Data Masih Kosong",
                'zeroRecords' : "Data yang dicari tidak ada"
            },
            "order" : [[0, "desc"]]
        });
	})
</script>