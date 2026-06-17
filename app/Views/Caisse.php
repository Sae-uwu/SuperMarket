<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix Caisse</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/caisse.css') ?>">
</head>

<body>

<?php echo view('Partials/Header')?>

<div class="container">

    <div class="card">

        <h2>Sélection d'une caisse</h2>

        <p>
            Veuillez choisir la caisse que vous souhaitez utiliser.
        </p>

        <form action="/caisse/valider" method="post">

            <select name="caisse" id="caisse">

                <?php if (!empty($caisses)): ?>
                    <?php foreach ($caisses as $caisse): ?>
                        <option value="<?= esc($caisse['id']) ?>">
                            Caisse <?= esc($caisse['numero']) ?>
                        </option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">
                        Aucune caisse disponible
                    </option>
                <?php endif; ?>

            </select>

            <button type="submit">
                Continuer
            </button>

        </form>

    </div>

</div>

</body>
</html>