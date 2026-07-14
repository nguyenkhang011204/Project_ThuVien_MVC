<?php
class UserController extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('UsersModel');
    }
    public function index()
    {

        $readers = $this->userModel->getAllUsers();

        $this->view('Users/index', [
            'pageTitle' => 'Quản lý độc giả',
            'pageSubtitle' => 'Quản lý thông tin và hoạt động của các độc giả',
            'readers' => $readers,
            'readerCount' => count($readers),
        ], 'admin_Layout');
    }

    public function create()
    {
        $users = $this->userModel->getAllUsers();

        $this->view(
            'Users/create',
            [
                'pageTitle' => 'Thêm độc giả',
                'users' => $users
            ],
            'admin_Layout'
        );
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=staff');
            exit;
        }

        $data = [
            'MaDG' => $_POST['MaDG'] ?? '',
            'MaND' => $_POST['MaND'] ?? '',
            'HoTen' => $_POST['HoTen'] ?? '',
            'NgaySinh' => $_POST['NgaySinh'] ?? '',
            'GioiTinh' => $_POST['GioiTinh'] ?? '',
            'SDT' => $_POST['SDT'] ?? '',
            'Email' => $_POST['Email'] ?? '',
            'DiaChi' => $_POST['DiaChi'] ?? '',
            'ChucVu' => $_POST['ChucVu'] ?? ''
        ];

        if ($this->userModel->createUser($data)) {
            $_SESSION['message'] = 'Thêm độc giả thành công!';
            header('Location: ?url=user');
            exit;
        } else {
            $_SESSION['error'] = 'Lỗi khi thêm độc giả!';
            header('Location: ?url=user/create');
            exit;
        }

    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: ?url=staff');
            exit;
        }

        $user = $this->userModel->getUserById($id);
        if (!$user) {
            header('Location: ?url=user');
            exit;
        }

        $this->view(
            'Users/edit',
            [
                'user' => $user,
                'pageTitle' => 'Sửa độc giả'
            ],
            'admin_Layout'
        );
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=staff');
            exit;
        }

        $userId = $_GET['id'] ?? null;

        if (!$userId) {
            header('Location: ?url=user');
            exit;
        }

        $data = [
            'HoTen' => $_POST['HoTen'] ?? '',
            'NgaySinh' => $_POST['NgaySinh'] ?? '',
            'GioiTinh' => $_POST['GioiTinh'] ?? '',
            'SDT' => $_POST['SDT'] ?? '',
            'Email' => $_POST['Email'] ?? '',
            'DiaChi' => $_POST['DiaChi'] ?? '',
            'ChucVu' => $_POST['ChucVu'] ?? ''
        ];

        if ($this->userModel->updateUser($userId, $data)) {
            $_SESSION['message'] = 'Cập nhật độc giả thành công!';
            header('Location: ?url=user');
            exit;
        }

        $_SESSION['error'] = 'Lỗi khi cập nhật độc giả!';
        header('Location: ?url=user/edit&id=' . urlencode($userId));
        exit;
    }

    public function delete()
    {
        $userId = $_GET['id'] ?? null;

        $this->userModel->deleteUser($userId);

        $_SESSION['success'] = 'Xóa thành công.';

        header('Location: ?url=user');
    }
}
?>