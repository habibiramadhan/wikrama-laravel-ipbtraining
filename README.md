<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Project

Project dibuat sebagai tempat konsolidasi tugas PKL RPL Wikrama dari IPBTRAINING. Laravel yang digunakan versi 8.x. Untuk mengerjakan tugas yang sudah diberikan ikuti instruksi berikut:

- Silahkan Fork project & branch pada GitHub masing-masing
- Checkout pada branch project sesuai tugas
- Coding. Buat penambahan fitur / perbaikan bug.
- Commit.
- Kirim project author pull request.


## Instruksi khusus Project [Kuesioner Peserta](https://ipbtraining.com/kuesioner)
UI UX = silahkan akses [di sini](https://docs.google.com/forms/d/e/1FAIpQLSf5dFOPbi-Hc8Z8LeO2rDvyxZ9WmhpuG6ma6bs3ndLmf7W0JA/viewform) untuk informasi / form yang harus ada di kuesioner peserta. silahkan berkreasi sebagus mungkin, cari referensi2 di pinterest / google image untuk desain user interface

- Front End :
1. FE KUESIONER = Silahkan buat blade semirip mungkin dengan yang dibuat oleh UI / UX.
2. FE OUTPUT KUESIONER = Silahkan buat halaman yang menampilkan hasil inputan kuesioner dengan Packages Chart JS, minta format data yang diinginkan dengan BE CONTROLLER / DB OUTPUT
3. BE CONTROLLER / DB KUESIONER = Sediakan data, logic (Route, Controller, Model, Migration) kebutuhan data dari FE KUESIONER (Menerima Inputan, Validasi, & DOM Muncul Trainer tertentu setelah produk training dipililh)
4. BE CONTROLLER / DB OUTPUT = Buat Controller untuk menampilkan output dari struktur data yang sudah dibuat oleh Nomor 3 ke dalam Chartjs

### Struktur TABLE

Untuk nomor 3 :
1. Buat table products = untuk menempatkan data training => field db wajib: id, training_title
2. Buat table participants = untuk menempatkan data peserta => field db wajib: id, name, email
3. Buat table Pivot product_participant = untuk menghubungkan produk dengan peserta dengan skema many to many => field: id, product_id, participant_id, ...isi data kuesioner pada section PENAMAAN FIELD TABLE

4. Buat table trainers = untuk menempatkan data trainer => field db wajib: id, full_name, occupation, photo (STRING SEMUA)
5. Buat table Pivot product_trainer = untuk menghubungkan produk dengan trainer dengan skema many to many => field db wajib : id, product_id, trainer_id

6. Buat table trainer_ratings = untuk menempatkan data rating trainer tertentu pada kuesioner = field wajib => participant_id, product_id, trainer_id, penyampaian_rating, komentar (TEXT)

data kuesioner diletakkan pada table pivot.

### PENAMAAN FIELD TABLE
FYI kuesioner peserta sebelumnya sudah ada, namun perlu ada penyesuaian, saat ini ada nama field berikut yang sudah exists di web app kami.
gunakan nama field di bawah

sumber_informasi (VARCHAR) = Dari mana anda mengetahui informasi training ini? *
merekomendasikan (VARCHAR) = Apakah anda merekomendasikan training ini untuk teman anda? (tuliskan nama dan kontaknya untuk penyampaian informasi pealtihan) *
request_pelatihan (VARCHAR) = Tuliskan pelatihan lain yang anda butuhkan ?
layanan_panitia_sikap (INT) = Layanan panitia (attitude) 1-4
layanan_panitia_sikap_komentar (VARCHAR) = Komentar terkait layanan panitia (attitude)
layanan_panitia_kinerja_kualitas (INT) = Layanan panitia (kinerja) *
layanan_panitia_kinerja_kualitas_komentar (VARCHAR) = Komentar terkait layanan panitia (kinerja)
materi (INT) = Materi pelatihan sesuai dengan kebutuhan kerja? *
materi_komentar (VARCHAR) = Komentar materi pelatihan
kesan (TEXT) = Kesan saya mengikuti kegiatan ini adalah?

penyampaian_trainer (INT)
trainer_komentar (VARCHAR)

## Instruksi khusus Project [Kuesioner Trainer](https://docs.google.com/forms/d/e/1FAIpQLSeKx5T0iJM4Xar09RV9mxj8d71iPfvbWulUvfXYHa4V9tupog/viewform?c=0&w=1)
Kurang lebih sama instruksinya dengan di atas, namun yang berbeda, kami belum memiliki database untuk kuesioner trainer.

- Front End :
1. FE KUESIONER = Silahkan buat blade semirip mungkin dengan yang dibuat oleh UI / UX.
2. FE OUTPUT KUESIONER = Silahkan buat halaman yang menampilkan hasil inputan kuesioner dengan Packages Chart JS, minta format data yang diinginkan dengan BE CONTROLLER / DB OUTPUT
3. BE CONTROLLER / DB KUESIONER = Sediakan data, logic (Route, Controller, Model, Migration) kebutuhan data dari FE KUESIONER (Menerima Inputan, Validasi, & DOM Muncul Trainer tertentu setelah produk training dipililh)
4. BE CONTROLLER / DB OUTPUT = Buat Controller untuk menampilkan output dari struktur data yang sudah dibuat oleh Nomor 3 ke dalam Chartjs

### Struktur TABLE
1. Buat Ambil data judul training dari table yang sudah dibuat sebelumnya
2. Buat migration update table trainers untuk menambah field informasi, Bank Nomor Rekening a.n (VARCHAR) dengan nama field "bank" , dan "wa_number"
3. Buat migration update table pivot product_trainer untuk menambah field menampung informasi kuesioner trainer. data kuesioner diletakan pada table pivot ini. nama seperti yang di atas plus tambah field "new_training" untuk menampung jawaban pertanyaan "Apakah anda ingin mengembangkan training bersama kami? Topik apa yang ingin dikembangkan?"

### PENAMAAN FIELD TABLE
Gunakan penamaan seperti section kuesioner peserta

Silahkan saling bekerjasama dan saling membantu ya. Kalau ada kendala kita diskusikan di grup ya. Happy coding !!

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
