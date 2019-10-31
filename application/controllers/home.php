<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
			$a['page']	= "home";

			$a['tampil_keluhan']	= $this->model_home->tampil_keluhan()->result_object();

      $this->load->view('home', $a);

    }

    public function register()
    {
        $this->load->view('register');
    }

    public function do_register()
    {
        $u = $this->input->post("user");
        $p = hash('sha512', $this->input->post("pass"));
        $p2 = hash('sha512', $this->input->post("pass2"));
        $n = $this->input->post("nama");
        $e = $this->input->post("email");
        $h = $this->input->post("hp");
        $a = $this->input->post("alamat");
        $kode = '1';

        if ($p == $p2) {
            $cari = $this->model_home->cek_reg($u, $e)->row();
            $hitung = $this->model_home->cek_reg($u, $e)->num_rows();

            if ($hitung < 1) {
                $object = array(
                        'username' => $u,
                        'password' => $p,
                        'nama' => $n,
                        'email' => $e,
                        'alamat' => $a,
                                        'kode_user' => $kode
                    );
                $this->db->insert('tb_login', $object);

                if ($this== true) {
                    echo "<script> alert ('Anda terdaftar dan segera menghubungi Admin untuk mengaktifkan akun and.'); </script> ";
                    redirect('home/register', 'refresh');
                } else {
                    echo "<script> alert ('Maaf Inputan Salah'); </script> ";
                    redirect('home/register', 'refresh');
                }
            } else {
                echo "<script> alert ('Maaf username atau Email sudah Terdaftar'); </script> ";
                redirect('home/register', 'refresh');
            }
        } else {
            echo "<script> alert ('Maaf Password tidak sama'); </script> ";
            redirect('home/register', 'refresh');
        }
    }

		public function tambah_home()
		{
				$k = $this->input->post("kategori");
				$n = $this->input->post("nama");
				$e = $this->input->post("email");
				$h = $this->input->post("hp");
				$a = $this->input->post("alamat");
				$i = $this->input->post("isi_home");
				$t = $this->input->post("tgl");

				if ($k == "Keluhan") {

								$object = array(
												'nama' => $n,
												'isi_keluhan' => $i,
												'no_hp' => $h,
												'email' => $e,
												'alamat' => $a,
												'tgl_keluhan' => $t
										);
								$this->db->insert('tb_keluhan', $object);

								if ($this== true) {
										echo "<script> alert ('Keluhan Anda sudah tersimpan.'); </script> ";
										redirect('home', 'refresh');
								} else {
										echo "<script> alert ('Maaf Inputan Salah'); </script> ";
										redirect('home', 'refresh');
								}
						} else {

							$object = array(
											'nama' => $n,
											'isi_surat' => $i,
											'no_hp' => $h,
											'email' => $e,
											'alamat' => $a,
											'tgl_surat' => $t
									);
							$this->db->insert('tb_surat', $object);

							if ($this== true) {
									echo "<script> alert ('Surat Anda sudah tersimpan.'); </script> ";
									redirect('home', 'refresh');
							} else {
									echo "<script> alert ('Maaf Inputan Salah'); </script> ";
									redirect('home/register', 'refresh');
							}
					}
				}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
