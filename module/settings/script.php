<?php
$general = filemtime("module/" . $page . "/script/general.js");
?>
<script src="module/<?= $page ?>/script/general.js?v=<?= $general ?>"></script>

<?php
if ($detail) {
} else {
    $getTable = filemtime("module/" . $page . "/script/division/getTable.js");
    $addDivision = filemtime("module/" . $page . "/script/division/addDivision.js");
    $editDivision = filemtime("module/" . $page . "/script/division/editDivision.js");
    $updateDivision = filemtime("module/" . $page . "/script/division/updateDivision.js");
    $deleteDivision = filemtime("module/" . $page . "/script/division/deleteDivision.js");
    $getTabless = filemtime("module/" . $page . "/script/position/getTable.js");
    $addPosition = filemtime("module/" . $page . "/script/position/addDivision.js");
    $editPosition = filemtime("module/" . $page . "/script/position/editDivision.js");
    $updatePosition = filemtime("module/" . $page . "/script/position/updateDivision.js");
    $deletePosition = filemtime("module/" . $page . "/script/position/deleteDivision.js");
    $getTables = filemtime("module/" . $page . "/script/value/getTable.js");
    $addValue = filemtime("module/" . $page . "/script/value/addValue.js");
    $editValue = filemtime("module/" . $page . "/script/value/editValue.js");
    $updateValue = filemtime("module/" . $page . "/script/value/updateValue.js");
    $deleteValue = filemtime("module/" . $page . "/script/value/deleteValue.js");
    echo "
    <script src='module/$page/script/division/getTable.js?v=$getTable'></script>
    <script src='module/$page/script/division/addDivision.js?v=$addDivision'></script>
    <script src='module/$page/script/division/editDivision.js?v=$editDivision'></script>
    <script src='module/$page/script/division/updateDivision.js?v=$updateDivision'></script>
    <script src='module/$page/script/division/deleteDivision.js?v=$deleteDivision'></script>
    <script src='module/$page/script/position/getTable.js?v=$getTabless'></script>
    <script src='module/$page/script/position/addDivision.js?v=$addPosition'></script>
    <script src='module/$page/script/position/editDivision.js?v=$editPosition'></script>
    <script src='module/$page/script/position/updateDivision.js?v=$updatePosition'></script>
    <script src='module/$page/script/position/deleteDivision.js?v=$deletePosition'></script>
    <script src='module/$page/script/value/getTable.js?v=$getTables'></script>
    <script src='module/$page/script/value/addValue.js?v=$addValue'></script>
    <script src='module/$page/script/value/editValue.js?v=$editValue'></script>
    <script src='module/$page/script/value/updateValue.js?v=$updateValue'></script>
    <script src='module/$page/script/value/deleteValue.js?v=$deleteValue'></script>
    ";
}

?>