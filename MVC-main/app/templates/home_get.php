<section>
    <h1>Home</h1>
    <?php
    if (isset($data['student'])) {
        while ($row = $data['student']->fetch_object()) {
    ?>
            <?= $row->first_name ?>
            <?= $row->last_name ?>
    <?php
        }
    }
    ?>
</section>