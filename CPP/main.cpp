#include "Petshop.cpp"

int main()
{
    list<Petshop> listProduk;
    Petshop hasbiCats;
    int pilihan = 0;


    hasbiCats.setId(1);
    hasbiCats.setNamaProduk("Kucing");
    hasbiCats.setKategoriProduk("Hewan");
    hasbiCats.setHargaProduk(100000);
    listProduk.push_back(hasbiCats);

    while (pilihan != 6)
    {
        cout << "\nWellcome\n";
        cout << "1. Menambahkan Produk\n";
        cout << "2. Mengubah Produk\n";
        cout << "3. Menghapus Produk\n";
        cout << "4. Mencari Produk\n";
        cout << "5. Menampilkan Produk\n";
        cout << "6. Keluar\n";
        cout << "Pilihan: ";
        cin >> pilihan;

        switch (pilihan)
        {
        case 1:
            hasbiCats.menambahkan(listProduk);
            listProduk.push_back(hasbiCats);

            break;
        case 2:
            hasbiCats.mengubah(listProduk);
            break;
        case 3:
            hasbiCats.menghapus(listProduk);
            break;
        case 4:
            hasbiCats.mencari(listProduk);
            break;
        case 5:
            hasbiCats.menampilkan(listProduk);
            break;
        case 6:
            cout << "Keluar dari program.\n";
            break;
        default:
            cout << "Pilihan tidak valid.\n";
            break;
        }
    }

    return 0;
}
