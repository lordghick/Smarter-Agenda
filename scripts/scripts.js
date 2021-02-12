
// Categorias

let categorias = ['General', 'Personal', 'Trabajo'];

function listarCategorias() {
    let select = document.getElementById('listSelect');
    for (let i = 0; i < categorias.length; i++) {
        let option = document.createElement("option");
        option.text = categorias[i];
        option.value = i;
        select.add(option)
    }
}

listarCategorias();

//prevent default

function Handler(e) {
    e.preventDefault;
}

//Modal

let modal = document.getElementById('modalContainer'),
    modalContenido = document.getElementById('modalNuevaTarea');

function mostrarModal() {
    modal.style.visibility = 'visible';
    modal.style.opacity = '1';
    modalContenido.style.top = '10%';
}

function cerrarModal() {
    modal.style.visibility = 'hidden';
    modal.style.opacity = '0';
    modalContenido.style.top = '-100%';
}


// funciones


btnActivado = false
btnCreado = [];

function eliminar() {
    if (btnActivado == false) {
        let cards = document.getElementsByClassName('card');
        for (i = 0; i < cards.length; i++) {
            let ico = document.createElement("i");
            ico.className = "fas fa-trash btnSeleccionado";
            cards[i].appendChild(ico)
            btnCreado[i] = ico;
            ico.addEventListener('click', (e) => {
                let index = getIndex(e);
                enviarEliminar(index);
            })
        }

        btnActivado = true;
    }
}

function modificar() {
    if (btnActivado == false) {
        let cards = document.getElementsByClassName('card');
        for (i = 0; i < cards.length; i++) {
            let ico = document.createElement("i");
            ico.className = "fas fa-pen btnSeleccionado";
            cards[i].appendChild(ico)
            btnCreado[i] = ico;
            ico.addEventListener('click', (e) => {
                let index = getIndex(e);
                modifyModal(index);
            })
        }

        btnActivado = true;
    }
}

//obtener indice

function getIndex(e) {
    let tarea = e.target.parentElement;
    let cards = [...document.getElementsByClassName('card')];
    return cards.indexOf(tarea);
}

function enviarEliminar(index) {
    $.post("app/eliminarTareas.php", { "index": index }, removeDom(index));
}
function enviarModificar(index, prioridad, categoria, asunto, detalles, hora) {
    let prepDetalles;
    let prepHora;

    if (detalles == '') {
        prepDetalles = 'No especificados';
    } else {
        prepDetalles = detalles;
    }
    if (hora == '') {
        prepHora = 'No especificada';
    } else {
        prepHora = hora;
    }

    if (asunto != '') {
        $.post("app/modificarTarea.php",
            {
                "index": index,
                "prioridad": prioridad,
                "categoria": categoria,
                "asunto": asunto,
                "detalles": prepDetalles,
                "hora": prepHora
            });
    }
}

function removeDom(index) {
    let cards = document.getElementsByClassName('card');
    listado = document.getElementById('lista');
    listado.removeChild(cards[index]);
}

editandoTarea = false;

function modifyModal(index) {
    let modalPrioridad = document.getElementById('prioridad'),
        modalCategoria = document.getElementById('listSelect'),
        modalAsunto = document.getElementById('asunto'),
        modalDetalles = document.getElementById('detalles'),
        modalHora = document.getElementById('hora'),
        modalFecha = document.getElementById('fecha');
    btnEnviar = document.getElementById('btnEnviar');
    formModal = document.getElementById('formModal');

    let cards = document.getElementsByClassName('card');
    let tareaSeleccionada = cards[index];

    if (tareaSeleccionada.className == 'card general') {
        modalCategoria.value = 0
    } else if (tareaSeleccionada.className == 'card personal') {
        modalCategoria.value = 1
    } else if (tareaSeleccionada.className == 'card trabajo') {
        modalCategoria.value = 2
    }

    if (tareaSeleccionada.children[0].children[0].className == 'fas fa-bookmark urgente') {
        modalPrioridad.value = 1
    } else if (tareaSeleccionada.children[0].children[0].className == 'fas fa-bookmark importante') {
        modalPrioridad.value = 2
    } else if (tareaSeleccionada.children[0].children[0].className == 'fas fa-bookmark completado') {
        modalPrioridad.value = 3
    }

    modalAsunto.value = tareaSeleccionada.children[1].children[0].innerText;
    modalDetalles.value = tareaSeleccionada.children[2].children[0].innerText;

    if (tareaSeleccionada.children[3].children[0].innerText != 'No especificada') {
        modalHora.value = tareaSeleccionada.children[3].children[0].innerText;
    }

    // if(tareaSeleccionada.children[4].children[0].innerText != 'No especificada'){
    //     modalFecha = tareaSeleccionada.children[4].children[0].innerText;
    // }

    formModal.removeAttribute("method");
    formModal.removeAttribute("action");

    btnEnviar.removeChild(btnEnviar.children[0]);
    let newBoton = document.createElement("button");
    newBoton.className = "btnModify";
    newBoton.innerText = "Guardar cambios";
    btnEnviar.appendChild(newBoton);
    newBoton.addEventListener('click', () => {
        enviarModificar(index, modalPrioridad.value, modalCategoria.value, modalAsunto.value, modalDetalles.value, modalHora.value)
    })

    mostrarModal();
    editandoTarea = true;
}

