<?php
class BookController extends Controller
{
    public function index()
    {
        $books = $this->model('BookModel')->getAllBooks();

        $this->view('Books/index', [
            'pageTitle' => 'Quản lý sách',
            'books' => $books
        ], 'admin_Layout');
    }
}