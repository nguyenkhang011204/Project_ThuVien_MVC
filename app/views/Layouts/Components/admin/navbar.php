<nav class="navbar navbar-dark bg-dark navbar-expand-lg shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="#">Library Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminTopNav"
            aria-controls="adminTopNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminTopNav">
            <form class="d-flex mx-lg-auto my-3 my-lg-0 w-100 w-lg-50" role="search">
                <div class="input-group">
                    <span class="input-group-text bg-body-tertiary">Tìm</span>
                    <input class="form-control" type="search" placeholder="Sách, độc giả, phiếu mượn..."
                        aria-label="Search">
                </div>
            </form>
            <ul class="navbar-nav ms-lg-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">Thông báo</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Quản trị viên
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                        <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="#">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>