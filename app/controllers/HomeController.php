<?php
class HomeController extends Controller
{
    public function index()
    {
        $books = $this->model('BookModel')->getAllBooks();

        $layout = 'admin_Layout';

        $data = [
            'pageTitle' => 'Trang chủ',
            'pageSubtitle' => 'Bảng điều khiển quản trị thư viện',
            'books' => $books,
            'bookCount' => count($books),
        ];

        $this->view('Dashboard/index', $data, $layout);
    }
}
?>