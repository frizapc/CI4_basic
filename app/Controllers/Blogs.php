<?php

namespace App\Controllers;

use App\Models\BlogModel;


class Blogs extends BaseController
{
    protected $blog;

    public function __construct()
    {
        $this->blog = new BlogModel();
    }

    public function index()
    {
        $data['blogs'] = $this->blog->findAll();
        return view("blogs_page", $data);
    }

    public function byUrl($url)
    {
        $data['blog'] = $this->blog->find($url);
        if (empty($data['blog'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("detail_page", $data);
    }

    public function add()
    {
        if ($this->request->is("post")) {
            $title = $this->request->getPost('title');
            $content = $this->request->getPost('content');
            $data = [
                'title' => $title,
                'content' => $content,
                'url' => str_replace(' ','-', $title),
            ];

            $this->blog->insert($data);
            return redirect()->to('/blogs');
        }

        return view("add_page");
    }
}