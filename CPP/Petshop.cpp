#include <iostream>
#include <string>
#include <list>

using namespace std;


class Petshop {
private:
    int id;
    string namaProduk;
    string kategoriProduk;
    int hargaProduk;

public:
    Petshop(){
        id = 1;
        namaProduk = "";
        kategoriProduk = "";
        hargaProduk = 0;
    }


    Petshop(int id, string namaProduk, string kategoriProduk, int hargaProduk){
        this->id = id;
        this->namaProduk = namaProduk;
        this->kategoriProduk = kategoriProduk;
        this->hargaProduk = hargaProduk;
    }

    void setId(int id){
        this->id = id;
    }

    void setNamaProduk(string namaProduk){
        this->namaProduk = namaProduk;
    }

    void setKategoriProduk(string kategoriProduk){
        this->kategoriProduk = kategoriProduk;
    }

    void setHargaProduk(int hargaProduk){
        this->hargaProduk = hargaProduk;
    }

    int getId(){
        return id;
    }

    string getNamaProduk(){
        return namaProduk;
    }

    string getKategoriProduk(){
        return kategoriProduk;
    }

    int getHargaProduk(){
        return hargaProduk;
    }

    void menambahkan(list<Petshop> &listProduk){
        Petshop produk;
        id++;

        cout << "\nMenambahkan Produk\n";
        cout << "Nama Produk: ";
        cin >> namaProduk;
        cout << "Kategori Produk: ";
        cin >> kategoriProduk;
        cout << "Harga Produk: ";
        cin >> hargaProduk;

        produk.setId(id);
        produk.setNamaProduk(namaProduk);
        produk.setKategoriProduk(kategoriProduk);
        produk.setHargaProduk(hargaProduk);

        cout << "Produk berhasil ditambahkan.\n";
    }

    void menampilkan(list<Petshop> &listProduk){
        cout << "\nMenampilkan Semua Produk\n";
        for (Petshop produk : listProduk){
            cout << "ID: " << produk.getId() << "\n";
            cout << "Nama Produk: " << produk.getNamaProduk() << "\n";
            cout << "Kategori Produk: " << produk.getKategoriProduk() << "\n";
            cout << "Harga Produk: " << produk.getHargaProduk() << "\n";
        }
    }

    void mengubah(list<Petshop> &listProduk){

        cout << "\nMengubah Produk\n";
        cout << "ID Produk yang ingin diubah: ";
        cin >> id;

        for (Petshop &produk : listProduk){
            if (produk.getId() == id){
                cout << "Nama Produk: ";
                cin >> namaProduk;
                cout << "Kategori Produk: ";
                cin >> kategoriProduk;
                cout << "Harga Produk: ";
                cin >> hargaProduk;

                produk.setNamaProduk(namaProduk);
                produk.setKategoriProduk(kategoriProduk);
                produk.setHargaProduk(hargaProduk);

                cout << "Produk berhasil diubah.\n";
                return;
            }
        }

        cout << "Produk tidak ditemukan.\n";
    }

    void menghapus(list<Petshop> &listProduk){

        cout << "\n Menghapus Produk\n";
        cout << "ID Produk yang ingin dihapus: ";
        cin >> id;

        for (auto it = listProduk.begin(); it != listProduk.end(); it++){
            if (it->getId() == id){
                listProduk.erase(it);
                cout << "Produk berhasil dihapus.\n";
                return;
            }
        }

        cout << "Produk tidak ditemukan.\n";
    }

    void mencari(list<Petshop> &listProduk){

        cout << "\nMencari Produk\n";
        cout << "Nama Produk yang ingin dicari: ";
        cin >> namaProduk;

        for (Petshop produk : listProduk){
            if (produk.getNamaProduk() == namaProduk){
                cout << "ID: " << produk.getId() << "\n";
                cout << "Nama Produk: " << produk.getNamaProduk() << "\n";
                cout << "Kategori Produk: " << produk.getKategoriProduk() << "\n";
                cout << "Harga Produk: " << produk.getHargaProduk() << "\n";
                return;
            }
        }

        cout << "Produk tidak ditemukan.\n";
    }




};