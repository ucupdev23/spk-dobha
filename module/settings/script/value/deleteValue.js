function deleteValue(id) {
  Swal.fire({
    title: "Delete Confirmation",
    text: "Are you sure you want to delete this record?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Delete",
    cancelButtonText: "Cancel",
    allowOutsideClick: false,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "module/" + page + valueDelete,
        type: "POST",
        data: { id: id },
        success: function (response) {
          console.log(response);
          if (response.success) {
            Swal.fire({
              title: "Success",
              text: response.message,
              icon: "success",
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
        error: function (xhr, status, error) {
          Swal.fire(
            "Error",
            "An error occurred while deleting the record.",
            "error"
          );
        },
      });
    }
  });
}
