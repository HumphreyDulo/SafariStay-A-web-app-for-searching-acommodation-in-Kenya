<!DOCTYPE html>
<html>

<head>
    <title>View Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?= $this->extend('admin_layout') ?>
    <?= $this->section('content') ?>

    <div class="container">
        <h2>View Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['firstname']; ?></td>
                        <td><?= $user['lastname']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['dob']; ?></td>
                        <td><?= $user['number']; ?></td>

                        <td>
                            <?php if ($user['role'] == 1): ?>
                                Vendor
                            <?php elseif ($user['role'] == 2): ?>
                                Customer
                            <?php else: ?>
                                Unknown
                            <?php endif; ?>
                        </td>
                        <td>
                            <form action="<?= base_url('admin/delete_user'); ?>" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="<?= base_url('admin_dashboard'); ?>" class="btn btn-primary">Back to Admin Dashboard</a>
    </div>
    <?= $this->endSection() ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
