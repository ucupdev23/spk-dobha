$("#editPosition").on("show.bs.modal", function (event) {
  let button = $(event.relatedTarget);
  let id = button.data("id");
  $.ajax({
    url: "module/" + page + editPosition,
    type: "POST",
    data: { id: id },
    success: function (response) {
      console.log(response);
      if (response.success) {
        let edit_position_id = response.position_id;
        let edit_division_id = response.division_id;
        let edit_position_name = response.position_name;

        $("#edit_position_id").val(edit_position_id);
        $("#edit_division_id").val(edit_division_id);
        $("#edit_position_name").val(edit_position_name);
        
        console.log("Division ID: " + edit_division_id);
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
