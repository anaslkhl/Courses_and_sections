  
  <?php
    try {
        $conn = new PDO('mysql:host=mysql;dbname=mydb','root', 'roopasst');
        // echo 'the connection is successful !';
    } catch (PDOException $conf) {
        print "Erreur : " . $conf->getMessage() . "<br/>";
        die;
    }
    ?>

    <?php 
    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        check_validation($_POST);
        $newCourseId = add_cours($conn);
        echo 'New course ID :' . $newCourseId;
    }
    
    ?>
  
  
  <?php
    function check_validation($arr)
    {
        if (!isset($_POST['title'])) {
            echo "the variable title is not found !";
        } else {
            echo 'your name is : ' . $arr['title'] . '</br>';
        }
        if (!isset($_POST['description'])) {
            echo "the variable description is not found !";
        } else {
            echo 'your description is : ' . $arr['description'] . '</br>';
        }
        if (!isset($_POST['option'])) {
            echo "the variable option is not found !";
        } else {
            echo 'your option is : ' . $arr['option'] . '</br>';
        }
        if (!isset($_POST['started_at'])) {
            echo "the variable started at is not found !";
        } else {
            echo 'your started at is : ' . $arr['started_at'] . '</br>';
        }
    }

    function add_cours($conn)
    {
        $title_input = $description_input = $started_at_input = $levelof_input = '';
        echo 'title ' . $_POST['title'] . '</br>';
        echo 'description ' . $_POST['description'] . '</br>';
        echo 'option ' . $_POST['option'] . '</br>';
        echo 'started at ' . $_POST['started_at'] . '</br>';

        // $id_input = trim($_POST['id']);
        $title_input = trim($_POST['title']);
        $description_input = trim($_POST['description']);
        $started_at_input = trim($_POST['started_at']);
        $levelof_input = trim($_POST['option']);
        if (empty($title_input)) {
            echo 'there is no title input !!' . '<br>';
        }
        if (empty($description_input)) {
            echo 'there is no description input' . '<br>';
        }
        if (empty($levelof_input)) {
            echo 'there is no option input' . '<br>';
        }
        if (empty($started_at_input)) {
            echo 'there is no url input' . '<br>';
        }

        $stmt = $conn->prepare("INSERT INTO courses (tittle,levelof,description,started_at ) VALUES (? , ? , ?, ?)");
        $success =  $stmt->execute([$title_input, $levelof_input, $description_input, $started_at_input]);

        if ($success) {
            $newCourseId = $conn->lastInsertId();
            echo 'Course added successfully ID :' . $newCourseId;
            return $newCourseId;
        }
    }

   




    ?>