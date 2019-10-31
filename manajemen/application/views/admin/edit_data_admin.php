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
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Edit
              <small>Data</small>
            </h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="<?php echo base_url(); ?>admin/data_utama">Data Utama</a></li>
              <li class="active">Edit</li>
              <!--
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
              -->
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Form Data Edit Data</h3>
              </div>
              <div class="box-body">
                <!-- form start -->
                <?php echo form_open('admin/update_data'); ?>
                <?php
                foreach ($editdata as $data):
                ?>

                <div class="form-group">
                    <label for="exampleInputEmail1">Fakultas</label>
                    <select  name="fakultas" id="fakultas" class="form-control" required>
                      <option value="<?php echo $data->fakultas ?>"><?php echo $data->fakultas ?></option>
                      <?php
                      $jenis = $this->db->query("SELECT * FROM tb_fakultas")->result();
                      foreach ($jenis as $l_f) { if ($l_f->fakultas==$data->fakultas){}else{
                        echo "<option  value='$l_f->fakultas'>".ucwords($l_f->fakultas)."</option>";}
                      }

                      ?>

                    </select>
                  </div>

                  <div  id="form-group" class="form-group">
                    <label for="exampleInputEmail1">Program Studi</label>
                      <select name="prodi" id="prodi" class="form-control" required>
                        <option value="<?php echo $data->prodi ?>"><?php echo $data->prodi ?></option>
                        <?php
                        $jenis = $this->db->query("SELECT * FROM tb_prodi  ORDER BY prodi ASC")->result();
                        foreach ($jenis as $l_p) { if ($l_p->prodi==$data->prodi){}else{
                          echo "<option  value='$l_p->prodi'>".ucwords($l_p->prodi)."</option>"; }
                        }
                        ?>

                      </select>
                  </div>
                  <div  id="form-group" class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                        <input type="number" id="nip" class="form-control" name="nip" placeholder="NIP" value="<?php echo $data->nip ?>" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $data->nama ?>" required />
                  </div>
                 <div class="form-group" >
                    <label for="exampleInputEmail1">Website</label>
                      <input type="text" id="website" class="form-control" name="website" placeholder="Website" value="<?php echo $data->website ?>" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">TMT</label>
                      <input  type="text" class="form-control" name="tmt" id="tmt" data-date-format="yyyy-mm-dd" placeholder="TMT" data-provide="datepicker" value="<?php echo $data->tmt ?>" required />
                  </div>
                  <div class="form-group" >
                     <label for="exampleInputEmail1">Status</label>
                     <select name="status" id="status" class="form-control" required>
                       <option value="<?php echo $data->status ?>"><?php echo $data->status ?></option>
                       <?php if ($data->status=="Aktif"){ ?>
                       <option value='Tidak Aktif'>Tidak Aktif</option>
                     <?php } else {?><option value='Aktif'>Aktif</option> <?php } ?>
                     </select>
                   </div>
                   <div class="form-group" >
                      <label for="exampleInputEmail1">No. SKEP</label>
                        <input value="<?php echo $data->skep ?>" type="text" id="skep" class="form-control" name="skep" placeholder="Status" required />
                    </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Keterangan</label>
                      <textarea  onkeyup="resizeTextarea('keterangan')" id="keterangan" class="form-control" name="keterangan" placeholder="Keterangan" required ><?php echo $data->keterangan ?></textarea>
                  </div>



                    <input readonly type="hidden" value="<?php  echo $this->session->userdata('admin_nama');?>" class="form-control" name="user" placeholder="<?php  echo $this->session->userdata('admin_nama');?>"/>
                  </div>

                  <input type="hidden" name="id" value="<?php echo $data->admin_id ?>">
                  <a href="<?php echo base_url(); ?>admin/index" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Batal</a>
                  <button type="submit" id="simpan" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <?php endforeach ?>
                <?php echo form_close(); ?>

              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div>
