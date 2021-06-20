<?php 
namespace App\Models;
 
use CodeIgniter\Model;
 
class PenghunisModel extends Model{
    protected $table = 'penghunis';
    protected $allowedFields = ['nama', 'no_ktp', 'foto', 'unit'];

    public function getRandomId()
    {
        $query = $this->db->table('penghunis');
        $query->select('penghunis.id');
        $query->orderBy('penghunis.id', 'RANDOM');
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