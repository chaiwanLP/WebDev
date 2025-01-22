<?php
include "data.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $phone = null;
    foreach ($_SESSION['phones'] as $item) {
        if ($item->id == $id) {
            $phone = $item;
            break;
        }
    }
    // phone ->เข้าถึงคุณสมบัติ
    if ($phone) {
        echo '
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Phone Detail</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                .container {
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                }
                .details {
                    width: 60%;
                }
                .image {
                    width: 35%;
                    text-align: center;
                }
                .image img {
                    max-width: 100%;
                    height: auto;
                }
                .price {
                    font-size: 1.5rem;
                    font-weight: bold;
                    color: #28a745;
                    margin-top: 20px;
                }
                .container {
                    margin-bottom: 30px;
                }
            </style>
        </head>
        <body>
            <div class="container mt-4">
            <div class="image">
            <img src="' . htmlspecialchars($phone->image) . '" alt="' . htmlspecialchars($phone->model) . '">
            </div>
            
            <div class="details">
            <h2 class="mb-5">รายละเอียดโทรศัพท์</h2>
                    <p class="mb-2"><strong>Model:</strong> ' . htmlspecialchars($phone->model) . '</p>
                    <p class="mb-2"><strong>CPU:</strong> ' . htmlspecialchars($phone->cpu) . '</p>
                    <p class="mb-2"><strong>RAM:</strong> ' . htmlspecialchars($phone->ram) . '</p>
                    <p class="mb-2"><strong>Screen Size:</strong> ' . htmlspecialchars($phone->screen) . ' inches</p>
                    <p class="mb-2"><strong>Resulution:</strong> ' . htmlspecialchars($phone->size) . '</p>
                    <p class="mb-2"><strong>Camera:</strong> ' . htmlspecialchars($phone->camera) . ' MP</p>
                    <p class="mb-2"><strong>Battery:</strong> ' . htmlspecialchars($phone->battery) . ' mAh</p>
                    <p class="mb-2"><strong>Sound and Video:</strong> ' . htmlspecialchars($phone->image_video) . '</p>
                    <p class="mb-2 price">ราคา: ฿' . htmlspecialchars($phone->price) . '</p>

                    </div>
            </div>
            <a href="index.php" class="btn btn-primary mt-3 "style = "margin-left:20%   ;">กลับไปยังหน้าหลัก</a>


        </body>
        </html>
        ';
    } else {
        echo '<p>โทรศัพท์ที่เลือกไม่พบ</p>';
    }
} else {
    echo '<p>ไม่มีข้อมูลที่เลือก</p>';
}
?>
