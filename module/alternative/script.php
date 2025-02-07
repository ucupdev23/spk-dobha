<?php
$general = filemtime("module/" . $page . "/script/general.js");
?>
<script src="module/<?= $page ?>/script/general.js?v=<?= $general ?>"></script>

<?php
if ($detail) {
} else {
    $getTable = filemtime("module/" . $page . "/script/getTable.js");
    $addAlternatif = filemtime("module/" . $page . "/script/addAlternatif.js");
    echo "
    <script src='module/$page/script/getTable.js?v=$getTable'></script>
    <script src='module/$page/script/addAlternatif.js?v=$addAlternatif'></script>
    ";
}

?>