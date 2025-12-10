    <?php


    function get_data_db()
    {

        $server_name = "mysql";
        $user_name = "root";
        $db_name = "mydb";
        $db_password = "roopasst";

        try {
            $dbcon = new PDO('mysql:host=mysql;dbname=mydb', $user_name, $db_password);
            // echo 'the connection is successful !';
        } catch (PDOException $conf) {
            print "Erreur : " . $conf->getMessage() . "<br/>";
            die;
        }

        $query = $dbcon->query('SELECT * FROM cours');
        return  $query->fetchAll(PDO::FETCH_ASSOC);
    }

    ?>