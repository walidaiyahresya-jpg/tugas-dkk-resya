nilai = int(input("Masukan nilai: "))

if nilai < 0 or nilai > 100:
    print("Nilai tidak valid")
elif nilai >= 85:
    print("Grade: A")
elif nilai >= 70:
    print("Grade: B")
elif nilai >= 55:
    print("Grade: C")
elif nilai >= 40:
    print("Grade: D")
else:
    print("Grade: E")
