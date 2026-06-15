<?php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    // Properti tambahan spesifik kelas anak
    private $tipeAudio;
    private $lokasiBaris;

    // Constructor Kelas Anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        // Memanggil constructor dari class induk (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Implementasi Method Abstrak: Menghitung total harga untuk Regular
    public function hitungTotalHarga() {
        // Misal: Regular tidak ada biaya tambahan studio
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    // Implementasi Method Abstrak: Menampilkan fasilitas Regular
    public function tampilkanInfoFasilitas() {
        echo "=== FASILITAS STUDIO REGULAR ===<br>";
        echo "Lokasi Baris: " . $this->lokasiBaris . "<br>";
        echo "Sistem Audio: " . $this->tipeAudio . "<br>";
        echo "--------------------------------<br>";
    }
}
?>