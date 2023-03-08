<?php 

class Kategori_model extends CI_Model
{

    public function getAllKategori()
    {
        return $this->db->get('tbl_kategori')->result_array(); // Fungsi tampil data by : CI
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('tbl_kategori', ['id' => $id])->row_array();
    }

    public function addKategori()
    {
        $data = [
            "kategori"  =>  $this->input->post('kategori',true),
            "link"      =>  $this->input->post('link',true)
        ];
        $this->db->insert('tbl_kategori',$data); // fungsi tambah data by : CI
    }

    public function delKategori($id)
    {
        $this->db->delete('tbl_kategori', ['id' => $id]);
    }

    public function edtKategori($id)
    {
        $data = [
            "kategori"  =>  $this->input->post('kategori',true),
            "link"      =>  $this->input->post('link',true)
        ];
        $this->db->where('id', $this->input->post('id',true));
        $this->db->update('tbl_kategori', $data);
    }

}

?>