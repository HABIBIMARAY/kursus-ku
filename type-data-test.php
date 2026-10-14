<?php
$courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 2;
$discountPercent = 10;
$adminFee = 25000;
$isActive = true;
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Type Data Test - KursusKu</title>

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
            max-width: 750px;
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
            margin-bottom: 22px;
            color: #0284c7;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        h1 {
            margin-bottom: 10px;
            color: #0f172a;
            font-size: 28px;
        }

        .description {
            margin-bottom: 25px;
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        .data-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 25px;
        }

        .data-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 16px 18px;
            background: #f8fbff;
            border: 1px solid #e0eaf4;
            border-left: 4px solid #0284c7;
            border-radius: 10px;
        }

        .data-info {
            min-width: 0;
        }

        .variable-name {
            display: block;
            margin-bottom: 5px;
            color: #0369a1;
            font-size: 15px;
            font-weight: 700;
        }

        .variable-value {
            color: #0f172a;
            font-size: 14px;
            overflow-wrap: anywhere;
        }

        .type-badge {
            flex-shrink: 0;
            padding: 6px 10px;
            color: #0369a1;
            background: #e0f2fe;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
        }

        .output-title {
            margin: 25px 0 12px;
            color: #0f172a;
            font-size: 17px;
        }

        pre {
            padding: 20px;
            overflow-x: auto;
            color: #bae6fd;
            background: #0f172a;
            border: 1px solid #263750;
            border-radius: 12px;
            font-family: Consolas, "Courier New", monospace;
            font-size: 13px;
            line-height: 1.8;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .back-button {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 22px;
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
                padding: 27px 18px;
            }

            h1 {
                font-size: 23px;
            }

            .data-item {
                align-items: flex-start;
                padding: 14px;
            }

            .type-badge {
                font-size: 11px;
            }
        }
    </style>
</head>

<body class="utility-page">
    <main class="utility-card">
        <div class="brand">KURSUSKU</div>

        <h1>Variabel dan Tipe Data</h1>

        <p class="description">
            Halaman ini menampilkan variabel PHP yang digunakan
            dalam kalkulator biaya kursus beserta tipe datanya.
        </p>

        <div class="data-list">
            <div class="data-item">
                <div class="data-info">
                    <span class="variable-name">$courseName</span>
                    <span class="variable-value">
                        <?= htmlspecialchars($courseName, ENT_QUOTES, 'UTF-8') ?>
                    </span>
                </div>
                <span class="type-badge">String</span>
            </div>

            <div class="data-item">
                <div class="data-info">
                    <span class="variable-name">$fee</span>
                    <span class="variable-value">
                        Rp <?= number_format($fee, 0, ',', '.') ?>
                    </span>
                </div>
                <span class="type-badge">Integer</span>
            </div>

            <div class="data-item">
                <div class="data-info">
                    <span class="variable-name">$participantCount</span>
                    <span class="variable-value"><?= $participantCount ?></span>
                </div>
                <span class="type-badge">Integer</span>
            </div>

            <div class="data-item">
                <div class="data-info">
                    <span class="variable-name">$discountPercent</span>
                    <span class="variable-value"><?= $discountPercent ?>%</span>
                </div>
                <span class="type-badge">Integer</span>
            </div>

            <div class="data-item">
                <div class="data-info">
                    <span class="variable-name">$adminFee</span>
                    <span class="variable-value">
                        Rp <?= number_format($adminFee, 0, ',', '.') ?>
                    </span>
                </div>
                <span class="type-badge">Integer</span>
            </div>

            <div class="data-item">
                <div class="data-info">
                    <span class="variable-name">$isActive</span>
                    <span class="variable-value">
                        <?= $isActive ? 'true' : 'false' ?>
                    </span>
                </div>
                <span class="type-badge">Boolean</span>
            </div>
        </div>

        <h2 class="output-title">Output var_dump()</h2>

        <pre><?php
                var_dump(
                    $courseName,
                    $fee,
                    $participantCount,
                    $discountPercent,
                    $adminFee,
                    $isActive
                );
                ?></pre>

        <a href="fee-calculator.php" class="back-button">
            &larr; Kembali ke Kalkulator
        </a>

        <div class="footer">
            &copy; <?= date('Y') ?> KursusKu. Belajar Teknologi, Bangun Masa Depan.
        </div>
    </main>
</body>

</html>