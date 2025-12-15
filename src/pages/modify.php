<?php
$user_name = "root";
$db_password = "roopasst";


$conn = new PDO('mysql:host=mysql;dbname=mydb', $user_name, $db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$course = null;
if (isset($_GET['id']) && (is_numeric($_GET['id']))) {
    $statm = $conn->prepare('SELECT * FROM courses WHERE id = ?');
    $statm->execute([$_GET['id']]);
    $course = $statm->fetch(PDO::FETCH_ASSOC);

    if (!$course) {
        die('Course not found !');
    };
}

?>

<style>
    form {
        width: 550px;
        margin: 40px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Group wrapper */
    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 18px;
    }

    /* Labels */
    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
    }

    /* Inputs, textarea, select */
    .form-group input,
    .form-group textarea,
    .form-group select {
        padding: 10px 12px;
        font-size: 14px;
        border-radius: 6px;
        border: 1px solid #ccc;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    /* Textarea */
    .form-group textarea {
        min-height: 100px;
        resize: vertical;
    }

    /* Focus effect */
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.15);
    }

    /* Submit button */
    button[type="submit"] {
        width: 100%;
        padding: 12px;
        font-size: 15px;
        font-weight: 600;
        background-color: #4f46e5;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.1s;
    }

    /* Hover + active */
    button[type="submit"]:hover {
        background-color: #4338ca;
    }

    button[type="submit"]:active {
        transform: scale(0.98);
    }

    /* Disabled select option */
    select option[disabled] {
        color: #999;
    }

    /* Responsive */
    @media (max-width: 600px) {
        form {
            margin: 20px;
            padding: 20px;
        }
    }
</style>

<form method="POST">
    <input type="hidden" name="id" value="<?= $course['id'] ?? '' ?>">

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="<?= $course['title'] ?? '' ?>" placeholder="Enter a title">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="description"><?= $course['description'] ?? '' ?></textarea>
    </div>

    <div class="form-group">
        <label>Level</label>
        <select name="levelof">
            <option disabled>Select one</option>
            <option <?= (isset($course['levelof']) && $course['levelof'] == 'Débutant') ? 'selected' : '' ?>>Débutant</option>
            <option <?= (isset($course['levelof']) && $course['levelof'] == 'Intermédiaire') ? 'selected' : '' ?>>Intermédiaire</option>
            <option <?= (isset($course['levelof']) && $course['levelof'] == 'Avancé') ? 'selected' : '' ?>>Avancé</option>
        </select>
    </div>

    <div class="form-group">
        <label>Started at</label>
        <input type="date" name="started_at" value="<?= $course['started_at'] ?? '' ?>">
    </div>

    <button type="submit" name="action" value="<?= isset($course['id']) ? 'update' : 'add' ?>">
        <?= isset($course['id']) ? 'Update' : 'Add' ?>
    </button>
</form>


<?php


include('form_validation.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty(check_validation($_POST))) {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
    } else {
        $id = $_POST['id'] ?? null;
        $tittle = $_POST['title'];
        $levelof = $_POST['levelof'];
        $description = $_POST['description'];
        $started_at = $_POST['started_at'];
        if ($id) {

            $stmt = $conn->prepare("UPDATE courses SET tittle=?, levelof=?, description=?, started_at=? WHERE id=?");
            $stmt->execute([$tittle, $levelof, $description, $started_at, $id]);
            echo "Course updated successfully!";
        } else {
            $stmt = $conn->prepare("INSERT INTO courses (tittle, levelof, description, started_at) VALUES (?, ?, ?, ?)");
            $stmt->execute([$tittle, $levelof, $description, $started_at]);
            echo "Course added successfully!";
        }
    }
}
?>




<!-- 
add_cours($_POST); -->



<?php


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $id = $_POST['id'];
//     $tittle = $_POST['title'];
//     $levelof = $_POST['levelof'];
//     $description = $_POST['description'];
//     $started_at = $_POST['started_at'];

//     $result = update_course($connec, $id, $tittle, $levelof, $decription, $started_at);

//     if ($result) {
//         echo 'Course updated successfully ';
//     } else {
//         echo 'Update failed !';
//     }
// }



// function update_course($connec, $id, $title, $levelof, $description, $started_at)
// {

//     if (empty($id) || empty($title) || empty($levelof) || empty($description) || empty($started_at)) {
//         echo 'Invalid input !! try to fill the inputs' . '<br>';
//         return;
//     }

//     try {
//         $statm = $connec->prepare('UPDATE courses SET tittle = ?, levelof = ?, description = ?, started_at = ?');
//         $success = $statm->execute([$title, $levelof, $description, $started_at]);
//         if (!$success) {
//             echo 'Update failed !';
//             return false;
//         }
//     } catch (PDOException $err) {
//         echo 'Error' . $err->getMessage() . '<br>';
//         die;
//     }
// }

?>
<?php
// function add_cours($conn)
// {
//     $title_input = $description_input = $started_at_input = $levelof_input = '';
//     echo 'title ' . $_POST['title'] . '</br>';
//     echo 'description ' . $_POST['description'] . '</br>';
//     echo 'option ' . $_POST['levelof'] . '</br>';
//     echo 'started at ' . $_POST['started_at'] . '</br>';

//     // $id_input = trim($_POST['id']);
//     $title_input = trim($_POST['title']);
//     $description_input = trim($_POST['description']);
//     $started_at_input = trim($_POST['started_at']);
//     $levelof_input = trim($_POST['levelof']);
//     if (empty($title_input)) {
//         echo 'there is no title input !!' . '<br>';
//     }
//     if (empty($description_input)) {
//         echo 'there is no description input' . '<br>';
//     }
//     if (empty($levelof_input)) {
//         echo 'there is no option input' . '<br>';
//     }
//     if (empty($started_at_input)) {
//         echo 'there is no url input' . '<br>';
//     }

//     $stmt = $conn->prepare("INSERT INTO courses (tittle,levelof,description,started_at ) VALUES (? , ? , ?, ?)");
//     $success =  $stmt->execute([$title_input, $levelof_input, $description_input, $started_at_input]);

//     if ($success) {
//         $newCourseId = $conn->lastInsertId();
//         echo 'Course added successfully ID :' . $newCourseId;
//         return $newCourseId;
//     }
// }

?>