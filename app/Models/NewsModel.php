<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table            = 'news';
    protected $primaryKey       = 'news_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','content','category_id','author','staff_id','images','videos','news_status','publication_status','date_approved','date_submitted','publication_date','created_at','updated_at','archived', 'created_by'];


    public function getNewsStatusCounts()
    {
        $statusCounts = [
            'Approved' => 0,
            'Pending' => 0,
            'Reject' => 0,
            'Decline' => 0
        ];
    
        $news = $this->findAll();
    
        foreach ($news as $article) {
            switch ($article['news_status']) {
                case 'Approved':
                    $statusCounts['Approved']++;
                    break;
                case 'Pending':
                    $statusCounts['Pending']++;
                    break;
                case 'Reject':
                    $statusCounts['Reject']++;
                    break;
                case 'Decline':
                    $statusCounts['Decline']++;
                    break;
                default:
                    break;
            }
        }
    
        return $statusCounts;
    }

    // In your NewsModel class

public function getPublicationStatusCounts()
{
    $statusCounts = [
        'Published' => 0,
        'Unpublished' => 0
    ];

    $news = $this->findAll();

    foreach ($news as $article) {
        switch ($article['publication_status']) {
            case 'Published':
                $statusCounts['Published']++;
                break;
            case 'Unpublished':
                $statusCounts['Unpublished']++;
                break;
            default:
                break;
        }
    }

    return $statusCounts;
}

    // Dates
    protected $useTimestamps = true;
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
