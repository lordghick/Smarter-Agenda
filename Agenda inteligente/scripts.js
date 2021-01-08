class ListaPedidos {
    constructor(name) {
        this.name = name;
        this.pedidos = [];
    }

    agregarPedido(pedido, elemento) {
        this.pedidos.push(pedido);
        this.renderPedidos(elemento);
    }

    quitarPedido(i, elemento) {
        this.pedidos.splice(i, 1);
        ordenarContador(this);
        this.renderPedidos(elemento);
    }

    renderPedidos(elemento) {
        let pedidos = this.pedidos.map(pedido => `
        <div class="listado">
            <h4 class="categoria">${pedido.categoria}</h4>
            <div class="asunto">
                <h3>${pedido.asunto}</h3> 
            </div>
            <div class="detalles">
                ${pedido.detalles}
            </div>
            <div class="divHora">
                <h4>${pedido.hora == '' ? '' : `Hora de entrega:  ${pedido.hora}`}</h4>
            </div>
            <div class="entregado-lista">
                <label for="listado-entregado">Entregado</label>
                <input name="listado-entregado" type="checkbox" onclick="guardarEntrega(this)" ${pedido.listo}>
            </div>
            <div class="botones">
                <button type="button" class="btnLista eliminar">Eliminar tarea</button>
                <button type="button" class="btnLista editar" onclick="modifyButton(this)">Editar tarea</button>
            </div>
        </div>
        `);

        elemento.innerHTML = pedidos.reduce((a, b) => a + b, '');
        guardarPedidos();
    }
}

class Pedidos {
    constructor(categoria, asunto, detalles, hora, listo, index) {
        this.categoria = categoria;
        this.asunto = asunto;
        this.detalles = detalles;
        if (this.detalles == ''){
            this.detalles = 'No especificado'
        }
        this.hora = hora;
        this.listo = listo;
        if(listo){
            this.listo = 'checked';
        }else{
            this.listo = '';
        }
        this.index = index;
    }
}

let inbox = new ListaPedidos;
let listaDom = document.getElementById('lista');
let contadorPedidos = 0;


//agregar tareas

function handleForm(e) {
    e.preventDefault();
}

function agregar() {

    let categoria = document.getElementById('listSelect').value;
    let asunto = document.getElementById('nombreCliente').value;
    let detalles = document.getElementById('detallesTarea').value;
    let horaDeEntrega = document.getElementById('horaEntrega').value;
    let entregado = document.getElementById('entregado').checked;
    contadorPedidos++;

    let pedidoCompleto = new Pedidos(categoria, asunto, detalles, horaDeEntrega, entregado, contadorPedidos)

    inbox.agregarPedido(pedidoCompleto, listaDom)

}

//guardar tareas

function guardarPedidos() {
    let listaDeTareas = []
    for(i = 0; i < inbox.pedidos.length; i++){
        listaDeTareas[i] = inbox.pedidos[i]
    }
    let listado = JSON.stringify(listaDeTareas);
    localStorage.setItem("listaDeTareas", listado);
}

function guardarEntrega(e) {
    let padre = e.parentElement;
    console.log(padre)
    let index = getPedidoIndex(padre);
    console.log(index)  
    if (e.checked == true) {
        inbox.pedidos[index].listo = 'checked';
    } else {
        inbox.pedidos[index].listo = '';
    }

    guardarPedidos();
}

//cargar tareas

function cargarTareas(){
    let listadoJSON = localStorage.getItem("listaDeTareas");
    let listado = JSON.parse(listadoJSON);
    inbox.pedidos = listado;
    inbox.renderPedidos(listaDom);
}

cargarTareas();

//Limpiar tareas

function limpiarTareas(){
    inbox.pedidos = []
    guardarPedidos();
}

// Categorias

let categorias = ['General', 'Personal', 'Trabajo'];

function listarCategorias() {
    let select = document.getElementById('listSelect');
    for (let i = 0; i < categorias.length; i++) {
        let option = document.createElement("option");
        option.text = categorias[i];
        select.add(option)
    }
}

// obtener el indice de pedidos

function getPedidoIndex(e) {
    let pedidoItem = e.parentElement;
        console.log(pedidoItem);
    let pedidosItems = [...lista.querySelectorAll('.listado')];
    return pedidosItems.indexOf(pedidoItem);
}

function ordenarContador(e) {
    for (let i = 0; i < e.pedidos.length; i++) {
        e.pedidos[i].index = (i + 1);
    }
}

//Remover item

function removerPedido(e, list = inbox) {
    if (e.target.className === 'btnLista eliminar') {
        let pregunta = prompt('¿Estás seguro de eliminar el pedido?');
        if (pregunta == 'si') {
            let target = e.target.parentElement;
            list.quitarPedido(getPedidoIndex(target), listaDom)
        }
    }
}

listaDom.addEventListener('click', removerPedido)

listarCategorias();

// Para el modal

let modal = document.getElementById('tvesModal');
let btn = document.getElementById('btnModal');
let closeButton = document.getElementById('close');
let contenidoModal = document.getElementById('contenido');
let closeForm = document.getElementById('closeForm');

btn.onclick = function () {
    modal.style.visibility = 'visible';
    modal.style.opacity = 1;
    contenidoModal.style.top = '100px';
}

closeButton.onclick = function () {
    contenidoModal.style.top = '-100%';
    modal.style.visibility = 'hidden';
    modal.style.opacity = 0;
}

closeForm.onclick = function (e) {
    if (document.getElementById('nombreCliente').value =! '') {
        handleForm(e);
        agregar();
        contenidoModal.style.top = '-100%';
        modal.style.visibility = 'hidden';
        modal.style.opacity = 0;
    }
}

