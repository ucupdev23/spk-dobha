let table_final_result = $("#data_final_result").DataTable({
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
    { data: "name" },
    { data: "nkc" },
    { data: "nk" },
    { data: "nsk" },
    { data: "ha" },
  ],
});
