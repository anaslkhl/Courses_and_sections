<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['id'])) {
        die('Course ID missing');
    }
    $id = intval($_POST['id']);

    try {
        $cone = new PDO('mysql:host=mysql;dbname=mydb', 'root', 'roopasst');
        $del = $cone->prepare('DELETE FROM courses WHERE id = ?');
        $del->execute([$id]);
        header("Location: list.php");
        exit;
    } catch (PDOException $e) {
        print 'connection Failed' . $e->getMessage() . '<br>';
        die;
    }
}
?>