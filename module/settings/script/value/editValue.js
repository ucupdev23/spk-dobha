$("#editValue").on("show.bs.modal", function (event) {
  let button = $(event.relatedTarget);
  let id = button.data("id");
  $.ajax({
    url: "module/" + page + editValue,
    type: "POST",
    data: { id: id },
    success: function (response) {
      console.log(response);
      if (response.success) {
        let edit_id = response.id;
        let edit_code = response.code;
        let edit_name = response.name;
        let edit_category_id = response.category_id;
        let edit_value = response.value;
        let edit_label = response.label;

        $("#edit_id").val(edit_id);
        $("#edit_code").val(edit_code);
        $("#edit_name").val(edit_name);
        $("#edit_category_id").val(edit_category_id);
        $("#edit_value").val(edit_value);
        $("#edit_label").val(edit_label);
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
