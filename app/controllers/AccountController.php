<?php
class AccountController extends Controller
{
    private $accountModel;

    public function __construct()
    {
        $this->accountModel = $this->model('AccountsModel');
    }
    public function index()
    {
        $accounts = $this->accountModel->getAllAccounts();
        $accountsByRole = [
            'admin' => $this->accountModel->getAccountsByRole('admin'),
            'status' => $this->accountModel->getAccountByStatus(1),
            'locked' => $this->accountModel->getAccountByStatus(0),
        ];

        $this->view('Accounts/index', [
            'pageTitle' => 'Quản lý tài khoản',
            'pageSubtitle' => 'Quản lý tài khoản người dùng và phân quyền',
            'accounts' => $accounts,
            'accountCount' => $this->accountModel->getAccountCount(),
            'accountsByRole' => $accountsByRole
        ], 'admin_Layout');
    }

    public function create()
    {
        $this->view(
            'Accounts/create',
            [
                'pageTitle' => 'Thêm tài khoản'
            ],
            'admin_Layout'
        );
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=account');
            exit;
        }

        $data = [
            'MaND' => $_POST['MaND'] ?? '',
            'TenDangNhap' => $_POST['TenDangNhap'] ?? '',
            'MatKhau' => $_POST['MatKhau'] ?? '',
            'VaiTro' => $_POST['VaiTro'] ?? '',
            'TrangThai' => $_POST['TrangThai'] ?? ''
        ];

        if ($this->accountModel->createAccount($data)) {
            $_SESSION['message'] = 'Thêm tài khoản thành công!';
            header('Location: ?url=account');
            exit;
        } else {
            $_SESSION['error'] = 'Lỗi khi thêm tài khoản!';
            header('Location: ?url=account/create');
            exit;
        }

    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: ?url=account');
            exit;
        }

        $account = $this->accountModel->getAccountById($id);
        if (!$account) {
            header('Location: ?url=account');
            exit;
        }

        $this->view(
            'accounts/edit',
            [
                'account' => $account,
                'pageTitle' => 'Sửa tài khoản'
            ],
            'admin_Layout'
        );
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=account');
            exit;
        }

        $accountId = $_GET['id'] ?? null;

        if (!$accountId) {
            header('Location: ?url=account');
            exit;
        }

        $data = [
            'TenDangNhap' => $_POST['TenDangNhap'] ?? '',
            'MatKhau' => $_POST['MatKhau'] ?? '',
            'VaiTro' => $_POST['VaiTro'] ?? '',
            'TrangThai' => $_POST['TrangThai'] ?? ''
        ];

        if ($this->accountModel->updateAccount($accountId, $data)) {
            $_SESSION['message'] = 'Cập nhật tài khoản thành công!';
            header('Location: ?url=account');
            exit;
        }

        $_SESSION['error'] = 'Lỗi khi cập nhật tài khoản!';
        header('Location: ?url=account/edit&id=' . urlencode($accountId));
        exit;
    }

    public function delete()
    {
        $accountId = $_GET['id'] ?? null;

        if ($this->accountModel->isAccountInUse($accountId)) {

            $_SESSION['error'] =
                'Không thể xóa vì tài khoản này đã được liên kết với độc giả.';

            header('Location: ?url=account');
            exit;
        }

        $this->accountModel->deleteAccount($accountId);

        $_SESSION['success'] = 'Xóa thành công.';

        header('Location: ?url=account');
    }

}
?>