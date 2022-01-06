<?php require_once 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Bookstore</title>
</head>

<body>
<?php
	$books = '';
	if (file_exists('books.json')) {
       	$booksJson = file_get_contents('books.json');
		$books = json_decode($booksJson, true);
    } else {
        $books = array();
    }

	if (isset($_GET['submit'])) {
		$search_term = $_GET['search'];
	
		$search_item = array();
		foreach ($books as $key => $book) {
			$title = $book['title'];
			if ($search_term == $title) {
				array_push($search_item, $book);
			}
		}
		$books = $search_item;
	}
?>

<a href="index.php"><h1> Home </h1></a>
<a href="create.php"><h1> Create </h1></a>

<h1 align = "center"> Showing all Books Record </h1>
<table align="center" border="2">
	<tr>
		<th> Id </th>
		<th> Title </th>
		<th> Author </th>
		<th> Pages </th>
		<th> Available </th>
		<th> Isbn </th>
		<th> Operation </th>
	</tr>
	<?php foreach ($books as $key => $book): ?>
	<tr>
		<td>
			<?php echo $book['id']; ?>
		</td>
		<td>
			<?php echo $book['title']; ?>
		</td>
		<td>
			<?php echo $book['author']; ?>
		</td>
		<td>
			<?php echo $book['pages']; ?>
		</td>
		<td>
			<?php echo isAvailable($book); ?>
		</td>
		<td>
			<?php echo $book['isbn']; ?>
		</td>
		<td>
            <a href="delete.php?id=<?php echo $key+1?>." onClick="javascript:return confirm('are you sure delete this?');">
                <button class="btn-delete"> Delete </button>
            </a>
        </td>
	</tr>
	<?php endforeach; ?>
</table>

<div style="margin-top: 20px; width: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
<form action="index.php" method="GET">
		<input name="search" type="text">
		<input name="submit" type="submit" value="Search">
</form>
</div>


</body>
</html>