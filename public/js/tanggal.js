// Mendapatkan elemen dengan ID 'current-date'
var currentDateElement = document.getElementById("current-date");

// Membuat objek tanggal JavaScript baru
var currentDate = new Date();

// Array nama bulan untuk mengonversi indeks bulan menjadi teks
var monthNames = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
];

// Mendapatkan tanggal, bulan, dan tahun
var day = currentDate.getDate();
var monthIndex = currentDate.getMonth();
var year = currentDate.getFullYear();

// Membuat teks tanggal sesuai format yang diinginkan
var formattedDate = day + " " + monthNames[monthIndex] + " " + year;

// Menetapkan teks tanggal ke dalam elemen
currentDateElement.textContent = formattedDate;
