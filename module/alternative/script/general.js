let queryString = window.location.search;
let params = new URLSearchParams(queryString);

let page = params.get("page");

let getTable = "/action/getTable.php";
let getTables = "/action/getTables.php";
let addAlternatif = "/action/addAlternatif.php";
