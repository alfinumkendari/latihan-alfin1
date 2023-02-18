<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-end mb-1">
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#ModalInput">Input Data</button>
</div>
<table id="example" class="table table-striped table-sm table-responsive">
    <thead class="thead-light">
        <tr>
            <th>Nomor</th>
            <th>Nik</th>
            <th>Nama Masyarakat</th>
            <th>Username</th>
            <th>Telphone</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php $no=1; foreach ($masyarakat as $row) : ?>
    <tbody>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->nik ?></td>
            <td><?= $row->nama ?></td>
            <td><?= $row->username ?></td>
            <td><?= $row->telp ?></td>
            <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUpdate<?= $row->nik ?>">Edit</button>
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDel<?= $row->nik ?>">Delete</button>
            </td>
        </tr>
    </tbody>
    <?php endforeach ?>
</table>
<!-- Modal Input -->
<div class="modal fade" id="ModalInput">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Input</h1>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('save/masyarakat') ?>" method="post">
                <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="number" name="nik" id="nik" class="form-control" placeholder="Masukkan Nik Anda" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Masyarakat</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Anda" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username Anda" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Anda" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telephone</label>
                        <input type="number" name="telp" id="telp" class="form-control" placeholder="Masukkan Trelpon Anda" autocomplete="off" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-sm btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn-sm btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Update -->
<?php foreach ($masyarakat as $row) : ?>
<div class="modal fade" id="ModalUpdate<?= $row->nik ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Update</h1>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('update/masyarakat/'. $row->nik) ?>" method="post">
                <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="number" name="nik" id="nik" class="form-control" placeholder="Masukkan Nik Anda" autocomplete="off" value="<?= $row->nik ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Masyarakat</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Anda" autocomplete="off" value="<?= $row->nama ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username Anda" autocomplete="off" value="<?= $row->username ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Anda" autocomplete="off" value="<?= $row->password ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telephone</label>
                        <input type="number" name="telp" id="telp" class="form-control" placeholder="Masukkan Trelpon Anda" autocomplete="off" value="<?= $row->telp ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-sm btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn-sm btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<!-- Modal Delete -->
<?php foreach ($masyarakat as $row) : ?>
<div class="modal fade" id="ModalDel<?= $row->nik ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Delete</h1>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('delete/masyarakat/'. $row->nik) ?>" method="post">
                <?= csrf_field() ?>
                    Yakinnn data <strong><?= $row->nama ?></strong> akan Dihapus...?
                </div>
                <div class="modal-footer">
                    <button class="btn-sm btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn-sm btn-primary" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<?= $this->endSection() ?>