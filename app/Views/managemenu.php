<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Menus</title>
    <link rel="stylesheet" href="<?= base_url('path/to/bootstrap.css') ?>">
    <style>
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
        .btn-save {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }
        .btn-save:hover {
            background-color: #218838;
            border-color: #1e7e34;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
<div class="container-fluid">
<div class="container my-5">
    <h1 class="mb-4 text-center">Manage Menus</h1>
    <?php if (session()->getFlashdata('message')): ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('message') ?>
                        </div>
                    <?php endif; ?>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">Admin</div>
                <div class="card-body">
                    <form action="<?= base_url('home/updatemenuws') ?>" method="post">
                        <input type="hidden" name="id_menu" value="2">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th>Show</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menue as $key => $value): ?>
                                    <?php if (!in_array($key, ['id_menu', 'level'])): ?>
                                        <tr>
                                            <td><?= esc(ucfirst(str_replace('_', ' ', $key))) ?></td>
                                            <td class="text-center">
                                                <input type="checkbox" name="<?= esc($key) ?>" <?= $value == 1 ? 'checked' : '' ?> title="Show this menu for Wali Kelas">
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-save btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">Data Wisata</div>
                <div class="card-body">
                    
                    <form action="<?= base_url('home/updateMenuks') ?>" method="post">
                        <input type="hidden" name="id_menu" value="2">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th>Show</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menuee as $key => $value): ?>
                                    <?php if (!in_array($key, ['id_menu', 'level'])): ?>
                                        <tr>
                                            <td><?= esc(ucfirst(str_replace('_', ' ', $key))) ?></td>
                                            <td class="text-center">
                                                <input type="checkbox" name="<?= esc($key) ?>" <?= $value == 1 ? 'checked' : '' ?> title="Show this menu for Kepala Sekolah">
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-save btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">Pengunjung</div>
                <div class="card-body">
                    <form action="<?= base_url('home/updateMenumd') ?>" method="post">
                        <input type="hidden" name="id_menu" value="2">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th>Show</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($menueee as $key => $value): ?>
                                    <?php if (!in_array($key, ['id_menu', 'level'])): ?>
                                        <tr>
                                            <td><?= esc(ucfirst(str_replace('_', ' ', $key))) ?></td>
                                            <td class="text-center">
                                                <input type="checkbox" name="<?= esc($key) ?>" <?= $value == 1 ? 'checked' : '' ?> title="Show this menu for Murid">
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-save btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="<?= base_url('path/to/bootstrap.js') ?>"></script>
</body>
</html>
