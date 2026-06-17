<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h2>Connexion</h2>

<?php if(session()->getFlashdata('error')): ?>
    <p style="color:red">
        <?= session()->getFlashdata('error') ?>
    </p>
<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>
    <p style="color:green">
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