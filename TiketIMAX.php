<?php
require_once 'Tiket.php';
require_once 'koneksi.php'; // Memastikan file koneksi database ikut dimuat

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

    // =========================================================================
    // METODE BARU: Mengambil data khusus studio IMAX dari database
    // =========================================================================
    public static function ambilDataIMAX($koneksi) {
        $daftarTiketIMAX = [];

        // Query SQL untuk memfilter data berdasarkan jenis_studio = 'IMAX'
        $query = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'IMAX'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Melakukan perulangan untuk setiap baris data yang ditemukan
            while ($row = mysqli_fetch_assoc($result)) {
                // Instansiasi data database menjadi Objek dari kelas TiketIMAX
                $tiket = new TiketIMAX(
                    $row['id_tiket'],
                    $row['nama_film'],
                    $row['jadwal_tayang'],
                    $row['jumlah_kursi'],
                    $row['harga_dasar_tiket'],
                    $row['kacamata_3d_id'], // Atribut spesifik anak
                    $row['efek_gerak_fitur'] // Atribut spesifik anak
                );
                
                // Masukkan objek ke dalam array daftar
                $daftarTiketIMAX[] = $tiket;
            }
        }

        // Mengembalikan array yang berisi kumpulan objek TiketIMAX
        return $daftarTiketIMAX;
    }
}
?>
