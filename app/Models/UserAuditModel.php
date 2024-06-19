<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAuditModel extends Model
{
    protected $table            = 'user_audit_trail';
    protected $primaryKey       = 'user_audit_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','news_id','action','action_description','remarks'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function addUserAuditLog($user_id, $news_id,$action, $action_description, $remarks){
        try {
            $bind = [
                'user_id' => $user_id,
                'news_id' => $news_id,
                'action' => $action,
                'action_description' => $action_description,
                'remarks' => $remarks
            ];

            $result = $this->insert($bind);
            return $result;
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
}
