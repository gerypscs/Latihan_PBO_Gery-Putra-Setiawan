<?php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan spesifik kelas anak
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Implementasi Method Abstrak: Menghitung total harga untuk Velvet
    public function hitungTotalHarga() {
        // Misal: Velvet ada charge premium service Rp 50.000 per transaksi tiket
        $biayaServiceVIP = 50000;
        return ($this->hargaDasarTiket * $this->jumlah_kursi) + $biayaServiceVIP;
    }

    // Implementasi Method Abstrak: Menampilkan fasilitas Velvet
    public function tampilkanInfoFasilitas() {
        echo "=== FASILITAS STUDIO VELVET (VIP) ===<br>";
        echo "Fasilitas Tidur: " . $this->bantalSelimutPack . "<br>";
        echo "Layanan Butler: " . $this->layananButler . "<br>";
        echo "------------------------------------<br>";
    }
}
?>