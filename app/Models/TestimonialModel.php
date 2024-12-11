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
    protected $allowedFields    = ['full_name', 'comment','date_created', 'user_id','sentiment'];


    public function getSentimentCounts()
{
    // Initialize the counts for each sentiment
    $sentimentCounts = [
        'positive' => 0,
        'neutral' => 0,
        'negative' => 0
    ];

    // Fetch all testimonials
    $testimonials = $this->findAll();

    // Loop through each testimonial and count the sentiments
    foreach ($testimonials as $testimonial) {
        switch ($testimonial['sentiment']) {
            case 'positive':
                $sentimentCounts['positive']++;
                break;
            case 'neutral':
                $sentimentCounts['neutral']++;
                break;
            case 'negative':
                $sentimentCounts['negative']++;
                break;
            default:
                // Handle any unknown sentiments (optional)
                $sentimentCounts['neutral']++; // Default to neutral if sentiment is missing or unknown
                break;
        }
    }

    // Return the sentiment counts
    return $sentimentCounts;
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
