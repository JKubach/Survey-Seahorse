<html>
<?php
include_once 'res/session.php';
include_once 'config.php';
include 'res/navbar.php';

echo '<link rel="stylesheet" href="res/style.css">';
echo  '<div class="survey-directory">';

$date = date("Y-m-d");
$sql = "SELECT COUNT(*) FROM survey WHERE expiration_date >= '$date';";
$result = mysqli_query($connect, $sql);
$r = mysqli_fetch_row($result);
$number_rows = $r[0];
$rows_page = 3;
$total_pages = ceil($number_rows / $rows_page);

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (int) $_GET['page'];
} else {
    $page = 1;
}

$offset = ($page - 1) * $rows_page;
$sql = "SELECT * FROM survey WHERE expiration_date >= '$date' LIMIT $offset, $rows_page;";
$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $expire = $row['expiration_date'];
    $sid = $row['survey_id'];
    $title = $row['title'];
    $url = "takesurvey.php?sid=" . $sid;
    $qr = "res/qrgen.php?sid=" . $sid;
    echo "Survey ID: ", $row['survey_id'], "<br>";
    echo "Title: <a href='$url'> $title </a> <br>";
    echo "By: ", $row['author'], "<br>";
    echo "Description: ", $row['description'], "<br>";
    echo "Access code: ", $row['access_code'], "<br>";
    echo "<a href='$qr'> QR Code </a> <br><br>";
}

/* generate page links */

$range = 3;

if ($page > 1) {
   echo " <a href='{$_SERVER['PHP_SELF']}?page=1'><<</a> ";
   $prevpage = $page - 1;
   echo " <a href='{$_SERVER['PHP_SELF']}?page=$prevpage'><</a> ";
}

for ($x = ($page - $range); $x < (($page + $range) + 1); $x++) {
   if (($x > 0) && ($x <= $total_pages)) {
      if ($x == $page) {
         echo " [<b>$x</b>] ";
      } else {
         echo " <a href='{$_SERVER['PHP_SELF']}?page=$x'>$x</a> ";
      }
   }
}

if ($page != $total_pages) {
   $nextpage = $page + 1;
   echo " <a href='{$_SERVER['PHP_SELF']}?page=$nextpage'>></a> ";
   echo " <a href='{$_SERVER['PHP_SELF']}?page=$total_pages'>>></a> ";
}

exit();
?>
</div>
</html>
