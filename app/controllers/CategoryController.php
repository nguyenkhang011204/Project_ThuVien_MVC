<?php
class CategoryController extends Controller
{
    private $CategoryModel;

    public function __construct()
    {
        $this->CategoryModel = $this->model("CategoryModel");
    }

    public function index()
    {

        $data = $this->CategoryModel->getAllCategories();
        $count = $this->CategoryModel->getCategoryCount();

        $this->view('category/index', [
            'categories' => $data,
            'categoryCount' => $count
        ], 'admin_Layout');
    }

    public function create()
    {
        $this->view(
            'category/create',
            [
                'pageTitle' => 'Thêm thể loại'
            ],
            'admin_Layout'
        );
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=category');
            exit;
        }

        $data = [
            'MaTL' => $_POST['MaTL'] ?? '',
            'TenTheLoai' => $_POST['TenTheLoai'] ?? '',
            'MoTa' => $_POST['MoTa'] ?? ''
        ];

        if ($this->CategoryModel->createCategory($data)) {
            $_SESSION['message'] = 'Thêm thể loại thành công!';
            header('Location: ?url=category');
            exit;
        } else {
            $_SESSION['error'] = 'Lỗi khi thêm thể loại!';
            header('Location: ?url=category/create');
            exit;
        }

    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: ?url=category');
            exit;
        }

        $category = $this->CategoryModel->getCategoryById($id);
        if (!$category) {
            header('Location: ?url=category');
            exit;
        }

        $this->view(
            'category/edit',
            [
                'category' => $category,
                'pageTitle' => 'Sửa thể loại'
            ],
            'admin_Layout'
        );
    }

    public function update()
    {
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?url=category');
            exit;
        }

        $categoryId = $_POST['MaTL'] ?? null;
        if (!$categoryId) {
            header('Location: ?url=category');
            exit;
        }

        $data = [
            'MaTL' => $categoryId,
            'TenTheLoai' => $_POST['TenTheLoai'] ?? '',
            'MoTa' => $_POST['MoTa'] ?? ''
        ];

        if ($this->CategoryModel->updateCategory($categoryId, $data)) {
            $_SESSION['message'] = 'Cập nhật thể loại thành công!';
            header('Location: ?url=category');
            exit;
        } else {
            $_SESSION['error'] = 'Lỗi khi cập nhật thể loại!';
            header('Location: ?url=category/edit&id=' . $categoryId);
            exit;
        }
    }

    public function delete()
    {
        $categoryId = $_GET['id'] ?? null;
        if ($this->CategoryModel->hasBooks($categoryId)) {

            $_SESSION['error'] =
                'Không thể xóa vì thể loại này đang được sử dụng.';

            header('Location: ?url=category');
            exit;
        }

        $this->CategoryModel->deleteCategory($categoryId);

        $_SESSION['success'] = 'Đã xóa thành công.';
        header('Location: ?url=category');
    }
}
?>