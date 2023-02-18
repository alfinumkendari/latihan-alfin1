<?= $this->extend('layout/templatep') ?>
<?= $this->section('content') ?>
<h4>Nik : <?= session()->get('nama') ?></h4>
<h4>Nama : <?= session()->get('username') ?></h4>
<h4>Nama : <?= session()->get('password') ?></h4>
<h4>Nama : <?= session()->get('telp') ?></h4>
<?= $this->endSection() ?>