  <?php 
    function check_validation($arr){
        if(!isset($_POST['title'])){
        echo "the variable title is not found !";
    }
    else{
        echo 'your name is : ' . $arr['title'] . '</br>';
    }
    if(!isset($_POST['description'])){
        echo "the variable description is not found !";
    }
    else{
        echo 'your description is : ' . $arr['description'] . '</br>';
    }
    if(!isset($_POST['option'])){
        echo "the variable option is not found !";
    }
    else{
        echo 'your option is : ' . $arr['option'] . '</br>';
    }if(!isset($_POST['url'])){
        echo "the variable url is not found !";
    }
    else{
        echo 'your url is : ' . $arr['url'] . '</br>';
    }
    }


  
    ?>