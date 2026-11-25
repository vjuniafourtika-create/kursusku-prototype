 # KursusKu Prototype

## Deskripsi
KursusKu adalah prototype aplikasi katalog kursus yang dibuat menggunakan PHP.

## Fitur
- Menampilkan katalog 6 kursus
- Menampilkan biaya kursus dalam format rupiah
- Menampilkan status kursus (Penuh/Tersedia)
- Menampilkan sisa kursi
- Menampilkan tanggal mulai kursus
- Kalkulator estimasi biaya kursus
- Pengujian fungsi PHP

## Rumus Kalkulator Biaya

Subtotal:

fee × jumlah peserta

Diskon:

intdiv(subtotal × persentase diskon, 100)

Total:

## Contoh Perhitungan

Contoh input:

| Komponen | Nilai |
|---|---:|
| Nama kursus | Laravel Fundamental |
| Biaya per peserta | Rp350.000 |
| Jumlah peserta | 2 |
| Diskon | 10% |
| Biaya administrasi | Rp25.000 |

Hasil perhitungan:

- Subtotal = 350.000 × 2 = Rp700.000
- Diskon = 10% × 700.000 = Rp70.000
- Biaya administrasi = Rp25.000
- Total = 700.000 - 70.000 + 25.000

Total pembayaran = Rp655.000

subtotal - diskon + biaya admin

## Pengujian
Pertemuan 3 menggunakan 5 test case.

### Test Case Pertemuan 3

| No | Fee | Peserta | Diskon | Admin | Expected Total |
|---|---:|---:|---:|---:|---:|
| 1 | 350000 | 1 | 0% | 25000 | 375000 |
| 2 | 350000 | 1 | 10% | 25000 | 340000 |
| 3 | 350000 | 2 | 25% | 25000 | 550000 |
| 4 | 0 | 1 | 10% | 0 | 0 |
| 5 | 2500000 | 3 | 10% | 50000 | 6800000 |

Pengujian dinyatakan PASS apabila hasil aktual
sama dengan expected total.

Pertemuan 4 menggunakan 6 test fungsi dan seluruh pengujian diharapkan menghasilkan PASS.

## Struktur Project

- index.php
- server-time.php
- fee-calculator.php
- helpers.php
- test-functions.php
- README.md
- assets/
- evidence/

## Teknologi
- PHP
- HTML
- Laragon
- Visual Studio Code

## Penjelasan Proses Perhitungan

Data input pada kalkulator meliputi nama kursus,
biaya per peserta, jumlah peserta, persentase diskon,
dan biaya administrasi.

Subtotal dihitung dengan mengalikan biaya kursus
dengan jumlah peserta. Diskon dihitung berdasarkan
persentase dari subtotal. Selanjutnya, total pembayaran
diperoleh dengan mengurangi subtotal menggunakan
nilai diskon dan menambahkan biaya administrasi.

Nilai uang disimpan menggunakan tipe data integer
agar perhitungan tetap akurat. Format Rupiah ditampilkan
menggunakan fungsi number_format().