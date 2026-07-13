<?php
class HomeController extends Controller
{
    public function index()
    {
        $books = $this->model('BookModel')->getAllBooks();
        $this->view('Home/index', ['pageTitle' => 'Trang chủ', 'books' => $books]);
        require_once __DIR__ . "/../views/Layouts/admin_Layout.php";
    }
}
?>