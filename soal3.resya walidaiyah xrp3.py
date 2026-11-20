n = int(input("Masukkan n: "))

jumlah = 0
genap = 0

print("Deret:", end=" ")

for i in range(1, n + 1):
    print(i, end=" ")
    jumlah = jumlah + i

    if i % 2 == 0:
        genap  = genap + i

print()
print("jumlah semua:", jumlah)
print("jumlah genap:", genap)