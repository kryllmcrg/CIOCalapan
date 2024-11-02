<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table            = 'testimonies';
    protected $primaryKey       = 'testimony_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false; // No soft deletes used
    protected $protectFields    = true;
    protected $allowedFields    = ['full_name', 'comment', 'rating', 'date_created', 'user_id'];

    public function getRatingCounts()
    {
        return $this->select('rating, COUNT(*) as count')
                    ->groupBy('rating')
                    ->findAll();
    }

    // Optional: You could add a method to get the ratings data in a structured format
    public function getRatingsData()
    {
        $ratingCounts = $this->getRatingCounts();
        return [
            'labels' => array_keys($ratingCounts),
            'data' => array_values($ratingCounts),
        ];
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
