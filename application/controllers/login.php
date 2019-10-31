<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_valid') == TRUE ){
			redirect("admin");
		}

		$this->load->view('login');
	}



	public function do_login()
	{
		$u = $this->input->post("user");
		$p = hash('sha512',$this->input->post("pass"));
		//$p = md5($this->input->post("pass"));

		// echo json_encode('user' => $user, 'pass' => $pass);
		// echo $u."<br>".$p;

		$cari = $this->model_admin->cek_login($u, $p)->row();
		$hitung = $this->model_admin->cek_login($u, $p)->num_rows();

		if ($hitung > 0) {

			$data = array('admin_id' => $cari->id_user ,
							'admin_user' => $cari->username,
							'admin_nama' => $cari->nama,
							'admin_kode' => $cari->kode_user,
							'admin_status' => $cari->status,
							'admin_valid' => TRUE
			);
if($cari->status < 1){
	echo "<script> alert ('Maaf User Anda belum aktif, segera menghubungi admin, Terima kasih'); </script> ";
	redirect('login','refresh');
}else{
			$this->session->set_userdata($data);

			redirect('admin','refresh'); }
		}else{
			echo "<script> alert ('Maaf username atau password salah'); </script> ";
			redirect('login','refresh');
		}



	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
