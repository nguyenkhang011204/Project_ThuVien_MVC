<?php
class StaffController extends Controller
{
    private $staffModel;
    private $accountModel;
    public function __construct()
    {
        $this->staffModel = $this->model('StaffModel');
        $this->accountModel = $this->model('AccountsModel');
    }
    public function index()
    {
        $staffs = $this->staffModel->getAllStaff();
        $staffCount = count($staffs);

        $this->view('Staff/index', [
            'pageTitle' => 'Quản lý nhân viên',
            'pageSubtitle' => 'Quản lý thông tin nhân viên và phân quyền',
            'staffs' => $staffs,
            'staffCount' => $staffCount
        ], 'admin_Layout');
    }

    public function create()
    {
        $accounts = $this->accountModel->getAllAccounts();

        $this->view(
            'Staff/create',
            [
                'pageTitle' => 'Thêm nhân viên',
                'accounts' => $accounts
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
            'MaNV' => $_POST['MaNV'] ?? '',
            'MaND' => $_POST['MaND'] ?? '',
            'HoTen' => $_POST['HoTen'] ?? '',
            'NgaySinh' => $_POST['NgaySinh'] ?? '',
            'GioiTinh' => $_POST['GioiTinh'] ?? '',
            'SDT' => $_POST['SDT'] ?? '',
            'Email' => $_POST['Email'] ?? '',
            'DiaChi' => $_POST['DiaChi'] ?? '',
            'ChucVu' => $_POST['ChucVu'] ?? ''
        ];

        if ($this->staffModel->createStaff($data)) {
            $_SESSION['message'] = 'Thêm nhân viên thành công!';
            header('Location: ?url=staff');
            exit;
        } else {
            $_SESSION['error'] = 'Lỗi khi thêm nhân viên!';
            header('Location: ?url=staff/create');
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

        $staff = $this->staffModel->getStaffById($id);
        if (!$staff) {
            header('Location: ?url=staff');
            exit;
        }

        $this->view(
            'Staff/edit',
            [
                'staff' => $staff,
                'pageTitle' => 'Sửa nhân viên'
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

        $staffId = $_GET['id'] ?? null;

        if (!$staffId) {
            header('Location: ?url=staff');
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

        if ($this->staffModel->updateStaff($staffId, $data)) {
            $_SESSION['message'] = 'Cập nhật nhân viên thành công!';
            header('Location: ?url=staff');
            exit;
        }

        $_SESSION['error'] = 'Lỗi khi cập nhật nhân viên!';
        header('Location: ?url=staff/edit&id=' . urlencode($staffId));
        exit;
    }

    public function delete()
    {
        $staffId = $_GET['id'] ?? null;

        $this->staffModel->deleteStaff($staffId);

        $_SESSION['success'] = 'Xóa thành công.';

        header('Location: ?url=staff');
    }
}
?>