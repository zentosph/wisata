<style>

</style>
<?php
$activePage = basename($_SERVER['REQUEST_URI']);

?>

<div class="page-wrapper">
<div class="container-fluid">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kasus</h4>

                                <a href="<?=base_url('home/t_kasus')?>">
                                    <button class="btn btn-info">Tambah</button>
                                </a>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-dark mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Kecamatan</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no=1;
                                    foreach ($user as $key) {
                                    ?>
                                   
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $key->nama_objek?></td>
                                            <td><?= $key->kecamatan?></td>
                                            <td><?=$key->kategori?></td>
                                            <td>
                                            
                                                <a href="<?=base_url('home/detailkasus/'.$key->id_wisata)?>">
                                                    <button class="btn btn-primary"><i class="fa fa-info-circle"></i></button>
                                                </a>
                                                <a href="<?=base_url('home/softdeletekasus/'.$key->id_wisata)?>">
                                                    <button class="btn btn-primary"><i class="fa fa-trash"></i></button>
                                                </a>

                                            
                                            </td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    