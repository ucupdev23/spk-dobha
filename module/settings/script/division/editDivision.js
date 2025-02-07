$("#editDivision").on("show.bs.modal", function (event) {
  let button = $(event.relatedTarget);
  let id = button.data("id");
  $.ajax({
    url: "module/" + page + editDivision,
    type: "POST",
    data: { id: id },
    success: function (response) {
      console.log(response);
      if (response.success) {
        let edit_division_id = response.division_id;
        let edit_division_name = response.division_name;

        $("#edit_division_id").val(edit_division_id);
        $("#edit_division_name").val(edit_division_name);
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: response.error,
          allowOutsideClick: false,
        });
        console.log(response);
      }
    },
    error: function (xhr, status, error) {
      Swal.fire("Error", "An error occurred while fetching data.", "error");
      console.log(xhr, status, error);
    },
  });
});
