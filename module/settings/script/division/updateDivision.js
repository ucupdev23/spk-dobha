$("#updateDivision").click(function () {
  let edit_division_id = $("#edit_division_id").val();
  let edit_division_name = $("#edit_division_name").val();

  if (edit_division_name === "" || edit_division_id === "") {
    Swal.fire("Error", "Harap isi divisi sebelum melanjutkan!", "error");
    return;
  }

  let formData = {
    division_name: edit_division_name,
    division_id: edit_division_id,
  };

  $.ajax({
    url: "module/" + page + updateDivision,
    type: "POST",
    data: formData,
    success: function (response) {
      console.log(response);
      if (response.success) {
        $("#editDivision").modal("hide");
        Swal.fire({
          icon: "success",
          title: "Success",
          text: response.message,
          allowOutsideClick: false,
        }).then(function () {
          table_divisi.ajax.reload();
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
