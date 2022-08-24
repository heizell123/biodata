<?php namespace App\Models;

use CodeIgniter\Model;

class Score_card_model extends Model
{
    protected $table      = 'score_card';
    protected $primaryKey = 'sc_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'sc_id','employee_id','supervisor_id','period','start_date','end_date','total_score','update_by','update_date','create_date','create_by','active','ep_id','subordinate_opt','year','weight_spv','decimal'

    ];

    protected $useTimestamps = false;
    protected $createdField  = 'create_date';
    protected $updatedField  = 'update_date';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}