          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>
                    <?php foreach ($suket as $s): ?>
                      <?php echo $s['jumlah'] ?>
                    <?php endforeach ?>

                  </h3>
                  <p>Cetak Hari Ini</p>
                </div>
                <div class="icon">
                  <i class="fa fa-print"></i>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                    <?php foreach ($suket_total as $j) {
                      echo $j['jumlah'];
                    } ?>
                  </h3>
                  <p>Total Cetak</p>
                </div>
                <div class="icon">
                  <i class="fa fa-print"></i>
                </div>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->        

         <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">INFORMASI</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body"> 
              Aplikasi ini digunakan untuk mendata, mencetak surat keterangan KTP-EL Offline
            </div><!-- /.box-body -->
          </div><!-- /.box -->