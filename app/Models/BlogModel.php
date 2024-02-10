<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $DBGroup = "ci4_db";
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'url'];


    

    
    // public function __construct() {
    //     $this->db = \Config\Database::connect();
    // }
    // public function getData(){
    //     $query = $this->db->table("blogs")->get();
    //     return $query->getResultArray();
    // }
    // public function insert($row = null, bool $returnID = true)
    // {
        
    // }
    // public function detail($url){
    //     $query = $this->db->table("blogs")->where("url", $url)->get();
    //     return $query->getRowArray();
    // }
}