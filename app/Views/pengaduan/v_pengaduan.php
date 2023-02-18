<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-end mb-1">
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#ModalInput">Input Data</button>
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
<!-- Modal -->
<div class="modal fade" id="ModalInput">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Input</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>