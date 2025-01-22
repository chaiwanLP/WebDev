<?php
include "data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 300px; 
            width: 100%;
            object-fit: contain;
        }

        .card {
            position: relative;
            overflow: hidden;
            border: 2px solid transparent;
            display: flex;
            flex-direction: column;
        }

        .card.selected {
            border-color: #007bff;
            background-color: rgba(0, 123, 255, 0.1);
        }

        .hidden-details {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height:70%;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 15px;
            text-align: left;
            z-index: 10;
            font-size: 0.9rem;
            overflow-y: auto;
        }

        .card:hover .hidden-details {
            display: block;
        }

        .card-body {
            padding: 10px;
        }

        .hidden-details h6, 
        .hidden-details p {
            margin: 0;
            padding: 5px 0;
        }

        .checkbox-container {
            margin-top: 10px;
            text-align: center;
            margin-bottom: 10px;
        }

        #compare-button-container {
            text-align: center;
            margin-top: 20px;
            display: none;
        }

        #compare-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        #compare-button:disabled {
            background-color: #cccccc;
            pointer-events: none;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Shop CS Mobile Midterm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="compare.php" id="compare-navbar-btn" style="display:none;">เปรียบเทียบ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <h1>Phone List :</h1>
        <div class="row">
            <?php
            foreach ($_SESSION['phones'] as $index => $phone) {
                echo '
                <div class="col-md-4 mb-3">
                    <div class="card" data-index="' . $index . '">
                        <a href="detail.php?id=' . urlencode($phone->id) . '" style="text-decoration: none; color: inherit;">
                            <img src="' . htmlspecialchars($phone->image) . '" class="card-img-top" alt="' . htmlspecialchars($phone->model) . '">
                            <div class="card-body text-center">
                                <h5 class="card-title">' . htmlspecialchars($phone->model) . '</h5>
                                <p class="card-text text-success">฿' . htmlspecialchars($phone->price) . '</p>
                            </div>
                        </a>
                        <div class="hidden-details">
                            <h6>Model: ' . htmlspecialchars($phone->model) . '</h6>
                            <p>CPU: ' . htmlspecialchars($phone->cpu) . '</p>
                            <p>RAM: ' . htmlspecialchars($phone->ram) . '</p>
                            <p>Screen Size: ' . htmlspecialchars($phone->screen) . '</p>
                            <p>Price: ฿' . htmlspecialchars($phone->price) . '</p>
                        </div>
                        <div class="checkbox-container">
                          <input type="checkbox" data-id="' . $phone->id . '"> select to compare
                        </div>

                    </div>
                </div>
                ';
            }          
            ?>
        </div>
    </div>
<!-- Content -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let selectedCards = [];
        let compareNavbarBtn = document.getElementById("compare-navbar-btn");

        function checkSelection(checkbox) {
            const phoneId = checkbox.getAttribute('data-id');
            const card = checkbox.closest('.card');

            if (checkbox.checked) {
                if (selectedCards.length >= 3) {
                    checkbox.checked = false;
                    alert('คุณสามารถเลือกเทียบเทียบได้สูงสุด 3 เครื่อง');
                } else {
                    selectedCards.push(phoneId);
                    card.classList.add('selected');
                }
            } else {
                selectedCards = selectedCards.filter(id => id !== phoneId);
                card.classList.remove('selected');
            }

            updateCompareButton();
        }

        function updateCompareButton() {
            if (compareNavbarBtn) {
                if (selectedCards.length > 1 && selectedCards.length <= 3) {
                    compareNavbarBtn.style.display = 'inline-block';
                    const compareUrl = 'compare.php?ids=' + selectedCards.join(',');
                    compareNavbarBtn.href = compareUrl;
                } else {
                    compareNavbarBtn.style.display = 'none';
                    alert("กรุณาเลือกโทรศัพท์อย่างน้อย 2 เครื่องสำหรับการเปรียบเทียบ.");
                }
            } else {
                console.error("compareNavbarBtn not found");
            }
        }

        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('click', function() {
                checkSelection(this);
            });
        });
    });
        
    </script>
</body>
</html>
