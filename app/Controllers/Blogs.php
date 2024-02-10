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
        $data['blog'] = $this->blog->where('url', $url)->first();
        if (empty($data['blog'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view("detail_page", $data);
    }

    public function create()
    {
        if ($this->request->is("post")) {
            $title = $this->request->getPost('title');
            $content = $this->request->getPost('content');
            $duplicate = $this->blog->where('title', $title)->first();
            if ($duplicate){
                echo "Data sudah ada";
                return false;
            }
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

    public function edit($id)
    {
        $data['blog'] = $this->blog->find($id);
        if ($this->request->is("get")) {
            if (empty($data['blog'])) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
            return view("edit_page", $data);
        }
        if ($this->request->is("put")){
            $data = [
                'id'=> $id,
                'title'=>$this->request->getVar('title'),
                'content'=>$this->request->getVar('content')
            ];
            $this->blog->save($data);
            return redirect()->to('/blogs');
        }
    }
}