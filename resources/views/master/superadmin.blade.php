@extends('app')
@section('content')
<style>
    .bg-secondary {
        background-color: #6c757d; /* Customize secondary color */
    }
    .card-title {
        text-align: center;
    }
    .view-details {
        display: block;
        text-align: right;
        color: #007bff;
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

@php
$totalTamu = 0;
$totalVip = 0;
$totalProfile = 0;
$totalSurvey = 0;
$totalFeedback = 0;

try {
    $pdo = new PDO('mysql:host=localhost;dbname=framewor_pantautamupro', 'framewor_pantautamupro', 'PAJ-tif2024');
    
    $stmt = $pdo->prepare('SELECT COUNT(*) AS total_tamu FROM tamu');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalTamu = $result['total_tamu'];

    $stmt = $pdo->prepare('SELECT COUNT(*) AS total_vip FROM vip');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalVip = $result['total_vip'];

    $stmt = $pdo->prepare('SELECT COUNT(*) AS total_profile FROM profiles');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalProfile = $result['total_profile'];

    $stmt = $pdo->prepare('SELECT COUNT(*) AS total_survey FROM survey_questions');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalSurvey = $result['total_survey'];

    $stmt = $pdo->prepare('SELECT COUNT(*) AS total_feedback FROM feedback');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalFeedback = $result['total_feedback'];
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
@endphp

<div class="row">
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Jumlah Tamu</p>
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $totalTamu }}</h3>
                    <i class="ti-user icon-md text-muted"></i>
                </div>
                <p class="mb-4"></p>
                <a href="{{ route('element') }}" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Jumlah Tamu VIP</p>
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $totalVip }}</h3>
                    <i class="ti-user icon-md text-muted"></i>
                </div>
                <p class="mb-4"></p>
                <a href="{{ route('vip.index') }}" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Jumlah Akun</p>
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $totalProfile }}</h3>
                    <i class="ti-user icon-md text-muted"></i>
                </div>
                <p class="mb-4"></p>
                <a href="{{ route('profile.index') }}" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Jumlah Survey</p>
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $totalSurvey }}</h3>
                    <i class="ti-user icon-md text-muted"></i>
                </div>
                <p class="mb-4"></p>
                <a href="{{ route('survey.index') }}" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Jumlah Feedback</p>
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">{{ $totalFeedback }}</h3>
                    <i class="ti-user icon-md text-muted"></i>
                </div>
                <p class="mb-4"></p>
                <a href="{{ route('feedback.index') }}" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<script>
    // Display current date on the report button
    var reportButton = document.getElementById('reportButton');
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = mm + '/' + dd + '/' + yyyy;
    reportButton.innerHTML = today;
</script>

@endsection
