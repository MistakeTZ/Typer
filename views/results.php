<?php include 'layout.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo json_encode($_POST);

        require_once __DIR__ . '/../models/ResultModel.php';
        require_once __DIR__ . '/../models/TextModel.php';
    }
?>


<?php include 'footer.php' ?>