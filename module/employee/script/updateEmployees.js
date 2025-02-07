$("#updateEmployee").click(function () {
  let edit_id = $("#edit_id").val();
  let edit_name = $("#edit_name").val();
  let edit_email = $("#edit_email").val();
  let edit_nip = $("#edit_nip").val();
  let edit_division_id = $("#edit_division_id").val();

  if (
    edit_name === "" ||
    edit_email === "" ||
    edit_nip === "" ||
    edit_division_id === ""
  ) {
    Swal.fire("Error", "Harap isi semua kolom sebelum melanjutkan!", "error");
    return;
  }

  let formData = {
    id: edit_id,
    name: edit_name,
    email: edit_email,
    nip: edit_nip,
    division_id: edit_division_id,
  };

  $.ajax({
    url: "module/" + page + updateEmployee,
    type: "POST",
    data: formData,
    success: function (response) {
      console.log(response);
      if (response.success) {
        $("#editEmployee").modal("hide");
        Swal.fire({
          icon: "success",
          title: "Success",
          text: response.message,
          allowOutsideClick: false,
        }).then(function () {
          table_employees.ajax.reload();
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
