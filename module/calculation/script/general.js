let queryString = window.location.search;
let params = new URLSearchParams(queryString);

let page = params.get("page");

let getTable = "/action/getTable.php";
let getEmployee = "/action/getEmployee.php";
let addValue = "/action/addValue.php";
