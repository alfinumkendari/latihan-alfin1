<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url() ?>/assets/img/masya.png " type="image/png" class="rounded">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/DataTables/datatables.min.css">
    <style>
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid bg-success mt-2 mb-1 pt-2 pb-2 text-center text-light">
            <div class="container-fluid">
                <h1>Pengaduan Masyarakat</h1>
                <p>Latihan UKK Tahun 2023</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="card border-success">
                    <div class="card-header bg-success text-light">
                        <h5>Daftar Menu</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                                <li class="list-group-item"><a href="/pagem">Home</a></li>
                                <li class="list-group-item"><a href="/profilem">Profile</a></li>
                                <li class="list-group-item"><a href="/aduan">Aduan</a></li>
                                <li class="list-group-item"><a href="/logout/pagem">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card border-success">
                    <div class="card-header bg-success text-light">
                        <div class="d-flex float-end">
                            <?= $this->include('layout/jam'); ?>
                        </div>
                        <h5><?= $judul ?></h5>
                    </div>
                    <div class="card-body">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </div>
        <footer class=" fixed-bottom bg-success text-center mt-2 text-light pt-2 pb-2">Copyright &copy; Pra UKK 2023</footer>
    </div>
</body>
<script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#example').dataTable()
    });
</script>
</html>