<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BookModel;

class Book extends BaseController
{
    public function index()
    {
        $bookModel = new BookModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'books' => $bookModel->paginate(2, 'book'),
            'pager' => $bookModel->pager
        );

        return view('home', $data);
    }
    
    public function delete($id)
    {
        //model initialize
        $bookModel = new BookModel();

        $book = $bookModel->find($id);

        if($book) {
            $bookModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Post Berhasil Dihapus');

            return redirect()->to(base_url('home'));
        }
    }
}
