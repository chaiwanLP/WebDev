<?php

declare(strict_types=1);

function renderView(string $template, array $data = []): void
{
    include COMPONENTS_DIR . '/nav.php';
    include COMPONENTS_DIR . '/' . $template . '.php';
    include COMPONENTS_DIR . '/footer.php';
}