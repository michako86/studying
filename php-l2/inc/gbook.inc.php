<?php
define('DB_HOST', 'localhost');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gbook');

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
/////////////////////////////////////////////////////////////

function claerStr($data){
    global $link;
    return mysqli_real_escape_string($link, trim(strip_tags($data)));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name = claerStr($_POST['name']);
    $email= claerStr($_POST['email']);
    $msg = claerStr($_POST['msg']);
    
    $sql = "INSERT INTO msgs(name, email, msg) 
                   VALUES ('$name', '$email', '$msg')
           ";
    
    mysqli_query($link, $sql) or die(mysqli_error($link));
    
    header('Location: '.$_SERVER['REQUEST_URI']);
    exit;
}

if(isset($_GET['del'])) {
    $del = abs((int)$_GET['del']);
    
    if($del) {
        $sql = "DELETE FROM msgs 
                    WHERE id=$del"
                ;
        mysqli_query($link, $sql) or die(mysqli_error($link));
    
        header('Location: '.$_SERVER['SCRIPT_NAME'].'?id=gbook');
        exit;
    }
    
}



?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<!-- Вывод записей из БД -->
<?php
$sql = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt
            FROM msgs
            ORDER by id DESC LIMIT 5";

$res = mysqli_query($link, $sql) or die(mysqli_error($link));
mysqli_close($link);
while($row = mysqli_fetch_assoc($res)) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $dt = date('d-m-Y H:i:s', $row['dt']);
    $msg = $row['msg'];
    
    echo <<<HTML
    <hr>
    <p>
    $name
            <br />
    $msg
    </p>
    <p align="right">
     <a href="{$_SERVER['REQUEST_URI']}&del=$id">Удалить</a>
    </p>
HTML;
}
?>
<!-- Вывод записей из БД -->
