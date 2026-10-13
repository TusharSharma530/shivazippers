<?php
    $eventssql = mysqli_query($con, "SELECT * FROM `gallery` WHERE status=1 ORDER BY id DESC");
?>