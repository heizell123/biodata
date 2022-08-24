<?php namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [];

    protected $useTimestamps = false;
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}