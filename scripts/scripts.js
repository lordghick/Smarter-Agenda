
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

function Handler(e){
    e.preventDefault;
}

//Modal

let modal = document.getElementById('modalContainer'),
modalContenido = document.getElementById('modalNuevaTarea');

function mostrarModal(){
    modal.style.visibility = 'visible';
    modal.style.opacity = '1';
    modalContenido.style.top = '10%';
}

function cerrarModal(){
    modal.style.visibility = 'hidden';
    modal.style.opacity = '0';
    modalContenido.style.top = '-100%';
}

