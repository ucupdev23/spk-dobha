$(document).ready(function () {
  $("#namaKaryawan").autocomplete({
    source: function (request, response) {
      $.ajax({
        url: "module/" + page + "/action/getUsers.php", // File PHP yang akan menangani pencarian
        type: "POST",
        dataType: "json",
        data: {
          search: request.term,
        },
        success: function (data) {
          response(
            $.map(data, function (item) {
              return {
                label:
                  item.name +
                  " (" +
                  item.position +
                  " | " +
                  item.division +
                  ")",
                value: item.name,
                id: item.id,
              };
            })
          );
        },
      });
    },
    select: function (event, ui) {
      $("#namaKaryawan").val(ui.item.value);
      $("#karyawanId").val(ui.item.id);
      return false;
    },
  });

  $("#saveKaryawanButton").click(function () {
    var karyawanId = $("#karyawanId").val();
    if (karyawanId) {
      $.ajax({
        url: "module/" + page + "/action/addEmployee.php",
        type: "POST",
        data: {
          id: karyawanId,
          supervisor_id: 2,
        },
        success: function (response) {
          // Handle response
          $("#addKaryawanModal").modal("hide");
          Swal.fire({
            title: "Success",
            text: "Supervisor ID updated successfully!",
            icon: "success",
            allowOutsideClick: false,
          }).then(function () {
            table_employees.ajax.reload();
          });
        },
        error: function (xhr, status, error) {
          // Handle error
          alert("An error occurred: " + error);
        },
      });
    } else {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please select a valid karyawan.",
        allowOutsideClick: false,
      });
    }
  });
});
