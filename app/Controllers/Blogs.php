<?php 

namespace App\Controllers;
use App\Models\BlogModel;


class Blogs extends BaseController{
    protected $blog;
    protected $request;
    public function __construct() {
        $this->blog = new BlogModel();
        $this->request = request();
    }
    public function index(){
        $data['blogs'] = $this->blog->findAll();
        return view("blogs_page", $data);
    }

    public function byUrl($url){
        $data['blog'] = $this->blog->find($url);
        if (empty($data['blog'])) {
            echo "Data not found";
            return false;
        }
        return view("detail_page.php", $data);
    }

    public function add(){
        print_r($this->request->getGet('title'));
        print_r($this->request->getGet('content'));
        // if(isset($_GET['title'])){
        //     $data["title"] = $_GET['title'];
        //     $data["content"] = $_GET['content'];
        //     print_r($data);
        // }
        return view("add_page.php");
    }
}

