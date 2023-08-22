<?php

namespace App\Models;

use CodeIgniter\Model;

class UserActivityLogModel extends Model
{
    protected $table = 'user_activity';
    protected $primaryKey = 'NO_ACTIVITY';
    protected $allowedFields = ['ID_USER', 'DESCRIPTION', 'STATUS', 'MENU_ID'];

    public function getLogs()
    {
        return $this->db->table('user_activity')
            ->join('user', 'user.ID_USER=user_activity.ID_USER')
            ->orderBy('NO_ACTIVITY', 'asc')
            ->get()->getResultArray();
    }
}
