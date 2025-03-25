<?php require_once "views/partials/header.view.php"; ?>

<div class="p-20">
    <div class="container mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Pasūtījuma detaļas #<?php echo $data['order']['id']; ?></h2>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="font-bold">Pasūtījuma informācija</h3>
                        <p>Statuss:
                            <span class="badge <?php echo match ($data['order']['status']) {
                                'pending' => 'badge-warning',
                                'completed' => 'badge-success',
                                'cancelled' => 'badge-error',
                                default => 'badge-ghost'
                            }; ?>">
                                <?php echo $data['order']['status']; ?>
                            </span>
                        </p>
                        <p>Izveidots: <?php echo $data['order']['created_at']; ?></p>
                        <p>Lietotājs: <?php echo $data['order']['user_name']; ?></p>
                    </div>

                    <div>
                        <h3 class="font-bold">Produkta informācija</h3>
                        <p>Nosaukums: <?php echo $data['order']['product_name']; ?></p>
                        <p>Daudzums: <?php echo $data['order']['quantity']; ?></p>
                    </div>
                </div>

                <div class="card-actions justify-end mt-4">
                    <button onclick="updateStatus(<?php echo $data['order']['id']; ?>, 'completed')"
                        class="btn btn-success">Pabeigt pasūtījumu</button>
                    <button onclick="updateStatus(<?php echo $data['order']['id']; ?>, 'cancelled')"
                        class="btn btn-error">Atcelt pasūtījumu</button>
                    <a href="/orders" class="btn btn-ghost">Atpakaļ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateStatus(orderId, status) {
        fetch('/orders/updateStatus', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: orderId, status: status })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Status updated successfully!');
                    location.reload();
                } else {
                    alert('Failed to update status: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating status.');
            });
    }
</script>

<?php require_once "views/partials/footer.view.php"; ?>