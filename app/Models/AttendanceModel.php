<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table = 'attendance';
    protected $primaryKey = 'ID_ATTENDANCE';
    protected $allowedFields = ['ID_EMPLOYEE', 'MONTH', 'YEAR', 'TOTAL_ATTENTION', 'TOTAL_PERMISSION'];

    public function getAttendance()
    {
        return $this->db->table('attendance')
            ->join('employee', 'employee.ID_EMPLOYEE=attendance.ID_EMPLOYEE')
            ->join('user', 'user.ID_USER=employee.ID_USER')
            ->orderBy('ID_ATTENDANCE', 'asc')
            ->get()->getResultArray();
    }
}
