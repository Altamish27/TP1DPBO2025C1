import java.util.List;
import java.util.Scanner;
import java.util.ArrayList;


public class Main {
    public static void main(String[] args) {
        List<Petshop> listProduk = new ArrayList<>();
        Scanner scanner = new Scanner(System.in);
        int pilihan = 0;

        listProduk.add(new Petshop(1, "Kucing", "Hewan", 100000));

        while (pilihan != 6) {
            System.out.println("\nWelcome");
            System.out.println("1. Menambahkan Produk");
            System.out.println("2. Mengubah Produk");
            System.out.println("3. Menghapus Produk");
            System.out.println("4. Mencari Produk");
            System.out.println("5. Menampilkan Produk");
            System.out.println("6. Keluar");
            System.out.print("Pilihan: ");
            pilihan = scanner.nextInt();

            switch (pilihan) {
                case 1:
                    new Petshop().menambahkan(listProduk, scanner);
                    break;
                case 2:
                    Petshop.mengubah(listProduk, scanner);
                    break;
                case 3:
                    Petshop.menghapus(listProduk, scanner);
                    break;
                case 4:
                    Petshop.mencari(listProduk, scanner);
                    break;
                case 5:
                    Petshop.menampilkan(listProduk);
                    break;
                case 6:
                    System.out.println("Keluar dari program.");
                    break;
                default:
                    System.out.println("Pilihan tidak valid.");
                    break;
            }
        }
        scanner.close();
    }
}
