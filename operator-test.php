<?php
$fee = 350000;
$participants = 2;
$subtotal = $fee * $participants;
$comparisonPositive = $fee > 0;
$comparisonStrict = $fee === 350000;
$message = 'Biaya: Rp ' . $fee;

function escapeOperator(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

$year = date('Y');
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operator Test - KursusKu</title>

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
            align-items: center;
            justify-content: space-between;
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

        /* KONTEN UTAMA */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
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
            font-size: 32px;
            margin-bottom: 12px;
        }

        .description {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        /* RINGKASAN */
        .summary-card {
            padding: 24px;
            margin-bottom: 25px;
            background: linear-gradient(135deg, var(--navy), #17365b);
            color: var(--white);
            border-radius: 15px;
            border-bottom: 4px solid var(--cyan);
        }

        .summary-label {
            color: #cbd5e1;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .summary-value {
            font-size: 32px;
            font-weight: bold;
        }

        .summary-note {
            color: #bae6fd;
            font-size: 13px;
            margin-top: 10px;
        }

        /* HASIL OPERATOR */
        .section-title {
            color: var(--navy);
            font-size: 19px;
            margin-bottom: 15px;
        }

        .result-list {
            list-style: none;
            display: grid;
            gap: 14px;
        }

        .result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 18px;
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        .result-info {
            min-width: 0;
        }

        .result-name {
            display: block;
            color: var(--navy);
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .result-description {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .result-value {
            color: var(--blue-dark);
            font-size: 15px;
            font-weight: bold;
            text-align: right;
            overflow-wrap: anywhere;
        }

        .status {
            padding: 7px 12px;
            border-radius: 20px;
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .message-box {
            padding: 20px;
            margin-top: 22px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-left: 5px solid var(--blue);
            border-radius: 12px;
        }

        .message-label {
            display: block;
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 8px;
        }

        .message-value {
            color: var(--blue-dark);
            font-size: 17px;
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
                font-size: 27px;
            }

            .summary-value {
                font-size: 27px;
            }

            .result-item {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

            .result-value {
                text-align: left;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <a href="index.php" class="brand">
            Kursus<span>Ku</span>
        </a>

        <span class="nav-label">Pengujian Operator PHP</span>
    </header>

    <main class="main-content">
        <section class="utility-card">

            <span class="eyebrow">PHP OPERATOR TEST</span>

            <h1>Operator PHP</h1>

            <p class="description">
                Halaman ini menampilkan contoh penggunaan operator
                aritmatika, perbandingan, strict comparison, dan
                penggabungan string dalam PHP.
            </p>

            <div class="summary-card">
                <div class="summary-label">Total Biaya Peserta</div>

                <div class="summary-value">
                    <?= escapeOperator('Rp ' . number_format($subtotal, 0, ',', '.')) ?>
                </div>

                <div class="summary-note">
                    <?= escapeOperator($participants) ?> peserta
                    &times; Rp <?= escapeOperator(number_format($fee, 0, ',', '.')) ?>
                    per peserta
                </div>
            </div>

            <h2 class="section-title">Hasil Pengujian</h2>

            <ul class="result-list">

                <li class="result-item">
                    <div class="result-info">
                        <span class="result-name">
                            1. Operator Perkalian (*)
                        </span>
                        <span class="result-description">
                            Mengalikan biaya kursus dengan jumlah peserta.
                        </span>
                    </div>

                    <span class="result-value">
                        <?= escapeOperator('Rp ' . number_format($subtotal, 0, ',', '.')) ?>
                    </span>
                </li>

                <li class="result-item">
                    <div class="result-info">
                        <span class="result-name">
                            2. Comparison (&gt; 0)
                        </span>
                        <span class="result-description">
                            Memeriksa apakah biaya lebih besar dari nol.
                        </span>
                    </div>

                    <span class="status">
                        <?= $comparisonPositive ? 'TRUE' : 'FALSE' ?>
                    </span>
                </li>

                <li class="result-item">
                    <div class="result-info">
                        <span class="result-name">
                            3. Strict Comparison (===)
                        </span>
                        <span class="result-description">
                            Membandingkan nilai dan tipe data sekaligus.
                        </span>
                    </div>

                    <span class="status">
                        <?= $comparisonStrict ? 'TRUE' : 'FALSE' ?>
                    </span>
                </li>

            </ul>

            <div class="message-box">
                <span class="message-label">
                    4. String Concatenation (.)
                </span>

                <span class="message-value">
                    <?= escapeOperator($message) ?>
                </span>
            </div>

            <a href="fee-calculator.php" class="button">
                &larr; Kembali ke Kalkulator
            </a>

        </section>
    </main>

    <footer class="footer">
        &copy; <?= $year ?> <span>KursusKu</span>.
        Belajar Teknologi, Bangun Masa Depan.
    </footer>

</body>

</html>