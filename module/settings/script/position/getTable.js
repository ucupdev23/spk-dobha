let table_posisi = $("#data_posisi").DataTable({
  serverSide: true,
  responsive: true,
  pagingType: "full_numbers",
  ajax: {
    url: "module/" + page + getTabless,
    type: "POST",
    data: function (d) {
      d.searchValue = d.search.value;
    },
  },
  columns: [
    { data: "no" },
    { data: "position_name" },
    { data: "division_name" },
    { data: "action" },
  ],
});
