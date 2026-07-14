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


        $this->view('category/index', ['categories' => $data], 'admin_Layout');
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

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

    }
}
?>