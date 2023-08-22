<?php

namespace App\Models;

use CodeIgniter\Model;

class PayrollModel extends Model
{
    protected $table = 'payroll';
    protected $primaryKey = 'ID_PAYROLL';
    protected $allowedFields = ['ID_PAYROLL', 'ID_EMPLOYEE', 'SALARY_DEDUCTION', 'TOTAL_SALARY'];

    public function getPayroll()
    {
        return $this->db->table('payroll')
            ->join('employee', 'employee.ID_EMPLOYEE=payroll.ID_EMPLOYEE')
            ->join('user', 'user.ID_USER=employee.ID_USER')
            ->join('duty', 'duty.ID_DUTY=employee.ID_DUTY')
            ->orderBy('ID_PAYROLL', 'asc')
            ->get()->getResultArray();
    }
}
