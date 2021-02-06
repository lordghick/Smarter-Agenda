
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

