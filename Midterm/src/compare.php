<?php
include "data.php";

if (isset($_GET['ids'])) {
    $selectedIds = explode(',', $_GET['ids']);
    $selectedPhones = [];

    foreach ($_SESSION['phones'] as $phone) {
        if (in_array($phone->id, $selectedIds)) {
            $selectedPhones[] = $phone;
        }
    }

    if (empty($selectedPhones)) {
        echo "ยังไม่ได้เลือกโทรศัพท์สำหรับการเปรียบเทียบ กรุณาเลือกโทรศัพท์จากรายการ.";
        exit;
    }
} else {
    echo "ยังไม่ได้เลือกโทรศัพท์สำหรับการเปรียบเทียบ กรุณาเลือกโทรศัพท์จากรายการ.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare Phones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .phone-image {
            height: 150px;
            object-fit: contain;
        }
        .table td {
            padding: 10px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Compare Phones (<?= count($selectedPhones) ?> phones selected)</h1>

        <?php if (count($selectedPhones) > 1): ?>
            <table class="table table-bordered" style="border-color:black;">
                <thead class="table-light">
                    <tr>
                        <th>Property</th>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <th><?= htmlspecialchars($phone->model) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Image</td>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <td>
                                <img src="<?= htmlspecialchars($phone->image) ?>" alt="<?= htmlspecialchars($phone->model) ?>" class="phone-image">
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>CPU</td>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <td><?= htmlspecialchars($phone->cpu) ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>RAM</td>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <td><?= htmlspecialchars($phone->ram) ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>Camera</td>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <td><?= htmlspecialchars($phone->camera ?? 'N/A') ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>Screen Size</td>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <td><?= htmlspecialchars($phone->screen) ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>Resolution</td>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <td><?= htmlspecialchars($phone->size ?? 'N/A') ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>Battery</td>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <td><?= htmlspecialchars($phone->battery ?? 'N/A') ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>Sound and Video</td>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <td><?= htmlspecialchars($phone->image_video ?? 'N/A') ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <?php foreach ($selectedPhones as $phone): ?>
                            <td class="text-success">฿<?= htmlspecialchars($phone->price) ?></td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                You need to select at least two phones for comparison.
            </div>
        <?php endif; ?>

        <a href="index.php " class="btn btn-primary">Back to Phone List</a>
    </div>
</body>
</html>