<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix Caisse</title>
</head>
<body>
    <div class="container">
        <form action="/caisse/valider" method="post">
            <select name="caisse" id="caisse">
                <?php if (!empty($caisses)): ?>
                    <?php foreach ($caisses as $caisse): ?>
                        <option value="<?= esc($caisse['id']) ?>">
                            Caisse <?= esc($caisse['numero']) ?>
                        </option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">Aucune caisse disponible</option>
                <?php endif; ?>
            </select>
            <button type="submit">Valider</button>
        </form>
    </div>
</body>
</html>