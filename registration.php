<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Kursus - KursusKu</title>

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
            max-width: 1100px;
            margin: auto;
        }

        /* NAVBAR */
        .site-header {
            background: #0f172a;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-wrap {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            color: white;
            text-decoration: none;
            font-size: 24px;
            font-weight: 700;
        }

        nav {
            display: flex;
            gap: 30px;
        }

        nav a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        nav a:hover {
            color: #38bdf8;
        }

        /* INTRO */
        .page-intro {
            text-align: center;
            padding: 60px 20px 35px;
        }

        .eyebrow {
            display: inline-block;
            background: #e0f2fe;
            color: #0369a1;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .page-intro h1 {
            color: #0f172a;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .page-intro p:last-child {
            color: #64748b;
            font-size: 15px;
        }

        /* FORM CARD */
        .form-card {
            max-width: 850px;
            margin: auto;
            margin-bottom: 70px;
            padding: 38px;
            background: white;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.07);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label,
        legend {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
        }

        fieldset {
            border: none;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.12);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .choice {
            display: inline-flex !important;
            align-items: center;
            margin-right: 20px;
            font-weight: 400 !important;
            cursor: pointer;
        }

        .choice input {
            margin-right: 7px;
            accent-color: #0284c7;
        }

        .help {
            color: #94a3b8;
            font-size: 12px;
        }

        /* BUTTON */
        .btn-primary {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 9px;
            background: #0284c7;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #0369a1;
            transform: translateY(-2px);
        }

        /* RESPONSIVE */
        @media (max-width: 700px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 28px;
            }
        }

        @media (max-width: 500px) {
            .nav-wrap {
                flex-direction: column;
                gap: 10px;
                padding: 15px 0;
            }

            nav {
                gap: 18px;
            }

            .page-intro h1 {
                font-size: 27px;
            }

            .form-card {
                padding: 22px 18px;
            }
        }
    </style>
</head>

<body>

    <header class="site-header">
        <div class="container nav-wrap">

            <a class="brand" href="index.php">
                KursusKu
            </a>

            <nav>
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="registration.php">Daftar</a>
            </nav>

        </div>
    </header>

    <main class="container">

        <section class="page-intro">

            <p class="eyebrow">
                Pendaftaran Kursus
            </p>

            <h1>
                Mulai belajar bersama KursusKu
            </h1>

            <p>
                Silakan isi data pendaftaran dengan benar.
            </p>

        </section>

        <section class="form-card">

            <form action="process-registration.php" method="POST">

                <div class="form-grid">

                    <div class="form-group">
                        <label for="name">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Masukkan nama lengkap"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="contoh@email.com"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="phone">
                            Nomor HP
                        </label>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            placeholder="081234567890"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="study_program">
                            Program Studi
                        </label>

                        <input
                            type="text"
                            id="study_program"
                            name="study_program"
                            placeholder="Masukkan program studi"
                            required>
                    </div>

                </div>

                <div class="form-group">

                    <label for="course">
                        Kursus yang Dipilih
                    </label>

                    <select id="course" name="course" required>

                        <option value="">
                            -- Pilih kursus --
                        </option>

                        <option value="Web Dasar">
                            Web Dasar
                        </option>

                        <option value="PHP Dasar">
                            PHP Dasar
                        </option>

                        <option value="Laravel Fundamental">
                            Laravel Fundamental
                        </option>

                    </select>

                </div>

                <fieldset class="form-group">

                    <legend>
                        Jenis Peserta
                    </legend>

                    <label class="choice">
                        <input
                            type="radio"
                            name="participant_type"
                            value="Mahasiswa"
                            required>

                        Mahasiswa
                    </label>

                    <label class="choice">
                        <input
                            type="radio"
                            name="participant_type"
                            value="Umum">

                        Umum
                    </label>

                </fieldset>

                <fieldset class="form-group">

                    <legend>
                        Minat Tambahan
                    </legend>

                    <label class="choice">
                        <input
                            type="checkbox"
                            name="interests[]"
                            value="UI/UX">

                        UI/UX
                    </label>

                    <label class="choice">
                        <input
                            type="checkbox"
                            name="interests[]"
                            value="Database">

                        Database
                    </label>

                    <label class="choice">
                        <input
                            type="checkbox"
                            name="interests[]"
                            value="Backend">

                        Backend
                    </label>

                </fieldset>

                <div class="form-group">

                    <label for="note">
                        Catatan
                    </label>

                    <textarea
                        id="note"
                        name="note"
                        maxlength="300"
                        placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>

                    <small class="help">
                        Maksimal 300 karakter.
                    </small>

                </div>

                <button
                    type="submit"
                    class="btn-primary">

                    Kirim Pendaftaran

                </button>

            </form>

        </section>

    </main>

</body>

</html>