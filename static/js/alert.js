const alert_div = document.getElementById("alerta_mensaje");
let bandera = true;

const alert = (message, type) => {
  if (bandera) {
    const wrapper = document.createElement("div");
    wrapper.innerHTML = [
      `<div id="alerta" class="alert alert-${type} alert-dismissible ocultar alerta" role="alert">`,
      `   <div>${message}</div>`,
      '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
      "</div>",
    ].join("");

    alert_div.append(wrapper);
    bandera = false;
    document.querySelector(".alerta").classList.remove("ocultar");
    document.querySelector(".alerta").classList.remove("borrar");
    setTimeout(() => {
      document.querySelector(".alerta").classList.add("ocultar");
      setTimeout(() => {
        wrapper.innerHTML = "";
        alert_div.append(wrapper);
        bandera = true;
      }, "800");
    }, "3000");
  } else {

  }
};
