<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'ID_EMPLOYEE';
    protected $allowedFields = ['ID_USER', 'ID_DUTY'];

    public function getEmployee()
    {
        return $this->db->table('employee')
            ->join('user', 'user.ID_USER=employee.ID_USER')
            ->join('duty', 'duty.ID_DUTY=employee.ID_DUTY')
            ->orderBy('ID_EMPLOYEE', 'asc')
            ->get()->getResultArray();
    }
}
