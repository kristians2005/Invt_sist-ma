<!-- views/orders/order.view.php -->
<h1>Pasūtīt produktus</h1>

<?php if (isset($data['success'])): ?>
    <p style="color: green;"><?php echo $data['success']; ?></p>
<?php endif; ?>
<?php if (isset($data['error'])): ?>
    <p style="color: red;"><?php echo $data['error']; ?></p>
<?php endif; ?>

<table>
    <tr>
        <th>Nosaukums</th>
        <th>SKU</th>
        <th>Apraksts</th>
        <th>Cena</th>
        <th>Kategorija</th>
        <th>Atlikums</th>
        <th>Atrašanās vieta</th>
        <th>Pasūtīt</th>
        <th>Detaļas</th>
    </tr>
    <?php foreach ($data['products'] as $product): ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['sku']; ?></td>
            <td><?php echo $product['description'] ?: 'Nav apraksta'; ?></td>
            <td><?php echo $product['price']; ?> EUR</td>
            <td><?php echo $product['category']; ?></td>
            <td><?php echo $product['quantity']; ?></td>
            <td><?php echo $product['location'] ?: 'Nav norādīts'; ?></td>
            <td>
                <form method="POST" action="/orders/order">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="number" name="quantity" min="1" max="<?php echo $product['quantity']; ?>" required style="width: 60px;">
                    <button type="submit">Pasūtīt</button>
                </form>
            </td>
            <td>
                <a href="/orders?action=show&id=<?php echo $product['id']; ?>">Skatīt</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<p><a href="/orders">Atpakaļ uz pārskatu</a></p>