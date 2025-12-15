<?php


try {

    $con = new PDO('mysql:host=mysql;dbname=mydb;', 'root', 'roopasst');
} catch (PDOException $err) {
    die('Error ' . $err->getMessage() . '<br>');
}


$query = $con->query('SELECT * FROM courses ORDER BY tittle');
$courses = $query->fetchAll(PDO::FETCH_ASSOC);
$id = $_REQUEST['id'] ?? null;
$action = $_REQUEST['action'] ?? null;


if ($action === "delete") {
    $stm = $con->prepare('DELETE FROM sections WHERE id = ?');
    $stm->execute([$id]);
    echo '<script>
            alert("Section Deleted successfully!");
            window.location.href = "/index.php?page=sections";
          </script>';
    exit;
}
$course = null;
if ($id && $action === 'edit') {
    $stmt = $con->prepare('SELECT * FROM sections WHERE id = ?');
    $stmt->execute([$id]);
    $section = $stmt->fetch(PDO::FETCH_ASSOC);
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $course_id = $_POST['course_id'] ?: null;
    $position = $_POST['position'] ?? 1;
    $started_at = $_POST['started_at'] ?? date('Y-m-d');
    include "form_validation.php";


    if (check_validation_section($_POST)) {

        echo '<p style="color: red">Validation Failed !</p>';
    } else {

        if ($_POST['id']) {

            $add = $con->prepare('UPDATE sections SET title=? , content=? , course_id=? , position=? , started_at=? WHERE id=?');
            $add->execute([$title, $content, $course_id, $position, $started_at, $_POST['id']]);
            echo '<script>alert("Section Updated successfully!"); window.location.href="/index.php?page=sections";</script>';

            exit;
        } else {
            $add = $con->prepare('INSERT INTO sections (title, content, course_id, position, started_at) VALUES (?, ?, ?, ?, ?)');
            $add->execute([$title, $content, $course_id, $position, $started_at]);
            echo '<script>alert("Section Added successfully!"); window.location.href="/index.php?page=sections";</script>';
            exit;
        }
    }
}


?>



<form method="POST">

    <input type="hidden" name="id" value="<?= $section['id'] ?? '' ?>">

    <div class="form-group">
        <label>Section Title</label>
        <input
            type="text"
            name="title"
            required
            value="<?= $section['title'] ?? '' ?>"
            placeholder="Enter section title">
    </div>

    <div class="form-group">
        <label>Content</label>
        <textarea
            name="content"
            placeholder="Section content or summary"><?= $section['content'] ?? '' ?></textarea>
    </div>

    <div class="form-group">
        <label>Attach to Course (optional)</label>
        <select name="course_id">
            <option value="">No course (available section)</option>

            <?php


            foreach ($courses as $course): ?>
                <option
                    value="<?= $course['id'] ?>"
                    <?= (isset($section['course_id']) && $section['course_id'] == $course['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($course['tittle']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Position</label>
        <input
            type="number"
            name="position"
            min="1"
            value="<?= $section['position'] ?? 1 ?>">
    </div>

    <div class="form-group">
        <label>Started At</label>
        <input
            type="date"
            name="started_at"
            value="<?= $section['started_at'] ?? '' ?>">
    </div>

    <button type="submit">
        <?= isset($section['id']) ? 'update' : 'add' ?>
    </button>

</form>



<style>
    /* ===== Section Form ===== */

    form {
        width: 600px;
        margin: 40px auto;
        padding: 28px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    /* Group */
    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    /* Labels */
    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 6px;
    }

    /* Inputs */
    .form-group input,
    .form-group textarea,
    .form-group select {
        padding: 11px 12px;
        font-size: 14px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    /* Textarea */
    .form-group textarea {
        min-height: 120px;
        resize: vertical;
    }

    /* Focus */
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
    }

    /* Select disabled option */
    select option[value=""] {
        color: #9ca3af;
    }

    /* Submit button */
    button[type="submit"] {
        width: 100%;
        padding: 13px;
        font-size: 15px;
        font-weight: 600;
        background-color: #6366f1;
        color: #ffffff;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    /* Hover / Active */
    button[type="submit"]:hover {
        background-color: #4f46e5;
    }

    button[type="submit"]:active {
        transform: scale(0.98);
    }

    /* Mobile */
    @media (max-width: 640px) {
        form {
            margin: 20px;
            padding: 22px;
        }
    }
</style>