<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('isi','form'));
        // $this->load->model('model_admin');
    }

    public function index()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }

        $a['page']	= "home";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $this->load->view('admin/index', $a);
    }

    public function tampil()
    {
        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();
    }


    public function do_upload()
    {
        if (isset($_FILES["image_file"]["name"])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_file')) {
                echo $this->upload->display_errors();
            } else {
                $data = $this->upload->data();
                echo '<img src="'.base_url().'uploads/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" name="uploadsss" id="uploadsss"/>';
                echo '<br/><input type="text" class="form-control" id="url" name="url" value="'.base_url().'uploads/'.$data["file_name"].'" readonly />'  ;
            }
        }
    }

    public function config()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }

        $a['editdata']	= $this->db->get_where('tb_config')->result_object();
        $a['page']	= "config";


        $this->load->view('admin/index', $a);
    }

    public function update_config()
    {
        $dury = $this->input->post('dury');
        $durg = $this->input->post('durg');
        $idc = $this->input->post('idc');
        $object = array(
                'durasi_youtube' => $dury,
                'durasi_gambar' => $durg,
                'user' => 'Administrator'
            );
        $this->db->where('config_id', $idc);
        $this->db->update('tb_config', $object);

        redirect('admin/config', 'refresh');
    }



    /* Fungsi load data */

    public function data_bh()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }

        $a['page']	= "data_bh";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $this->load->view('admin/index', $a);
    }

    public function data_bh_sd()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }

        $a['page']	= "data_bh_sd";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $this->load->view('admin/index', $a);
    }

    public function data_konsultasi()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }

        $a['page']	= "data_konsultasi";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();



        $this->load->view('admin/index', $a);
    }

    public function data_konsultasi_sd()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }
        if ($this->session->userdata('admin_kode') != '5') {
            redirect("login");
        }

        $a['page']	= "data_konsultasi_sd";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();




        $this->load->view('admin/index', $a);
    }

    public function data_surat()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }

        if ($this->session->userdata('admin_kode') != '5') {
            redirect("login");
        }

        $a['page']	= "data_surat";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();



        $this->load->view('admin/index', $a);
    }

    public function data_keluhan()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }

        if ($this->session->userdata('admin_kode') != '5') {
            redirect("login");
        }

        $a['page']	= "data_keluhan";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $this->load->view('admin/index', $a);
    }

    /* Fungsi tambah data */

    public function tambah_data_konsultasi()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $a['page']	= "tambah_data_konsultasi";

        $this->load->view('admin/index', $a);
    }


    public function insert_data()
    {
        $kategori = $this->input->post('kategori');
        $isi_konsultasi = $this->input->post('isi_konsultasi');
        $status = $this->input->post('status');
        $tgl_konsultasi = $this->input->post('tgl_konsultasi');
        $id_user = $this->input->post('id_user');

        $object = array(
                'kategori' => $kategori,
                'isi_konsultasi' => $isi_konsultasi,
                'tgl_konsultasi' => $tgl_konsultasi,
                'id_user' => $id_user,
                'status' => $status
            );
        $this->db->insert('tb_konsultasi', $object);

        if ($this== true) {
            $this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Alert!</h4>
                Data Berhasil Disimpan
              </div>");
        } else {
            $this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Alert!</h4>
                Data Gagal Disimpan
              </div>");
        }
        redirect('admin/data_konsultasi', 'refresh');
    }

    public function tambah_data_bh()
    {
        if ($this->session->userdata('admin_valid') != true) {
            redirect("login");
        }

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $a['page']	= "tambah_data_bh";

        $this->load->view('admin/index', $a);
    }


    public function insert_data_bh()
    {
        $kategori = $this->input->post('kategori');
        $isi_bh = $this->input->post('isi_bh');
        $status = $this->input->post('status');
        $tgl_bh = $this->input->post('tgl_bh');
        $id_user = $this->input->post('id_user');

        $object = array(
                'kategori' => $kategori,
                'isi_bh' => $isi_bh,
                'tgl_bh' => $tgl_bh,
                'id_user' => $id_user,
                'status' => $status
            );
        $this->db->insert('tb_bantuan', $object);

        if ($this== true) {
            $this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Alert!</h4>
                Data Berhasil Disimpan
              </div>");
        } else {
            $this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Alert!</h4>
                Data Gagal Disimpan
              </div>");
        }
        redirect('admin/data_bh', 'refresh');
    }

    /* Fungsi hapus data*/

    public function hapus_data_bh($id)
    {
        $this->model_admin->hapus_data_bh($id);
        redirect('admin/data_bh', 'refresh');
    }
    public function hapus_data_konsultasi($id)
    {
        $this->model_admin->hapus_data_konsultasi($id);
        redirect('admin/data_konsultasi', 'refresh');
    }

    public function hapus_data_surat($id)
    {
        $this->model_admin->hapus_data_surat($id);
        redirect('admin/index', 'refresh');
    }

    public function hapus_data_keluhan($id)
    {
        $this->model_admin->hapus_data_keluhan($id);
        redirect('admin/index', 'refresh');
    }

    /* Fungsi edit data */

    public function edit_data_konsultasi($id)
    {
        $a['editdata']	= $this->db->get_where('tb_konsultasi', array('id_konsultasi'=>$id))->result_object();
        $a['page']	= "edit_data_konsultasi";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $this->load->view('admin/index', $a);
    }

    public function update_data_konsultasi()
    {
        $kategori = $this->input->post('kategori');
        $isi_konsultasi = $this->input->post('isi_konsultasi');
        $status = $this->input->post('status');
        $id_ut = $this->input->post('id_ut');
        $id_user = $this->input->post('id_user');
        $tanggapan = $this->input->post('tanggapan');
        $id=$this->input->post('id');
        $tgl_konsultasi = $this->input->post('tgl_konsultasi');
        $tgl_tanggapan = $this->input->post('tgl_tanggapan');

        $object = array(
          'kategori' => $kategori,
          'isi_konsultasi' => $isi_konsultasi,
          'id_ut' => $id_ut,
          'id_user' => $id_user,
          'status' => $status,
          'tanggapan' => $tanggapan,
          'tgl_konsultasi' => $tgl_konsultasi,
          'tgl_tanggapan' => $tgl_tanggapan

          );
        $this->db->where('id_konsultasi', $id);
        $this->db->update('tb_konsultasi', $object);
        if ($this==true) {
            $this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Berhasil Diupdate
            </div>");
        } else {
            $this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Gagal Diupdate
            </div>");
        }
        redirect('admin/data_konsultasi', 'refresh');
    }

    public function edit_data_bh($id)
    {
        $a['editdata']	= $this->db->get_where('tb_bantuan', array('id_bh'=>$id))->result_object();
        $a['page']	= "edit_data_bh";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $this->load->view('admin/index', $a);
    }

    public function update_data_bh()
    {
        $kategori = $this->input->post('kategori');
        $isi_bh = $this->input->post('isi_bh');
        $status = $this->input->post('status');
        $id_ut = $this->input->post('id_ut');
        $id_user = $this->input->post('id_user');
        $tanggapan = $this->input->post('tanggapan');
        $id=$this->input->post('id');
        $tgl_bh = $this->input->post('tgl_bh');
        $tgl_tanggapan = $this->input->post('tgl_tanggapan');

        $object = array(
          'kategori' => $kategori,
          'isi_bh' => $isi_bh,
          'id_ut' => $id_ut,
          'id_user' => $id_user,
          'status' => $status,
          'tanggapan' => $tanggapan,
          'tgl_bh' => $tgl_bh,
          'tgl_tanggapan' => $tgl_tanggapan

          );
        $this->db->where('id_bh', $id);
        $this->db->update('tb_bantuan', $object);
        if ($this==true) {
            $this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Berhasil Diupdate
            </div>");
        } else {
            $this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Gagal Diupdate
            </div>");
        }
        redirect('admin/data_bh', 'refresh');
    }


    public function edit_data_keluhan($id)
    {
        $a['editdata']	= $this->db->get_where('tb_keluhan', array('id_keluhan'=>$id))->result_object();
        $a['page']	= "edit_data_keluhan";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $this->load->view('admin/index', $a);
    }

    public function update_data_keluhan()
    {

        $isi_keluhan = $this->input->post('isi_keluhan');
        $status = $this->input->post('status');
        $id_ut = $this->input->post('id_ut');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $tanggapan = $this->input->post('tanggapan');
        $id=$this->input->post('id');
        $tgl_keluhan = $this->input->post('tgl_keluhan');
        $tgl_tanggapan = $this->input->post('tgl_tanggapan');

        $object = array(

          'isi_keluhan' => $isi_keluhan,
          'id_ut' => $id_ut,
          'nama' => $nama,
          'alamat' => $alamat,
          'email' => $email,
          'no_hp' => $no_hp,
          'status' => $status,
          'tanggapan' => $tanggapan,
          'tgl_keluhan' => $tgl_keluhan,
          'tgl_tanggapan' => $tgl_tanggapan

          );
        $this->db->where('id_keluhan', $id);
        $this->db->update('tb_keluhan', $object);
        if ($this==true) {
            $this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Berhasil Diupdate
            </div>");
        } else {
            $this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Gagal Diupdate
            </div>");
        }
        redirect('admin/data_keluhan', 'refresh');
    }

    public function edit_data_surat($id)
    {
        $a['editdata']	= $this->db->get_where('tb_surat', array('id_surat'=>$id))->result_object();
        $a['page']	= "edit_data_surat";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $this->load->view('admin/index', $a);
    }

    public function update_data_surat()
    {

        $isi_surat = $this->input->post('isi_surat');
        $status = $this->input->post('status');

        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');

        $id=$this->input->post('id');
        $tgl_surat = $this->input->post('tgl_surat');


        $object = array(

          'isi_surat' => $isi_surat,

          'nama' => $nama,
          'alamat' => $alamat,
          'email' => $email,
          'no_hp' => $no_hp,
          'status' => $status,
          'tgl_surat' => $tgl_surat

          );
        $this->db->where('id_surat', $id);
        $this->db->update('tb_surat', $object);
        if ($this==true) {
            $this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Berhasil Diupdate
            </div>");
        } else {
            $this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Gagal Diupdate
            </div>");
        }
        redirect('admin/data_surat', 'refresh');
    }


    /* Fungsi Manage User */
    public function data_user()
    {
        $a['data']	= $this->model_admin->tampil_user()->result_object();
        $a['page']	= "data_user";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();


        $this->load->view('admin/index', $a);
    }

    public function edit_data_user($id)
    {
        $a['editdata']	= $this->model_admin->edit_data_user($id)->result_object();
        $a['page']	= "edit_data_user";

        $a['tampil_surat']	= $this->model_admin->tampil_surat()->result_object();
        $a['tampil_surat_ht']	= $this->model_admin->tampil_surat()->num_rows();
        $a['tampil_keluhan']	= $this->model_admin->tampil_keluhan()->result_object();
        $a['tampil_keluhan_ht']	= $this->model_admin->tampil_keluhan()->num_rows();

        $a['tampil_konsultasi_admin']	= $this->model_admin->tampil_konsultasi_admin()->result_object();
        $a['tampil_konsultasi_admin_sd']	= $this->model_admin->tampil_konsultasi_admin_sd()->result_object();
        $a['tampil_konsultasi_admin_sd_ht']	= $this->model_admin->tampil_konsultasi_admin_sd()->num_rows();
        $a['tampil_konsultasi_admin_ht']	= $this->model_admin->tampil_konsultasi_admin()->num_rows();
        $a['tampil_bh_admin']	= $this->model_admin->tampil_bh_admin()->result_object();
        $a['tampil_bh_admin_ht']	= $this->model_admin->tampil_bh_admin()->num_rows();
        $a['tampil_bh_admin_sd']	= $this->model_admin->tampil_bh_admin_sd()->result_object();
        $a['tampil_bh_admin_sd_ht']	= $this->model_admin->tampil_bh_admin_sd()->num_rows();

        $a['tampil_bh']	= $this->model_admin->tampil_bh()->result_object();
        $a['tampil_bh_ht']	= $this->model_admin->tampil_bh()->num_rows();
        $a['tampil_konsultasi']	= $this->model_admin->tampil_konsultasi()->result_object();
        $a['tampil_konsultasi_ht']	= $this->model_admin->tampil_konsultasi()->num_rows();

        $this->load->view('admin/index', $a);
    }

    public function update_data_user()
    {
        $id 	  = $this->input->post('id');
        $username 	  = $this->input->post('username');
        $password = $this->input->post('password');
        $pass_old = $this->input->post('password2');
        $nama	  = $this->input->post('nama');
        $alamat	  = $this->input->post('alamat');
        $no_hp	  = $this->input->post('no_hp');
        $email  = $this->input->post('email');
        $status	  = $this->input->post('status');

        if (empty($password)) {
            $object = array(
                'username' => $username,
                'password' => $pass_old,
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'email' => $email,
                'status' => $status
            );
        } else {
            $object = array(
                'username' => $username,
                'password' => $password,
                'nama' => $nama,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'email' => $email,
                'status' => $status
            );
        }
        $this->db->where('id_user', $id);
        $this->db->update('tb_login', $object);
        if ($this==true) {
            $this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Berhasil Diupdate
            </div>");
        } else {
            $this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Alert!</h4>
              Data Gagal Diupdate
            </div>");
        }

        redirect('admin/data_user', 'refresh');
    }

    public function hapus_user($id)
    {
        $this->model_admin->hapus_user($id);
        redirect('admin/manage_user', 'refresh');
    }
}
