$("#updateValue").click(function () {
  let edit_id = $("#edit_id").val();
  let edit_value = $("#edit_value").val();

  if (edit_value === "" || edit_id === "") {
    Swal.fire("Error", "Harap isi value sebelum melanjutkan!", "error");
    return;
  }

  let formData = {
    value: edit_value,
    id: edit_id,
  };

  $.ajax({
    url: "module/" + page + updateValue,
    type: "POST",
    data: formData,
    success: function (response) {
      console.log(response);
      if (response.success) {
        $("#editValue").modal("hide");
        Swal.fire({
          icon: "success",
          title: "Success",
          text: response.message,
          allowOutsideClick: false,
        }).then(function () {
          table_value.ajax.reload();
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
