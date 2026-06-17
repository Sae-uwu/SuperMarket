# Formulaire d'upload
## Route
$routes->get('/import', 'ImportController::index');
$routes->post('/import/upload', 'ImportController::upload');

## vue
<form action="<?= site_url('import/upload') ?>"
method="post"
enctype="multipart/form-data">

<input type="file" name="csv_file">
    <button type="submit">
        Importer
    </button>0
</form>


# Récupérer le fichier
$file = $this->request->getFile ('csv_file');

# Ouvrir le fichier
$handle = fopen($file->getTempName(), 'r');

# Lire l'entête
$headers = fgetcsv($handle, 0, ';');
        Exemple :
        nom;prenom;email
        Résultat :
        [
            'nom',
            'prenom',
            'email
        ]

# Lire les lignes
while (($row = fgetcsv($handle, 0, ';')) !== false) {
    print_r($row);
}
        Première ligne lue :
        [
        'Jean',
        'Rakoto',
        'jean@test.com'
        ]

# Transformer en tableau associatif
$data = array_combine($headers, $row);
        Résultat :
        [
        'nom' => 'Jean',
        'prenom' => 'Rakoto',
        'email
        ]

# Insérer en base
$model->insert([
    'nom' => $data['nom'],
    'prenom' => $data['prenom'],
    'email' => $data['email']
]);

# Exemple complet minimal
$file = $this->request->getFile('csv_file');
$handle = fopen($file->getTempName(), 'r');
$headers = fgetcsv($handle, 0, ';');
while (($row = fgetcsv($handle, 0, ';')) !== false) {
    $data = array_combine($headers, $row);
}
$model->insert($data);
fclose($handle);

        