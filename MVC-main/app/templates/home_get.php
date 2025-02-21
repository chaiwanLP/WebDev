<section class="container mt-5">
    <div class="card shadow-sm rounded p-4">
        <h1 class="text-center mb-4">Welcome to Students Portal</h1>

        <?php
        if (isset($data['student'])) {
            while ($row = $data['student']->fetch_object()) {
        ?>
                <div class="mb-3">
                    <h3>Welcome <?= $row->first_name ?> <?= $row->last_name ?></h3>
                </div>
        <?php
        }
        }
        ?>
    </div>
</section>
