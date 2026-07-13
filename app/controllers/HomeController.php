<?php
class HomeController extends Controller
{
    public function index()
    {
        $books = $this->model('BookModel')->getAllBooks();

        $bookCount = is_array($books) ? count($books) : 0;
        $booksHtml = '';

        if (!empty($books)) {
            foreach (array_slice($books, 0, 6) as $book) {
                $title = htmlspecialchars($book->ten_sach ?? $book->title ?? 'Không có tên', ENT_QUOTES, 'UTF-8');
                $author = htmlspecialchars($book->tac_gia ?? $book->author ?? 'Chưa rõ tác giả', ENT_QUOTES, 'UTF-8');
                $status = htmlspecialchars($book->so_luong ?? $book->quantity ?? '1', ENT_QUOTES, 'UTF-8');

                $booksHtml .= '
                    <div class="col-md-6 col-xl-4">
                        <div class="card reader-book-card h-100 library-card">
                            <div class="card-body p-4">
                                <span class="badge library-chip rounded-pill mb-3">Mẫu dữ liệu</span>
                                <h3 class="h5 mb-2">' . $title . '</h3>
                                <p class="text-muted mb-3">' . $author . '</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="small text-muted">Số lượng</span>
                                    <strong class="text-primary">' . $status . '</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
        } else {
            $booksHtml = '
                <div class="col-12">
                    <div class="alert alert-info mb-0">Chưa có dữ liệu sách để hiển thị.</div>
                </div>
            ';
        }

        $content = '
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="card library-stat library-stat-primary h-100 position-relative">
                        <div class="card-body p-4">
                            <div class="small text-light opacity-75">Tổng sách</div>
                            <div class="display-6 fw-semibold mb-1">' . $bookCount . '</div>
                            <div class="small">Dữ liệu lấy từ BookModel</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card library-stat library-stat-secondary h-100 position-relative">
                        <div class="card-body p-4">
                            <div class="small text-light opacity-75">Đang hiển thị</div>
                            <div class="display-6 fw-semibold mb-1">6</div>
                            <div class="small">Sách tiêu biểu</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card library-stat library-stat-info h-100 position-relative">
                        <div class="card-body p-4">
                            <div class="small text-light opacity-75">Giao diện</div>
                            <div class="display-6 fw-semibold mb-1">Blue</div>
                            <div class="small">Tone màu chủ đạo</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                ' . $booksHtml . '
            </div>
        ';

        $pageTitle = 'Trang chủ';
        $pageSubtitle = 'Bảng điều khiển quản trị thư viện';

        require __DIR__ . '/../views/Layouts/admin_Layout.php';
    }
}
?>