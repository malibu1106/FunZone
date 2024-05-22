<main>

<h1>Page d'accueil FunZone</h1>
<table>
    <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Date de naissance</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['first_name']; ?></td>
            <td><?php echo $user['last_name']; ?></td>
            <td><?php echo $user['date_of_birth']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</main>