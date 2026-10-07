# AI Usage Log - KursusKu

## Pembahasan Penggunaan AI

Dalam pengerjaan proyek KursusKu pada Pertemuan 6, saya menggunakan AI
sebagai alat bantu untuk debugging, memahami konsep pemrograman PHP, dan
memperbaiki beberapa bagian dari tampilan serta kode program.

AI tidak digunakan untuk membuat seluruh proyek secara otomatis. Saya tetap
mengerjakan dan mengubah kode pada proyek sendiri, kemudian menggunakan AI
untuk membantu menemukan masalah dan memahami cara memperbaikinya.

## 1. Perbaikan Error pada history.php

### Masalah
Ketika membuka halaman `history.php`, muncul error:

`Call to undefined function e()`

### Bantuan AI
AI membantu memeriksa fungsi yang digunakan pada `history.php` dan menjelaskan
bahwa fungsi `e()` belum tersedia pada `helpers.php`.

AI menyarankan untuk menambahkan fungsi:

```php
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}