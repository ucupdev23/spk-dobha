function loadDivisions() {
  $.ajax({
    url: "module/" + page + getDivision,
    type: "GET",
    dataType: "json",
    success: function (data) {
      let select = $("#divisiKaryawan");
      select.empty();
      select.append('<option value="">Pilih Divisi</option>');
      $.each(data, function (index, division) {
        select.append(
          '<option value="' +
            division.division_id +
            '">' +
            division.division_name +
            "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Error fetching divisions:", error);
    },
  });
}

function loadPositions(divisionId) {
  $.ajax({
    url: "module/" + page + getPosition,
    type: "GET",
    dataType: "json",
    data: { division_id: divisionId },
    success: function (data) {
      let select = $("#posisiKaryawan");
      select.empty();
      select.append('<option value="">Pilih Jabatan</option>');
      $.each(data, function (index, position) {
        select.append(
          '<option value="' +
            position.position_id +
            '">' +
            position.position_name +
            "</option>"
        );
      });
    },
    error: function (xhr, status, error) {
      console.error("Error fetching positions:", error);
    },
  });
}

$("#divisiKaryawan").on("change", function () {
  let divisionId = $(this).val();
  if (divisionId) {
    loadPositions(divisionId);
  } else {
    $("#posisiKaryawan").empty();
    $("#posisiKaryawan").append('<option value="">Pilih Jabatan</option>');
  }
});

$("#addKaryawanModal").on("show.bs.modal", function () {
  loadDivisions();
});

$("#saveKaryawanButton").on("click", function () {
  let namaKaryawan = $("#namaKaryawan").val();
  let emailKaryawan = $("#emailKaryawan").val();
  let nipKaryawan = $("#nipKaryawan").val();
  let divisiKaryawan = $("#divisiKaryawan").val();
  let posisiKaryawan = $("#posisiKaryawan").val();

  if (
    namaKaryawan === "" ||
    emailKaryawan === "" ||
    nipKaryawan === "" ||
    divisiKaryawan === "" ||
    posisiKaryawan === ""
  ) {
    Swal.fire("Error", "Harap isi semua kolom sebelum melanjutkan!", "error");
    return;
  }

  $.ajax({
    url: "module/" + page + addEmployee,
    type: "POST",
    data: {
      namaKaryawan: namaKaryawan,
      emailKaryawan: emailKaryawan,
      nipKaryawan: nipKaryawan,
      divisiKaryawan: divisiKaryawan,
      posisiKaryawan: posisiKaryawan,
    },
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        $("#addKaryawanModal").modal("hide");
        resetModalInputs();
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
  $("#emailKaryawan").val("");
  $("#nipKaryawan").val("");
  $("#divisiKaryawan").val("");
  $("#posisiKaryawan").val("");
}
