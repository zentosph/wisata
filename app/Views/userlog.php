<style>
    .btntambah{
        width: 100px;
        height: 30px;
        font-size: 12px;
    }
</style>


<?php
$activePage = basename($_SERVER['REQUEST_URI']);
?>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-wrapper">
    <div class="container-fluid">
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php if ($activePage === 'barang') { ?>
                        <a href="<?=base_url('home/tbarang')?>">
                            <button type="submit" class="btn btn-lg btn-info btn-block btntambah"><i class="ti ti-plus"></i>Tambah</button>
                        </a>
                        <?php } ?>
                        <?php if ($activePage === 'barangmasuk') { ?>
                        <a href="<?=base_url('home/tbarangm')?>">
                            <button type="submit" class="btn btn-lg btn-info btn-block btntambah"><i class="ti ti-plus"></i>Tambah</button>
                        </a>
                        <?php } ?>
                        <?php if ($activePage === 'barangkeluar') { ?>
                        <a href="<?=base_url('home/tbarangk')?>">
                            <button type="submit" class="btn btn-lg btn-info btn-block btntambah"><i class="ti ti-plus"></i>Tambah</button>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <!-- Filter Form -->
                        <form method="GET" action="<?=base_url('home/filteruserlog')?>">
                            <div class="form-group">
                                <label for="user_filter">Filter by User:</label>
                                <select id="user_filter" name="id_user" class="form-control" onchange="this.form.submit()">
                                    <option value="[]">-- Select User --</option>
                                    <?php foreach ($users as $user) { ?>
                                    <option value="<?= $user->id_user ?>" <?= isset($_GET['id_user']) && $_GET['id_user'] == $user->id_user ? 'selected' : '' ?>>
                                        <?= $user->username ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </form>

                        <!-- Data Table -->
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Activity</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no=1;
                            foreach ($satu as $key) {
                            ?> 
                                <tr>
                                    <td><?= $key->username ?></td>
                                    <td><?= $key->activity ?></td>
                                    <td><?= $key->timestamp ?></td>
                                    <td>
                                        <div class="buttonhe">
                                            <a href="<?=base_url('home/huserlog/'.$key->id_activity)?>">
                                                <button class="btn btn-lg btn-info btn-block "><i class="fa fa-trash " style="font-size:16px"></i></button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
                            </div>
                            </div>
<script>
function confirmDelete() {
    // Tampilkan konfirmasi
    var result = confirm("Apakah kamu yakin mau menghapus data?");

    // Jika pengguna menekan OK, return true (lanjutkan penghapusan)
    // Jika pengguna menekan Batal, return false (batalkan penghapusan)
    return result;
}
</script>

<div class="clearfix"></div>
