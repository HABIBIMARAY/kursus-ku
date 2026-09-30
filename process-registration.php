<?php

// Mengecek apakah halaman menerima data POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

// Mengambil data dari form
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');
$course = trim($_POST['course'] ?? '');
$participantType = trim($_POST['participant_type'] ?? '');
$note = trim($_POST['note'] ?? '');

// Mengambil checkbox minat
$interests = $_POST['interests'] ?? [];

// Memastikan interests berbentuk array
if (!is_array($interests)) {
    $interests = [];
}

// Jika ada minat, gabungkan dengan koma
$interestText = !empty($interests)
    ? implode(', ', $interests)
    : 'Tidak ada';

// Fungsi keamanan untuk menampilkan data
function e($value)
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
        Hasil Pendaftaran - KursusKu
    </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        .container {
            width: 92%;
            max-width: 850px;
            margin: auto;
        }

        .result-page {
            padding: 70px 0;
        }

        /* PESAN BERHASIL */

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            padding: 25px 30px;
            border-radius: 16px;
            margin-bottom: 25px;
        }

        .alert-success h1 {
            color: #047857;
            font-size: 25px;
            margin-bottom: 8px;
        }

        .alert-success p {
            color: #475569;
            font-size: 14px;
        }

        /* DATA */

        .summary-card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.07);
        }

        .summary-list {
            display: grid;
            grid-template-columns: 180px 1fr;
        }

        .summary-list dt,
        .summary-list dd {
            padding: 14px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .summary-list dt {
            color: #475569;
            font-weight: 600;
            font-size: 14px;
        }

        .summary-list dd {
            color: #1e293b;
            font-size: 14px;
            word-break: break-word;
        }

        /* BUTTON GROUP */

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn-link,
        .btn-home {
            flex: 1;
            display: inline-block;
            padding: 12px 20px;
            border-radius: 9px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        /* KEMBALI KE FORM */

        .btn-link {
            background: #0284c7;
            color: white;
        }

        .btn-link:hover {
            background: #0369a1;
            transform: translateY(-2px);
            box-shadow: 0 7px 18px rgba(2, 132, 199, 0.2);
        }

        /* KEMBALI KE BERANDA */

        .btn-home {
            background: white;
            color: #475569;
            border: 1px solid #cbd5e1;
        }

        .btn-home:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
            color: #0f172a;
            transform: translateY(-2px);
        }

        /* RESPONSIVE */

        @media (max-width: 600px) {

            .result-page {
                padding: 40px 0;
            }

            .alert-success {
                padding: 22px;
            }

            .alert-success h1 {
                font-size: 21px;
            }

            .summary-card {
                padding: 22px;
            }

            .summary-list {
                display: block;
            }

            .summary-list dt {
                padding-bottom: 3px;
                border-bottom: none;
            }

            .summary-list dd {
                padding-top: 0;
                padding-bottom: 14px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn-link,
            .btn-home {
                width: 100%;
            }

        }
    </style>

</head>

<body>

    <main class="container result-page">

        <section class="alert-success">

            <h1>
                Pendaftaran Diterima untuk Diproses
            </h1>

            <p>
                Data pendaftaran Anda berhasil diterima.
            </p>

        </section>

        <section class="summary-card">

            <dl class="summary-list">

                <dt>
                    Nama
                </dt>

                <dd>
                    <?= e($name) ?>
                </dd>


                <dt>
                    Email
                </dt>

                <dd>
                    <?= e($email) ?>
                </dd>


                <dt>
                    Nomor HP
                </dt>

                <dd>
                    <?= e($phone) ?>
                </dd>


                <dt>
                    Program Studi
                </dt>

                <dd>
                    <?= e($studyProgram) ?>
                </dd>


                <dt>
                    Kursus
                </dt>

                <dd>
                    <?= e($course) ?>
                </dd>


                <dt>
                    Jenis Peserta
                </dt>

                <dd>
                    <?= e($participantType) ?>
                </dd>


                <dt>
                    Minat Tambahan
                </dt>

                <dd>
                    <?= e($interestText) ?>
                </dd>


                <dt>
                    Catatan
                </dt>

                <dd>
                    <?= $note !== '' ? e($note) : 'Tidak ada catatan' ?>
                </dd>

            </dl>


            <div class="button-group">

                <a
                    class="btn-link"
                    href="registration.php">

                    ← Kembali ke Form

                </a>


                <a
                    class="btn-home"
                    href="index.php">

                    ← Kembali ke Beranda

                </a>

            </div>

        </section>

    </main>

</body>

</html>