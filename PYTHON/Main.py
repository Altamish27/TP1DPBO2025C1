from Petshop import Petshop

def main():
    list_produk = []
    hasbi_cats = Petshop(1, "Kucing", "Hewan", 100000)
    list_produk.append(hasbi_cats)

    while True:
        print("\nWelcome")
        print("1. Menambahkan Produk")
        print("2. Mengubah Produk")
        print("3. Menghapus Produk")
        print("4. Mencari Produk")
        print("5. Menampilkan Produk")
        print("6. Keluar")
        pilihan = int(input("Pilihan: "))

        if pilihan == 1:
            hasbi_cats.menambahkan(list_produk)
        elif pilihan == 2:
            hasbi_cats.mengubah(list_produk)
        elif pilihan == 3:
            hasbi_cats.menghapus(list_produk)
        elif pilihan == 4:
            hasbi_cats.mencari(list_produk)
        elif pilihan == 5:
            hasbi_cats.menampilkan(list_produk)
        elif pilihan == 6:
            print("Keluar dari program.")
            break
        else:
            print("Pilihan tidak valid.")

if __name__ == "__main__":
    main()
