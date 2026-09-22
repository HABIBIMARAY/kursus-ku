<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Pengujian - KursusKu</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: white;
            color: #111;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        .table-container {
            border: 2px solid #222;
            padding: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th,
        td {
            border: 2px solid #222;
            padding: 10px;
            font-size: 18px;
            vertical-align: top;
        }

        th {
            text-align: left;
            font-size: 20px;
        }

        .no {
            width: 4%;
            text-align: center;
        }

        .input {
            width: 57%;
        }

        .expected {
            width: 13%;
        }

        .actual {
            width: 13%;
        }

        .status {
            width: 13%;
        }

        .status-pass {
            color: #111;
            font-weight: normal;
        }
    </style>
</head>

<body>

    <h1>Hasil Pengujian Kalkulator KursusKu</h1>

    <div class="table-container">
        <table>
            <tr>
                <th class="no">No</th>
                <th class="input">Input</th>
                <th class="expected">Expected</th>
                <th class="actual">Actual</th>
                <th class="status">Status</th>
            </tr>

            <tr>
                <td class="no">1</td>
                <td>
                    Fee: 350.000, Peserta: 1, Diskon: 0%, Admin: 25.000
                </td>
                <td>375.000</td>
                <td>375.000</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">2</td>
                <td>
                    Fee: 350.000, Peserta: 1, Diskon: 10%, Admin: 25.000
                </td>
                <td>340.000</td>
                <td>340.000</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">3</td>
                <td>
                    Fee: 350.000, Peserta: 2, Diskon: 25%, Admin: 25.000
                </td>
                <td>550.000</td>
                <td>550.000</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">4</td>
                <td>
                    Fee: 0, Peserta: 1, Diskon: 10%, Admin: 0
                </td>
                <td>0</td>
                <td>0</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">5</td>
                <td>
                    Fee: 2.500.000, Peserta: 3, Diskon: 10%, Admin: 50.000
                </td>
                <td>6.800.000</td>
                <td>6.800.000</td>
                <td class="status-pass">PASS</td>
            </tr>

        </table>
    </div>

</body>

</html>