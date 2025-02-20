class Petshop:
    def __init__(self, id=1, nama_produk="", kategori_produk="", harga_produk=0):
        self.id = id
        self.nama_produk = nama_produk
        self.kategori_produk = kategori_produk
        self.harga_produk = harga_produk

    def set_id(self, id):
        self.id = id

    def set_nama_produk(self, nama_produk):
        self.nama_produk = nama_produk

    def set_kategori_produk(self, kategori_produk):
        self.kategori_produk = kategori_produk

    def set_harga_produk(self, harga_produk):
        self.harga_produk = harga_produk

    def get_id(self):
        return self.id

    def get_nama_produk(self):
        return self.nama_produk

    def get_kategori_produk(self):
        return self.kategori_produk

    def get_harga_produk(self):
        return self.harga_produk

    def menambahkan(self, list_produk):
        print("\nMenambahkan Produk")
        nama_produk = input("Nama Produk: ")
        kategori_produk = input("Kategori Produk: ")
        harga_produk = int(input("Harga Produk: "))

        produk = Petshop(len(list_produk) + 1, nama_produk, kategori_produk, harga_produk)
        list_produk.append(produk)
        print("Produk berhasil ditambahkan.")

    def menampilkan(self, list_produk):
        print("\nMenampilkan Semua Produk")
        for produk in list_produk:
            print(f"ID: {produk.get_id()}\nNama Produk: {produk.get_nama_produk()}\nKategori Produk: {produk.get_kategori_produk()}\nHarga Produk: {produk.get_harga_produk()}\n")

    def mengubah(self, list_produk):
        id = int(input("\nID Produk yang ingin diubah: "))
        for produk in list_produk:
            if produk.get_id() == id:
                produk.set_nama_produk(input("Nama Produk: "))
                produk.set_kategori_produk(input("Kategori Produk: "))
                produk.set_harga_produk(int(input("Harga Produk: ")))
                print("Produk berhasil diubah.")
                return
        print("Produk tidak ditemukan.")

    def menghapus(self, list_produk):
        id = int(input("\nID Produk yang ingin dihapus: "))
        for produk in list_produk:
            if produk.get_id() == id:
                list_produk.remove(produk)
                print("Produk berhasil dihapus.")
                return
        print("Produk tidak ditemukan.")

    def mencari(self, list_produk):
        nama_produk = input("\nNama Produk yang ingin dicari: ")
        for produk in list_produk:
            if produk.get_nama_produk().lower() == nama_produk.lower():
                print(f"ID: {produk.get_id()}\nNama Produk: {produk.get_nama_produk()}\nKategori Produk: {produk.get_kategori_produk()}\nHarga Produk: {produk.get_harga_produk()}")
                return
        print("Produk tidak ditemukan.")

