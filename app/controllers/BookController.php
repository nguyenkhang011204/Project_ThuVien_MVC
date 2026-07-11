<?php
class BookController extends Controller
{
    public function index()
    {
        $books = $this->model('BookModel')->getAllBooks();

        echo "<pre>";
        print_r($books);
    }
}