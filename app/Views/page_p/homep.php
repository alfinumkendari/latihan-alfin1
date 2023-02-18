<?= $this->extend('layout/templatep') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-end">Anda Berhasil Login sebagai : <h6>(<?= session()->level ?>)</h6></div>
<h2>Assalamu'alaikum : <?= session()->nama_petugas ?></h2>
<?= $this->endSection() ?>