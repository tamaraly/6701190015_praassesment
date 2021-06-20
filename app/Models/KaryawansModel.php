<?php 
namespace App\Models;
 
use CodeIgniter\Model;
 
class KaryawansModel extends Model{
    protected $table = 'karyawans';
    protected $allowedFields = ['nip', 'password', 'nama'];

    public function getRandomId()
    {
        $query = $this->db->table('karyawans');
        $query->select('karyawans.id');
        $query->orderBy('karyawans.id', 'RANDOM');
        $query->limit(1);
        
        $result = $query->get()->getRow();

        if (isset($result))
        {
            $id = $result->id;
        } 
        else 
        {
            $id = 0;
        }
        return $id;
    }
}