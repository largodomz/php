<?php
require_once "pdo.php";
if ( isset($_POST['make']) && isset($_POST['year']) 
     && isset($_POST['mileage'])) {
    $sql = "INSERT INTO users (make, year, mileage) 
              VALUES (:make, :year, :mileage)";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage']));
}
$stmt = $pdo->query("SELECT make, year, mileage FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <?php require_once "bootstrap.php"; ?>
</head>

<body>

<div class="container">
    <table border="1">
<?php
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo($row['make']);
    echo("</td><td>");
    echo($row['year']);
    echo("</td><td>");
    echo($row['mileage']);
    echo("</td></tr>\n");
}
?>
</table>

</body>