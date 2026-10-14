<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello KursusKu</title>

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
            gap: 20px;
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

        .nav-link {
            color: #e2e8f0;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: var(--cyan);
        }

        /* KONTEN UTAMA */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 55px 20px;
        }

        .utility-card {
            width: 100%;
            max-width: 720px;
            background: var(--white);
            padding: 42px;
            border-radius: 22px;
            text-align: center;
            border: 1px solid #e2e8f0;
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.08);
        }

        .eyebrow {
            display: inline-block;
            padding: 8px 15px;
            margin-bottom: 20px;
            border-radius: 30px;
            background: #e0f2fe;
            color: var(--blue-dark);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        h1 {
            color: var(--navy);
            font-size: clamp(27px, 5vw, 38px);
            line-height: 1.3;
            margin-bottom: 15px;
        }

        .description {
            color: var(--muted);
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 28px;
        }

        /* GAMBAR */
        .illustration {
            display: block;
            width: 100%;
            max-width: 520px;
            max-height: 300px;
            object-fit: contain;
            margin: 0 auto 30px;
            border-radius: 16px;
        }

        /* TOMBOL */
        .button {
            display: inline-block;
            background: var(--blue);
            color: var(--white);
            padding: 14px 25px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 5px 12px rgba(2, 132, 199, 0.2);
        }

        .button:hover {
            background: var(--blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(2, 132, 199, 0.25);
        }

        .secondary-link {
            display: inline-block;
            margin-top: 22px;
            color: var(--blue-dark);
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .secondary-link:hover {
            color: var(--navy);
            text-decoration: underline;
        }

        /* FOOTER */
        .footer {
            background: var(--navy);
            color: #cbd5e1;
            text-align: center;
            padding: 20px;
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
                padding: 28px 20px;
                border-radius: 16px;
            }

            .description {
                font-size: 14px;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <a href="hello.php" class="brand">
            Kursus<span>Ku</span>
        </a>

        <a href="index.php" class="nav-link">
            Kembali ke Prototype →
        </a>
    </header>

    <main class="main-content">
        <section class="utility-card">

            <span class="eyebrow">SELAMAT DATANG</span>

            <h1>Selamat datang di KursusKu</h1>

            <p class="description">
                Temukan kursus teknologi yang sesuai dengan minatmu,
                tingkatkan kemampuan digital, dan mulai perjalanan
                belajarmu bersama KursusKu.
            </p>

            <img
                src="assets/img/image1.png"
                alt="Ilustrasi KursusKu"
                class="illustration">

            <a href="index.php" class="button">
                Buka Prototype →
            </a>

            <br>

            <a href="praktikum-1.html" class="secondary-link">
                Buka Praktikum 1
            </a>

        </section>
    </main>

    <footer class="footer">
        &copy; <?= date('Y') ?> <span>KursusKu</span>.
        Belajar Teknologi, Bangun Masa Depan.
    </footer>

</body>

</html>