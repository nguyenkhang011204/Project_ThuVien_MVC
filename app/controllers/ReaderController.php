<?php
class ReaderController extends Controller
{
    public function index()
    {
        $content = '
            <div class="row g-3">
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card reader-book-card h-100 library-card">
                        <div class="card-body p-4">
                            <span class="badge library-chip rounded-pill mb-3">Mới nhất</span>
                            <h3 class="h5 mb-2">Clean Code</h3>
                            <p class="text-muted mb-3">Robert C. Martin</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="small text-muted">Trạng thái</span>
                                <strong class="text-primary">Còn sách</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card reader-book-card h-100 library-card">
                        <div class="card-body p-4">
                            <span class="badge library-chip rounded-pill mb-3">Đề xuất</span>
                            <h3 class="h5 mb-2">Design Patterns</h3>
                            <p class="text-muted mb-3">GoF</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="small text-muted">Trạng thái</span>
                                <strong class="text-primary">Nên đọc</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card reader-book-card h-100 library-card">
                        <div class="card-body p-4">
                            <span class="badge library-chip rounded-pill mb-3">Sắp hết</span>
                            <h3 class="h5 mb-2">Refactoring</h3>
                            <p class="text-muted mb-3">Martin Fowler</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="small text-muted">Trạng thái</span>
                                <strong class="text-primary">Ưu tiên mượn</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';

        $pageTitle = 'Trang độc giả';
        $pageSubtitle = 'Khám phá và tìm sách theo danh mục yêu thích';

        require __DIR__ . '/../views/Layouts/reader_Layout.php';
    }
}
?>