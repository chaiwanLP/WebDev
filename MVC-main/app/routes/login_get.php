<?php

declare(strict_types=1);
if(isset($_SESSION['student_id'])) {
    header("Location: home");
    exit();
}
renderView('login_get');