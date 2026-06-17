<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix Caisse</title>
</head>
<body>
    <div class="container">
        <select name="caisse" id="caisse">
            <option value="1">Caisse 1</option>
        </select>
        <button onclick="valider()">Valider</button>
    </div>
    <script>
        function valider() {
            var caisse = document.getElementById("caisse").value;
            window.location.href = "/caisse/" + caisse;
        }
    </script>
</body>
</html>