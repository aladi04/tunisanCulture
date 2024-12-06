<!DOCTYPE html>
<html>
<head>
    <title>Utilisateurs</title>
</head>
<body>
    <h1>Liste des Utilisateurs</h1>
    <ul>
        <?php foreach ($users as $user) { ?>
            <li><?php echo $user['username']; ?>: <?php echo $user['email']; ?> - <?php echo $user['phone_number']; ?></li>
        <?php } ?>
    </ul>

    <h2>Ajouter un Utilisateur</h2>
    <form method="POST" action="index.php?action=addUser">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone_number">Numéro de téléphone:</label>
        <input type="text" id="phone_number" name="phone_number" required>

        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
