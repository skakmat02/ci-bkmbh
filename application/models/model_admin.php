<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_admin extends CI_Model
{

  /* Fungsi tampil data*/

    public function tampil_config()
    {
        return $this->db->get('tb_config');
    }

    public function tampil_surat()
    {
        return $this->db->query("SELECT a.* FROM tb_surat
		 as a");
    }

    public function tampil_keluhan()
    {
        return $this->db->query("SELECT a.* FROM tb_keluhan
		 as a");
    }

    public function tampil_konsultasi()
    {
        return $this->db->query("SELECT a.* FROM tb_konsultasi
     as a WHERE a.id_user='".$this->session->userdata('admin_id')."'");
    }

    public function tampil_konsultasi_admin()
    {
        return $this->db->query("SELECT a.* FROM tb_konsultasi
     as a WHERE a.status=''");
    }

    public function tampil_konsultasi_admin_sd()
    {
        return $this->db->query("SELECT a.* FROM tb_konsultasi
     as a WHERE a.status='Closed'");
    }

    public function tampil_data_jurnal_doi()
    {
        return $this->db->query("SELECT a.* FROM tb_data_jurnal_doi
		 as a WHERE a.status='Aktif' AND a.user='".$this->session->userdata('admin_nama')."'");
    }

    public function tampil_bh()
    {
        return $this->db->query("SELECT a.* FROM tb_bantuan
     as a WHERE a.id_user='".$this->session->userdata('admin_id')."'");
    }
    public function tampil_bh_admin_sd()
    {
        return $this->db->query("SELECT a.* FROM tb_bantuan
     as a WHERE a.status='Closed'");
    }
    public function tampil_bh_admin()
    {
        return $this->db->query("SELECT a.* FROM tb_bantuan
     as a WHERE a.status=''");
    }


    /* Fungsi hapus data*/
    public function hapus_data_bh($id)
    {
        return $this->db->delete('tb_bantuan', array('id_bh' => $id));
    }

    public function hapus_data_konsultasi($id)
    {
        return $this->db->delete('tb_konsultasi', array('id_konsultasi' => $id));
    }

    public function hapus_data_surat($id)
    {
        return $this->db->delete('tb_surat', array('id_surat' => $id));
    }

    public function hapus_data_keluhan($id)
    {
        return $this->db->delete('tb_keluhan', array('id_keluhan' => $id));
    }











    /* Fungsi user data*/


    public function cek_login($user, $pass)
    {
        $array = array('username' => $user, 'password' => $pass);

        $query = $this->db->where($array);

        $query = $this->db->get('tb_login');

        return $query;
    }


    public function tampil_user()
    {
      return $this->db->query("SELECT a.* FROM tb_login
   as a WHERE a.kode_user='1'");
    }

      public function edit_data_user($id)
    {
        return $this->db->get_where('tb_login', array('id_user'=>$id));
    }

    public function update_user($id, $object)
    {
        $this->db->where('id_user', $id);
        $this->db->update('login', $object);
    }

    public function hapus_user($id)
    {
        return $this->db->delete('login', array('id_user' => $id));
    }
}
