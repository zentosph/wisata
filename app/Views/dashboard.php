<?php 
// Tentukan jumlah card per halaman
$cardsPerPage = 15; 

// Hitung total card
$totalCards = count($wisata); 

// Hitung jumlah halaman yang diperlukan
$totalPages = ceil($totalCards / $cardsPerPage); 

// Ambil halaman saat ini dari parameter GET, default ke halaman 1
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; 

// Tentukan index awal untuk data pada halaman saat ini
$startIndex = ($currentPage - 1) * $cardsPerPage;

// Ambil subset data berdasarkan halaman
$currentCards = array_slice($wisata, $startIndex, $cardsPerPage);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Layout with Image</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
        }
        .welcome-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 5px;
        }
        .welcome-card h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .card-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 0 !important;
            margin: 0 !important;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.333% - 20px) !important; /* Default untuk laptop: 3 kartu per baris */
            max-width: 33.333%;
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .card-text {
            color: #666;
        }
        /* Untuk layar besar (di atas 1024px): 3 kartu per baris */
        @media (min-width: 1025px) {
            .card {
                flex: 1 1 calc(33.333% - 20px) !important;
                max-width: 33.333%;
            }
        }
        /* Untuk tablet (768px hingga 1024px): 2 kartu per baris */
        @media (min-width: 768px) and (max-width: 1024px) {
            .card {
                flex: 1 1 calc(50% - 20px) !important;
                max-width: 50%;
            }
        }
        /* Untuk HP biasa (di bawah 768px): 1 kartu per baris */
        @media (max-width: 767px) {
            .card {
                flex: 1 1 100% !important;
                max-width: 100%;
            }
        }
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            color: #333;
            padding: 10px 15px;
            margin: 0 5px;
            text-decoration: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .pagination a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .pagination .active {
            background-color: #007bff;
            color: #fff;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- Welcome Card -->
            <div class="welcome-card">
                <h2>Selamat Datang</h2>
            </div>
            <div class="card-group">
                <?php 
                // Tampilkan card sesuai halaman saat ini
                foreach ($currentCards as $key) {
                ?>
                
                <div class="card">
                <a href="<?=base_url('home/wisatabatam/'.$key->id_wisata)?>">
                    <img src="<?=base_url('wisata/'.$key->foto)?>" alt="Card Image" class="card-img">
                    <div class="card-body">
                        <h5 class="card-title"><?=$key->nama_objek?></h5>
                        <p class="card-text"><?=$key->kategori?> | <?=$key->kecamatan?></p>
                    </div>
                    </a>
                </div>
                
                <?php } ?>
            </div>
            
            <!-- Pagination -->
            <div class="pagination">
                <!-- Previous Page Link -->
                <?php if ($currentPage > 1): ?>
                    <a href="?page=<?= $currentPage - 1; ?>">&laquo; Previous</a>
                <?php endif; ?>
                
                <!-- Numbered Links -->
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i; ?>" class="<?= $i == $currentPage ? 'active' : ''; ?>"><?= $i; ?></a>
                <?php endfor; ?>
                
                <!-- Next Page Link -->
                <?php if ($currentPage < $totalPages): ?>
                    <a href="?page=<?= $currentPage + 1; ?>">Next &raquo;</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
