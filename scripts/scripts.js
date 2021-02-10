
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


function eliminar() {
    console.log('quepasapueh')
    if (btnActivado == false) {
        console.log('quepasapueh')
        let cards = document.getElementsByClassName('card');

        for (i = 0; i < cards.length; i++) {
            let btnEliminar = document.createElement("div");
            let icoEliminar = document.createElement("i");
            icoEliminar.className = "fas fa-trash btnSeleccionado";
            btnEliminar.appendChild(icoEliminar);
            cards[i].appendChild(btnEliminar)
        }

        btnActivado = true;
    }
}
let modificar = function (e) {
    console.log('Pana');
}

//obtener indice

function getIndex(e) {
    let pedidoItem = e.target;
    console.log(pedidoItem)
    let cName = pedidoItem.className;
    console.log(cName)
    let pedidosItems = [...document.getElementsByClassName(cName)];
    console.log(pedidosItems.indexOf(pedidoItem));
    return pedidosItems.indexOf(pedidoItem);
}

//prueba

allCards = document.getElementById('lista');

allCards.addEventListener('click', getIndex)

