function loadEmployees() {
  $.ajax({
    url: "module/" + page + getEmployee,
    type: "GET",
    dataType: "json",
    success: function (data) {
      let select = $("#namaKaryawan");
      select.empty();
      select.append('<option value="">Select Employee</option>');
      $.each(data, function (index, employee) {
        select.append(
          '<option value="' + employee.id + '">' + employee.name + "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Error fetching employees:", error);
    },
  });
}

$("#addHitungModal").on("show.bs.modal", function () {
  loadEmployees();
});

$("#saveHitungButton").on("click", function () {
  let employee_id = $("#namaKaryawan").val();

  if (employee_id === "") {
    Swal.fire(
      "Error",
      "Harap pilih nama karyawan sebelum melanjutkan!",
      "error"
    );
    return;
  }

  $.ajax({
    url: "module/" + page + addValue,
    type: "POST",
    data: {
      employee_id: employee_id,
    },
    dataType: "json",
    success: function (response) {
      if (response.success) {
        $("#addHitungModal").modal("hide");
        resetModalInputs();
        Swal.fire({
          icon: "success",
          title: "Success",
          text: response.message,
          allowOutsideClick: false,
        }).then(function () {
          table_calculation.ajax.reload();
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

function resetModalInputs() {
  $("#namaKaryawan").val("");
}
