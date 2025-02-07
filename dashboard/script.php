<?php
$general = filemtime("dashboard/script/general.js");
?>
<script src="dashboard/script/general.js?v=<?= $general ?>"></script>

<?php
if ($detail) {
} else {
    $getTable = filemtime("dashboard/script/getTable.js");
    echo "
    <script src='dashboard/script/getTable.js?v=$getTable'></script>
    ";
}

?>