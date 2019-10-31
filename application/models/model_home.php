<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Model_home extends CI_Model
{

    /* Fungsi user data*/


    public function cek_reg($user, $email)
    {
        $array = array('username' => $user, 'email' => $email);

        $query = $this->db->where($array);

        $query = $this->db->get('tb_login');

        return $query;
    }

    public function tampil_keluhan()
    {
        return $this->db->query("SELECT a.* FROM tb_keluhan
     as a WHERE a.status='publik'");
    }

    public function tampil_user()
    {
        return $this->db->get('login');
    }

    public function insert_user($object)
    {
        $this->db->insert('login', $object);
    }

    public function edit_user($id)
    {
        return $this->db->get_where('login', array('id_user'=>$id));
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
