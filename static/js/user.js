let url_get_users = appData.base_url + "Controller/user/getUser.php";
let url_add_users = appData.base_url + "Controller/user/addUser.php";
let url_deli_users = appData.base_url + "Controller/user/delUser.php";
let url_update_users = appData.base_url + "Controller/user/updateUser.php";

let dataU = new FormData();

function cargar_user() {
  const $elemento = document.querySelector("#tableUser");
  $elemento.innerHTML = "";
  fetch(url_get_users, {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => table_userss(data))
    .catch((err) => console.log(err));

  const table_userss = (data) => {
    let contenido = "";
    if (data == null) {
      contenido = `<tr><td colspan="3" >No hay usuarios</td></tr>`;
    } else {
      Object.entries(data).forEach(([key, value]) => {
        //console.log(value)
        if (value.tipo == "user") {
          contenido += `<tr> 
                <th scope='row'>${value.nombre}</th>
                <td>${value.correo}</td>
                <td>${value.contrasena}</td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                  <button type="button" class="btn btn-outline-primary"
                  data-bs-toggle="modal" data-bs-target="#Usuarios"
                  data-id="${key}"
                  data-nombre="${value.nombre}"
                  data-correo="${value.correo}"
                  data-contra="${value.contrasena}"
                  data-action="Editar usuario" 
                  onclick="return handleModal(this)">
                  <i class="fa-solid fa-pen-to-square"></i>
                  </button>
                  <button type="button" class="btn btn-outline-danger"
                   data-bs-toggle="modal" data-bs-target="#eliminar"
                   data-id="${key}"
                  data-nombre="${value.nombre}"
                  onclick="return eliminarModal(this)">
                  <i class="fa-solid fa-trash-can"></i>
                  </button>
                </div>
                </tr> `;
        }
      });
      //alert(JSON.stringify(data));
    }
    $elemento.innerHTML = contenido;
  };
}

function eliminarModal(e) {
  let id_del = e.getAttribute("data-id");
  let nombre_del = e.getAttribute("data-nombre");
  document.getElementById("nombre_user").innerHTML = nombre_del;
  document.getElementById("id_user_del").value = id_del;
}

function handleModal(e) {
  //abrimos modal y cargamos las variables paraue se envianpor data
  let action = e.getAttribute("data-action");
  document.getElementById("titulo_moda").innerHTML = action;
  let button_a = document.getElementById("guardarinfo");
  document.getElementById("Nombre").classList.remove("is-valid");
  document.getElementById("Correo").classList.remove("is-valid");
  document.getElementById("Contrasena").classList.remove("is-valid");

  //verificamos la accion y depende cual es entonses

  if (action == "Agregar usuario") {
    console.log(action);
    document.getElementById("form_add_user").reset();
    button_a.setAttribute("onclick", "add_user()");
  } else if (action == "Editar usuario") {
    let id_user = e.getAttribute("data-id");
    let nombre_edit = e.getAttribute("data-nombre");
    let correo_edit = e.getAttribute("data-correo");
    let contrasena_edit = e.getAttribute("data-contra");
    document.getElementById("id_user").value = id_user;
    document.getElementById("Nombre").value = nombre_edit;
    document.getElementById("Correo").value = correo_edit;
    document.getElementById("Contrasena").value = contrasena_edit;
    button_a.setAttribute("onclick", "update_user()");
  }
}

function valida_user(nom, email, contra) {
  if (nom == "") {
    document.getElementById("Nombre").classList.add("is-invalid");
  } else {
    document.getElementById("Nombre").classList.remove("is-invalid");
    document.getElementById("Nombre").classList.add("is-valid");
  }
  if (email == "") {
    document.getElementById("alert_correo").innerHTML =
      "El correo es requerido.";
    document.getElementById("Correo").classList.add("is-invalid");
  } else {
    if (!validateEmail(email)) {
      document.getElementById("alert_correo").innerHTML =
        "El correo no tiene el formato correcto.";
      document.getElementById("Correo").classList.add("is-invalid");
    } else {
      document.getElementById("Correo").classList.remove("is-invalid");
      document.getElementById("Correo").classList.add("is-valid");
    }
  }
  if (contra == "") {
    document.getElementById("Contrasena").classList.add("is-invalid");
  } else {
    document.getElementById("Contrasena").classList.remove("is-invalid");
    document.getElementById("Contrasena").classList.add("is-valid");
  }
}

function add_user() {
  let nombre = document.getElementById("Nombre").value;
  let correo = document.getElementById("Correo").value;
  let contrasenia = document.getElementById("Contrasena").value;
  valida_user(nombre, correo, contrasenia);
  if (
    nombre != "" &&
    correo != "" &&
    validateEmail(correo) &&
    contrasenia != ""
  ) {
    dataU.append("Nombre", nombre);
    dataU.append("Correo", correo);
    dataU.append("Contrasena", contrasenia);
    dataU.append("Tipo", "user");
    fetch(url_add_users, {
      method: "POST",
      body: dataU,
    })
      .then((response) => response.json())
      .then((json) => {
        if (!json.res) {
          toast("danger", json.mes);
        } else {
          document.getElementById("header_toast").classList.remove("bg-danger");
          document.getElementById("body_toast").classList.remove("bg-danger");
          toast("success", json.mes);
          document.getElementById("cerrar").click();
          nombre = "";
          correo = "";
          contrasenia = "";
          document.getElementById("form_add_user").reset();
          cargar_user();
        }
      })
      .catch((err) => console.log(err));
  }
}

function update_user() {
  let nombre = document.getElementById("Nombre").value;
  let correo = document.getElementById("Correo").value;
  let contrasenia = document.getElementById("Contrasena").value;
  let id_user = document.getElementById("id_user").value;
  valida_user(nombre, correo, contrasenia);
  if (
    nombre != "" &&
    correo != "" &&
    validateEmail(correo) &&
    contrasenia != ""
  ) {
    dataU.append("Nombre", nombre);
    dataU.append("Correo", correo);
    dataU.append("Contrasena", contrasenia);
    dataU.append("id_user", id_user);
    fetch(url_update_users, {
      method: "POST",
      body: dataU,
    })
      .then((response) => response.json())
      .then((json) => {
        cargar_user();
        document.getElementById("cerrar").click();
        nombre = "";
        correo = "";
        contrasenia = "";
        document.getElementById("form_add_user").reset();
        toast("success", "Usuario actualizado correctamente");
      })
      .catch((err) => console.log(err));
  }
}

function del_user() {
  let id_del = document.getElementById("id_user_del").value;
  dataU.append("id_user", id_del);
  fetch(url_deli_users, {
    method: "POST",
    body: dataU,
  })
    .then((response) => response.json())
    .then((json) => {
      cargar_user();
      document.getElementById("cerrar_del").click();
      toast("success", "Usuario eliminado correctamente");
    })
    .catch((err) => console.log(err));
}

function validateEmail(email) {
  return email.match(
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  );
}
