<?php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan spesifik kelas anak
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Implementasi Method Abstrak: Menghitung total harga untuk IMAX
    public function hitungTotalHarga() {
        // Misal: Studio IMAX ada tambahan biaya teknologi sebesar Rp 25.000 per kursi
        $biayaTambahanIMAX = 25000;
        return ($this->hargaDasarTiket + $biayaTambahanIMAX) * $this->jumlah_kursi;
    }

    // Implementasi Method Abstrak: Menampilkan fasilitas IMAX
    public function tampilkanInfoFasilitas() {
        echo "=== FASILITAS STUDIO IMAX ===<br>";
        echo "Teknologi Layar/Gerak: " . $this->efekGerakFitur . "<br>";
        echo "ID Kacamata 3D: " . ($this->kacamata3dId ?? "Tidak Menggunakan Kacamata 3D") . "<br>";
        echo "--------------------------------<br>";
    }
}
?>