<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        // Mengaktifkan Model
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
    }
    // Method
    public function index()
    {

        // SELECT * FROM
        $data['kategori'] = $this->Kategori_model->getAllKategori();
        $data['judul'] = 'Setting Kategori' ; // Judul Halaman
        $this->load->view('templates/header', $data); // Header Bootstrap
        $this->load->view('kategori/index',$data);
        $this->load->view('templates/footer'); // Footer Bootstrap
    }

    public function tambah()
    {
        $data['kategori'] = $this->Kategori_model->getAllKategori();
        $data['allkategori'] = ['now_playing', 'popular', 'top_rated', 'upcoming'];
        $data['judul'] = 'Setting Kategori' ; // Judul Halaman

        // form_validation memiliki 3 parameter (name, Name, rules)
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        
        if( $this->form_validation->run() == FALSE )
        {
            $this->load->view('templates/header', $data); // Header Bootstrap
            $this->load->view('kategori/tambah',$data);
            $this->load->view('templates/footer'); // Footer Bootstrap
        }
        else
        {
            $this->Kategori_model->addKategori();
            $this->session->set_flashdata('flash', 'Ditambahkan'); // 2 parameter ( nama_session, isi_session )
            redirect('kategori');
        }
    }

    public function hapus($id)
    {
            $this->Kategori_model->delKategori($id);
            $this->session->set_flashdata('flash', 'Dihapus'); // 2 parameter ( nama_session, isi_session )
            redirect('kategori');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Setting Kategori' ; // Judul Halaman
        $data['kategori'] = ['now_playing', 'popular', 'top_rated', 'upcoming'];
        $data['allkategori'] = $this->Kategori_model->getAllKategori();
        $data['selkategori'] = $this->Kategori_model->getKategoriById($id);

        // form_validation memiliki 3 parameter (name, Name, rules)
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        
        if( $this->form_validation->run() == FALSE )
        {
            $this->load->view('templates/header', $data); // Header Bootstrap
            $this->load->view('kategori/ubah',$data);
            $this->load->view('templates/footer'); // Footer Bootstrap
        }
        else
        {
            var_dump($_POST);
            $this->Kategori_model->edtKategori($id);
            $this->session->set_flashdata('flash', 'Ditambahkan'); // 2 parameter ( nama_session, isi_session )
            redirect('kategori');
        }
    }
}

?>