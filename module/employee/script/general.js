let queryString = window.location.search;
let params = new URLSearchParams(queryString);

let page = params.get("page");

let getTable = "/action/getTable.php";
let getDivision = "/action/getDivision.php";
let getPosition = "/action/getPosition.php";
let addEmployee = "/action/addEmployee.php";
let editEmployee = "/action/editEmployee.php";
let updateEmployee = "/action/updateEmployee.php";
let deleteEmployees = "/action/deleteEmployee.php";
