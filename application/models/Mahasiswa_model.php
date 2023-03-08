<?php 

class Mahasiswa_model extends CI_Model
{

    public function getAllMahasiswa()
    {

        return $this->db->get('mahasiswa')->result_array(); // Fungsi tampil data by : CI

        // $query = $this->db->get('mahasiswa');  // Produces: SELECT * FROM mytable
        // return $query->result_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama',true), // parameter ke-2 'true' mengamankan field dari sql injection
            "nirm" => $this->input->post('nirm',true),
            "email" => $this->input->post('email',true),
            "jurusan" => $this->input->post('jurusan',true)
        ];

        $this->db->insert('mahasiswa',$data); // fungsi tambah data by : CI
        // Produces:
        // INSERT INTO mytable (title, name, date)
        // VALUES ('My title', 'My name', 'My date')
    }

    public function hapusDataMahasiswa($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('mahasiswa');

        $this->db->delete('mahasiswa', ['id' => $id]);

        // Produces:
        // DELETE FROM mytable
        // WHERE id = $id
    }

    public function getMahasiswaById($id)
    {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();

        // Produces:
        // SELECT mytable
        // WHERE id = $id
    }

    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama',true), // parameter ke-2 'true' mengamankan field dari sql injection
            "nirm" => $this->input->post('nirm',true),
            "email" => $this->input->post('email',true),
            "jurusan" => $this->input->post('jurusan',true)
        ];

        $this->db->where('id', $this->input->post('id',true));
        $this->db->update('mahasiswa', $data);

        // Produces:
        //
        //      UPDATE mytable
        //      SET title = '{$title}', name = '{$name}', date = '{$date}'
        //      WHERE id = $id
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('nirm', $keyword);
        $this->db->or_like('jurusan', $keyword);
        // Produces: WHERE `title` LIKE '%match%' ESCAPE '!'
        return $this->db->get('mahasiswa')->result_array();
    }

}

?>