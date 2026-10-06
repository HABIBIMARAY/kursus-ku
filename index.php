<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| KURSUSKU - HALAMAN UTAMA
|--------------------------------------------------------------------------
| Halaman ini berisi:
| 1. Navbar
| 2. Hero
| 3. Keunggulan
| 4. Katalog
| 5. Cara daftar
| 6. Media
| 7. Status kursus
| 8. Kontak
| 9. Footer
|--------------------------------------------------------------------------
*/

$siteName = 'KursusKu';

$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';

$year = date('Y');


/*
|--------------------------------------------------------------------------
| DATA KURSUS
|--------------------------------------------------------------------------
*/

$courses = [

    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'description' =>
        'Belajar struktur HTML dan dasar pengembangan web.',
        'fee' => 240000,
        'quota' => 30,
        'registered' => 12,
    ],

    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'description' =>
        'Belajar variabel, operator, percabangan, looping, dan form.',
        'fee' => 340000,
        'quota' => 30,
        'registered' => 18,
    ],

    [
        'code' => 'LAR-01',
        'name' => 'Laravel Dasar',
        'description' =>
        'Mengenal framework, route, controller, view, dan database.',
        'fee' => 500000,
        'quota' => 25,
        'registered' => 20,
    ],

];


/*
|--------------------------------------------------------------------------
| DATA STATUS KURSUS
|--------------------------------------------------------------------------
*/

$sampleCourses = [

    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'quota' => 25,
        'registered' => 25,
    ],

    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'quota' => 25,
        'registered' => 24,
    ],

    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'quota' => 30,
        'registered' => 12,
    ],

    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'quota' => 20,
        'registered' => 0,
    ],

];


/*
|--------------------------------------------------------------------------
| FUNGSI BANTU
|--------------------------------------------------------------------------
*/

function rupiahIndex(float|int $value): string
{
    return 'Rp ' . number_format(
        $value,
        0,
        ',',
        '.'
    );
}


function statusKursusIndex(
    int $quota,
    int $registered
): string {

    if ($registered >= $quota) {
        return 'Penuh';
    }

    return 'Tersedia';
}


function sisaKursiIndex(
    int $quota,
    int $registered
): int {

    return max(
        0,
        $quota - $registered
    );
}


function eIndex(mixed $value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

?>

<!doctype html>

<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>
        <?= eIndex($siteName) ?>
    </title>

    <link
        rel="stylesheet"
        href="assets/css/style.css">

</head>


<body>


    <!-- =========================================================
     NAVBAR
========================================================= -->

    <header class="site-header">

        <div class="container nav-wrap">

            <a
                href="index.php"
                class="brand"
                style="
        color: #ffffff;
        font-size: 25px;
        font-weight: 800;
        text-decoration: none;
    ">
                Kursus<span style="color: #38bdf8;">Ku</span>
            </a>

            <nav aria-label="Navigasi utama">

                <a href="index.php">
                    Beranda
                </a>

                <a href="#keunggulan">
                    Keunggulan
                </a>

                <a href="#katalog">
                    Katalog
                </a>

                <a href="#alur">
                    Cara Daftar
                </a>

                <a href="#kontak">
                    Kontak
                </a>

                <a href="registration.php">
                    Daftar
                </a>

            </nav>

        </div>

    </header>



    <main>


        <!-- =========================================================
     HERO
========================================================= -->

        <section
            id="hero"
            class="hero-section">

            <div class="container hero-content">

                <div class="hero-text">

                    <p class="eyebrow">
                        KURSUSKU
                    </p>
                    <h1 class="judul-kursus">
                        Kursus<span>Ku</span>
                    </h1>

                    <h1>
                        <?= eIndex($tagline) ?>
                    </h1>

                    <p class="hero-description">
                        Temukan kursus teknologi yang relevan
                        untuk meningkatkan keterampilan Anda.
                    </p>


                    <div class="hero-buttons">

                        <a
                            href="#katalog"
                            class="btn-primary">
                            Lihat Katalog Kursus
                        </a>

                        <a
                            href="registration.php"
                            class="btn-secondary">
                            Daftar Sekarang
                        </a>

                    </div>

                </div>


                <div class="hero-info-card">

                    <div class="hero-info-item">

                        <strong>
                            3+
                        </strong>

                        <span>
                            Pilihan Kursus
                        </span>

                    </div>


                    <div class="hero-info-item">

                        <strong>
                            Praktik
                        </strong>

                        <span>
                            Berbasis latihan
                        </span>

                    </div>


                    <div class="hero-info-item">

                        <strong>
                            Online
                        </strong>

                        <span>
                            &amp; Tatap Muka
                        </span>

                    </div>

                </div>

            </div>

        </section>



        <!-- =========================================================
     KEUNGGULAN
========================================================= -->

        <section
            id="keunggulan"
            class="section">

            <div class="container">

                <div class="section-heading">

                    <p class="eyebrow">
                        Keunggulan
                    </p>

                    <h2>
                        Mengapa Memilih KursusKu?
                    </h2>

                    <p>
                        Belajar teknologi dengan materi yang
                        terarah dan mudah dipraktikkan.
                    </p>

                </div>


                <div class="feature-grid">


                    <article class="feature-card">

                        <div class="feature-number">
                            01
                        </div>

                        <h3>
                            Materi Terarah
                        </h3>

                        <p>
                            Materi disusun bertahap dari dasar
                            hingga praktik.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-number">
                            02
                        </div>

                        <h3>
                            Belajar dengan Proyek
                        </h3>

                        <p>
                            Setiap tahap menghasilkan bagian nyata
                            dari aplikasi.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-number">
                            03
                        </div>

                        <h3>
                            Pendampingan Praktik
                        </h3>

                        <p>
                            Belajar melalui demonstrasi,
                            latihan, dan evaluasi.
                        </p>

                    </article>


                </div>

            </div>

        </section>



        <!-- =========================================================
     KATALOG
========================================================= -->

        <section
            id="katalog"
            class="section section-light">

            <div class="container">

                <div class="section-heading">

                    <p class="eyebrow">
                        Pilihan Kursus
                    </p>

                    <h2>
                        Katalog Kursus
                    </h2>

                    <p>
                        Pilih kursus yang sesuai dengan kebutuhan
                        belajar Anda.
                    </p>

                </div>


                <div class="course-grid">


                    <?php foreach ($courses as $course): ?>

                        <article class="course-card">

                            <div class="course-code">

                                <?= eIndex($course['code']) ?>

                            </div>


                            <h3>

                                <?= eIndex($course['name']) ?>

                            </h3>


                            <p>

                                <?= eIndex($course['description']) ?>

                            </p>


                            <div class="course-price">

                                <?= rupiahIndex($course['fee']) ?>

                                <span>
                                    / paket
                                </span>

                            </div>


                            <div class="course-meta">

                                <span>
                                    Kuota:
                                    <?= eIndex($course['quota']) ?>
                                </span>

                                <span>
                                    Terdaftar:
                                    <?= eIndex($course['registered']) ?>
                                </span>

                            </div>


                            <a
                                href="registration.php?course=<?= urlencode($course['name']) ?>"
                                class="course-button">

                                Daftar Kursus

                            </a>

                        </article>

                    <?php endforeach; ?>


                </div>

            </div>

        </section>



        <!-- =========================================================
     CARA DAFTAR
========================================================= -->

        <section
            id="alur"
            class="section">

            <div class="container">

                <div class="section-heading">

                    <p class="eyebrow">
                        Alur Pendaftaran
                    </p>

                    <h2>
                        Cara Mendaftar
                    </h2>

                </div>


                <div class="steps-grid">


                    <article class="step-card">

                        <div class="step-number">
                            1
                        </div>

                        <h3>
                            Pilih Kursus
                        </h3>

                        <p>
                            Pilih kursus yang diminati
                            dari katalog KursusKu.
                        </p>

                    </article>


                    <article class="step-card">

                        <div class="step-number">
                            2
                        </div>

                        <h3>
                            Isi Form Pendaftaran
                        </h3>

                        <p>
                            Isi data diri dan pilihan kursus
                            dengan benar.
                        </p>

                    </article>


                    <article class="step-card">

                        <div class="step-number">
                            3
                        </div>

                        <h3>
                            Periksa Data
                        </h3>

                        <p>
                            Pastikan data yang dimasukkan
                            sudah sesuai.
                        </p>

                    </article>


                    <article class="step-card">

                        <div class="step-number">
                            4
                        </div>

                        <h3>
                            Kirim Pendaftaran
                        </h3>

                        <p>
                            Kirim formulir dan tunggu
                            proses pendaftaran.
                        </p>

                    </article>


                </div>

            </div>

        </section>



        <!-- =========================================================
     MEDIA
========================================================= -->

        <section
            id="media"
            class="section section-light">

            <div class="container">

                <div class="section-heading">

                    <p class="eyebrow">
                        Media Pembelajaran
                    </p>

                    <h2>
                        Kenali Program Kami
                    </h2>

                    <p>
                        Gambaran kegiatan belajar dan dokumentasi
                        program KursusKu.
                    </p>

                </div>


                <div class="media-grid">


                    <div class="media-card">

                        <h3>
                            Dokumentasi Kegiatan
                        </h3>

                        <img
                            src="assets/img/lagikursus.png"
                            alt="Mahasiswa sedang mengikuti kegiatan kursus komputer"
                            class="media-image">

                    </div>


                    <div class="media-card">

                        <h3>
                            Video Singkat
                        </h3>

                        <video
                            controls
                            class="media-video">

                            <source
                                src="assets/mp4/sandikagalih.mp4"
                                type="video/mp4">

                            Browser Anda tidak mendukung
                            video HTML5.

                        </video>


                        <p class="media-link">

                            <a
                                href="https://youtube.com/shorts/rzzS28Ec0Xw?si=WsToY2KUvaELA0Id"
                                target="_blank"
                                rel="noopener">

                                Dokumentasi PHP

                            </a>

                        </p>

                    </div>


                </div>

            </div>

        </section>



        <!-- =========================================================
     STATUS KURSUS
========================================================= -->

        <section
            id="status"
            class="section">

            <div class="container">

                <div class="section-heading">

                    <p class="eyebrow">
                        Informasi Kursus
                    </p>

                    <h2>
                        Status Kursus &amp; Sisa Kursi
                    </h2>

                    <p>
                        Informasi ketersediaan kursi pada kursus.
                    </p>

                </div>


                <div class="status-grid">


                    <?php foreach ($sampleCourses as $item): ?>

                        <?php

                        $status = statusKursusIndex(
                            (int) $item['quota'],
                            (int) $item['registered']
                        );

                        $sisa = sisaKursiIndex(
                            (int) $item['quota'],
                            (int) $item['registered']
                        );

                        $badgeClass =
                            $status === 'Penuh'
                            ? 'badge-full'
                            : 'badge-available';

                        ?>


                        <article class="status-card">

                            <div>

                                <span class="status-code">
                                    <?= eIndex($item['code']) ?>
                                </span>

                                <h3>
                                    <?= eIndex($item['name']) ?>
                                </h3>

                            </div>


                            <span
                                class="<?= $badgeClass ?>">

                                <?= eIndex($status) ?>

                            </span>


                            <div class="status-detail">

                                <span>
                                    Kuota:
                                    <?= eIndex($item['quota']) ?>
                                </span>

                                <span>
                                    Terdaftar:
                                    <?= eIndex($item['registered']) ?>
                                </span>

                                <span>
                                    Sisa:
                                    <?= eIndex($sisa) ?>
                                    kursi
                                </span>

                            </div>

                        </article>

                    <?php endforeach; ?>


                </div>

            </div>

        </section>



        <!-- =========================================================
     KONTAK
========================================================= -->

        <section
            id="kontak"
            class="section section-light">

            <div class="container">

                <div class="contact-card">

                    <div>

                        <p class="eyebrow">
                            Hubungi Kami
                        </p>

                        <h2>
                            Kontak KursusKu
                        </h2>

                        <p>
                            Silakan hubungi kami untuk informasi
                            mengenai program kursus.
                        </p>

                    </div>


                    <div class="contact-info">

                        <p>
                            <strong>Email</strong><br>
                            habibimaray@gmail.com
                        </p>

                        <p>
                            <strong>Alamat</strong><br>
                            Laboratorium Uin
                        </p>

                    </div>

                </div>

            </div>

        </section>


    </main>



    <!-- =========================================================
     FOOTER
========================================================= -->

    <footer>

        <div class="container footer-content">

            <div>

                <strong>
                    <?= eIndex($siteName) ?>
                </strong>

                <p>
                    Belajar Teknologi, Bangun Masa Depan.
                </p>

            </div>


            <div>

                <small>
                    &copy;
                    <?= eIndex($year) ?>
                    <?= eIndex($siteName) ?>
                </small>

            </div>

        </div>

    </footer>


</body>

</html>