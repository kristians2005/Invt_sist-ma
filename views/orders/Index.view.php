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
        <li><?php echo $item['name']; ?> (SKU: <?php echo $item['sku']; ?>) - Atlikums: <?php echo $item['quantity']; ?> (Atjaunots: <?php echo $item['updated_at']; ?>)</li>
    <?php endforeach; ?>
</ul>

<h2>Visi pasūtījumi</h2>
<table>
    <tr><th>ID</th><th>Lietotājs</th><th>Produkts</th><th>Daudzums</th><th>Statuss</th><th>Izveidots</th></tr>
    <?php foreach ($data['orders'] as $order): ?>
        <tr>
            <td><?php echo $order['id']; ?></td>
            <td><?php echo $order['user_name']; ?></td>
            <td><?php echo $order['product_name']; ?></td>
            <td><?php echo $order['quantity']; ?></td>
            <td><?php echo $order['status']; ?></td>
            <td><?php echo $order['created_at']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>


<?php require_once "views/partials/footer.view.php"; ?>

