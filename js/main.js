$(document).ready(function () {
  /* READ DATA */
  $.ajax({
    url: "/tarea/backend/getUsers.php", // Ruta al archivo PHP
    method: "GET", // Método de la solicitud
    dataType: "json", // Tipo de datos esperado en la respuesta
    success: function (response) {
      var container = $("#user-list");
      if (response.status_code === 200) {
        // Los datos se han recibido exitosamente
        var userList = response.data;

        for (var i = 0; i < userList.length; i++) {
          var el = $("<div>").addClass(
            "grid-item bg-info d-flex flex-column justify-content-around py-3"
          );
          var user = userList[i];
          el.append("<h2 >Nombre: " + user.name + "</h2>");
          el.append(
            "<span >Numero de teléfono: " + user.phone_number + "</span>"
          );
          el.append("<span >Edad: " + user.age + "</span>");
          el.append(
            "<button data-id='" +
              user.id +
              "' data-name='" +
              user.name +
              "' data-number='" +
              user.phone_number +
              "' data-age='" +
              user.age +
              "' class='btn btn-light btn-open-form-update'>EDITAR</button>"
          );
          container.append(el);
        }
      } else {
        // Mostrar un mensaje de error si no se encuentran registros
        $("#user-list").html("<p>" + response.message + "</p>");
      }
    },
    error: function () {
      // Manejar errores de la solicitud AJAX
      $("#user-list").html("<p>Error al obtener los datos de usuarios.</p>");
    },
  });

  /* CREATE A NEW REGISTER */
  $("#btn-register-user").click(function (event) {
    event.preventDefault(); // Evita el envío tradicional del formulario
    var formData = $("#form-new-user").serialize(); // Serializa los datos del formulario

    $.ajax({
      url: "/tarea/backend/registerUser.php",
      type: "POST",
      data: formData,
      success: function (response) {
        // Manejar la respuesta del servidor aquí
        //console.log(response);
        //Mostrar mensaje y ocultar formulario
        $("#close-modal-register").click();
        $("#btn-modalSuccess").click();

        //Limpiar formulario
        $("#name-user").val("");
        $("#phone-number-user").val("");
        $("#age-user").val("");
      },
      error: function (xhr, status, error) {
        // Manejar el error aquí
        //console.error(error);

        $("#close-modal-register").click();
        $("#btn-modalError").click();

        //Limpiar formulario
        $("#name-user").val("");
        $("#phone-number-user").val("");
        $("#age-user").val("");
      },
    });
  });

  /* UPDATE A REGISTER */
  $("#btn-update-user").click(function (event) {
    event.preventDefault(); // Evita el envío tradicional del formulario
    var formData = $("#form-update-user").serialize(); // Serializa los datos del formulario

    $.ajax({
      url: "/tarea/backend/updateUser.php",
      type: "POST",
      data: formData,
      success: function (response) {
        // Manejar la respuesta del servidor aquí
        //console.log(response);
        //Mostrar mensaje y ocultar formulario
        $("#close-modal-update").click();
        $("#btn-modalSuccessUpdate").click();

        //Limpiar formulario
        $("#update-name-user").val("");
        $("#update-phone-number-user").val("");
        $("#update-age-user").val("");
        $("#value-id-user").val("");
      },
      error: function (xhr, status, error) {
        // Manejar el error aquí
        //console.error(error);

        $("#close-modal-update").click();
        $("#btn-modalError").click();

        //Limpiar formulario
        $("#update-name-user").val("");
        $("#update-phone-number-user").val("");
        $("#update-age-user").val("");
        $("#value-id-user").val("");
      },
    });
  });
});

$(document).on("click", ".btn-open-form-update", function () {
  // Obtenemos valores del usuario actual
  var idUserAttr = $(this).data("id");
  var nameUserAttr = $(this).data("name");
  var phoneNumberUserAttr = $(this).data("number");
  var AgeUserAttr = $(this).data("age");

  //Mandamos valores al formulario
  $("#value-id-user").val(idUserAttr);
  $("#update-name-user").val(nameUserAttr);
  $("#update-phone-number-user").val(phoneNumberUserAttr);
  $("#update-age-user").val(AgeUserAttr);

  //Mostrar formulario
  $("#btn-modalUpdate").click();
});
