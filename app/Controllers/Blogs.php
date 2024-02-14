<?php

namespace App\Controllers;

use App\Models\BlogModel;

class Blogs extends BaseController
{
    protected $blog;

    public function __construct()
    {
        $this->blog = new BlogModel();
        helper('form');

    }

    public function index()
    {
        $find = $this->request->getGet("find");
        if ($find) {
            $data['blogs'] = $this->blog->like('title', $find)->findAll();
            return view("blogs_page", $data);
        }
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
        session();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                    'min_length' => 'Judul harus lebih dari 3 karakter.'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konten harus diisi.'
                ]
            ],
            'cover' => [
                'rules' => 'uploaded[cover]|max_size[cover,1024]|is_image[cover]',
                'errors' => [
                    'uploaded' => 'Gambar harus diupload.',
                    'max_size' => 'Ukuran gambar maksimal 1MB.',
                    'is_image' => 'Yang anda upload bukan gambar.'
                ]
            ]
        ]);


        if ($this->request->is("post")) {

            if (! $validation->withRequest($this->request)->run()) {
                $errors = $validation->getErrors();
                // PROBLEM NEXT TIME
                return redirect()->to('/blogs/add')->withInput()->with('validation', $validation);
            }

            $data = $validation->getValidated();

            $duplicate = $this->blog->where('title', $data['title'])->first();
            if ($duplicate){
                echo "Data sudah ada";
                return false;
            }

            $this->blog->insert($data);
            return redirect()->to('/blogs');
        }

        $message = [
            'validation' => \Config\Services::validation()
        ];
        return view("add_page", $message);
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
            $title = $this->request->getVar('title');
            $duplicate = $this->blog->where("title", $title)->first();

            if ($duplicate && $title !== $data['blog']['title'])
            {
                echo "Data sudah ada";
                return false;
            }

            $data = [
                'id'=> $id,
                'title'=>$title,
                'content'=>$this->request->getVar('content')
            ];
            $this->blog->save($data);
            return redirect()->to('/blogs');
        }
    }

    public function delete($id)
    {
        $this->blog->delete($id);
        return redirect()->back();
    }
}