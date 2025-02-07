function loadPosition(divisionId, selectedPositionId = null) {
  $.ajax({
    url: "module/" + page + getPosition,
    type: "GET",
    data: { division_id: divisionId },
    dataType: "json",
    success: function (data) {
      let select = $("#edit_position_id");
      select.empty();
      select.append('<option value="" disabled>Select Position</option>');
      $.each(data, function (index, position) {
        let selected =
          position.position_id == selectedPositionId ? "selected" : "";
        select.append(
          '<option value="' +
            position.position_id +
            '" ' +
            selected +
            ">" +
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

$("#edit_division_id").change(function () {
  let divisionId = $(this).val();
  if (divisionId) {
    loadPosition(divisionId);
  }
});

$("#editEmployee").on("show.bs.modal", function (event) {
  let button = $(event.relatedTarget);
  let employeeId = button.data("id");

  $.ajax({
    url: "module/" + page + editEmployee,
    type: "POST",
    data: { id: employeeId },
    success: function (response) {
      console.log(response);
      if (response.success) {
        $("#edit_id").val(response.id);
        $("#edit_name").val(response.name);
        $("#edit_email").val(response.email);
        $("#edit_nip").val(response.nip);
        $("#edit_division_id").val(response.division_id);
        loadPosition(response.division_id, response.position_id); // Load positions with selected position
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: response.error,
          allowOutsideClick: false,
        });
        console.log(response);
      }
    },
    error: function (xhr, status, error) {
      Swal.fire("Error", "An error occurred while fetching data.", "error");
      console.log(xhr, status, error);
    },
  });
});

$("#updateEmployee").click(function () {
  let edit_id = $("#edit_id").val();
  let edit_name = $("#edit_name").val();
  let edit_email = $("#edit_email").val();
  let edit_nip = $("#edit_nip").val();
  let edit_division_id = $("#edit_division_id").val();
  let edit_position_id = $("#edit_position_id").val();

  if (
    edit_name === "" ||
    edit_email === "" ||
    edit_nip === "" ||
    edit_division_id === "" ||
    edit_position_id === ""
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
    position_id: edit_position_id,
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
          text: response.message,
          allowOutsideClick: false,
        });
      }
    },
    error: function (error) {
      console.log(error);
    },
  });
});
