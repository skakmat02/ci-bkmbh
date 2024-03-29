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
              <li><a href="<?php echo base_url(); ?>admin/data_utama">Data Utama</a></li>
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
                <h3 class="box-title">Form Data Tambah Data</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/insert_data'); ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Fakultas</label>
                    <select  name="fakultas" id="fakultas" class="form-control" required>
                      <?php
                      $jenis = $this->db->query("SELECT * FROM tb_fakultas")->result();
                      foreach ($jenis as $l_f) {
                        echo "<option  value='$l_f->fakultas'>".ucwords($l_f->fakultas)."</option>";
                      }

                      ?>

                    </select>
                  </div>

                  <div  id="form-group" class="form-group">
                    <label for="exampleInputEmail1">Program Studi</label>
                      <select name="prodi" id="prodi" class="form-control" required>
                        <?php
                        $jenis = $this->db->query("SELECT * FROM tb_prodi  ORDER BY prodi ASC")->result();
                        foreach ($jenis as $l_p) {
                          echo "<option  value='$l_p->prodi'>".ucwords($l_p->prodi)."</option>";
                        }
                        ?>

                      </select>
                  </div>
                  <div  id="form-group" class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                        <input type="number" id="nip" class="form-control" name="nip" placeholder="NIP" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" required />
                  </div>
                 <div class="form-group" >
                    <label for="exampleInputEmail1">Website</label>
                      <input type="text" id="website" class="form-control" name="website" placeholder="Website" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">TMT</label>
                      <input  type="text" class="form-control" name="tmt" id="tmt" data-date-format="yyyy-mm-dd" placeholder="TMT" data-provide="datepicker" value="<?php echo date("Y-m-d"); ?>" required />
                  </div>
                  <div class="form-group" >
                     <label for="exampleInputEmail1">Status</label>
                     <select name="status" id="status" class="form-control" required>
                       <option value='Aktif'>Aktif</option>
                       <option value='Tidak Aktif'>Tidak Aktif</option>
                     </select>
                   </div>
                   <div class="form-group" >
                      <label for="exampleInputEmail1">No. SKEP</label>
                        <input type="text" id="skep" class="form-control" name="skep" placeholder="Status" required />
                    </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Keterangan</label>
                      <textarea onkeyup="resizeTextarea('keterangan')" id="keterangan" class="form-control" name="keterangan" placeholder="Keterangan" required ></textarea>
                  </div>
                <!--    <div class="form-group">
                    <label for="exampleInputEmail1">Link Jurnal</label>
                      <input type="text" id="link" class="form-control" name="link" placeholder="LInk Jurnal" required />
                  </div>
                 <div class="form-group" id="isi">
                    <label for="exampleInputEmail1">Isi</label>
                      <textarea name="isi" class="form-control" cols="30" rows="10"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1" id="labelurl">Cover</label>

                    <div id="uploaded_image"></div>
                    <input type="text" class="form-control" id="urls" name="urls" value="" required  />

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Durasi</label>
                    <input type="text" class="form-control" name="durasi" placeholder="Durasi"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" class="form-control" required>
					<option value="Aktif">Aktif</option>
					<option value="Tidak Aktif">Tidak Aktif</option>
					</select>
                  </div> -->
                  <div class="form-group">

                    <input readonly type="hidden" value="<?php  echo $this->session->userdata('admin_nama');?>" class="form-control" name="user" placeholder="<?php  echo $this->session->userdata('admin_nama');?>"/>
                  </div>
                  <a href="<?php echo base_url(); ?>admin/data_utama" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
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
