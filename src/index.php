<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include "nav.php" ?>
    <!-- SIDEBAR -->

    <main class="main">
        <?php
        $page = $_GET['page'] ?? 'list';
        $allowed_pages = ['list', 'modify', 'sections', 'editsections'];
        if (in_array($page, $allowed_pages)) {
            include "pages/$page.php";
        } else {
            echo "<h2>Page not found</h2>";
        }
        ?>


    </main>
</body>

</html>