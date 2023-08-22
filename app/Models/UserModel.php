<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'ID_USER';
    // this happens first, model removes all other fields from input data

    protected $allowedFields = ['NAMA_USER', 'USERNAME', 'EMAIL', 'PASSWORD', 'NO_HP', 'WA', 'PIN', "STATUS_USER"];

    protected $useTimestamps = true;
    protected $createdField  = 'CREATED_DATE';
    protected $updatedField  = 'UPDATE_DATE';

    public function getUsers()
    {
        return $this->findAll();
    }
}
