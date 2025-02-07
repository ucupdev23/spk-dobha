$("#saveDivisionButton").on("click", function () {
  let namaDivisi = $("#namaDivisi").val();

  if (namaDivisi === "") {
    Swal.fire("Error", "Harap isi divisi sebelum melanjutkan!", "error");
    return;
  }

  $.ajax({
    url: "module/" + page + addDivision,
    type: "POST",
    data: {
      namaDivisi: namaDivisi,
    },
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        $("#addDivisionModal").modal("hide");
        resetModalInputs();
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
    error: function (xhr, status, error) {
      console.error("Error saving employee:", error);
      alert("Error: " + error);
    },
  });
});

function resetModalInputs() {
  $("#namaDivisi").val("");
}
