<?php

declare(strict_types=1);

$READ = 1;
$WRITE = 2;
$DELETE = 4;

$permission = $READ | $WRITE;

$canRead = ($permission & $READ) === $READ;
$canWrite = ($permission & $WRITE) === $WRITE;
$canDelete = ($permission & $DELETE) === $DELETE;

$year = date('Y');

function escapeBitwise(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$permissions = [
    [
        'name' => 'READ',
        'description' => 'Hak untuk membaca data.',
        'value' => $READ,
        'granted' => $canRead,
    ],
    [
        'name' => 'WRITE',
        'description' => 'Hak untuk menulis atau mengubah data.',
        'value' => $WRITE,
        'granted' => $canWrite,
    ],
    [
        'name' => 'DELETE',
        'description' => 'Hak untuk menghapus data.',
        'value' => $DELETE,
        'granted' => $canDelete,
    ],
];

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bitwise Permission Test - KursusKu</title>

    <style>
        /* =====================================================
           KURSUSKU - BITWISE PERMISSION TEST
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
            --danger: #dc2626;
            --danger-bg: #fef2f2;
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
            width: min(1050px, calc(100% - 40px));
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
            gap: 25px;
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

        /* HEADER */

        .page-header {
            text-align: center;
            padding: 50px 10px 30px;
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

        .permission-card {
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid var(--border-soft);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 55px;
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.08);
            position: relative;
            overflow: hidden;
        }

        .permission-card::before {
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
            font-size: 20px;
            margin-bottom: 5px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 13px;
        }

        /* PERMISSION SUMMARY */

        .permission-summary {
            background: #f8fcff;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .summary-label {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 5px;
        }

        .summary-value {
            color: var(--navy-soft);
            font-size: 27px;
            font-weight: 800;
        }

        .summary-description {
            color: var(--text-soft);
            font-size: 13px;
            margin-top: 5px;
        }

        /* PERMISSION LIST */

        .permission-list {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 28px;
        }

        .permission-item {
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
            background: var(--white);
        }

        .permission-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .permission-name {
            color: var(--navy-soft);
            font-size: 16px;
            font-weight: 800;
        }

        .permission-value {
            color: var(--blue-dark);
            background: var(--cyan-soft);
            padding: 3px 9px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 800;
        }

        .permission-description {
            color: var(--muted);
            font-size: 12px;
            min-height: 38px;
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 13px;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
        }

        .status-allowed {
            color: var(--success);
            background: var(--success-bg);
            border: 1px solid #bbf7d0;
        }

        .status-denied {
            color: var(--danger);
            background: var(--danger-bg);
            border: 1px solid #fecaca;
        }

        /* OUTPUT */

        .output-box {
            background: var(--navy);
            color: #e2e8f0;
            border: 1px solid #24344d;
            border-radius: 14px;
            overflow: hidden;
        }

        .output-heading {
            padding: 13px 18px;
            border-bottom: 1px solid #334155;
            color: var(--cyan);
            font-size: 13px;
            font-weight: 800;
        }

        .output-box pre {
            padding: 22px;
            font-family: Consolas, "Courier New", monospace;
            font-size: 15px;
            line-height: 2;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .output-note {
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.04);
            border-top: 1px solid #334155;
            color: #cbd5e1;
            font-size: 12px;
        }

        /* EXPLANATION */

        .info-note {
            margin-top: 22px;
            padding: 16px 18px;
            border: 1px solid #bae6fd;
            background: #f0f9ff;
            border-radius: 12px;
            color: var(--blue-dark);
            font-size: 13px;
        }

        .info-note strong {
            display: block;
            margin-bottom: 5px;
        }

        .info-note code {
            font-family: Consolas, "Courier New", monospace;
            font-weight: 700;
        }

        /* BUTTON */

        .actions {
            display: flex;
            justify-content: center;
            margin-top: 25px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 10px 22px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 750;
            transition: 0.25s;
            border: 1px solid transparent;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.10);
        }

        .btn-primary {
            color: var(--white);
            background: linear-gradient(135deg,
                    var(--blue-dark),
                    var(--blue));
            border-color: var(--blue);
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

            .permission-card {
                padding: 18px;
                border-radius: 16px;
            }

            .permission-list {
                grid-template-columns: 1fr;
            }

            .permission-description {
                min-height: auto;
            }

            .summary-value {
                font-size: 24px;
            }

            .output-box pre {
                font-size: 13px;
                padding: 16px;
            }

            .btn {
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
                <a href="bitwise-test.php" class="active">Bitwise Test</a>
            </nav>

        </div>
    </header>

    <!-- MAIN -->

    <main class="container">

        <section class="page-header">
            <span class="eyebrow">PENGUJIAN PHP</span>

            <h1>Bitwise Permission Test</h1>

            <p>
                Pengujian hak akses menggunakan operator bitwise
                untuk menentukan izin membaca, menulis, dan menghapus data.
            </p>
        </section>

        <section class="permission-card">

            <div class="section-heading">
                <h2>Konfigurasi Hak Akses</h2>
                <p>
                    Hak akses yang diberikan ditentukan oleh nilai
                    variabel permission.
                </p>
            </div>

            <div class="permission-summary">
                <div class="summary-label">Nilai Permission</div>

                <div class="summary-value">
                    <?= $permission; ?>
                </div>

                <div class="summary-description">
                    Permission = READ | WRITE = 1 | 2
                </div>
            </div>

            <div class="section-heading">
                <h2>Rincian Hak Akses</h2>
                <p>
                    Status di bawah ini berasal dari hasil pemeriksaan
                    operator bitwise pada PHP.
                </p>
            </div>

            <div class="permission-list">

                <?php foreach ($permissions as $item): ?>

                    <article class="permission-item">

                        <div class="permission-top">
                            <span class="permission-name">
                                <?= escapeBitwise($item['name']); ?>
                            </span>

                            <span class="permission-value">
                                <?= $item['value']; ?>
                            </span>
                        </div>

                        <p class="permission-description">
                            <?= escapeBitwise($item['description']); ?>
                        </p>

                        <?php if ($item['granted']): ?>

                            <span class="status status-allowed">
                                Diizinkan
                            </span>

                        <?php else: ?>

                            <span class="status status-denied">
                                Tidak Diizinkan
                            </span>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

            <div class="section-heading">
                <h2>Output Program</h2>
                <p>
                    Hasil asli dari fungsi var_dump() untuk ketiga
                    variabel hak akses.
                </p>
            </div>

            <div class="output-box">

                <div class="output-heading">
                    HASIL VAR_DUMP()
                </div>

                <pre><?php var_dump($canRead, $canWrite, $canDelete); ?></pre>

                <div class="output-note">
                    TRUE berarti hak akses tersedia, sedangkan FALSE
                    berarti hak akses tidak tersedia.
                </div>

            </div>

            <div class="info-note">
                <strong>Cara Kerja Operator Bitwise</strong>

                Operator <code>|</code> menggabungkan hak akses,
                sedangkan operator <code>&amp;</code> memeriksa apakah
                suatu hak akses terdapat di dalam permission.

                Pada pengaturan ini, READ dan WRITE diizinkan,
                sementara DELETE tidak diizinkan.
            </div>

            <div class="actions">
                <a href="index.php" class="btn btn-primary">
                    Kembali ke Beranda
                </a>
            </div>

        </section>

    </main>

    <!-- FOOTER -->

    <footer class="footer">
        <div class="container">
            <p>
                &copy; <?= escapeBitwise($year); ?>
                KursusKu. Belajar Teknologi, Bangun Masa Depan.
            </p>
        </div>
    </footer>

</body>

</html>