<?php

declare(strict_types=1);

session_start();

function rupiahHistory(int $nominal): string
{
    return 'Rp ' . number_format($nominal, 0, ',', '.');
}

function eHistory(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$history = $_SESSION['history'] ?? [];

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>History Pendaftaran - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #24344d;
            min-height: 100vh;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #0f172a;
            padding: 18px 0;
            box-shadow: 0 3px 12px rgba(15, 23, 42, 0.12);
        }

        .container {
            width: min(1100px, 92%);
            margin: auto;
        }

        .nav-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #ffffff;
            font-size: 25px;
            font-weight: 800;
            text-decoration: none;
        }

        .logo span {
            color: #38bdf8;
        }

        .nav-menu {
            display: flex;
            gap: 28px;
            list-style: none;
        }

        .nav-menu a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            transition: 0.2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #38bdf8;
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page {
            padding: 55px 0;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .eyebrow {
            display: inline-block;
            color: #0284c7;
            background: #e0f2fe;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
        }

        .page-header h1 {
            font-size: 32px;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .page-header p {
            color: #64748b;
            font-size: 15px;
            line-height: 1.6;
        }

        /* =========================
           HISTORY CARD
        ========================= */

        .history-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        }

        .history-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            gap: 15px;
        }

        .history-title h2 {
            color: #0f172a;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .history-title p {
            color: #64748b;
            font-size: 13px;
        }

        .total-data {
            background: #e0f2fe;
            color: #0369a1;
            padding: 9px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        thead {
            background: #0f172a;
        }

        th {
            color: #ffffff;
            text-align: left;
            padding: 15px 16px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #e8edf3;
            font-size: 14px;
            color: #475569;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        .no {
            width: 60px;
            color: #0284c7;
            font-weight: 700;
        }

        .nama {
            color: #0f172a;
            font-weight: 700;
        }

        .kursus {
            color: #0369a1;
            font-weight: 600;
        }

        .total {
            color: #0284c7;
            font-weight: 800;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            text-align: center;
            padding: 50px 20px;
        }

        .empty-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: #e0f2fe;
            color: #0284c7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            font-weight: 800;
        }

        .empty h3 {
            color: #0f172a;
            margin-bottom: 8px;
        }

        .empty p {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* =========================
           BUTTON
        ========================= */

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 22px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: 0.2s;
        }

        .btn-primary {
            background: #0284c7;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #0369a1;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #0f172a;
            color: #ffffff;
        }

        .btn-secondary:hover {
            background: #1e293b;
        }

        .btn-outline {
            border: 1px solid #0284c7;
            color: #0284c7;
            background: #ffffff;
        }

        .btn-outline:hover {
            background: #e0f2fe;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            text-align: center;
            padding: 30px 0;
            color: #64748b;
            font-size: 13px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 700px) {

            .nav-inner {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                gap: 18px;
            }

            .page {
                padding: 35px 0;
            }

            .page-header h1 {
                font-size: 26px;
            }

            .history-card {
                padding: 20px;
            }

            .history-top {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="container nav-inner">

            <a href="index.php" class="logo">
                Kursus<span>Ku</span>
            </a>

            <ul class="nav-menu">
                <li>
                    <a href="index.php">Beranda</a>
                </li>

                <li>
                    <a href="index.php#katalog">Katalog</a>
                </li>

                <li>
                    <a href="registration.php">Daftar</a>
                </li>
            </ul>

        </div>
    </header>


    <!-- CONTENT -->
    <main class="page">

        <div class="container">

            <div class="page-header">

                <span class="eyebrow">
                    HISTORY PENDAFTARAN
                </span>

                <h1>
                    Riwayat Pendaftaran Kursus
                </h1>

                <p>
                    Berikut adalah data pendaftaran yang telah dimasukkan melalui formulir KursusKu.
                </p>

            </div>


            <section class="history-card">

                <?php if (!empty($history)): ?>

                    <div class="history-top">

                        <div class="history-title">
                            <h2>Data Pendaftaran</h2>

                            <p>
                                Data berasal dari pendaftaran yang telah dilakukan.
                            </p>
                        </div>

                        <div class="total-data">
                            <?= count($history) ?> Pendaftaran
                        </div>

                    </div>


                    <div class="table-wrapper">

                        <table>

                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Kursus</th>
                                    <th>Paket</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($history as $index => $data): ?>

                                    <tr>

                                        <td class="no">
                                            <?= $index + 1 ?>
                                        </td>

                                        <td class="nama">
                                            <?= eHistory((string) $data['name']) ?>
                                        </td>

                                        <td>
                                            <?= eHistory((string) $data['email']) ?>
                                        </td>

                                        <td class="kursus">
                                            <?= eHistory((string) $data['courseName']) ?>
                                        </td>

                                        <td>
                                            <?= (int) $data['quantity'] ?> paket
                                        </td>

                                        <td class="total">
                                            <?= rupiahHistory((int) $data['total']) ?>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>


                <?php else: ?>

                    <div class="empty">

                        <div class="empty-icon">
                            +
                        </div>

                        <h3>
                            Belum Ada Data Pendaftaran
                        </h3>

                        <p>
                            Silakan melakukan pendaftaran kursus terlebih dahulu.
                        </p>

                        <a href="registration.php" class="btn btn-primary">
                            Daftar Kursus
                        </a>

                    </div>

                <?php endif; ?>


                <div class="actions">

                    <a href="registration.php" class="btn btn-primary">
                        Daftar Kursus
                    </a>

                    <a href="index.php" class="btn btn-outline">
                        Beranda
                    </a>

                </div>

            </section>

        </div>

    </main>


    <footer>
        &copy; <?= date('Y') ?> KursusKu. Semua hak dilindungi.
    </footer>

</body>

</html>