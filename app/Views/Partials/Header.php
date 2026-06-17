<link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">

<div class="header">
    <div class="logo"><b>KENNY SUPERMARKT</b></div>
    <div class="user">
        <b>Caissier : <?php echo session()->get('caissier'); ?></b>
    </div>
    <div class="logout">
        <a href="/logout">Se deconnecter</a>
    </div>
</div>