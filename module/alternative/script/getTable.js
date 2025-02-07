let table_alternatif = $("#data_alternatif").DataTable({
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
    { data: "c1" },
    { data: "c2" },
    { data: "c3" },
    { data: "c4" },
    { data: "k1" },
    { data: "k2" },
    { data: "k3" },
    { data: "k4" },
    { data: "s1" },
    { data: "s2" },
    { data: "s3" },
    { data: "s4" },
  ],
});

let table_gap = $("#data_gap").DataTable({
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
    { data: "name" },
    { data: "c1" },
    { data: "c2" },
    { data: "c3" },
    { data: "c4" },
    { data: "k1" },
    { data: "k2" },
    { data: "k3" },
    { data: "k4" },
    { data: "s1" },
    { data: "s2" },
    { data: "s3" },
    { data: "s4" },
  ],
});
