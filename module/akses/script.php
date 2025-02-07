<?php
$general = filemtime("module/" . $page . "/script/general.js");
?>
<script src="module/<?= $page ?>/script/general.js?v=<?= $general ?>"></script>

<?php
if ($detail) {
} else {
    $getTable = filemtime("module/" . $page . "/script/getTable.js");
    $addEmployee = filemtime("module/" . $page . "/script/addEmployee.js");
    $deleteEmployee = filemtime("module/" . $page . "/script/deleteEmployee.js");
    echo "
    <script src='module/$page/script/getTable.js?v=$getTable'></script>
    <script src='module/$page/script/addEmployee.js?v=$addEmployee'></script>
    <script src='module/$page/script/deleteEmployee.js?v=$deleteEmployee'></script>
    ";
}

?>