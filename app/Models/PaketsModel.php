<?php 
namespace App\Models;
 
use CodeIgniter\Model;
 
class PaketsModel extends Model{
    protected $table = 'pakets';
    protected $allowedFields = ['tanggal_datang', 'penghunis_id', 'karyawans_id', 'isi_paket', 'tanggal_ambil'];

    public function getAllPaket()
    {
        $query = $this->db->table('pakets');
        $query->select('pakets.*, penghunis.nama as nama_penghuni');
        $query->join('penghunis','penghunis.id=pakets.penghunis_id', 'LEFT');
        $query->orderBy('pakets.tanggal_datang', 'DESC');
        
        $result = $query->get()->getResultArray();  

        return $result;
    }
}