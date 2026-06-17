<?php
require_once 'Tiket.php';
require_once 'koneksi.php'; // Memastikan file koneksi database ikut dimuat

class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // TAHAP 5: Overriding hitungTotalHarga sesuai soal
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas() {
        echo "=== FASILITAS STUDIO REGULAR ===<br>";
        echo "Lokasi Baris: " . $this->lokasiBaris . "<br>";
        echo "Sistem Audio: " . $this->tipeAudio . "<br>";
        echo "--------------------------------<br>";
    }

    // =========================================================================
    // METODE BARU: Mengambil data khusus studio Regular dari database
    // =========================================================================
    public static function ambilDataRegular($koneksi) {
        $daftarTiketRegular = [];

        // Query SQL untuk memfilter data berdasarkan jenis_studio = 'Regular'
        $query = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'Regular'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Melakukan perulangan untuk mengambil setiap baris data
            while ($row = mysqli_fetch_assoc($result)) {
                // Instansiasi baris data menjadi objek dari kelas TiketRegular
                $tiket = new TiketRegular(
                    $row['id_tiket'],
                    $row['nama_film'],
                    $row['jadwal_tayang'],
                    $row['jumlah_kursi'],
                    $row['harga_dasar_tiket'],
                    $row['tipe_audio'],   // Atribut spesifik anak
                    $row['lokasi_baris']  // Atribut spesifik anak
                );
                
                // Masukkan objek ke dalam array daftar
                $daftarTiketRegular[] = $tiket;
            }
        }

        // Mengembalikan array yang berisi kumpulan objek TiketRegular
        return $daftarTiketRegular;
    }
}
?>
