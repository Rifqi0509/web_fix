@extends('app')
@section('content')
<style>
.bg-secondary {
    background-color: #6c757d; /* Ganti dengan warna secondary yang diinginkan */
    /* Tambahan gaya CSS lainnya sesuai kebutuhan */
}
</style>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="font-weight-bold mb-0">Dashboard</h4>
            </div>
            <div>
                <p id="reportButton"></p>
            </div>
        </div>
    </div>
</div>

<?php
        // Lakukan koneksi ke database (contoh menggunakan PDO)
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=dispendik', 'root', '');
            $stmt = $pdo->prepare('SELECT COUNT(*) AS total_tamu FROM tamu');
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalTamu = $result['total_tamu'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>
<div class="row">
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Jumlah Tamu</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $totalTamu; ?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
                <!-- Tambahkan jarak menggunakan margin -->
                <p class="mb-4"></p> <!-- Aturan baru -->
                <!-- Tanda panah untuk "view details" -->
                <a href="{{ route('element') }}" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                <!--<p class="mb-0 mt-2 text-danger">view<span class="text-black ms-1"><small>detail</small></span></p>-->
            </div>
        </div>
    </div>

    <?php
// Lakukan koneksi ke database (contoh menggunakan PDO)
try {
    $pdo = new PDO('mysql:host=localhost;dbname=dispendik', 'root', '');
    $stmt = $pdo->prepare('SELECT COUNT(*) AS total_vip FROM vip');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalVip = $result['total_vip'];
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<div class="col-md-3 grid-margin stretch-card">
    <div class="card" class="bg-secondary">
        <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Jumlah Tamu VIP</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $totalVip; ?></h3>
                <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
            <!-- Tambahkan jarak menggunakan margin -->
            <p class="mb-4"></p> <!-- Aturan baru -->
                <!-- Tanda panah untuk "view details" -->
                <a href="{{ route('vip.index') }}" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                <!--<p class="mb-0 mt-2 text-danger">view<span class="text-black ms-1"><small>detail</small></span></p>-->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php
        // Lakukan koneksi ke database (contoh menggunakan PDO)
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=dispendik', 'root', '');
            $stmt = $pdo->prepare('SELECT COUNT(*) AS total_survey FROM survey_questions');
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalSurvey = $result['total_survey'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Jumlah Survey</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $totalSurvey; ?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
                <p class="mb-4"></p> 
                <a href="{{ route('survey.index') }}" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <?php
        // Lakukan koneksi ke database (contoh menggunakan PDO)
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=dispendik', 'root', '');
            $stmt = $pdo->prepare('SELECT COUNT(*) AS total_feedback FROM feedback');
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalFeedback = $result['total_feedback'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-md-center text-xl-left">Jumlah Feedback</p>
                <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo $totalFeedback; ?></h3>
                    <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                </div>
                <!-- Tambahkan jarak menggunakan margin -->
                <p class="mb-4"></p> <!-- Aturan baru -->
                <!-- Tanda panah untuk "view details" -->
                <a href="{{ route('feedback.index') }}" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<script>
    // Mendapatkan tombol "Report"
    var reportButton = document.getElementById('reportButton');

    // Mendapatkan tanggal hari ini
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    // Mengganti teks tombol dengan tanggal hari ini
    reportButton.innerHTML = today;
</script>

@endsection
