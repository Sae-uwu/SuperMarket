<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/log.css') ?>">
</head>
<body>

<?php if(session()->getFlashdata('error')): ?>
    <p class="error">
        <?= session()->getFlashdata('error') ?>
    </p>
<?php endif; ?>

<div class="auth-container">
    <h2>Créer un compte Caissier</h2>


    <form action="<?= site_url('signup') ?>" method="post">

        <label>Nom du caissier :</label>
        <input type="text" name="caissier" required>

        <br><br>

        <label>Mot de passe :</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit">
            S'inscrire
        </button>
        <br><br>
        <a href="/">Déjà un compte ? Se connecter</a>

    </form>

</div>
</body>
</html>
