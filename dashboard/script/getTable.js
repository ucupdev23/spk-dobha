let table_final = $("#data_final").DataTable({
  serverSide: true,
  responsive: true,
  pagingType: "full_numbers",
  ajax: {
    url: "dashboard/" + getTable,
    type: "POST",
    data: function (d) {
      d.searchValue = d.search.value;
    },
  },
  columns: [{ data: "no" }, { data: "name" }, { data: "ha" }],
});
