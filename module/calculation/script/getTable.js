let table_calculation = $("#data_calculation").DataTable({
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
    { data: "cf1" },
    { data: "sf1" },
    { data: "nkc" },
    { data: "cf2" },
    { data: "sf2" },
    { data: "nk" },
    { data: "cf3" },
    { data: "sf3" },
    { data: "nsk" },
  ],
});
