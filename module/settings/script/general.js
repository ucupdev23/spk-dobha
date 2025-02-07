let queryString = window.location.search;
let params = new URLSearchParams(queryString);

let page = params.get("page");

let getTable = "/action/division/getTable.php";
let addDivision = "/action/division/addDivision.php";
let editDivision = "/action/division/editDivision.php";
let updateDivision = "/action/division/updateDivision.php";
let divisionDelete = "/action/division/deleteDivision.php";
let getTables = "/action/value/getTable.php";
let addValue = "/action/value/addValue.php";
let editValue = "/action/value/editValue.php";
let updateValue = "/action/value/updateValue.php";
let valueDelete = "/action/value/deleteValue.php";
let getTabless = "/action/position/getTable.php";
let addPosition = "/action/position/addDivision.php";
let editPosition = "/action/position/editDivision.php";
let updatePosition = "/action/position/updateDivision.php";
let positionDelete = "/action/position/deleteDivision.php";
