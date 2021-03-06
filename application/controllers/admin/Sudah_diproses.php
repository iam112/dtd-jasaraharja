<?php
defined('BASEPATH') or exit('No script access allowed');

class Sudah_diproses extends CI_Controller {

    // Load Model 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model');
        $this->load->model('user_model');
        $this->load->model('konfigurasi_model');
        $this->load->model('status_model');
        $this->load->model('regional_model');
        $this->load->library('excel');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    // Data On Progress
    public function index()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $sudah_diproses = $this->data_model->data_sudah();
            $data = array(  'title' =>  'Menu On Progress',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'sudah_diproses'    =>  $sudah_diproses,
                            'isi'   =>  'admin/sudah_diproses/list'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Delete Semua
    public function hapus_semua()
    {
        
        if($this->session->userdata('level') == '1') {
            
            require_once(APPPATH.'views/vendor/autoload.php');
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'c451a8fcd656194f0e5b', //ganti dengan App_key pusher Anda
                '8530a44ac5725f910579', //ganti dengan App_secret pusher Anda
                '921567', //ganti dengan App_key pusher Anda
                $options
            );
            $pusher->trigger('my-channel', 'my-event', array('message' => 'success'));

            $this->data_model->hapus_semuasudah();
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/sudah_diproses'), 'refresh');
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Total Data On Progress
    public function total_sudah()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $total_sudah = $this->data_model->data_sudah();
            $data = array(  'title' =>  'Menu On Progress',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'total_sudah'    =>  $total_sudah,
                            'isi'   =>  'admin/sudah_diproses/total_sudah'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Pekanbaru
    public function pekanbaru()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $pekanbaru = $this->data_model->data_sudah_pekanbaru();
            $data = array(  'title' =>  'Total On Progress Kota Pekanbaru',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'pekanbaru'    =>  $pekanbaru,
                            'isi'   =>  'admin/sudah_diproses/pekanbaru'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Dumai
    public function dumai()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $dumai = $this->data_model->data_sudah_dumai();
            $data = array(  'title' =>  'Total On Progress Kota Dumai',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'dumai'    =>  $dumai,
                            'isi'   =>  'admin/sudah_diproses/dumai'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Siak
    public function siak()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $siak = $this->data_model->data_sudah_siak();
            $data = array(  'title' =>  'Total On Progress Kota Siak',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'siak'    =>  $siak,
                            'isi'   =>  'admin/sudah_diproses/siak'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Rohul
    public function rohul()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $rohul = $this->data_model->data_sudah_rohul();
            $data = array(  'title' =>  'Total On Progress Kabupaten Rokan Hulu',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'rohul'    =>  $rohul,
                            'isi'   =>  'admin/sudah_diproses/rohul'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Rohil
    public function rohil()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $rohil = $this->data_model->data_sudah_rohil();
            $data = array(  'title' =>  'Total On Progress Kabupaten Rokan Hilir',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'rohil'    =>  $rohil,
                            'isi'   =>  'admin/sudah_diproses/rohil'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Pelalawan
    public function pelalawan()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $pelalawan = $this->data_model->data_sudah_pelalawan();
            $data = array(  'title' =>  'Total On Progress Kabupaten Pelalawan',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'pelalawan'    =>  $pelalawan,
                            'isi'   =>  'admin/sudah_diproses/pelalawan'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Kuansing
    public function kuansing()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $kuansing = $this->data_model->data_sudah_kuansing();
            $data = array(  'title' =>  'Total On Progress Kabupaten Kuantan Singingi',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'kuansing'    =>  $kuansing,
                            'isi'   =>  'admin/sudah_diproses/kuansing'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Kampar
    public function kampar()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $kampar = $this->data_model->data_sudah_kampar();
            $data = array(  'title' =>  'Total On Progress Kabupaten Kampar',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'kampar'    =>  $kampar,
                            'isi'   =>  'admin/sudah_diproses/kampar'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Inhu
    public function inhu()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $inhu = $this->data_model->data_sudah_inhu();
            $data = array(  'title' =>  'Total On Progress Kabupaten Indragiri Hulu',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'inhu'    =>  $inhu,
                            'isi'   =>  'admin/sudah_diproses/inhu'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Inhil
    public function inhil()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $inhil = $this->data_model->data_sudah_inhil();
            $data = array(  'title' =>  'Total On Progress Kabupaten Indragiri Hilir',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'inhil'    =>  $inhil,
                            'isi'   =>  'admin/sudah_diproses/inhil'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Data Bengkalis
    public function bengkalis()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $bengkalis = $this->data_model->data_sudah_bengkalis();
            $data = array(  'title' =>  'Total On Progress Kabupaten Bengkalis',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'bengkalis'    =>  $bengkalis,
                            'isi'   =>  'admin/sudah_diproses/bengkalis'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    //Tambah
    public function tambah()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $regional = $this->regional_model->listing();

            //Validasi input
            $valid = $this->form_validation;
            
            $valid->set_rules('nopol', 'Nomor Polisi', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('pemilik', 'Pemilik', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('alamat', 'alamat', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('no_telpon', 'Nomor Telpon', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('kondisi', 'Kondisi', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('masa_awal', 'Masa Berlaku Awal', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('masa_akhir', 'Masa Berlaku Akhir', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('tarif', 'Tarif', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('regional', 'Regional', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('janji_bayar', 'Janji Bayar', 'required',
                        array('required'    =>  "%s Harus diisi"));
            
            if($valid->run()===false){
                //End validasi
            $data = array(	'title' => 'Tambah On Progress',
                            'admin'    =>  $admin,
                            'regional'  =>  $regional,
                            'konfigurasi'   =>  $konfigurasi,
                            'isi'      => 'admin/sudah_diproses/tambah');
            $this->load->view('admin/layout/wrapper',$data,FALSE);
            //Masuk Database
            }else{
            $i = $this->input;   
            $status = "Sudah Diproses";
                
                $data = array(  'nopol'         =>  $i->post('nopol'),
                                'pemilik'       =>  $i->post('pemilik'),
                                'alamat'        =>  $i->post('alamat'),
                                'no_telpon'     =>  $i->post('no_telpon'),
                                'kondisi'       =>  $i->post('kondisi'),
                                'status'        =>  $status,
                                'masa_awal'     =>  $i->post('masa_awal'),
                                'masa_akhir'    =>  $i->post('masa_akhir'),
                                'tarif'         =>  $i->post('tarif'),
                                'regional'      =>  $i->post('regional'),
                                'janji_bayar'      =>  $i->post('janji_bayar'),
                            );
                require_once(APPPATH.'views/vendor/autoload.php');
                $options = array(
                    'cluster' => 'ap1',
                    'useTLS' => true
                );
                $pusher = new Pusher\Pusher(
                    'c451a8fcd656194f0e5b', //ganti dengan App_key pusher Anda
                    '8530a44ac5725f910579', //ganti dengan App_secret pusher Anda
                    '921567', //ganti dengan App_key pusher Anda
                    $options
                );
                $pusher->trigger('my-channel', 'my-event', array('message' => 'success'));
                $this->data_model->tambah($data);
                $this->session->set_flashdata('sukses','Data telah ditambah');
                redirect(base_url('admin/sudah_diproses'),'refresh');
            }
            //Akhir masuk database
            $data = array(	'title' => 'Tambah On Progress',
                            'konfigurasi'   =>  $konfigurasi,
                            'admin'    =>  $admin,
                            'regional'  =>  $regional,
                            'isi'      => 'admin/sudah_diproses/tambah');
            $this->load->view('admin/layout/wrapper',$data,FALSE);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    //Edit Catatan
    public function edit($id = null)
    {
        if (!isset($id)) show_404();

        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);
            

            $regional = $this->regional_model->listing();

            //Ambil data yg akan diedit
            $sudah_diproses     = $this->data_model->detail_sudah($id);
            //validasi input
            $valid      = $this->form_validation;
            
            $valid->set_rules('nopol', 'Nomor Polisi', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('pemilik', 'Pemilik', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('alamat', 'Alamat', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('no_telpon', 'Nomor Telepon', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('kondisi', 'Kondisi', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('masa_awal', 'Masa Berlaku Awal', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('masa_akhir', 'Masa Berlaku Akhir', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('tarif', 'Tarif', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('regional', 'Regional', 'required',
                        array('required'    =>  "%s Harus diisi"));
            
            if($valid->run()===false){
                //Akhir Validasi
            $data = array(  'title'     =>  'Edit On Progress',
                            'sudah_diproses'   =>  $sudah_diproses,
                            'konfigurasi'   =>  $konfigurasi,
                            'admin'    =>  $admin,
                            'regional' => $regional,
                            'isi'       =>  'admin/sudah_diproses/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
            
            if (!$sudah_diproses) show_404();
            
            //masuk database
            }else{
                $i = $this->input;
                $waktu = date("Y-m-d H:i");

                if($i->post('status') == 'Selesai') {
                    $data = array(  'id'  =>  $id,
                                    'nopol' =>  $i->post('nopol'),
                                    'pemilik'       =>  $i->post('pemilik'),
                                    'alamat'           =>  $i->post('alamat'),
                                    'no_telpon'           =>  $i->post('no_telpon'),
                                    'kondisi'           =>  $i->post('kondisi'),
                                    'status'           =>  $i->post('status'),
                                    'masa_awal'           =>  $i->post('masa_awal'),
                                    'masa_akhir'           =>  $i->post('masa_akhir'),
                                    'tarif'           =>  $i->post('tarif'),
                                    'regional'           =>  $i->post('regional'),
                                    'janji_bayar'           =>  $i->post('janji_bayar'),
                                    'tanggal_pelaksanaan'   =>  $waktu
                                );
                    $this->data_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/sudah_diproses'), 'refresh');
                }else{
                    $data = array(  'id'  =>  $id,
                                    'nopol' =>  $i->post('nopol'),
                                    'pemilik'       =>  $i->post('pemilik'),
                                    'alamat'           =>  $i->post('alamat'),
                                    'no_telpon'           =>  $i->post('no_telpon'),
                                    'kondisi'           =>  $i->post('kondisi'),
                                    'status'           =>  $i->post('status'),
                                    'masa_awal'           =>  $i->post('masa_awal'),
                                    'masa_akhir'           =>  $i->post('masa_akhir'),
                                    'tarif'           =>  $i->post('tarif'),
                                    'regional'           =>  $i->post('regional'),
                                    'janji_bayar'           =>  $i->post('janji_bayar'),
                                );
                    $this->data_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/sudah_diproses'), 'refresh');
                }
            }
            //akhir masuk database
            $data = array(  'title'     =>  'Edit On Progress',
                            'sudah_diproses'   =>  $sudah_diproses,
                            'konfigurasi'   =>  $konfigurasi,
                            'admin'    =>  $admin,
                            'regional' => $regional,
                            'isi'       =>  'admin/sudah_diproses/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Delete Siswa
    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        
        if($this->session->userdata('level') == '1') {
            $data = array('id' => $id);
            if (!$data) {
                show_404();
            }else{

                $sudah_diproses     = $this->data_model->detail_delete($id);

                if($sudah_diproses->ttd != null) {
                    unlink('assets/upload/image/'.$sudah_diproses->ttd);
                }
                require_once(APPPATH.'views/vendor/autoload.php');
                $options = array(
                    'cluster' => 'ap1',
                    'useTLS' => true
                );
                $pusher = new Pusher\Pusher(
                    'c451a8fcd656194f0e5b', //ganti dengan App_key pusher Anda
                    '8530a44ac5725f910579', //ganti dengan App_secret pusher Anda
                    '921567', //ganti dengan App_key pusher Anda
                    $options
                );
                $pusher->trigger('my-channel', 'my-event', array('message' => 'success'));
                $this->data_model->delete($data);
                $this->session->set_flashdata('sukses', 'Data telah dihapus');
                redirect(base_url('admin/sudah_diproses'), 'refresh');
            }
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }
    
    // Cetak Belum Diproses 
    public function cetak()
    {
        if($this->session->userdata('level') == '1') {
            $sudah_diproses = $this->data_model->data_sudah();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING YANG ON PROGRESS',
                            'sudah_diproses' =>  $sudah_diproses,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    public function cetak_akhir()
    {
        if($this->session->userdata('level') == '1') {
            $masa_akhir = $this->input->post('masa_akhir');
            $cetak_akhir = $this->data_model->cetak_akhir_sudah($masa_akhir);
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING YANG ON PROGRESS BERDASARKAN MASA AKHIR',
                            'cetak_akhir' =>  $cetak_akhir,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_akhir', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Pekanbaru
    public function cetak_pekanbaru()
    {
        if($this->session->userdata('level') == '1') {
            $pekanbaru = $this->data_model->data_sudah_pekanbaru();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING PEKANBARU YANG ON PROGRESS',
                            'pekanbaru' =>  $pekanbaru,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_pekanbaru', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Dumai
    public function cetak_dumai()
    {
        if($this->session->userdata('level') == '1') {
            $dumai = $this->data_model->data_sudah_dumai();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING DUMAI YANG ON PROGRESS',
                            'dumai' =>  $dumai,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_dumai', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Siak
    public function cetak_siak()
    {
        if($this->session->userdata('level') == '1') {
            $siak = $this->data_model->data_sudah_siak();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING SIAK YANG ON PROGRESS',
                            'siak' =>  $siak,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_siak', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Rohul
    public function cetak_rohul()
    {
        if($this->session->userdata('level') == '1') {
            $rohul = $this->data_model->data_sudah_rohul();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING ROKAN HULU YANG ON PROGRESS',
                            'rohul' =>  $rohul,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_rohul', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }
    
    // Cetak Rohil
    public function cetak_rohil()
    {
        if($this->session->userdata('level') == '1') {
            $rohil = $this->data_model->data_sudah_rohil();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING ROKAN HILIR YANG ON PROGRESS',
                            'rohil' =>  $rohil,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_rohil', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Pelalawan
    public function cetak_pelalawan()
    {
        if($this->session->userdata('level') == '1') {
            $pelalawan = $this->data_model->data_sudah_pelalawan();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING PELALAWAN YANG ON PROGRESS',
                            'pelalawan' =>  $pelalawan,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_pelalawan', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Kuansing
    public function cetak_kuansing()
    {
        if($this->session->userdata('level') == '1') {
            $kuansing = $this->data_model->data_sudah_kuansing();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING KUANTAN SINGINGI YANG ON PROGRESS',
                            'kuansing' =>  $kuansing,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_kuansing', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Kampar
    public function cetak_kampar()
    {
        if($this->session->userdata('level') == '1') {
            $kampar = $this->data_model->data_sudah_kampar();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING KAMPAR YANG ON PROGRESS',
                            'kampar' =>  $kampar,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_kampar', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Inhu
    public function cetak_inhu()
    {
        if($this->session->userdata('level') == '1') {
            $inhu = $this->data_model->data_sudah_inhu();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING INDRAGIRI HULU YANG ON PROGRESS',
                            'inhu' =>  $inhu,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_inhu', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Inhil
    public function cetak_inhil()
    {
        if($this->session->userdata('level') == '1') {
            $inhil = $this->data_model->data_sudah_inhil();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING INDRAGIRI HILIR YANG ON PROGRESS',
                            'inhil' =>  $inhil,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_inhil', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Bengkalis
    public function cetak_bengkalis()
    {
        if($this->session->userdata('level') == '1') {
            $bengkalis = $this->data_model->data_sudah_bengkalis();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING BENGKALIS YANG ON PROGRESS',
                            'bengkalis' =>  $bengkalis,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/sudah_diproses/cetak_bengkalis', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }
}
?>