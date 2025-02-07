let table_divisi = $("#data_divisi").DataTable({
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
  columns: [{ data: "no" }, { data: "name" }, { data: "action" }],
});
