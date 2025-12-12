<h2 class="text-3xl font-semibold mb-6">Available Courses</h2>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <!-- Course Card -->
    <?php
    require __DIR__ . '/../connect_db.php';
    // include './connect_db.php';
    $Courses = get_data_db();

    foreach ($Courses as $course) {

        echo '<div class="bg-grey rounded-lg shadow-md hover:shadow-xl transition overflow-hidden">
        <img src="./images/javascript-node-js-code.webp" alt="JavaScript" class="w-full h-48 object-cover">
        <div class="p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-2">' . htmlspecialchars($course['tittle']) . '</h3>
        <p class="text-gray-600 mb-2">' . htmlspecialchars($course['started_at']) . '</p>
        <p class="text-gray-800 font-semibold">' . htmlspecialchars($course['levelof']) . '</p>
        </div>
        
        <div class="card-actions">
        <a href="index.php?page=modify&id=' . htmlspecialchars($course['id']) . '" class="action-btn edit" title="Edit course" 
        class="action-btn edit"
        title="Edit course">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
        </svg>
        </a>
        <form method="POST" style="display:inline;">
        <input type="hidden" name="id" value="' . htmlspecialchars($course['id']) . '">
        <button type="submit" class="action-btn delete"
        onclick="return confirm("Are you sure you want to delete this course?")"
        
        title="Delete course">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
        <path d="M22 5a1 1 0 0 1-1 1H3a1 1 0 0 1 0-2h5V3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v1h5a1 1 0 0 1 1 1zM4.934 21.071 4 8h16l-.934 13.071a1 1 0 0 1-1 .929H5.931a1 1 0 0 1-.997-.929z" />
        </svg>
        </button>
        </form>
        
                                                </div>
                                                
                                                </div>';
    }
    ?>

</div>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    try {
        $cone = new PDO('mysql:host=mysql;dbname=mydb', 'root', 'roopasst');
        $del = $cone->prepare('DELETE FROM courses WHERE id = ?');
        $del->execute([$id]);


        echo '<script>window.location.href="/pages/list.php";</script>'; // avoids POST resubmission
        // echo '<script>window.location.reload();</script>';
        // header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } catch (PDOException $e) {
        print 'connection Failed' . $e->getMessage() . '<br>';
        die;
    }
}

?>