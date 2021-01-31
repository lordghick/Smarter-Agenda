
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

// // obtener el indice de cada pedidos

// function getPedidoIndex(e) {
//     let pedidoItem = e.parentElement;
//         console.log(pedidoItem);
//     let pedidosItems = [...lista.querySelectorAll('.listado')];
//     return pedidosItems.indexOf(pedidoItem);
// }

// ordenar el indice cuando se agrega o elimina una tarea

// function ordenarContador(e) {
//     for (let i = 0; i < e.pedidos.length; i++) {
//         e.pedidos[i].index = (i + 1);
//     }
// }

// //Remover item

// function removerPedido(e, list = inbox) {
//     if (e.target.className === 'btnLista eliminar') {
//         let pregunta = prompt('¿Estás seguro de eliminar el pedido?');
//         if (pregunta == 'si') {
//             let target = e.target.parentElement;
//             list.quitarPedido(getPedidoIndex(target), listaDom)
//         }
//     }
// }

// listaDom.addEventListener('click', removerPedido)



