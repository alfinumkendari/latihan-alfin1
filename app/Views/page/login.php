<!doctype html>
<html lang="en">

<head>
<link rel="icon" href="<?= base_url() ?>/assets/img/icon.png " type="image/png" class="rounded">
    <title>Halaman Login | PDM</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--Convert to an external stylesheet-->
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background: #141E30;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #243B55, #141E30);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #243B55, #141E30);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            color: white;
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
            color: #212121;
            border: 4px solid #ff993b;
            border-radius: 25px;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

</head>

<body class="text-center">
    <div class="form-signin bg-light">
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-danger alert-sm"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('save/login') ?>" method="post">
        <?= $this->include('page/jam') ?>
            <h1 class="h3 mb-3 fw-normal">Login | Admin | Petugas </h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Masukkan Username Anda" autocomplete="off" autofocus required>
                <label for="floatingInput">Username</label> 
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Masukkan Password Anda" autocomplete="off" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-dark" type="submit">Sign in</button>
            <a href="<?= base_url('auth/loginm') ?>" class="text-end">Login Masyarakat</a>
            <p class="mt-5 mb-3 text-muted">&copy; 2022???2023</p>
        </form>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
</body>

</html>