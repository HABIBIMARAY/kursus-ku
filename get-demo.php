<?php

declare(strict_types=1);

$name = trim($_GET['name'] ?? '');
$course = trim($_GET['course'] ?? '');
$participantType = trim($_GET['participant_type'] ?? '');
$query = $_SERVER['QUERY_STRING'] ?? '';

function escapeGetDemo(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$year = date('Y');

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Eksperimen GET - KursusKu</title>

    <style>
        /* =====================================================
           KURSUSKU - GET DEMO
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #0f172a;
            --navy-soft: #17233d;
            --blue: #0284c7;
            --blue-dark: #0369a1;
            --cyan: #38bdf8;
            --cyan-soft: #e0f2fe;
            --background: #f4f7fb;
            --white: #ffffff;
            --text: #24344d;
            --text-soft: #475569;
            --muted: #64748b;
            --border: #d7e2ea;
            --border-soft: #e7eef4;
            --success: #15803d;
            --success-bg: #ecfdf5;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg,
                    #f8fbff 0%,
                    #eef8ff 50%,
                    #f4f7fb 100%);
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: min(1100px, calc(100% - 40px));
            margin: 0 auto;
        }

        /* NAVBAR */

        .navbar {
            background: var(--navy);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.12);
        }

        .nav-inner {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .brand {
            color: var(--white);
            font-size: 25px;
            font-weight: 800;
        }

        .brand span {
            color: var(--cyan);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .nav-menu a {
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 600;
            transition: 0.25s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--white);
        }

        /* PAGE HEADER */

        .page-header {
            text-align: center;
            padding: 48px 10px 28px;
        }

        .eyebrow {
            display: inline-block;
            background: var(--cyan-soft);
            color: var(--blue-dark);
            border: 1px solid #bae6fd;
            padding: 7px 15px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.7px;
            margin-bottom: 13px;
        }

        .page-header h1 {
            color: var(--navy-soft);
            font-size: 34px;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 14px;
            max-width: 650px;
            margin: 0 auto;
        }

        /* MAIN CARD */

        .demo-card {
            width: min(760px, 100%);
            margin: 0 auto 55px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid var(--border-soft);
            border-radius: 20px;
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.08);
            position: relative;
            overflow: hidden;
        }

        .demo-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg,
                    var(--blue-dark),
                    var(--blue),
                    var(--cyan));
        }

        .section-heading {
            margin-bottom: 18px;
        }

        .section-heading h2 {
            color: var(--navy-soft);
            font-size: 21px;
            margin-bottom: 5px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 13px;
        }

        /* GET INFORMATION */

        .formula-box {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 18px;
            margin-bottom: 26px;
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 13px;
        }

        .formula-box strong {
            color: var(--blue-dark);
            font-size: 13px;
        }

        .formula-box code {
            display: block;
            padding: 12px;
            background: var(--navy);
            color: var(--cyan);
            border-radius: 8px;
            font-family: Consolas, "Courier New", monospace;
            font-size: 13px;
            overflow-wrap: anywhere;
            white-space: pre-wrap;
        }

        .result-item {
            color: var(--text-soft);
            font-size: 13px;
        }

        .result-item strong {
            color: var(--navy-soft);
        }

        /* FORM */

        .stack-form {
            display: flex;
            flex-direction: column;
            gap: 19px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
            border: none;
        }

        .field>label,
        .field legend {
            color: var(--navy-soft);
            font-size: 13px;
            font-weight: 750;
        }

        .field input[type="text"],
        .field select {
            width: 100%;
            min-height: 46px;
            padding: 11px 13px;
            background: var(--white);
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 10px;
            outline: none;
            font-family: inherit;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .field input[type="text"]:focus,
        .field select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.12);
        }

        .radio-options {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 3px;
        }

        .radio-option {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 11px 14px;
            border: 1px solid var(--border);
            background: #f8fcff;
            border-radius: 10px;
            color: var(--text-soft);
            font-size: 13px;
            cursor: pointer;
        }

        .radio-option input {
            accent-color: var(--blue);
        }

        /* BUTTONS */

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 46px;
            padding: 11px 20px;
            border: 1px solid var(--blue);
            border-radius: 10px;
            background: linear-gradient(135deg,
                    var(--blue-dark),
                    var(--blue));
            color: var(--white);
            font-family: inherit;
            font-size: 13px;
            font-weight: 750;
            cursor: pointer;
            transition: 0.25s;
        }

        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.12);
        }

        .text-link {
            display: inline-block;
            margin-top: 17px;
            color: var(--blue-dark);
            font-size: 13px;
            font-weight: 750;
        }

        .text-link:hover {
            color: var(--blue);
            text-decoration: underline;
        }

        .table-note {
            margin-top: 22px;
            padding: 14px 16px;
            background: #f8fcff;
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--muted);
            font-size: 12px;
        }

        .table-note code {
            color: var(--blue-dark);
            font-weight: 700;
        }

        /* FOOTER */

        .footer {
            background: var(--navy);
            color: #94a3b8;
            text-align: center;
            padding: 24px 0;
        }

        .footer::before {
            content: "";
            display: block;
            width: 50px;
            height: 2px;
            background: var(--cyan);
            margin: 0 auto 12px;
            border-radius: 10px;
        }

        .footer p {
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 750px) {
            .container {
                width: calc(100% - 24px);
            }

            .nav-inner {
                flex-direction: column;
                padding: 16px 0;
                gap: 12px;
            }

            .nav-menu {
                justify-content: center;
                flex-wrap: wrap;
                gap: 12px 18px;
            }

            .page-header {
                padding: 38px 5px 25px;
            }

            .page-header h1 {
                font-size: 28px;
            }

            .demo-card {
                padding: 19px;
                border-radius: 16px;
            }

            .radio-options {
                flex-direction: column;
                gap: 9px;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

    <header class="navbar">
        <div class="container nav-inner">

            <a href="index.php" class="brand">
                Kursus<span>Ku</span>
            </a>

            <nav class="nav-menu">
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="registration.php">Daftar</a>
                <a href="fee-calculator.php">Fee Calculator</a>
                <a href="get-demo.php" class="active">GET Demo</a>
            </nav>

        </div>
    </header>

    <!-- MAIN -->

    <main class="container">

        <section class="page-header">
            <span class="eyebrow">MILESTONE 5 · GET VS POST</span>

            <h1>Eksperimen GET</h1>

            <p>
                Pelajari bagaimana data formulir dikirim melalui URL
                menggunakan metode GET pada PHP.
            </p>
        </section>

        <section class="demo-card">

            <?php if ($query !== ''): ?>

                <div class="section-heading">
                    <h2>Hasil Parameter GET</h2>
                    <p>
                        Berikut adalah parameter yang diterima oleh server
                        dari query string URL.
                    </p>
                </div>

                <div class="formula-box">

                    <strong>Query string yang diterima:</strong>

                    <code>?<?= escapeGetDemo($query); ?></code>

                    <div class="result-item">
                        <strong>Nama:</strong>
                        <?= escapeGetDemo($name); ?>
                    </div>

                    <div class="result-item">
                        <strong>Kursus:</strong>
                        <?= escapeGetDemo($course); ?>
                    </div>

                    <div class="result-item">
                        <strong>Peserta:</strong>
                        <?= escapeGetDemo($participantType); ?>
                    </div>

                </div>

            <?php endif; ?>

            <div class="section-heading">
                <h2>Formulir Eksperimen</h2>
                <p>
                    Isi data berikut lalu kirim untuk melihat hasilnya
                    pada query string URL.
                </p>
            </div>

            <form method="GET" action="get-demo.php" class="stack-form">

                <div class="field">
                    <label for="get-name">Nama</label>

                    <input
                        id="get-name"
                        name="name"
                        type="text"
                        placeholder="Masukkan nama kamu"
                        required
                        value="<?= escapeGetDemo($name); ?>">
                </div>

                <div class="field">
                    <label for="get-course">Kursus</label>

                    <select id="get-course" name="course" required>

                        <option
                            value="PHP Dasar"
                            <?= $course === 'PHP Dasar' ? 'selected' : ''; ?>>
                            PHP Dasar
                        </option>

                        <option
                            value="Web Dasar"
                            <?= $course === 'Web Dasar' ? 'selected' : ''; ?>>
                            Web Dasar
                        </option>

                        <option
                            value="Laravel Dasar"
                            <?= $course === 'Laravel Dasar' ? 'selected' : ''; ?>>
                            Laravel Dasar
                        </option>

                    </select>
                </div>

                <fieldset class="field">

                    <legend>Jenis Peserta</legend>

                    <div class="radio-options">

                        <label class="radio-option">
                            <input
                                type="radio"
                                name="participant_type"
                                value="mahasiswa"
                                <?= ($participantType === '' || $participantType === 'mahasiswa') ? 'checked' : ''; ?>>
                            Mahasiswa
                        </label>

                        <label class="radio-option">
                            <input
                                type="radio"
                                name="participant_type"
                                value="umum"
                                <?= $participantType === 'umum' ? 'checked' : ''; ?>>
                            Umum
                        </label>

                    </div>

                </fieldset>

                <button class="button" type="submit">
                    Kirim dengan GET
                </button>

            </form>

            <div class="table-note">
                <strong>Catatan:</strong>
                Metode GET menampilkan parameter pada URL browser.
                Formulir pendaftaran utama KursusKu tetap menggunakan
                metode POST pada <code>registration.php</code>.
            </div>

            <a class="text-link" href="registration.php">
                Kembali ke Form POST →
            </a>

        </section>

    </main>

    <!-- FOOTER -->

    <footer class="footer">
        <div class="container">
            <p>
                &copy; <?= escapeGetDemo($year); ?>
                KursusKu. Belajar Teknologi, Bangun Masa Depan.
            </p>
        </div>
    </footer>

</body>

</html>