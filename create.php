<?php


if (file_exists('books.json')) {
    $json = file_get_contents('books.json');
    $books = json_decode($json, true);
} else {
    $books = array();
}
$is_added = 0;
$pos = -1;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_add = array(
        "id" => end($books)['id']+1,
        "title" =>  $_POST['title'],
        "author" => $_POST['author'],
        "avilable" => $_POST['avilable'],
        "pages" => $_POST['pages'],
        "isbn" => $_POST['isbn'],
    );
    array_push($books, $new_add);
    $book_str = json_encode($books);
    file_put_contents('books.json', $book_str);
   
    $is_added = 1;
    $pos = sizeof($books);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php"><h1> Home </h1></a>
    <form method= "POST">
        <input type="text" placeholder="Title" name='title'>
        <br>
        <input type="text" placeholder="Author" name='author'>
        <br>
        <select id="inputState" class="form-control" name="avilable" required>
            <option value="true" Selected>True</option>
            <option value="false">False</option>
        </select>
        <br>
        <input type="text" placeholder="pages" name='pages'>
        <br>
        <input type="text" placeholder="isbn" name='isbn'>
        <br>
        <button type="submit" >Submit</button>
    </form>

</body>
</html>