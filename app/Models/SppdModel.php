<?php

namespace App\Models;

use CodeIgniter\Model;

class SppdModel extends Model
{
    protected $table = 'sppd';
    protected $primaryKey = 'ID_SPPD';
    protected $allowedFields = ['DESCRIPTION', 'DESTINATION', 'DEPARTURE_DATE', 'ARRIVE_DATE', 'ID_EMPLOYEE'];

    public function getSPPD()
    {
        return $this->db->table('sppd')
            ->join('employee', 'employee.ID_EMPLOYEE=sppd.ID_EMPLOYEE')
            ->join('user', 'user.ID_USER=employee.ID_USER')
            ->orderBy('ID_SPPD', 'asc')
            ->get()->getResultArray();
    }
}
