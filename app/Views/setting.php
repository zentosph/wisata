<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="<?= base_url('path/to/bootstrap.css') ?>">
    <style>
        #autoResizeTextarea {
            max-height: auto;
            overflow-y: auto;
        }
        @media (max-width: 768px) {
            #autoResizeTextarea {
                max-height: 400px;
            }
        }
        @media (min-width: 769px) {
            #autoResizeTextarea {
                max-height: 600px;
            }
        }
        .containerbtn {
            display: flex;
        }
        .selesai {
            margin-left: auto;
        }
    </style>
    <script>
        function previewImage(input, previewId) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</head>
<body>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-danger">Setting</h3>
                            <form class="mt-4" method="post" action="<?= base_url('home/aksi_esetting') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <h6 class="card-title">Nama Website</h6>
                                    <input type="text" class="form-control" name="judul_website" value="<?= $setting->judul_website ?>">

                                    <h6 class="card-title">Tab Icon</h6>
                                    <input type="file" name="t_icon" onchange="previewImage(this, 'tabIconPreview')">
                                    <br>
                                    <img id="tabIconPreview" src="<?= base_url('images/' . $setting->tab_icon) ?>" alt="Tab Icon" width="100" height="100">

                                    <h6 class="card-title">Menu Icon</h6>
                                    <input type="file" name="m_icon" onchange="previewImage(this, 'menuIconPreview')">
                                    <br>
                                    <img id="menuIconPreview" src="<?= base_url('images/' . $setting->menu_icon) ?>" alt="Menu Icon" width="100" height="100">

                                </div>

                                <div class="containerbtn">
                                    <div class="selesai">
                                        <input type="hidden" value="<?= $setting->id_setting ?>" name="id">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?= base_url('path/to/bootstrap.js') ?>"></script>
</body>
</html>
