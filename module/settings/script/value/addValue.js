$("#saveValueButton").on("click", function () {
  let code = $("#code").val();
  let name = $("#name").val();
  let category_id = $("#category_id").val();
  let value = $("#value").val();
  let label = $("#label").val();

  if (
    code === "" ||
    name === "" ||
    category_id === "" ||
    value === "" ||
    label === ""
  ) {
    Swal.fire("Error", "Harap isi semua kolom sebelum melanjutkan!", "error");
    return;
  }

  $.ajax({
    url: "module/" + page + addValue,
    type: "POST",
    data: {
      code: code,
      name: name,
      category_id: category_id,
      value: value,
      label: label,
    },
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        $("#addValueModal").modal("hide");
        resetModalInputs();
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
    error: function (xhr, status, error) {
      console.error("Error saving employee:", error);
      alert("Error: " + error);
    },
  });
});

function resetModalInputs() {
  $("#code").val("");
  $("#name").val("");
  $("#category_id").val("");
  $("#value").val("");
  $("#label").val("");
}
