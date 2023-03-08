<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Mengaktifkan Model
        $this->load->model('Kategori_model');
    }
    
    // Method
    public function index()
    {

        // SELECT * FROM
        $data['kategori'] = $this->Kategori_model->getAllKategori();

        $data['judul'] = 'Leon Movie' ; // Judul Halaman
        $this->load->view('templates/header', $data); // Header Bootstrap
        $this->load->view('home/index',$data);
        $this->load->view('templates/footer'); // Footer Bootstrap
    }
}
?>