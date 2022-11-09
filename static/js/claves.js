let url_get_claves = appData.base_url + "Controller/claves/getClaves.php";
let url_add_claves = appData.base_url + "Controller/claves/addClaves.php";
let url_deli_claves = appData.base_url + "Controller/claves/delClaves.php";
let url_udate_claves = appData.base_url + "Controller/claves/updateClaves.php";

let dataClaves = new FormData();
let dataAcc = new FormData();

function claveModal(e) {
  //abrimos modal y cargamos las variables paraue se envianpor data
  let action = e.getAttribute("data-action");
  document.getElementById("titulo_moda").innerHTML = action;
  let button_c = document.getElementById("btn_modal");
  document.getElementById("nom_acceso").classList.remove("is-valid");
  document.getElementById("ape_acceso").classList.remove("is-valid");
  document.getElementById("puesto_acceso").classList.remove("is-valid");
  document.getElementById("puesto_acceso").classList.remove("is-valid");
  document.getElementById("puesto_acceso").classList.remove("is-invalid");
  document.getElementById("nom_acceso").classList.remove("is-invalid");
  document.getElementById("ape_acceso").classList.remove("is-invalid");
  document.getElementById("clave_acceso").classList.remove("is-invalid");

  //verificamos la accion y depende cual es entonses

  if (action == "Agregar clave") {
    document.getElementById("form_clave").reset();
    document.getElementById("clave_acceso").removeAttribute("disabled");
    button_c.setAttribute("onclick", "add_clave()");
    button_c.innerHTML = "Agregar";
  } else if (action == "Editar datos") {
     let id_modulo_clave = e.getAttribute("data-id");
     let nombre_edit_clave = e.getAttribute("data-nombre");
     let apellido_edit_clave = e.getAttribute("data-apellido");
     let puesto_edit_calve = e.getAttribute("data-puesto");
    document.getElementById("clave_acceso").value = id_modulo_clave;
    document.getElementById("clave_acceso").setAttribute("disabled", "");
    document.getElementById("nom_acceso").value = nombre_edit_clave;
    document.getElementById("ape_acceso").value = apellido_edit_clave;
    document.getElementById("puesto_acceso").value = puesto_edit_calve;
    button_c.setAttribute("onclick", "update_clave()");
    button_c.innerHTML = "Guardar";
  }
}

function add_clave() {
  let nom_clave = document.getElementById("nom_acceso").value;
  let ape_clave = document.getElementById("ape_acceso").value;
  let puesto_clave = document.getElementById("puesto_acceso").value;
  let pas_clave = document.getElementById("clave_acceso").value;
  let nom_completo = "";

  if (valida_clave(nom_clave, pas_clave, ape_clave, puesto_clave)) {
    nom_completo = nom_clave + "," + ape_clave + "," + puesto_clave;
    dataClaves.append("Nombre", nom_completo);
    dataClaves.append("Clave", pas_clave);
    fetch(url_add_claves, {
      method: "POST",
      body: dataClaves,
    })
      .then((response) => response.json())
      .then((json) => {
        //cragar claves
        if (!json.res) {
          toast("danger", json.mes);
        } else {
          document.getElementById("header_toast").classList.remove("bg-danger");
          document.getElementById("body_toast").classList.remove("bg-danger");
          toast("success", json.mes);
          document.getElementById("cerrar_clave").click();
          nom_clave = "";
          pas_clave = "";
          document.getElementById("form_clave").reset();
          cargar_claves();
        }
      })
      .catch((err) => console.log(err));
  }
}

function update_clave() {
  let edit_nom_clave = document.getElementById("nom_acceso").value;
  let edit_ape_clave = document.getElementById("ape_acceso").value;
  let edit_puesto_clave = document.getElementById("puesto_acceso").value;
  let edit_pas_clave = document.getElementById("clave_acceso").value;
  let edit_nom_completo = "";

  edit_nom_completo = edit_nom_clave + "," + edit_ape_clave + "," + edit_puesto_clave;
    dataClaves.append("Nombre", edit_nom_completo);
    dataClaves.append("Clave", edit_pas_clave);
    fetch(url_udate_claves, {
      method: "POST",
      body: dataClaves,
    })
      .then((response) => response.json())
      .then((json) => {
        //cragar claves
        if (!json.res) {
          toast("danger", json.mes);
        } else {
          toast("success", json.mes);
          document.getElementById("cerrar_clave").click();
          nom_clave = "";
          pas_clave = "";
          document.getElementById("form_clave").reset();
          cargar_claves();
        }
      })
      .catch((err) => console.log(err));

}

function valida_clave(nom, clave, ape, puesto) {
  let nom_form = document.getElementById("nom_acceso");
  let ape_form = document.getElementById("ape_acceso");
  let puesto_form = document.getElementById("puesto_acceso");
  let clave_form = document.getElementById("clave_acceso");
  let mesage_form = document.getElementById("mes_clave");

  if (nom == "") {
    nom_form.classList.add("is-invalid");
    return false;
  } else {
    nom_form.classList.remove("is-invalid");
    nom_form.classList.add("is-valid");
    if (ape == "") {
      ape_form.classList.add("is-invalid");
      return false;
    } else {
      ape_form.classList.remove("is-invalid");
      ape_form.classList.add("is-valid");
      if (puesto == "") {
        puesto_form.classList.add("is-invalid");
        return false;
      } else {
        puesto_form.classList.remove("is-invalid");
        puesto_form.classList.add("is-valid");
        if (clave == "") {
          mesage_form.innerHTML = "Clave requerida";
          clave_form.classList.add("is-invalid");
          return false;
        } else {
          if (clave.length < 5) {
            mesage_form.innerHTML = "La clave requiere 5 digitos";
            clave_form.classList.add("is-invalid");
            return false;
          } else {
            clave_form.classList.remove("is-invalid");
            clave_form.classList.add("is-valid");
            return true;
          }
        }
      }
    }
  }
}

function cargar_claves() {
  const $tabla_de_clave = document.querySelector("#table_claves_de_acceso");
  $tabla_de_clave.innerHTML = "";
  fetch(url_get_claves, {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => table_claves(data))
    .catch((err) => console.log(err));

  const table_claves = (data) => {
    console.log(data);
    let contenido = "";
    if (data == null) {
      contenido = `<tr><td colspan="5" >No hay claves registradas</td></tr>`;
    } else {
      Object.entries(data).forEach(([key, value]) => {

        const data = value.nombre.split(",");
        let nombe_user_clave = data[0];
        let apellido_user_clave = data[1];
        let puesto_user_clave = data[2];

        contenido += `<tr> 
                <th scope='row'>${key}</th>
                <td>${nombe_user_clave}</td>
                <td>${apellido_user_clave}</td>
                <td>${puesto_user_clave}</td>
                <td>
                <div class="btn-group" role="group">

                <button type="button" class="btn btn-outline-warning"
                data-bs-toggle="modal" data-bs-target="#Claves"
                  data-id="${key}"
                  data-nombre="${nombe_user_clave}"
                  data-apellido="${apellido_user_clave}"
                  data-puesto="${puesto_user_clave}"
                  data-action="Editar datos" 
                  onclick="return claveModal(this)">
                <i class="fa-solid fa-user-pen"></i>
                </button>

                <button type="button" class="btn btn-outline-danger"
                data-bs-toggle="modal" data-bs-target="#Claves_del"
                  data-id="${key}"
                  onclick="return claveDelModal(this)">
                  <i class="fa-regular fa-trash-can"></i>
                </button>

                </div>
                </td>
                </tr> `;
      });
    }
    $tabla_de_clave.innerHTML = contenido;
  };
}

function claveDelModal(e) {
  let id_del_clave = e.getAttribute("data-id");
  document.getElementById("clave_user_del").innerHTML = id_del_clave;
  document.getElementById("id_clave_del").value = id_del_clave;
}

function del_clave() {
  let clave_del = document.getElementById("id_clave_del").value;
  dataAcc.append("clave", clave_del);
  fetch(url_deli_claves, {
    method: "POST",
    body: dataAcc,
  })
    .then((response) => response.json())
    .then((json) => {
      cargar_claves();
      document.getElementById("cerrar_del_clave").click();
      toast("success", "Clave eliminada correctamente");
    })
    .catch((err) => console.log(err));
}

