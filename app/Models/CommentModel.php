<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'comment';
    protected $primaryKey       = 'comment_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['news_id', 'parent_comment_id', 'comment', 'comment_author', 'comment_date', 'comment_status', 'user_id'];

    public function updateCommentStatus($commentId, $status)
    {
        // Find the comment by its ID
        $comment = $this->find($commentId);
    
        // If the comment is found
        if ($comment) {
            // Update only the comment_status field
            $comment['comment_status'] = $status;
    
            // Save the changes
            return $this->save($comment);
        } else {
            // Comment not found
            return false;
        }
    } 
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
}
