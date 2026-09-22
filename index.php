<?php $siteName = 'KursusKu';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y'); ?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($siteName) ?></title>
</head>

<body>
    <header>
        <nav aria-label="Navigasi utama"> <a href="index.php"><strong><?= htmlspecialchars($siteName) ?></strong></a>
            <a href="#keunggulan">Keunggulan</a>
            <a href="#katalog">Katalog</a>
            <a href="#alur">Cara Daftar</a>
            <a href="#kontak">Kontak</a>
        </nav>
    </header>
    <main>
        <section id="hero">
            <h1><?= htmlspecialchars($tagline) ?></h1>
            <p>Temukan kursus teknologi yang relevan untuk meningkatkan keterampilan Anda.</p> <a href="#katalog">Lihat Katalog Kursus</a>
        </section>
        <section id="keunggulan">
            <h2>Mengapa Memilih KursusKu?</h2>
            <article>
                <h3>Materi Terarah</h3>
                <p>Materi disusun bertahap dari dasar hingga praktik.</ p>
            </article>
            <article>
                <h3>Belajar dengan Proyek</h3>
                <p>Setiap tahap menghasilkan bagian nyata dari aplikasi.</p>
            </article>
            <article>
                <h3>Pendampingan Praktik</h3>
                <p>Mahasiswa belajar melalui demonstrasi, latihan, dan evaluasi.</p>
            </article>
        </section>
        <section id="katalog">
            <h2>Katalog Kursus</h2>
            <article>
                <h3>Web Dasar</h3>
                <p>Belajar struktur HTML dan dasar pengembangan web.</p>
                </ article>
                <article>
                    <h3>PHP Dasar</h3>
                    <p>Belajar variabel, operator, percabangan, looping, dan form.</p>
                </article>
                <article>
                    <h3>Laravel Dasar</h3>
                    <p>Mengenal framework, route, controller, view, dan database.</p>
                </article>
        </section>
        <section id="alur">
            <h2>Cara Mendaftar</h2>
            <ol>
                <li>Pilih kursus yang diminati.</li>
                <li>Isi form pendaftaran.</li>
                <li>Periksa kembali data.</li>
                <li>Kirim pendaftaran dan tunggu konfirmasi.</li>
            </ol>
        </section>
        <section id="media">
            <h2>Kenali Program Kami</h2> <img src="assets/img/lagikursus.png" alt="Mahasiswa sedang mengikuti kegiatan kursus komputer" width="640">
            <h3>Video Singkat</h3> <video controls width="640">
                <source src="assets/mp4/sandikagalih.mp4" type="video/mp4"> Browser Anda tidak mendukung video HTML5.
            </video>
            <p><a href="https://youtube.com/shorts/rzzS28Ec0Xw?si=WsToY2KUvaELA0Id" target="_blank" rel="noopener">Dokumentasi PHP</a></p>
        </section>
        <section id="kontak">
            <h2>Kontak</h2>
            <p>Email: habibimaray@gmail.com</p>
            <p>Alamat: Laboratorium Uin</p>
        </section>
    </main>
    <footer> <small>&copy; <?= $year ?> <?= htmlspecialchars($siteName) ?></small> </footer>
</body>

</html>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Pengujian - KursusKu</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: white;
            color: #111;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        .table-container {
            border: 2px solid #222;
            padding: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th,
        td {
            border: 2px solid #222;
            padding: 10px;
            font-size: 18px;
            vertical-align: top;
        }

        th {
            text-align: left;
            font-size: 20px;
        }

        .no {
            width: 4%;
            text-align: center;
        }

        .input {
            width: 57%;
        }

        .expected {
            width: 13%;
        }

        .actual {
            width: 13%;
        }

        .status {
            width: 13%;
        }

        .status-pass {
            color: #111;
            font-weight: normal;
        }
    </style>
</head>

<body>

    <h1>Hasil Pengujian Kalkulator KursusKu</h1>

    <div class="table-container">
        <table>
            <tr>
                <th class="no">No</th>
                <th class="input">Input</th>
                <th class="expected">Expected</th>
                <th class="actual">Actual</th>
                <th class="status">Status</th>
            </tr>

            <tr>
                <td class="no">1</td>
                <td>
                    Fee: 350.000, Peserta: 1, Diskon: 0%, Admin: 25.000
                </td>
                <td>375.000</td>
                <td>375.000</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">2</td>
                <td>
                    Fee: 350.000, Peserta: 1, Diskon: 10%, Admin: 25.000
                </td>
                <td>340.000</td>
                <td>340.000</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">3</td>
                <td>
                    Fee: 350.000, Peserta: 2, Diskon: 25%, Admin: 25.000
                </td>
                <td>550.000</td>
                <td>550.000</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">4</td>
                <td>
                    Fee: 0, Peserta: 1, Diskon: 10%, Admin: 0
                </td>
                <td>0</td>
                <td>0</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">5</td>
                <td>
                    Fee: 2.500.000, Peserta: 3, Diskon: 10%, Admin: 50.000
                </td>
                <td>6.800.000</td>
                <td>6.800.000</td>
                <td class="status-pass">PASS</td>
            </tr>

        </table>
    </div>

</body>

</html>

<?php
// Pastikan helpers.php berada di folder yang sama
require_once __DIR__ . '/helpers.php';

// Data simulasi status kursus: Penuh, Tersedia, dan batas kritis (hampir penuh / kosong)
$sampleCourses = [
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'quota' => 25,
        'registered' => 25, // Kasus: Penuh
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'quota' => 25,
        'registered' => 24, // Kasus: Hampir penuh (Tersedia)
    ],
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'quota' => 30,
        'registered' => 12, // Kasus: Tersedia
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'quota' => 20,
        'registered' => 0,  // Kasus: Kosong (Tersedia)
    ],
];
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Evidence Status Kursus - KursusKu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
            color: #1e293b;
        }

        .container {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #0f766e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        th,
        td {
            border: 1px solid #e2e8f0;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f8fafc;
        }

        /* Class badge status sesuai panduan modul */
        .badge-available,
        .badge-full {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .badge-available {
            background: #e7f8ef;
            color: #146c43;
        }

        .badge-full {
            background: #fdeaea;
            color: #a61b1b;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pemeriksaan Status Kursus & Sisa Kursi</h2>
        <p>Validasi pemanggilan fungsi <code>statusKursus()</code> dan <code>sisaKursi()</code> dari <code>helpers.php</code>:</p>

        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Kursus</th>
                    <th>Kuota</th>
                    <th>Terdaftar</th>
                    <th>Sisa Kursi</th>
                    <th>Status Visual</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sampleCourses as $item): ?>
                    <?php
                    // Memanggil fungsi logika bisnis dari helpers.php
                    $status = statusKursus($item['quota'], $item['registered']);
                    $sisa = sisaKursi($item['quota'], $item['registered']);

                    // Menentukan class CSS berdasarkan hasil return function
                    $badgeClass = ($status === 'Penuh') ? 'badge-full' : 'badge-available';
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($item['code']) ?></td>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= $item['quota'] ?></td>
                        <td><?= $item['registered'] ?></td>
                        <td><?= $sisa ?> kursi</td>
                        <td>
                            <span class="<?= $badgeClass ?>">
                                <?= $status ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <link rel="stylesheet" href="gaya.css">
</body>

</html>