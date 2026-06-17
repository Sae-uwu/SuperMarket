<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/log.css') ?>">
</head>
<body>
<div class="auth-container">

    <form action="<?= site_url('signin') ?>" method="post">

        <h2>Connexion</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <p class="error">
                <?= session()->getFlashdata('error') ?>
            </p>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <p class="success">
                <?= session()->getFlashdata('success') ?>
            </p>
        <?php endif; ?>

        <form action="<?= site_url('signin') ?>" method="post">

            <label>Caissier :</label>
            <input type="text" name="caissier" required>

            <br><br>

            <label>Mot de passe :</label>
            <input type="password" name="password" required>

            <br><br>

            <button type="submit">
                Se connecter
            </button>
            <br><br>
            <a href="/register">Créer un compte</a>

        </form>

</body>
</html>