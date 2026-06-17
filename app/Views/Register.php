<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>

<h2>Créer un compte Caissier</h2>

<?php if(session()->getFlashdata('error')): ?>
    <p style="color:red">
        <?= session()->getFlashdata('error') ?>
    </p>
<?php endif; ?>

<form action="<?= site_url('signup') ?>" method="post">

    <label>Identifiant (Caissier) :</label>
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

</body>
</html>
