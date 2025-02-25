<?php
$courses = getAllCourses();

?>

<section class="container mt-5">
    <div class="card shadow-sm rounded p-4">
        <h1 class="text-center mb-4">Subjects</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>รหัสวิชา</th>
                    <th>ชื่อวิชา</th>
                    <th>อาจารย์ผู้สอน</th>
                    <th>การดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($courses->num_rows > 0) {
                    while ($row = $courses->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($row['course_code']) ?></td>
                            <td><?= htmlspecialchars($row['course_name']) ?></td>
                            <td><?= htmlspecialchars($row['instructor']) ?></td>
                            <td>
                                <a href="regiscourses?course_id=<?= urlencode($row['course_id']) ?>" class="btn btn-primary">ลงทะเบียน</a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>ไม่มีข้อมูลวิชา</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
