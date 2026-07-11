<?php
class BookController extends Controller
{
    public function index()
    {
        $bookModel = $this->model('BookModel');

        $books = $bookModel->getAllBooks();
        $this->view('books/index', ['books' => $books]);
    }
}