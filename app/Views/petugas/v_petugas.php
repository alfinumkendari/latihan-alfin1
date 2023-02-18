<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
    <div class="d-flex justify-content-end mb-1">
        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#ModalInput">Input Data</button>
    </div>
    <table class="table table-striped table-sm table-responsive" id="example">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama Petugas</th>
                <th>Username</th>
                <th>Telphone</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php $no=1; foreach ($petugas as $row) : ?>
        <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->nama_petugas ?></td>
                <td><?= $row->username ?></td>
                <td><?= $row->telp ?></td>
                <td><?= $row->level ?></td>
                <td>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUpdate<?= $row->id_petugas ?>">Edit</button>
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDel<?= $row->id_petugas ?>">Delete</button>
                </td>
            </tr>
        </tbody>
        <?php endforeach ?>
    </table>
    <!-- Modal Input -->
    <div class="modal fade" id="ModalInput">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h3 class="modal-title" id="ModalTitle">Modal Input</h3>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('save/petugas') ?>" method="post">
                    <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input id="nama_petugas" class="form-control" type="text" name="nama_petugas" placeholder="Masukkan Nama Anda" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" class="form-control" type="text" name="username" placeholder="Masukkan Username Anda" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" placeholder="Masukkan Password Anda" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="telp">Telphone</label>
                            <input id="telp" class="form-control" type="number" name="telp" placeholder="Masukkan Telphone Anda" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-select">
                                <option value="">==Pilih Level==</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Update -->
    <?php foreach ($petugas as $row) : ?>
    <div class="modal fade" id="ModalUpdate<?= $row->id_petugas ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h3 class="modal-title" id="ModalTitle">Modal Update</h3>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('update/petugas/'.$row->id_petugas ) ?>" method="post">
                    <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input id="nama_petugas" class="form-control" value="<?= $row->nama_petugas ?>" type="text" name="nama_petugas" placeholder="Masukkan Nama Anda" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" class="form-control" type="text" name="username" value="<?= $row->username ?>" placeholder="Masukkan Username Anda" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" value="<?= $row->password ?>" placeholder="Masukkan Password Anda" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="telp">Telphone</label>
                            <input id="telp" class="form-control" type="number" name="telp" placeholder="Masukkan Telphone Anda" value="<?= $row->telp ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-select">
                                <option value=""><?= $row->level ?></option>
                                <option value="">==Pilih Level==</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <!-- Modal Delete -->
    <?php foreach ($petugas as $row) : ?>
    <div class="modal fade" id="ModalDel<?= $row->id_petugas ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h3 class="modal-title" id="ModalTitle">Modal Delete</h3>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('delete/petugas/'.$row->id_petugas ) ?>" method="post">
                    <?= csrf_field() ?>
                        Yakin Data <h5><?= $row->nama_petugas ?></h5> Mau Dihapus..?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach ?>
<?= $this->endSection() ?>