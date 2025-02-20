import java.util.List;
import java.util.Scanner;

class Petshop {
    private int id;
    private String namaProduk;
    private String kategoriProduk;
    private int hargaProduk;

    public Petshop() {
        this.id = 1;
        this.namaProduk = "";
        this.kategoriProduk = "";
        this.hargaProduk = 0;
    }

    public Petshop(int id, String namaProduk, String kategoriProduk, int hargaProduk) {
        this.id = id;
        this.namaProduk = namaProduk;
        this.kategoriProduk = kategoriProduk;
        this.hargaProduk = hargaProduk;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setNamaProduk(String namaProduk) {
        this.namaProduk = namaProduk;
    }

    public void setKategoriProduk(String kategoriProduk) {
        this.kategoriProduk = kategoriProduk;
    }

    public void setHargaProduk(int hargaProduk) {
        this.hargaProduk = hargaProduk;
    }

    public int getId() {
        return id;
    }

    public String getNamaProduk() {
        return namaProduk;
    }

    public String getKategoriProduk() {
        return kategoriProduk;
    }

    public int getHargaProduk() {
        return hargaProduk;
    }

    public void menambahkan(List<Petshop> listProduk, Scanner scanner) {
        System.out.println("\nMenambahkan Produk");
        System.out.print("Nama Produk: ");
        scanner.nextLine(); // Handle newline
        this.namaProduk = scanner.nextLine();
        System.out.print("Kategori Produk: ");
        this.kategoriProduk = scanner.nextLine();
        System.out.print("Harga Produk: ");
        this.hargaProduk = scanner.nextInt();
        
        listProduk.add(new Petshop(this.id + 1, namaProduk, kategoriProduk, hargaProduk));
        System.out.println("Produk berhasil ditambahkan.");
    }

    public static void menampilkan(List<Petshop> listProduk) {
        System.out.println("\nMenampilkan Semua Produk");
        for (Petshop produk : listProduk) {
            System.out.println("ID: " + produk.getId());
            System.out.println("Nama Produk: " + produk.getNamaProduk());
            System.out.println("Kategori Produk: " + produk.getKategoriProduk());
            System.out.println("Harga Produk: " + produk.getHargaProduk());
        }
    }

    public static void mengubah(List<Petshop> listProduk, Scanner scanner) {
        System.out.println("\nMengubah Produk");
        System.out.print("ID Produk yang ingin diubah: ");
        int id = scanner.nextInt();
        scanner.nextLine(); // Handle newline

        for (Petshop produk : listProduk) {
            if (produk.getId() == id) {
                System.out.print("Nama Produk: ");
                produk.setNamaProduk(scanner.nextLine());
                System.out.print("Kategori Produk: ");
                produk.setKategoriProduk(scanner.nextLine());
                System.out.print("Harga Produk: ");
                produk.setHargaProduk(scanner.nextInt());

                System.out.println("Produk berhasil diubah.");
                return;
            }
        }
        System.out.println("Produk tidak ditemukan.");
    }

    public static void menghapus(List<Petshop> listProduk, Scanner scanner) {
        System.out.println("\nMenghapus Produk");
        System.out.print("ID Produk yang ingin dihapus: ");
        int id = scanner.nextInt();
        
        listProduk.removeIf(produk -> produk.getId() == id);
        System.out.println("Produk berhasil dihapus.");
    }

    public static void mencari(List<Petshop> listProduk, Scanner scanner) {
        System.out.println("\nMencari Produk");
        System.out.print("Nama Produk yang ingin dicari: ");
        scanner.nextLine(); // Handle newline
        String namaProduk = scanner.nextLine();

        for (Petshop produk : listProduk) {
            if (produk.getNamaProduk().equalsIgnoreCase(namaProduk)) {
                System.out.println("ID: " + produk.getId());
                System.out.println("Nama Produk: " + produk.getNamaProduk());
                System.out.println("Kategori Produk: " + produk.getKategoriProduk());
                System.out.println("Harga Produk: " + produk.getHargaProduk());
                return;
            }
        }
        System.out.println("Produk tidak ditemukan.");
    }
}