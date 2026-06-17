<?php
require_once 'Tiket.php';
require_once 'koneksi.php'; // Memastikan file koneksi database ikut dimuat

class TiketVelvet extends Tiket {
    // Properti tambahan spesifik kelas anak
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // TAHAP 5: Overriding hitungTotalHarga sesuai rumus bisnis Velvet (Surcharge 50%)
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    // Implementasi Method Abstrak: Menampilkan fasilitas Velvet
    public function tampilkanInfoFasilitas() {
        echo "=== FASILITAS STUDIO VELVET (VIP) ===<br>";
        echo "Fasilitas Tidur: " . $this->bantalSelimutPack . "<br>";
        echo "Layanan Butler: " . $this->layananButler . "<br>";
        echo "------------------------------------<br>";
    }

    // =========================================================================
    // METODE BARU: Mengambil data khusus studio Velvet dari database
    // =========================================================================
    public static function ambilDataVelvet($koneksi) {
        $daftarTiketVelvet = [];

        // Query SQL untuk memfilter data berdasarkan jenis_studio = 'Velvet'
        $query = "SELECT * FROM tabel_tiket WHERE jenis_studio = 'Velvet'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Melakukan perulangan untuk mengambil setiap baris data
            while ($row = mysqli_fetch_assoc($result)) {
                // Instansiasi baris data menjadi objek dari kelas TiketVelvet
                $tiket = new TiketVelvet(
                    $row['id_tiket'],
                    $row['nama_film'],
                    $row['jadwal_tayang'],
                    $row['jumlah_kursi'],
                    $row['harga_dasar_tiket'],
                    $row['bantal_selimut_pack'], // Atribut spesifik anak
                    $row['layanan_butler']        // Atribut spesifik anak
                );
                
                // Masukkan objek ke dalam array daftar
                $daftarTiketVelvet[] = $tiket;
            }
        }

        // Mengembalikan array yang berisi kumpulan objek TiketVelvet
        return $daftarTiketVelvet;
    }
}
?>
