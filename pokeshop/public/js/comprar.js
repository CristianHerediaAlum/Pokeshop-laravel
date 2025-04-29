function seleccionarCarta(carta, id) {
    let checkbox = carta.querySelector("input[type='checkbox']");
    carta.classList.toggle("seleccionada");
    checkbox.checked = !checkbox.checked;
}