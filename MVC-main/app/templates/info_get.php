
<section class="container mt-5">
    <div class="card shadow-sm rounded p-4">
        <h1 class="text-center mb-4">Information Student </h1>

        <?php if (isset($data['student']) && mysqli_num_rows($data['student']) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($data['student'])): ?>
                <table class="table table-bordered">
                    <tr><th>ชื่อ</th><td><?= htmlspecialchars($row['first_name'] ?? '') ?></td></tr>
                    <tr><th>นามสกุล</th><td><?= htmlspecialchars($row['last_name'] ?? '') ?></td></tr>
                    <tr><th>Email</th><td><?= htmlspecialchars($row['email'] ?? '') ?></td></tr>
                    <tr><th>วันเกิด</th><td><?= htmlspecialchars($row['date_of_birth'] ?? '') ?></td></tr>
                    <tr><th>เบอร์โทรศัพท์</th><td><?= htmlspecialchars($row['phone_number'] ?? '') ?></td></tr>
                </table>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">No Data Available</p>
        <?php endif; ?>
    </div>
</section>

<section class="container mt-5">
    <div class="card shadow-sm rounded p-4">
        <h1 class="text-center mb-4">Registered Subjects</h1>


        <?php
        
        if (isset($data['course']) && mysqli_num_rows($data['course'])>0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>รหัสวิชา</th>
                        <th>ชื่อวิชา</th>
                        <th>อาจารย์ผู้สอน</th>
                        <th>วันที่ลงทะเบียน</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                foreach ($data['course'] as $course) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($course['course_code']) . "</td>";
                    echo "<td>" . htmlspecialchars($course['course_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($course['instructor']) . "</td>";
                    echo "<td>" . htmlspecialchars($course['enrollment_date']) . "</td>";
                    echo "<td>
                            <a href='course_delete?course_id=" . htmlspecialchars($course['course_id']) . "' 
                                class='btn btn-danger' 
                                onclick='return confirm(\"Do you want to drop this course??\");'>
                                Withdraw a course
                            </a>
                            </td>";
                    echo "</tr>";
                }
                ?>

                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">No Registered Subjects</p>
        <?php endif; ?>
    </div>
</section>
