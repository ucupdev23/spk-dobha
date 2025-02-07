$("#penilaianForm").on("submit", function (e) {
  e.preventDefault();

  let isValid = true;
  $("#penilaianForm select").each(function () {
    if ($(this).val() === "") {
      isValid = false;
      $(this).addClass("is-invalid");
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  if (!isValid) {
    Swal.fire("Error", "Harap isi semua kolom sebelum melanjutkan!", "error");
    return;
  }

  const formData = $(this).serialize();

  $.ajax({
    url: "module/" + page + addAlternatif,
    type: "POST",
    data: formData,
    success: function (response) {
      console.log(response);
      if (response.success) {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: response.message,
          allowOutsideClick: false,
        }).then(function () {
          // Reload the DataTable to reflect the updated data
          window.location.href = "?page=alternative";
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
      alert("Terjadi kesalahan saat menyimpan data.");
    },
  });
});
