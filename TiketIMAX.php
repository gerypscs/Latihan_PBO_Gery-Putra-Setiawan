<?php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // TAHAP 5: Overriding hitungTotalHarga sesuai soal
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        echo "=== FASILITAS STUDIO IMAX ===<br>";
        echo "Teknologi Layar/Gerak: " . $this->efekGerakFitur . "<br>";
        echo "ID Kacamata 3D: " . ($this->kacamata3dId ?? "Tidak Ada") . "<br>";
        echo "--------------------------------<br>";
    }
}
?>
