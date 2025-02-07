let table_value = $("#data_value").DataTable({
  serverSide: true,
  responsive: true,
  pagingType: "full_numbers",
  ajax: {
    url: "module/" + page + getTables,
    type: "POST",
    data: function (d) {
      d.searchValue = d.search.value;
    },
  },
  columns: [
    { data: "no" },
    { data: "code" },
    { data: "name" },
    { data: "category_id" },
    { data: "value" },
    { data: "label" },
    { data: "action" },
  ],
});
