<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-end">Anda Berhasil Login sebagai : <h6>(<?= session()->level ?>)</h6></div>
<h5>Assalamu'alaikum, Selamat Datang di Aplikasi Pengaduan Masyarakat : <?= session()->nama_petugas ?></h5>
<?= $this->endSection() ?>