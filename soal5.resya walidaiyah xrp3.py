bawah = int(input("Batas bawah: "))
atas = int(input("Batas atas: "))

print("Bilangan prima: ", end="")
jumlah = 0

for i in range(bawah, atas + 1):
     if i > 1:
          prima = True
          for j in range(2, i):
               if i % j == 0:
                  prima = False
                  break
          if prima:
               print(i, end=" ")
               jumlah += 1

print(f"\nJumlah: {jumlah}")