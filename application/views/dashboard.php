<div class="row">
    <!-- Card Header -->
    <div class="col-xxl-8 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-start row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3 fs-3">Selamat Datang di Digital Library</h5>
                        <p class="mb-6 fs-5">
                            Halo, <span class="fw-bold"><?= $this->session->userdata('namaLengkap') ?></span><br>
                            Anda Login Sebagai <?= $this->session->userdata('role') ?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-6">
                        <img src="<?= base_url('assets/sneat/assets/img/man.png') ?>" height="175" class="scaleX-n1-rtl" alt="View Badge User">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards Section -->
    <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
        <div class="row">
            <!-- Buku Card -->
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card h-100">
                    <div class="card-body pb-4">
                        <span class="d-block fw-bold mb-1">Buku</span>
                        <h4 class="card-title mb-0"><?= $this->db->count_all('buku') ?></h4>
                    </div>
                </div>
            </div>

            <!-- Peminjaman Card -->
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card h-100">
                    <div class="card-body pb-4">
                        <span class="d-block fw-bold mb-1">Peminjaman</span>
                        <h4 class="card-title mb-0"><?= $this->db->count_all('peminjaman') ?></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Peminjaman Hari Ini Card (Placed below Buku and Peminjaman cards) -->
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Peminjaman Hari Ini</h5>
                    <h4 class="card-text"><?= $jumlah_peminjaman_today ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Chart Peminjaman -->
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Grafik Peminjaman</h5>
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>

<!-- Include ApexCharts Library -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    // Data untuk chart (tanggal dan total peminjaman)
    var chartData = <?php echo json_encode($chart_data); ?>;

    // Menyiapkan data untuk chart
    var dates = chartData.map(function(item) { return item.date; });
    var totals = chartData.map(function(item) { return item.total; });

    // Membuat chart menggunakan ApexCharts
    var options = {
        chart: {
            type: 'line',
            height: 350
        },
        series: [{
            name: 'Peminjaman',
            data: totals
        }],
        xaxis: {
            categories: dates,
            title: {
                text: 'Tanggal'
            }
        },
        yaxis: {
            title: {
                text: 'Jumlah Peminjaman'
            }
        },
        title: {
            text: 'Jumlah Peminjaman per Hari',
            align: 'center'
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
