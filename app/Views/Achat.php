<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des Achats</title>
</head>
<body>
    <div class="header">
        <h2>Bienvenue sur la saisie des achats</h2>
        <h3 style="color: blue;">
            Caisse sélectionnée : Caisse N°<?= esc($caisse_active['numero']) ?>
        </h3>
        <hr>
    </div>

    <form method="post" action="<?= site_url('achat/enregistrer') ?>">
        <select name="produit" id="produit">
            <?php foreach($produits as $produit): ?>
                <option value="<?= $produit['id'] ?>">
                    <?= $produit['designation'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="number" name="quantite" min="1" required>

        <button type="submit">Valider</button>
    </form>

    <div class="container-achat">
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($achats as $achat): ?>
                <tr>
                    <td><?= $achat['designation'] ?></td>
                    <td><?= $achat['prix'] ?></td>
                    <td><?= $achat['quantite'] ?></td>
                    <td><?= $achat['montant'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>Total : <span id="total"><?= $total ?></span> Ar</p>
    </div>
</body>
</html>