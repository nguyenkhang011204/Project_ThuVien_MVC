<section class="mb-4">
    <div class="library-hero rounded-4 p-4 p-lg-5 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <h1 class="display-6 fw-semibold library-page-title mb-2">Thêm thể loại</h1>
                <p class="lead mb-0 text-light">
                    Nhập thông tin chi tiết cho thể loại mới
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="?url=category" class="btn btn-light fw-semibold shadow-sm px-4">← Quay lại</a>
            </div>
        </div>
    </div>
</section>

<div class="card library-card">
    <div class="card-body p-4 p-lg-5">
        <form method="POST" action="?url=category/store" class="needs-validation">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="MaTL" class="form-label fw-semibold">Mã thể loại <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="MaTL" name="MaTL" required placeholder="Ví dụ: TL001">
                </div>
                <div class="col-md-6">
                    <label for="TenTheLoai" class="form-label fw-semibold">Tên thể loại <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="TenTheLoai" name="TenTheLoai" required
                        placeholder="Ví dụ: Công nghệ thông tin, Khoa học viễn tưởng, Lịch sử...">
                </div>
            </div>

            <div class="mb-4">
                <label for="MoTa" class="form-label fw-semibold">Mô tả</label>
                <textarea class="form-control" id="MoTa" name="MoTa" rows="3"
                    placeholder="Nhập mô tả thể loại"></textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-semibold px-5">💾 Lưu thể loại</button>
                <a href="?url=category" class="btn btn-outline-secondary fw-semibold px-5">Hủy</a>
            </div>
        </form>
    </div>
</div>