let url_get_accesos = appData.base_url + "Controller/accesos/getaccesos.php";

function cargar_accesos() {
    const $tabla_de_acces = document.querySelector("#table_de_acceso");
    $tabla_de_acces.innerHTML = "";
    fetch(url_get_accesos, {
      method: "POST",
    })
      .then((response) => response.json())
      .then((data) => table_acesos(data))
      .catch((err) => console.log(err));
  
    const table_acesos = (data) => {
      let contenido = "";
      if (data == null) {
        contenido = `<tr><td colspan="5" >No hay accesos regitrados</td></tr>`;
      } else {
         Object.entries(data).forEach(([key, value]) => {
  
          const data = value.nombre.split(",");
          let nombe_user_acceso = data[0];
          let apellido_user_acceso = data[1];
          let puesto_user_acceso = data[2];
  
          contenido += `<tr> 
                  <th scope='row'>${value.accion}</th>
                  <td>${nombe_user_acceso}</td>
                  <td>${apellido_user_acceso}</td>
                  <td>${puesto_user_acceso}</td>
                  <td>${value.fecha}</td>
                  </tr> `;
        });
      }
      $tabla_de_acces.innerHTML = contenido;
    };
  }