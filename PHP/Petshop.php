<?php
session_start();

class Petshop {
    private $produk;
    private $id;
    private $nama;
    private $kategori;
    private $harga;
    private $gambar;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = htmlspecialchars($nama);
    }

    public function getKategori() {
        return $this->kategori;
    }

    public function setKategori($kategori) {
        $this->kategori = htmlspecialchars($kategori);
    }

    public function getHarga() {
        return $this->harga;
    }

    public function setHarga($harga) {
        $this->harga = floatval($harga);
    }

    public function getGambar() {
        return $this->gambar;
    }

    public function setGambar($gambar) {
        $this->gambar = filter_var($gambar, FILTER_SANITIZE_URL);
    }

    public function __construct() {
        if (!isset($_SESSION['produk'])) {
            $_SESSION['produk'] = [];
        }
        $this->produk = &$_SESSION['produk'];
    }

    public function menambahkan($nama, $kategori, $harga, $gambar) {
        $this->id = count($this->produk) + 1;
        $this->nama = htmlspecialchars($nama);
        $this->kategori = htmlspecialchars($kategori);
        $this->harga = floatval($harga);
        $this->gambar = filter_var($gambar, FILTER_SANITIZE_URL);

        $this->produk[] = [
            "id" => $this->id,
            "nama" => $this->nama,
            "kategori" => $this->kategori,
            "harga" => $this->harga,
            "gambar" => $this->gambar
        ];
        return "Produk berhasil ditambahkan!";
    }

    public function menampilkan() {
        return $this->produk;
    }

    public function menghapus($id) {
        foreach ($this->produk as $key => $p) {
            if ($p["id"] == $id) {
                unset($this->produk[$key]);
                return "Produk berhasil dihapus!";
            }
        }
        return "Produk tidak ditemukan!";
    }

    public function mencari($nama) {
        $hasil = [];
        foreach ($this->produk as $p) {
            if (stripos($p["nama"], $nama) !== false) {
                $hasil[] = $p;
            }
        }
        return $hasil;
    }

    public function mengubah($id, $nama, $kategori, $harga, $gambar) {
        foreach ($_SESSION['produk'] as &$p) {
            if ($p["id"] == $id) {
                $p["nama"] = htmlspecialchars($nama);
                $p["kategori"] = htmlspecialchars($kategori);
                $p["harga"] = floatval($harga);
                $p["gambar"] = filter_var($gambar, FILTER_SANITIZE_URL);
                return "Produk berhasil diperbarui!";
            }
        }
        return "Produk tidak ditemukan!";
    }
}
?>
