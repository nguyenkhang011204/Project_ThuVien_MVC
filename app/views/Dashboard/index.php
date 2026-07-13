<?php
$books = $books ?? [];
$bookCount = $bookCount ?? count($books);
?>

<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card library-stat library-stat-primary">
            <div class="card-body">
                <div class="small text-light opacity-75">
                    Tổng sách
                </div>

                <div class="display-6 fw-semibold">
                    <?= $bookCount ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card library-stat library-stat-primary">
            <div class="card-body">
                <div class="small text-light opacity-75">
                    Độc giả
                </div>

                <div class="display-6 fw-semibold">
                    <?= $bookCount ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card library-stat library-stat-primary">
            <div class="card-body">
                <div class="small text-light opacity-75">
                    Đang mượn
                </div>

                <div class="display-6 fw-semibold">
                    <?= $bookCount ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card library-stat library-stat-primary">
            <div class="card-body">
                <div class="small text-light opacity-75">
                    Quá hạn
                </div>

                <div class="display-6 fw-semibold">
                    <?= $bookCount ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card library-stat library-stat-primary">
            <div class="card-body">
                <div class="small text-light opacity-75">
                    Mượn hôm nay
                </div>

                <div class="display-6 fw-semibold">
                    <?= $bookCount ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card library-stat library-stat-primary">
            <div class="card-body">
                <div class="small text-light opacity-75">
                    Trả hôm nay
                </div>

                <div class="display-6 fw-semibold">
                    <?= $bookCount ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card library-stat library-stat-primary">
            <div class="card-body">
                <div class="small text-light opacity-75">
                    Còn trong kho
                </div>

                <div class="display-6 fw-semibold">
                    <?= $bookCount ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card library-stat library-stat-primary">
            <div class="card-body">
                <div class="small text-light opacity-75">
                    Tiền phạt
                </div>

                <div class="display-6 fw-semibold">
                    <?= $bookCount ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$chartLabels = ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8'];
$borrowData = [12, 19, 16, 22, 24, 31, 28, 35];
$returnData = [8, 14, 13, 18, 21, 26, 23, 30];
?>

<div class="row g-4 mb-4">
    <div class="col-12 col-xl-8">
        <div class="card library-card h-100">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2 py-3 px-4">
                <div>
                    <h2 class="h5 mb-0">Biểu đồ mượn trả</h2>
                    <small class="text-muted">Theo dõi xu hướng hoạt động trong 8 tháng gần nhất</small>
                </div>
                <span class="badge library-chip rounded-pill px-3 py-2">Blue Analytics</span>
            </div>
            <div class="card-body p-4 p-lg-5">
                <div style="position: relative; height: 320px;">
                    <canvas id="borrowingChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4">
        <div class="card library-card h-100">
            <div class="card-header py-3 px-4">
                <h2 class="h5 mb-0">Tóm tắt nhanh</h2>
            </div>
            <div class="card-body p-4 p-lg-5">
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="text-muted">Sách đang mượn</span>
                    <strong class="text-primary"><?= $bookCount ?></strong>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="text-muted">Phiếu trả đúng hạn</span>
                    <strong class="text-primary">89%</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="text-muted">Độc giả hoạt động</span>
                    <strong class="text-primary">56</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2">
                    <span class="text-muted">Tăng trưởng tháng này</span>
                    <strong class="text-primary">+18%</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">

    <?php if (!empty($books)): ?>

        <?php foreach ($books as $book): ?>

            <div class="col-md-6 col-xl-4">

                <div class="card library-card">

                    <div class="card-body">

                        <h5>
                            <?= htmlspecialchars($book->ten_sach) ?>
                        </h5>
                        <p>
                            <?= htmlspecialchars($book->tac_gia) ?>
                        </p>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="col-12">

            <div class="alert alert-info">

                Chưa có dữ liệu.

            </div>

        </div>

    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    (() => {
        const canvas = document.getElementById('borrowingChart');

        if (!canvas || typeof Chart === 'undefined') {
            return;
        }

        new Chart(canvas, {
            type: 'line',
            data: {
                labels: <?= json_encode($chartLabels, JSON_UNESCAPED_UNICODE) ?>,
                datasets: [
                    {
                        label: 'Mượn sách',
                        data: <?= json_encode($borrowData, JSON_UNESCAPED_UNICODE) ?>,
                        borderColor: '#1d4ed8',
                        backgroundColor: 'rgba(29, 78, 216, 0.18)',
                        tension: 0.35,
                        fill: true,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    },
                    {
                        label: 'Trả sách',
                        data: <?= json_encode($returnData, JSON_UNESCAPED_UNICODE) ?>,
                        borderColor: '#38bdf8',
                        backgroundColor: 'rgba(56, 189, 248, 0.14)',
                        tension: 0.35,
                        fill: true,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            boxWidth: 10,
                            padding: 18,
                        },
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false,
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                        },
                        ticks: {
                            color: '#64748b',
                        },
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#64748b',
                        },
                        grid: {
                            color: 'rgba(215, 228, 246, 0.85)',
                        },
                    },
                },
            },
        });
    })();
</script>