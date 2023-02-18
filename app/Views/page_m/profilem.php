<?= $this->extend('layout/templatem') ?>
<?= $this->section('content') ?>
<h2>Nik : <?= session()->nik ?></h2>
<h2>Nama : <?= session()->nama ?></h2>
<?= $this->endSection() ?>