<?php
class BookController extends Controller
{
    private $bookModel;

    public function __construct()
    {
        $this->bookModel = $this->model('BookModel');
    }

    // Danh sách sách
    public function index()
    {
        $books = $this->bookModel->getAllBooks();
        $bookCount = $this->bookModel->getBookCount();
        $availableCount = $this->bookModel->getAvailableBooksCount();
        $unavailableCount = $this->bookModel->getUnavailableBooksCount();

        $this->view('Books/index', [
            'pageTitle' => 'Quản lý sách',
            'books' => $books,
            'bookCount' => $bookCount,
            'availableCount' => $availableCount,
            'unavailableCount' => $unavailableCount
        ], 'admin_Layout');
    }

    // Tìm kiếm sách
    public function search()
    {
        $keyword = $_GET['q'] ?? '';
        $books = !empty($keyword) ? $this->bookModel->searchBooks($keyword) : [];

        $this->view('Books/search', [
            'pageTitle' => 'Tìm kiếm sách',
            'books' => $books,
            'keyword' => $keyword
        ], 'admin_Layout');
    }

    // Xem chi tiết sách
    public function detail()
    {
        $bookId = $_GET['id'] ?? null;
        if (!$bookId) {
            header('Location: ?url=book');
            exit;
        }

        $book = $this->bookModel->getBookById($bookId);
        if (!$book) {
            header('Location: ?url=book');
            exit;
        }

        $authors = $this->bookModel->getAuthorsOfBook($bookId);

        $this->view('Books/detail', [
            'pageTitle' => 'Chi tiết sách',
            'book' => $book,
            'authors' => $authors
        ], 'admin_Layout');
    }

    // Form thêm sách mới
    public function create()
    {
        $categories = $this->bookModel->getAllCategories();
        $publishers = $this->bookModel->getAllPublishers();
        $locations = $this->bookModel->getAllLocations();
        $authors = $this->bookModel->getAllAuthors();

        $this->view('Books/create', [
            'pageTitle' => 'Thêm sách mới',
            'categories' => $categories,
            'publishers' => $publishers,
            'locations' => $locations,
            'authors' => $authors
        ], 'admin_Layout');
    }

    // Lưu sách mới
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=book');
            exit;
        }

        $data = [
            'MaSach' => $_POST['MaSach'] ?? '',
            'MaTL' => $_POST['MaTL'] ?? '',
            'MaNXB' => $_POST['MaNXB'] ?? '',
            'MaVT' => $_POST['MaVT'] ?? '',
            'TenSach' => $_POST['TenSach'] ?? '',
            'NamXuatBan' => $_POST['NamXuatBan'] ?? '',
            'Gia' => $_POST['Gia'] ?? 0,
            'SoLuong' => $_POST['SoLuong'] ?? 0,
            'SoLuongCon' => $_POST['SoLuongCon'] ?? 0,
            'NgonNgu' => $_POST['NgonNgu'] ?? 'Tiếng Việt',
            'MoTa' => $_POST['MoTa'] ?? '',
            'HinhAnh' => $_POST['HinhAnh'] ?? '',
            'TinhTrang' => $_POST['TinhTrang'] ?? 'Còn',
            'ISBN' => $_POST['ISBN'] ?? ''
        ];

        if ($this->bookModel->createBook($data)) {
            $_SESSION['message'] = 'Thêm sách thành công!';
            header('Location: ?url=book');
            exit;
        } else {
            $_SESSION['error'] = 'Lỗi khi thêm sách!';
            header('Location: ?url=book/create');
            exit;
        }
    }

    // Form chỉnh sửa sách
    public function edit()
    {
        $bookId = $_GET['id'] ?? null;
        if (!$bookId) {
            header('Location: ?url=book');
            exit;
        }

        $book = $this->bookModel->getBookById($bookId);
        if (!$book) {
            header('Location: ?url=book');
            exit;
        }

        $categories = $this->bookModel->getAllCategories();
        $publishers = $this->bookModel->getAllPublishers();
        $locations = $this->bookModel->getAllLocations();
        $authors = $this->bookModel->getAllAuthors();
        $bookAuthors = $this->bookModel->getAuthorsOfBook($bookId);

        $this->view('Books/edit', [
            'pageTitle' => 'Chỉnh sửa sách',
            'book' => $book,
            'categories' => $categories,
            'publishers' => $publishers,
            'locations' => $locations,
            'authors' => $authors,
            'bookAuthors' => $bookAuthors
        ], 'admin_Layout');
    }

    // Cập nhật sách
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=book');
            exit;
        }

        $bookId = $_POST['MaSach'] ?? null;
        if (!$bookId) {
            header('Location: ?url=book');
            exit;
        }

        $data = [
            'MaSach' => $bookId,
            'MaTL' => $_POST['MaTL'] ?? '',
            'MaNXB' => $_POST['MaNXB'] ?? '',
            'MaVT' => $_POST['MaVT'] ?? '',
            'TenSach' => $_POST['TenSach'] ?? '',
            'NamXuatBan' => $_POST['NamXuatBan'] ?? '',
            'Gia' => $_POST['Gia'] ?? 0,
            'SoLuong' => $_POST['SoLuong'] ?? 0,
            'SoLuongCon' => $_POST['SoLuongCon'] ?? 0,
            'NgonNgu' => $_POST['NgonNgu'] ?? 'Tiếng Việt',
            'MoTa' => $_POST['MoTa'] ?? '',
            'HinhAnh' => $_POST['HinhAnh'] ?? '',
            'TinhTrang' => $_POST['TinhTrang'] ?? 'Còn',
            'ISBN' => $_POST['ISBN'] ?? ''
        ];

        if ($this->bookModel->updateBook($bookId, $data)) {
            $_SESSION['message'] = 'Cập nhật sách thành công!';
            header('Location: ?url=book/detail&id=' . $bookId);
            exit;
        } else {
            $_SESSION['error'] = 'Lỗi khi cập nhật sách!';
            header('Location: ?url=book/edit&id=' . $bookId);
            exit;
        }
    }

    // Xóa sách
    public function delete()
    {
        $bookId = $_GET['id'] ?? null;
        if (!$bookId) {
            header('Location: ?url=book');
            exit;
        }

        if ($this->bookModel->deleteBook($bookId)) {
            $_SESSION['message'] = 'Xóa sách thành công!';
        } else {
            $_SESSION['error'] = 'Lỗi khi xóa sách!';
        }
        header('Location: ?url=book');
        exit;
    }

    // Tìm kiếm theo danh mục
    public function category()
    {
        $categoryId = $_GET['id'] ?? null;
        if (!$categoryId) {
            header('Location: ?url=book');
            exit;
        }

        $books = $this->bookModel->searchBooksByCategory($categoryId);

        $this->view('Books/category', [
            'pageTitle' => 'Sách theo danh mục',
            'books' => $books,
            'categoryId' => $categoryId
        ], 'admin_Layout');
    }

    // Lấy sách nổi bật (API)
    public function featured()
    {
        $limit = $_GET['limit'] ?? 5;
        $books = $this->bookModel->getFeaturedBooks($limit);

        header('Content-Type: application/json');
        echo json_encode($books);
    }
}
?>