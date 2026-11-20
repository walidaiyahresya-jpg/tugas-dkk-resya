bilangan = int(input("Masukan bilangan: "))

if bilangan > 0:
    sifat = "positif"
elif bilangan < 0:
    sifat = "negatif"
else:
    sifat = "nol"

if bilangan != 0:
    if bilangan % 2 == 0:
        print("Bilangan", sifat, "dan genap")
    else:
        print("Bilangan", sifat, "dan ganjil")
else:
    print("Bilangan nol")