let url_get_modulos = appData.base_url + "Controller/modulos/getModulos.php";
let url_add_modulos = appData.base_url + "Controller/modulos/addModulos.php";
let url_deli_modulos = appData.base_url + "Controller/modulos/delModulos.php";
let url_update_modulos_asignaion =
  appData.base_url + "Controller/modulos/updateModulos.php";
let url_update_user_asignacion =
  appData.base_url + "Controller/modulos/updateUserAsignacion.php";
  let url_new_puerta =
  appData.base_url + "Controller/modulos/nuevaPuerta.php";

let dataM = new FormData();
let dataAM = new FormData();
let dataAU = new FormData();
let dataP = new FormData();

function add_modulo() {
  let id_modulo = document.getElementById("id_mol");
  if (id_modulo.value == "") {
    id_modulo.classList.add("is-invalid");
  } else {
    id_modulo.classList.remove("is-invalid");
    id_modulo.classList.add("is-valid");
    dataM.append("Id", id_modulo.value);
    dataM.append("Estatus", "Bodega");
    fetch(url_add_modulos, {
      method: "POST",
      body: dataM,
    })
      .then((response) => response.json())
      .then((json) => {
        //cargar_modulos();
        if (!json.res) {
          toast("danger", json.mes);
        } else {
          document.getElementById("header_toast").classList.remove("bg-danger");
          document.getElementById("body_toast").classList.remove("bg-danger");
          toast("success", json.mes);
          document.getElementById("cerrar_m").click();
          document.getElementById("form_add_modulos").reset();
          cargar_modelos();
        }
      })
      .catch((err) => console.log(err));
  }
}

function cargar_modelos() {
  const $elemento = document.querySelector("#tableModelos");
  $elemento.innerHTML = "";
  fetch(url_get_modulos, {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => table_moduloss(data))
    .catch((err) => console.log(err));

  const table_moduloss = (data) => {
    let contenido = "";
    let puertass = 0;
    if (data == null) {
      contenido = `<tr><td colspan="3" >No hay usuarios</td></tr>`;
    } else {
      Object.entries(data).forEach(([key, value]) => {
        //console.log(value)
        if (value.estatus != "Eliminado") {
          contenido += `<tr> 
                  <th scope='row' class="text-center">${value.id}</th>
                  <td class="text-center">${value.estatus}</td>
                  <td class="text-center">`;
                  Object.entries(value.puetas).forEach(([key, value]) => {
                    puertass = key;
                  });

          contenido += `${puertass} </td><td class="text-center">`;
          if (value.estatus == "Bodega") {
            contenido += `<div class="btn-group" role="group" aria-label="Basic outlined example">
             <button type="button" class="btn btn-outline-primary"
             data-bs-toggle="modal" data-bs-target="#Asignar" data-id="${value.id}"
             data-key="${key}"
             onclick="return asignarModuloModal(this)">
             Usuario
             </button>
             <button type="button" class="btn btn-outline-danger"
              data-bs-toggle="modal" data-bs-target="#eliminar_m" 
              data-key="${key}" data-id="${value.id}"
              onclick="return eliminarModuloModal(this)">
             Dañado
             </button>
           </div>`;
          } else {
            contenido += `
            <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-warning">Reparar</button>
            <button type="button" class="btn btn-outline-primary"
            onclick="add_puerta(${puertass} , '${value.id}')">
            Añadir puerta</button>
            </div>`;
          }

          contenido += `</td></tr> `;
        }
      });
      //alert(JSON.stringify(data));
    }
    $elemento.innerHTML = contenido;
  };
}

function add_puerta(numpuertas, modulo) {
  numpuertas++;
  dataP.append("Modulo", modulo);
  dataP.append("Numpuerta", numpuertas);
    fetch(url_new_puerta, {
      method: "POST",
      body: dataP,
    })
      .then((response) => response.json())
      .then((json) => {
        //cargar_modulos();
        if (!json.res) {
          toast("danger", json.mes);
        } else {
          toast("success", json.mes);
          cargar_modelos();
        }
      })
      .catch((err) => console.log(err));

}

function eliminarModuloModal(e) {
  let id_del = e.getAttribute("data-key");
  let modulo_del = e.getAttribute("data-id");
  document.getElementById("name_modulo").innerHTML = modulo_del;
  document.getElementById("id_modulo_del").value = id_del;
}

function asignarModuloModal(e) {
  let modulo_del = e.getAttribute("data-id");
  let key_asigna = e.getAttribute("data-key");
  const $selec = document.getElementById("selec_user");
  $selec.innerHTML = "";
  $selec.classList.remove("is-invalid");
  $selec.classList.remove("is-valid");
  document.getElementById("id_del_modulo").value = modulo_del;
  document.getElementById("key_del_modulo").value = key_asigna;
  fetch(url_get_users, {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => sele_userss(data))
    .catch((err) => console.log(err));

  const sele_userss = (data) => {
    //console.log(data);
    let contenido = "";
    if (data == null) {
      contenido = ` <option selected>No Hay Usuarios</option>`;
    } else {
      contenido = `<option selected>selecciona un usuario</option>`;
      Object.entries(data).forEach(([key, value]) => {
        //console.log(value)
        if (value.tipo == "user") {
          contenido += `<option value="${key},${value.nombre}">${value.nombre}</option>`;
        }
      });
      //alert(JSON.stringify(data));
    }
    $selec.innerHTML = contenido;
  };
}

function del_modulo() {
  let key = document.getElementById("id_modulo_del").value;

  dataU.append("Key", key);
  fetch(url_deli_modulos, {
    method: "POST",
    body: dataU,
  })
    .then((response) => response.json())
    .then((json) => {
      cargar_modelos();
      document.getElementById("cerrar_del_model").click();
      toast("success", "Modulo eliminado correctamente");
    })
    .catch((err) => console.log(err));
}

function btn_asignar_modulo_a_user() {
  let $sele_user = document.getElementById("selec_user");

  if (
    $sele_user.value == "selecciona un usuario" ||
    $sele_user.value == "No Hay Usuarios"
  ) {
    $sele_user.classList.add("is-invalid");
  } else {
    $sele_user.classList.remove("is-invalid");
    $sele_user.classList.add("is-valid");
    let email_user_m = document.getElementById("selec_user").value;
    const data = email_user_m.split(",");
    let key_userss = data[0];
    let nombre_userss = data[1];
    let id_modulo_a = document.getElementById("id_del_modulo").value;
    let key_modulo_a = document.getElementById("key_del_modulo").value;

    dataAM.append("key", key_modulo_a);
    dataAM.append("estatus", nombre_userss);
    fetch(url_update_modulos_asignaion, {
      method: "POST",
      body: dataAM,
    })
      .then((response) => response.json())
      .then((json) => {
        dataAU.append("key", key_userss);
        dataAU.append("modulo", id_modulo_a);
        fetch(url_update_user_asignacion, {
          method: "POST",
          body: dataAU,
        })
          .then((response) => response.json())
          .then((json) => {
            cargar_modelos();
            document.getElementById("cerrar_as").click();
            toast("success", "Modulo asigado correctamente correctamente");
          })
          .catch((err) => console.log(err));
      })
      .catch((err) => console.log(err));
  }
}
