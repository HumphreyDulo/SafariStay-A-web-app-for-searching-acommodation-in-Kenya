<html>
<head>
    <title>Validate Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles for links */
        .btn-link {
            color: #007bff;
            text-decoration: none;
        }
        .btn-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td><?= $product['product_name']; ?></td>
                    <td><?= $product['approval']; ?></td>
                    <td>
                        <?php if ($product['approval'] === 'pending'): ?>
                            <a href="<?= base_url('admin/approveProduct/' . $product['id']); ?>" class="btn btn-link">Approve</a>
                            <a href="<?= base_url('admin/denyProduct/' . $product['id']); ?>" class="btn btn-link">Deny</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url('admin_dashboard'); ?>" class="btn btn-primary">Back</a>

</body>
</html>
