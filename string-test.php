<?php
$rawName = ' Laravel Fundamental ';
$cleanName = trim($rawName);
$upperName = strtoupper($cleanName);
$lowerName = strtolower($cleanName);
$length = strlen($cleanName);
$short = substr($cleanName, 0, 7);
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>String Function Test - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            padding: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #24344d;
            background: linear-gradient(135deg, #f4f7fb, #e0f2fe);
        }

        .utility-card {
            position: relative;
            width: 100%;
            max-width: 650px;
            padding: 35px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #dbe7f3;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.10);
        }

        .utility-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #0369a1, #38bdf8);
        }

        .brand {
            margin-bottom: 25px;
            color: #0284c7;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        h1 {
            margin-bottom: 12px;
            color: #0f172a;
            font-size: 28px;
            font-weight: 750;
        }

        .description {
            margin-bottom: 25px;
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        .result-list {
            display: flex;
            flex-direction: column;
            gap: 13px;
            margin-bottom: 28px;
            list-style: none;
        }

        .result-list li {
            padding: 16px 18px;
            background: #f8fbff;
            border: 1px solid #e0eaf4;
            border-left: 4px solid #0284c7;
            border-radius: 10px;
            font-size: 15px;
            line-height: 1.6;
            overflow-wrap: anywhere;
            transition: 0.2s ease;
        }

        .result-list li:hover {
            background: #eef8ff;
            border-left-color: #38bdf8;
            transform: translateX(3px);
        }

        .function-name {
            display: inline-block;
            min-width: 115px;
            color: #0369a1;
            font-weight: 700;
        }

        .back-button {
            display: inline-block;
            padding: 12px 23px;
            color: #ffffff;
            background: #0369a1;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s ease;
        }

        .back-button:hover {
            background: #0f172a;
            transform: translateY(-2px);
        }

        .footer {
            margin-top: 25px;
            padding-top: 16px;
            border-top: 1px solid #e2e8f0;
            color: #94a3b8;
            font-size: 12px;
            text-align: center;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .utility-card {
                padding: 27px 20px;
            }

            h1 {
                font-size: 23px;
            }

            .result-list li {
                padding: 13px;
                font-size: 14px;
            }

            .function-name {
                min-width: 105px;
            }
        }
    </style>
</head>

<body class="utility-page">
    <main class="utility-card">
        <div class="brand">KURSUSKU</div>

        <h1>String Function Test</h1>

        <p class="description">
            Hasil pengujian fungsi string PHP untuk mengolah
            teks nama kursus Laravel Fundamental.
        </p>

        <ul class="result-list">
            <li>
                <span class="function-name">trim():</span>
                <?= htmlspecialchars($cleanName, ENT_QUOTES, 'UTF-8') ?>
            </li>

            <li>
                <span class="function-name">strtoupper():</span>
                <?= htmlspecialchars($upperName, ENT_QUOTES, 'UTF-8') ?>
            </li>

            <li>
                <span class="function-name">strtolower():</span>
                <?= htmlspecialchars($lowerName, ENT_QUOTES, 'UTF-8') ?>
            </li>

            <li>
                <span class="function-name">strlen():</span>
                <?= $length ?>
            </li>

            <li>
                <span class="function-name">substr():</span>
                <?= htmlspecialchars($short, ENT_QUOTES, 'UTF-8') ?>
            </li>
        </ul>

        <a href="index.php" class="back-button">
            &larr; Kembali ke Beranda
        </a>

        <div class="footer">
            &copy; <?= date('Y') ?> KursusKu. Belajar Teknologi, Bangun Masa Depan.
        </div>
    </main>
</body>

</html>