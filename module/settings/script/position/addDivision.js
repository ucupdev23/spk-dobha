$("#savePositionButton").on("click", function () {
  let namaPosisi = $("#namaPosisi").val();
  let division_id = $("#division_id").val();

  if (namaPosisi === "" || division_id === "") {
    Swal.fire("Error", "Harap isi jabatan sebelum melanjutkan!", "error");
    return;
  }

  $.ajax({
    url: "module/" + page + addPosition,
    type: "POST",
    data: {
      namaPosisi: namaPosisi,
      division_id: division_id,
    },
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        $("#addPositionModal").modal("hide");
        resetModalInputss();
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
          text: response.message,
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

function resetModalInputss() {
  $("#namaPosisi").val("");
  $("#division_id").val("");
}
