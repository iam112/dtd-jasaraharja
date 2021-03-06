<?php
defined('BASEPATH') or exit('No script access allowed');

class Belum_diproses extends CI_Controller {

    // Load Model 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('datakapal_model');
        $this->load->model('user_model');
        $this->load->model('konfigurasi_model');
        $this->load->model('status_model');
        $this->load->model('regional_model');
        $this->load->library('excel');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    // Data Belum Diproses
    public function index()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $belum_diproses = $this->datakapal_model->data_belum();
            $data = array(  'title' =>  'Menu Belum Diproses',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'belum_diproses'    =>  $belum_diproses,
                            'isi'   =>  'admin/kapal/belum_diproses/list'
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

            $this->datakapal_model->hapus_semuabelum();
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/kapal/belum_diproses'), 'refresh');
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Total Data Belum Diproses
    public function total_belum()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $total_belum = $this->datakapal_model->data_belum();
            $data = array(  'title' =>  'Menu Belum Diproses',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'total_belum'    =>  $total_belum,
                            'isi'   =>  'admin/kapal/belum_diproses/total_belum'
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

            $pekanbaru = $this->datakapal_model->data_belum_pekanbaru();
            $data = array(  'title' =>  'Total Belum Diproses Kota Pekanbaru',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'pekanbaru'    =>  $pekanbaru,
                            'isi'   =>  'admin/kapal/belum_diproses/pekanbaru'
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

            $dumai = $this->datakapal_model->data_belum_dumai();
            $data = array(  'title' =>  'Total Belum Diproses Kota Dumai',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'dumai'    =>  $dumai,
                            'isi'   =>  'admin/kapal/belum_diproses/dumai'
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

            $siak = $this->datakapal_model->data_belum_siak();
            $data = array(  'title' =>  'Total Belum Diproses Kota Siak',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'siak'    =>  $siak,
                            'isi'   =>  'admin/kapal/belum_diproses/siak'
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

            $rohul = $this->datakapal_model->data_belum_rohul();
            $data = array(  'title' =>  'Total Belum Diproses Kabupaten Rokan Hulu',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'rohul'    =>  $rohul,
                            'isi'   =>  'admin/kapal/belum_diproses/rohul'
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

            $rohil = $this->datakapal_model->data_belum_rohil();
            $data = array(  'title' =>  'Total Belum Diproses Kabupaten Rokan Hilir',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'rohil'    =>  $rohil,
                            'isi'   =>  'admin/kapal/belum_diproses/rohil'
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

            $pelalawan = $this->datakapal_model->data_belum_pelalawan();
            $data = array(  'title' =>  'Total Belum Diproses Kabupaten Pelalawan',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'pelalawan'    =>  $pelalawan,
                            'isi'   =>  'admin/kapal/belum_diproses/pelalawan'
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

            $kuansing = $this->datakapal_model->data_belum_kuansing();
            $data = array(  'title' =>  'Total Belum Diproses Kabupaten Kuantan Singingi',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'kuansing'    =>  $kuansing,
                            'isi'   =>  'admin/kapal/belum_diproses/kuansing'
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

            $kampar = $this->datakapal_model->data_belum_kampar();
            $data = array(  'title' =>  'Total Belum Diproses Kabupaten Kampar',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'kampar'    =>  $kampar,
                            'isi'   =>  'admin/kapal/belum_diproses/kampar'
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

            $inhu = $this->datakapal_model->data_belum_inhu();
            $data = array(  'title' =>  'Total Belum Diproses Kabupaten Indragiri Hulu',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'inhu'    =>  $inhu,
                            'isi'   =>  'admin/kapal/belum_diproses/inhu'
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

            $inhil = $this->datakapal_model->data_belum_inhil();
            $data = array(  'title' =>  'Total Belum Diproses Kabupaten Indragiri Hilir',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'inhil'    =>  $inhil,
                            'isi'   =>  'admin/kapal/belum_diproses/inhil'
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

            $bengkalis = $this->datakapal_model->data_belum_bengkalis();
            $data = array(  'title' =>  'Total Belum Diproses Kabupaten Bengkalis',
                            'admin' =>  $admin,
                            'konfigurasi'   =>  $konfigurasi,
                            'bengkalis'    =>  $bengkalis,
                            'isi'   =>  'admin/kapal/belum_diproses/bengkalis'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    //Tambah Catatan
    public function tambah()
    {
        if($this->session->userdata('level') == '1') {
            $konfigurasi = $this->konfigurasi_model->listing();
            $username = $this->session->userdata('username');
            $admin = $this->user_model->listing($username);

            $regional = $this->regional_model->listing();

            //Validasi input
            $valid = $this->form_validation;
            
            $valid->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('pemilik', 'Pemilik', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('alamat', 'alamat', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('no_telpon', 'Nomor Telpon', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('nama_kapal', 'Nama Kapal', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('kondisi', 'Kondisi', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('jumlah_kapal', 'Jumlah Kapal', 'required',
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
                //End validasi
                
            $data = array(	'title' => 'Tambah Belum Diproses',
                            'admin'    =>  $admin,
                            'regional'  =>  $regional,
                            'konfigurasi'   =>  $konfigurasi,
                            'isi'      => 'admin/kapal/belum_diproses/tambah');
            $this->load->view('admin/layout/wrapper',$data,FALSE);
            //Masuk Database
            }else{
            $i = $this->input;   
            $status = "Belum Diproses";
                
                $data = array(  'nama_perusahaan'         =>  $i->post('nama_perusahaan'),
                                'pemilik'       =>  $i->post('pemilik'),
                                'alamat'        =>  $i->post('alamat'),
                                'no_telpon'     =>  $i->post('no_telpon'),
                                'nama_kapal'     =>  $i->post('nama_kapal'),
                                'kondisi'       =>  $i->post('kondisi'),
                                'jumlah_kapal'       =>  $i->post('jumlah_kapal'),
                                'status'        =>  $status,
                                'masa_awal'     =>  $i->post('masa_awal'),
                                'masa_akhir'    =>  $i->post('masa_akhir'),
                                'tarif'         =>  $i->post('tarif'),
                                'regional'      =>  $i->post('regional'),
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
                $this->datakapal_model->tambah($data);
                $this->session->set_flashdata('sukses','Data telah ditambah');
                redirect(base_url('admin/kapal/belum_diproses'),'refresh');
            }
            //Akhir masuk database
            $data = array(	'title' => 'Tambah Belum Diproses',
                            'konfigurasi'   =>  $konfigurasi,
                            'admin'    =>  $admin,
                            'regional'  =>  $regional,
                            'isi'      => 'admin/kapal/belum_diproses/tambah');
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
            $belum_diproses     = $this->datakapal_model->detail_belum($id);
            //validasi input
            $valid      = $this->form_validation;
            
            $valid->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('pemilik', 'Pemilik', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('alamat', 'Alamat', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('no_telpon', 'Nomor Telepon', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('nama_kapal', 'Nama Kapal', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('kondisi', 'Kondisi', 'required',
                        array('required'    =>  "%s Harus diisi"));

            $valid->set_rules('jumlah_kapal', 'Jumlah Kapal', 'required',
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
            
            $data = array(  'title'     =>  'Edit Belum Diproses',
                            'belum_diproses'   =>  $belum_diproses,
                            'konfigurasi'   =>  $konfigurasi,
                            'admin'    =>  $admin,
                            'regional' => $regional,
                            'isi'       =>  'admin/kapal/belum_diproses/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, false);
            
            if (!$belum_diproses) show_404();
            
            //masuk database
            }else{
                $i = $this->input;
                $waktu = date("Y-m-d H:i");

                if($i->post('status') == 'Selesai') {
                    $data = array(  'id'  =>  $id,
                                    'id_user'   =>  $this->session->userdata('id'),
                                    'nama_perusahaan' =>  $i->post('nama_perusahaan'),
                                    'pemilik'       =>  $i->post('pemilik'),
                                    'alamat'           =>  $i->post('alamat'),
                                    'no_telpon'           =>  $i->post('no_telpon'),
                                    'nama_kapal'        =>  $i->post('nama_kapal'),
                                    'kondisi'           =>  $i->post('kondisi'),
                                    'jumlah_kapal'           =>  $i->post('jumlah_kapal'),
                                    'status'           =>  $i->post('status'),
                                    'masa_awal'           =>  $i->post('masa_awal'),
                                    'masa_akhir'           =>  $i->post('masa_akhir'),
                                    'tarif'           =>  $i->post('tarif'),
                                    'regional'           =>  $i->post('regional'),
                                    'janji_bayar'           =>  $i->post('janji_bayar'),
                                    'tanggal_pelaksanaan'   =>  $waktu
                                );
                    $this->datakapal_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/kapal/belum_diproses'), 'refresh');
                }else{
                    $data = array(  'id'  =>  $id,
                                    'nama_perusahaan' =>  $i->post('nama_perusahaan'),
                                    'pemilik'       =>  $i->post('pemilik'),
                                    'alamat'           =>  $i->post('alamat'),
                                    'no_telpon'           =>  $i->post('no_telpon'),
                                    'nama_kapal'        =>  $i->post('nama_kapal'),
                                    'kondisi'           =>  $i->post('kondisi'),
                                    'jumlah_kapal'           =>  $i->post('jumlah_kapal'),
                                    'status'           =>  $i->post('status'),
                                    'masa_awal'           =>  $i->post('masa_awal'),
                                    'masa_akhir'           =>  $i->post('masa_akhir'),
                                    'tarif'           =>  $i->post('tarif'),
                                    'regional'           =>  $i->post('regional'),
                                    'janji_bayar'           =>  $i->post('janji_bayar'),
                                );
                    $this->datakapal_model->edit($data);
                    $this->session->set_flashdata('sukses', 'Data telah diedit');
                    redirect(base_url('admin/kapal/belum_diproses'), 'refresh');
                }
            }
            //akhir masuk database
                
            $data = array(  'title'     =>  'Edit Belum Diproses',
                            'belum_diproses'   =>  $belum_diproses,
                            'konfigurasi'   =>  $konfigurasi,
                            'admin'    =>  $admin,
                            'regional' => $regional,
                            'isi'       =>  'admin/kapal/belum_diproses/edit'
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

                $belum_diproses     = $this->datakapal_model->detail_delete($id);

                if($belum_diproses->ttd != null) {
                    unlink('assets/upload/image/'.$belum_diproses->ttd);
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

                $this->datakapal_model->delete($data);
                $this->session->set_flashdata('sukses', 'Data telah dihapus');
                redirect(base_url('admin/kapal/belum_diproses'), 'refresh');
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
            $belum_diproses = $this->datakapal_model->data_belum();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING YANG BELUM DILAKSANAN',
                            'belum_diproses' =>  $belum_diproses,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    public function cetak_akhir()
    {
        if($this->session->userdata('level') == '1') {
            $masa_akhir = $this->input->post('masa_akhir');
            $cetak_akhir = $this->datakapal_model->cetak_akhir_belum($masa_akhir);
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING YANG BELUM DILAKSANAN BERDASARKAN MASA AKHIR',
                            'cetak_akhir' =>  $cetak_akhir,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_akhir', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Pekanbaru
    public function cetak_pekanbaru()
    {
        if($this->session->userdata('level') == '1') {
            $pekanbaru = $this->datakapal_model->data_belum_pekanbaru();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING PEKANBARU YANG BELUM DILAKSANAN',
                            'pekanbaru' =>  $pekanbaru,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_pekanbaru', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Dumai
    public function cetak_dumai()
    {
        if($this->session->userdata('level') == '1') {
            $dumai = $this->datakapal_model->data_belum_dumai();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING DUMAI YANG BELUM DILAKSANAN',
                            'dumai' =>  $dumai,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_dumai', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Siak
    public function cetak_siak()
    {
        if($this->session->userdata('level') == '1') {
            $siak = $this->datakapal_model->data_belum_siak();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING SIAK YANG BELUM DILAKSANAN',
                            'siak' =>  $siak,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_siak', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Rohul
    public function cetak_rohul()
    {
        if($this->session->userdata('level') == '1') {
            $rohul = $this->datakapal_model->data_belum_rohul();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING ROKAN HULU YANG BELUM DILAKSANAN',
                            'rohul' =>  $rohul,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_rohul', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }
    
    // Cetak Rohil
    public function cetak_rohil()
    {
        if($this->session->userdata('level') == '1') {
            $rohil = $this->datakapal_model->data_belum_rohil();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING ROKAN HILIR YANG BELUM DILAKSANAN',
                            'rohil' =>  $rohil,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_rohil', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Pelalawan
    public function cetak_pelalawan()
    {
        if($this->session->userdata('level') == '1') {
            $pelalawan = $this->datakapal_model->data_belum_pelalawan();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING PELALAWAN YANG BELUM DILAKSANAN',
                            'pelalawan' =>  $pelalawan,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_pelalawan', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Kuansing
    public function cetak_kuansing()
    {
        if($this->session->userdata('level') == '1') {
            $kuansing = $this->datakapal_model->data_belum_kuansing();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING KUANTAN SINGINGI YANG BELUM DILAKSANAN',
                            'kuansing' =>  $kuansing,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_kuansing', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Kampar
    public function cetak_kampar()
    {
        if($this->session->userdata('level') == '1') {
            $kampar = $this->datakapal_model->data_belum_kampar();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING KAMPAR YANG BELUM DILAKSANAN',
                            'kampar' =>  $kampar,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_kampar', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Inhu
    public function cetak_inhu()
    {
        if($this->session->userdata('level') == '1') {
            $inhu = $this->datakapal_model->data_belum_inhu();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING INDRAGIRI HULU YANG BELUM DILAKSANAN',
                            'inhu' =>  $inhu,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_inhu', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Inhil
    public function cetak_inhil()
    {
        if($this->session->userdata('level') == '1') {
            $inhil = $this->datakapal_model->data_belum_inhil();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING INDRAGIRI HILIR YANG BELUM DILAKSANAN',
                            'inhil' =>  $inhil,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_inhil', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    // Cetak Bengkalis
    public function cetak_bengkalis()
    {
        if($this->session->userdata('level') == '1') {
            $bengkalis = $this->datakapal_model->data_belum_bengkalis();
            $konfigurasi = $this->konfigurasi_model->listing();
            $data = array(  'title' =>  'DATA OUTSTANDING BENGKALIS YANG BELUM DILAKSANAN',
                            'bengkalis' =>  $bengkalis,
                            'konfigurasi'   =>  $konfigurasi
                        );
            $this->load->view('admin/kapal/belum_diproses/cetak_bengkalis', $data, false);
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }

    function import()
    {
        if($this->session->userdata('level') == '1') {
            if(isset($_FILES["file"]["name"]))
            {
                $path = $_FILES["file"]["tmp_name"];
                $object = PHPExcel_IOFactory::load($path);
                foreach($object->getWorksheetIterator() as $worksheet)
                {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for($row=2; $row<=$highestRow; $row++)
                    {
                        $nama_perusahaan = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $pemilik = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $alamat = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $no_telpon = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $nama_kapal = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $kondisi = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $jumlah_kapal = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $masa_awal = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $masa_akhir = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $tarif = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $regional = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $status = "Belum Diproses";
                        $data[] = array(
                            'nama_perusahaan'      =>  $nama_perusahaan,
                            'pemilik'           =>  $pemilik,
                            'alamat'              =>  $alamat,
                            'no_telpon'        =>  $no_telpon,
                            'nama_kapal'        =>  $nama_kapal,
                            'kondisi'           =>  $kondisi,
                            'jumlah_kapal'           =>  $jumlah_kapal,
                            'status'    =>  $status,
                            'masa_awal'    => date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($masa_awal)),
                            'masa_akhir'    =>  date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($masa_akhir)),
                            'tarif'    =>  $tarif,
                            'regional'    =>  $regional,
                        );
                    }
                }
                $this->datakapal_model->insert($data);
                $this->session->set_flashdata('sukses','Data telah diimport');
                redirect(base_url('admin/kapal/belum_diproses'),'refresh');        
            }   
        }else{
            $this->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('login'),'refresh');
        }
    }
}
?>