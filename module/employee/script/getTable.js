let table_employees = $("#data_employees").DataTable({
  serverSide: true,
  responsive: true,
  pagingType: "full_numbers",
  ajax: {
    url: "module/" + page + getTable,
    type: "POST",
    data: function (d) {
      d.searchValue = d.search.value;
    },
  },
  columns: [
    { data: "no" },
    { data: "nip" },
    { data: "name" },
    { data: "division" },
    { data: "position" },
    { data: "action" },
  ],
});
