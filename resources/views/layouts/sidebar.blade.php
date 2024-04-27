<div class="sidebar">
    <ul class="nav flex-column">
        <img src="{{asset('img/logo2.png')}}" alt="" style="max-width: 65px; max-height: 65px; display: block; margin: auto; margin-top: 13px; margin-bottom: 15px;" />
        <h4 class="judul text-center">Pantau Tamu Pro</h4><br>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('element') }}">
                <i class="ti-layout-list-post menu-icon"></i>
                <span class="menu-title">Rekapitulasi Tamu</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('vip.index') }}">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Rekapitulasi VIP</span>
            </a>
        </li>
        
        <li class="nav-item dropdown">
            <a class="nav-link" href="#">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Manajemen Akun</span>
            </a>
            <div class="dropdown-content">
                <a class="nav-link" href="{{ route('profile.index') }}">
                    <i class="ti-view-list-alt menu-icon"></i>
                    <span class="menu-title">Admin</span>
                </a> 
                <a class="nav-link" href="#">
                    <i class="ti-view-list-alt menu-icon"></i>
                    <span class="menu-title">User</span>
                </a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('karyawan.index') }}">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Manajemen Karyawan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('survey.index') }}">
                <i class="ti-agenda menu-icon"></i>
                <span class="menu-title">Manajemen Survey</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('feedback.index') }}">
                <i class="ti-comments menu-icon"></i>
                <span class="menu-title">Data Feedback</span>
            </a>
        </li>
    </ul>
</div>

<script>
    // Mengambil semua tombol dropdown untuk beralih antara menyembunyikan dan menampilkan konten dropdownnya
// Ini memungkinkan pengguna memiliki beberapa dropdown tanpa konflik
var dropdowns = document.querySelectorAll(".nav-item.dropdown");
dropdowns.forEach(function(dropdown) {
    dropdown.addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.querySelector('.dropdown-content');
        // Menggunakan window.getComputedStyle untuk mendapatkan nilai display yang dihitung, karena style.display tidak selalu akurat saat mengakses elemen dengan style yang telah didefinisikan di CSS
        var displayStyle = window.getComputedStyle(dropdownContent).getPropertyValue('display');
        if (displayStyle === "none") {
            dropdownContent.style.display = "block";
        } else {
            dropdownContent.style.display = "none";
        }
    });
});

</script>
