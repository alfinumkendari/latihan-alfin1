<?= $this->extend('layout/templatem') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-end mb-1">
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#ModalInput">Input Aduan</button>
</div>
<table id="example" class="table table-striped table-sm table-responsive-sm">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Tanggal Pengaduan</th>
            <th>Nama Masyarakat</th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php $no=1; foreach ($pengaduan as $row ) : ?>
    <tbody>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->tgl_pengaduan ?></td>
            <td><?= $row->nama ?></td>
            <td><?= $row->isi_laporan ?></td>
            <td><?= $row->foto ?></td>
            <td><?= $row->status ?></td>
            <td>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUpdate">Edit</button>
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDel">Delete</button>
            </td>
        </tr>
    </tbody>
    <?php endforeach ?>
</table>
<!-- Modal Input Aduan -->
<div class="modal fade" id="ModalInput">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Input Aduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('save/aduan') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="tgl_pengaduan" class="form-label">Tanggal Pengaduan</label>
                      <input type="text" name="tgl_pengaduan" id="tgl_pengaduan" class="form-control" value="<?= date('d/m/Y'); ?>" placeholder="Masukkan Tanggal Pengaduan" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="nik" class="form-label">Nik</label>
                      <input type="number" name="nik" id="nik" class="form-control" value="<?= session()->get('nik') ?>" placeholder="Masukkan Nik Anda" readonly>
                    </div>
                      <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Isi Aduan</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="isi_laporan" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="foto" class="form-label">Foto</label>
                      <input type="file" name="foto" id="foto" class="form-control" placeholder="Masukkan Gambar Anda">
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
<?= $this->endSection() ?>