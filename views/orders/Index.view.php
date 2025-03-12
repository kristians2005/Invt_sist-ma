<?php require_once "views/partials/header.view.php"; ?>
<div class="p-20">
    <h1>Pasūtījumu/Darījumu Skats</h1>

    <h2>Kas notiek ar produktiem</h2>
    <table>
        <tr>
            <th>Nosaukums</th>
            <th>SKU</th>
            <th>Atlikums</th>
            <th>Atrašanās vieta</th>
            <th>Pēdējais atjauninājums</th>
        </tr>
        <?php foreach ($data['all_products'] as $item): ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['sku']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['location'] ?: 'Nav norādīts'; ?></td>
                <td><?php echo $item['updated_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Produkti, kas iet uz beigām (mazāk par 10)</h2>
    <ul>
        <?php foreach ($data['low_stock'] as $item): ?>
            <li><?php echo $item['name']; ?> (SKU: <?php echo $item['sku']; ?>) - Atlikums: <?php echo $item['quantity']; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Pārdotie/Utilizētie produkti (pēdējās 7 dienās)</h2>
    <ul>
        <?php foreach ($data['sold_utilized'] as $item): ?>
            <li><?php echo $item['name']; ?> (SKU: <?php echo $item['sku']; ?>) - Atlikums: <?php echo $item['quantity']; ?>
                (Atjaunots: <?php echo $item['updated_at']; ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>

<?php require_once "views/partials/footer.view.php"; ?>