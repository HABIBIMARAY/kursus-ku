<?php
function tampilkanPesan(string $message): void
{
    echo '<p class="output-message">' .
        htmlspecialchars($message, ENT_QUOTES, 'UTF-8') .
        '</p>';
}

$year = date('Y');
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Procedure Test - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #0f172a;
            --blue: #0284c7;
            --blue-dark: #0369a1;
            --cyan: #38bdf8;
            --background: #f4f7fb;
            --text: #24344d;
            --muted: #64748b;
            --white: #ffffff;
            --border: #e2e8f0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        .navbar {
            background: var(--navy);
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.12);
        }

        .brand {
            color: var(--white);
            font-size: 23px;
            font-weight: bold;
            text-decoration: none;
        }

        .brand span {
            color: var(--cyan);
        }

        .nav-label {
            color: #cbd5e1;
            font-size: 14px;
        }

        /* KONTEN */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 20px;
        }

        .utility-card {
            width: 100%;
            max-width: 720px;
            padding: 38px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.08);
        }

        .eyebrow {
            display: inline-block;
            padding: 8px 14px;
            margin-bottom: 18px;
            border-radius: 30px;
            background: #e0f2fe;
            color: var(--blue-dark);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        h1 {
            color: var(--navy);
            font-size: 30px;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .description {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        /* KARTU PENJELASAN */
        .info-card {
            padding: 22px;
            margin-bottom: 25px;
            background: linear-gradient(135deg, var(--navy), #17365b);
            border-radius: 15px;
            border-bottom: 4px solid var(--cyan);
            color: var(--white);
        }

        .info-card h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .info-card p {
            color: #cbd5e1;
            font-size: 14px;
            line-height: 1.8;
        }

        /* HASIL PESAN */
        .section-title {
            color: var(--navy);
            font-size: 19px;
            margin-bottom: 14px;
        }

        .output-message {
            padding: 18px;
            margin-bottom: 25px;
            background: #eff6ff;
            color: var(--blue-dark);
            border: 1px solid #bfdbfe;
            border-left: 5px solid var(--blue);
            border-radius: 10px;
            font-size: 15px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        /* CATATAN */
        .note-card {
            padding: 22px;
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 13px;
        }

        .note-card h3 {
            color: var(--navy);
            font-size: 16px;
            margin-bottom: 10px;
        }

        .note-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .keyword {
            color: var(--blue-dark);
            font-weight: bold;
        }

        /* TOMBOL */
        .button {
            display: inline-block;
            margin-top: 25px;
            padding: 13px 22px;
            background: var(--blue);
            color: var(--white);
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            border-radius: 10px;
            transition: 0.3s;
        }

        .button:hover {
            background: var(--blue-dark);
            transform: translateY(-2px);
        }

        /* FOOTER */
        .footer {
            padding: 20px;
            background: var(--navy);
            color: #cbd5e1;
            text-align: center;
            font-size: 13px;
            border-top: 3px solid var(--cyan);
        }

        .footer span {
            color: var(--cyan);
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .navbar {
                padding: 16px 20px;
            }

            .utility-card {
                padding: 25px 18px;
            }

            h1 {
                font-size: 25px;
            }

            .info-card,
            .note-card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <a href="index.php" class="brand">
            Kursus<span>Ku</span>
        </a>

        <span class="nav-label">Pengujian Procedure PHP</span>
    </header>

    <main class="main-content">
        <section class="utility-card">

            <span class="eyebrow">PHP FUNCTION TEST</span>

            <h1>Function vs Procedure-style</h1>

            <p class="description">
                Halaman ini memperlihatkan function PHP yang digunakan
                untuk menampilkan pesan secara langsung tanpa
                mengembalikan nilai kepada pemanggil.
            </p>

            <div class="info-card">
                <h2>Procedure-style Function</h2>
                <p>
                    Function <strong>tampilkanPesan()</strong> menerima
                    parameter berupa string dan mencetaknya menggunakan
                    perintah <strong>echo</strong>. Tipe pengembalian
                    <strong>void</strong> menunjukkan bahwa function ini
                    tidak mengembalikan nilai.
                </p>
            </div>

            <h2 class="section-title">Hasil Eksekusi</h2>

            <?php
            tampilkanPesan(
                'Pesan ini dicetak langsung oleh function bertipe void.'
            );
            ?>

            <div class="note-card">
                <h3>Catatan Pembelajaran</h3>
                <p>
                    Untuk perhitungan utama KursusKu tetap diprioritaskan
                    function yang mengembalikan nilai, sehingga hasil
                    perhitungannya dapat disimpan, ditampilkan, atau
                    digunakan kembali dalam proses lainnya.
                </p>
            </div>

            <a href="index.php" class="button">
                &larr; Kembali ke Beranda
            </a>

        </section>
    </main>

    <footer class="footer">
        &copy; <?= $year ?> <span>KursusKu</span>.
        Belajar Teknologi, Bangun Masa Depan.
    </footer>

</body>

</html>