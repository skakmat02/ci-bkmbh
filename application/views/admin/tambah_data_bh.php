<script>
function resizeTextarea (id) {
  var a = document.getElementById(id);
  a.style.height = 'auto';
  a.style.height = a.scrollHeight+'px';
}

function init() {
  var a = document.getElementsByTagName('textarea');
  for(var i=0,inb=a.length;i<inb;i++) {
     if(a[i].getAttribute('data-resizable')=='true')
      resizeTextarea(a[i].id);
  }
}



addEventListener('DOMContentLoaded', init);

</script>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tambah
              <small>Data</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/data_utama">Data Bantuan dan Mediasi</a></li>
              <li class="active">Tambah</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>

          <!-- Main content -->
          <section id="content" class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Data</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/insert_data_bh'); ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori</label>
                    <select  name="kategori" id="kategori" class="form-control" required>
                    <option  value="Bantuan Hukum">Bantuan Hukum</option>
                    <option  value="Mediasi">Mediasi</option>
                    </select>
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Isi Permintaan</label>
                      <textarea onkeyup="resizeTextarea('isi_bh')" id="isi_bh" class="form-control" name="isi_bh" placeholder="Isi Bantuan dan Mediasi" required ></textarea>
                  </div>

                  <div class="form-group" >
                      <input readonly type="hidden" value="" class="form-control" name="status" placeholder="Open"/>
                   </div>

                   <div class="form-group" >
                       <input readonly type="hidden" value="<?php echo date("Y/m/d h:i:sa") ; ?>" class="form-control" name="tgl_bh" placeholder="Tgl Konsultasi"/>
                    </div>

                  <div class="form-group">

                    <input readonly type="hidden" value="<?php  echo $this->session->userdata('admin_id');?>" class="form-control" name="id_user" placeholder="<?php  echo $this->session->userdata('admin_id');?>"/>
                  </div>
                  <a href="<?php echo base_url(); ?>admin/data_bh" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button id="simpan" type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php echo form_close(); ?>

               <!--   <div style="border:solid black;padding:10px;background:white;position:absolute;right:5%;top:10vh;" class="form-group" id="upload">
					 <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
					 <label id="upload">Pilih Gambar</label>
                <input type="file" name="image_file" id="image_file" required />
                                <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
           </form>
                </div> -->


              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>
