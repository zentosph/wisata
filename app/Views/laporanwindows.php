<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pencarian</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .content {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        .header {
            margin-bottom: 20px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: left;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #FFFF00;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="header">
            <div class="title">Laporan Pencarian</div>
            <div class="subtitle">Tanggal Laporan: <?= date('Y-m-d') ?></div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Search</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($kelas as $key): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($key->username, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($key->search, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($key->create_at, ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
    window.addEventListener('load', function() {
        window.print();
    });
    </script>
</body>
</html>
