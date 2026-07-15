<?php
class AuthorController extends Controller
{
    private $authModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->authModel = $this->model('AuthorModel');
    }

    // Trang gộp đăng nhập / đăng ký
    public function index()
    {
        $this->view('Auth/login', [
            'pageTitle' => 'Đăng nhập'
        ], 'auth_Layout');
    }

    // Xử lý đăng nhập
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=auth');
            exit;
        }

        $tenDangNhap = trim($_POST['TenDangNhap'] ?? '');
        $matKhau = $_POST['MatKhau'] ?? '';

        if ($tenDangNhap === '' || $matKhau === '') {
            $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin.';
            header('Location: ?url=auth');
            exit;
        }

        $user = $this->authModel->login($tenDangNhap, $matKhau);

        if (!$user) {
            $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
            header('Location: ?url=auth');
            exit;
        }

        // Lưu session
        $_SESSION['user'] = [
            'MaND' => $user['MaND'],
            'TenDangNhap' => $user['TenDangNhap'],
            'VaiTro' => $user['VaiTro']
        ];

        // Điều hướng theo vai trò
        if ($user['VaiTro'] === 'ADMIN' || $user['VaiTro'] === 'THUTHU') {
            header('Location: ?url=home');
        } else {
            header('Location: ?url=reader');
        }
        exit;
    }

    // Xử lý đăng ký
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=auth');
            exit;
        }

        $data = [
            'HoTen' => trim($_POST['HoTen'] ?? ''),
            'Email' => trim($_POST['Email'] ?? ''),
            'SDT' => trim($_POST['SDT'] ?? ''),
            'TenDangNhap' => trim($_POST['TenDangNhap'] ?? ($_POST['Email'] ?? '')),
            'MatKhau' => $_POST['MatKhau'] ?? '',
            'XacNhanMatKhau' => $_POST['XacNhanMatKhau'] ?? ''
        ];

        // Validate cơ bản
        if ($data['HoTen'] === '' || $data['Email'] === '' || $data['MatKhau'] === '') {
            $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin bắt buộc.';
            header('Location: ?url=auth');
            exit;
        }

        if ($data['MatKhau'] !== $data['XacNhanMatKhau']) {
            $_SESSION['error'] = 'Mật khẩu xác nhận không khớp.';
            header('Location: ?url=auth');
            exit;
        }

        if (strlen($data['MatKhau']) < 6) {
            $_SESSION['error'] = 'Mật khẩu phải có ít nhất 6 ký tự.';
            header('Location: ?url=auth');
            exit;
        }

        // Dùng email làm tên đăng nhập nếu không có field riêng
        if ($data['TenDangNhap'] === '') {
            $data['TenDangNhap'] = $data['Email'];
        }

        if ($this->authModel->usernameExists($data['TenDangNhap'])) {
            $_SESSION['error'] = 'Tên đăng nhập / email này đã được sử dụng.';
            header('Location: ?url=auth');
            exit;
        }

        if ($this->authModel->emailExists($data['Email'])) {
            $_SESSION['error'] = 'Email này đã được đăng ký.';
            header('Location: ?url=auth');
            exit;
        }

        if ($this->authModel->register($data)) {
            $_SESSION['message'] = 'Đăng ký thành công! Vui lòng đăng nhập.';
            header('Location: ?url=auth');
            exit;
        }

        $_SESSION['error'] = 'Có lỗi xảy ra, vui lòng thử lại.';
        header('Location: ?url=auth');
        exit;
    }

    // Đăng xuất
    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: ?url=auth');
        exit;
    }
}
?>