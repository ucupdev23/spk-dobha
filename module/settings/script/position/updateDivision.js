$("#updatePosition").click(function () {
  let edit_position_id = $("#edit_position_id").val();
  let edit_division_id = $("#edit_division_id").val();
  let edit_position_name = $("#edit_position_name").val();

  if (
    edit_position_name === "" ||
    edit_division_id === "" ||
    edit_position_id === ""
  ) {
    Swal.fire("Error", "Harap isi divisi sebelum melanjutkan!", "error");
    return;
  }

  let formData = {
    position_name: edit_position_name,
    division_id: edit_division_id,
    position_id: edit_position_id,
  };

  $.ajax({
    url: "module/" + page + updatePosition,
    type: "POST",
    data: formData,
    success: function (response) {
      console.log(response);
      if (response.success) {
        $("#editPosition").modal("hide");
        Swal.fire({
          icon: "success",
          title: "Success",
          text: response.message,
          allowOutsideClick: false,
        }).then(function () {
          table_posisi.ajax.reload();
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: response.error,
          allowOutsideClick: false,
        });
      }
    },
    error: function (error) {
      console.log(error);
    },
  });
});
