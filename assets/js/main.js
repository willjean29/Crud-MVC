const formRegistro = document.querySelector('#guardar-registro');

const formLoguin = document.querySelector('#loguin-registro');

const tablaUsuarios = document.querySelector('#table-user');

let listaDatos = '';

const linkSalir = document.querySelector('#salir');


document.addEventListener('DOMContentLoaded', () => {
    console.log('hola crud')
    const params = new URLSearchParams(location.search);
    const pagina = params.get('pagina');
    const links = document.querySelectorAll('.nav-link');
    if(!pagina){
        links[0].classList.toggle('active');
    }
    links.forEach(link => {
        const enlace = link.textContent.toLowerCase();
        if(enlace == pagina){
            link.classList.toggle('active');
        }
    });

    if(formRegistro){
        formRegistro.addEventListener('submit',enviarForm);
    }

    if(formLoguin){
        formLoguin.addEventListener('submit',enviarLoguin);
    }


    if(tablaUsuarios){
        cargarUsuarios();
        setTimeout(() => {
            listaDatos = document.querySelector('div .eliminar-registro');
            listaDatos.addEventListener('click',()=>{
                console.log('click en eliminar');
            })
        }, 100);
    }

    if(linkSalir){
        linkSalir.addEventListener('click',(e) => {
            // e.preventDefault();
            Swal.fire({
                title: 'Correcto',
                text: `Ha cerrado sesión`,
                icon: 'success',
                timer: 1500
            })
            setTimeout(() => {
                window.location.href = 'index.php?pagina=ingreso';
            }, 1500);
            console.log('hola');

        })
    }

})



function cargarUsuarios(){
    const url = 'controllers/ajaxController.php';
    const datos = new FormData();
    datos.append('action','obtenerUsuarios');

    fetch(url,{
        method: 'POST',
        body: datos,
    })
    .then(res => res.json())
    .then(usuarios => {

        usuarios.forEach((usuario,index) => {
            const row = document.createElement('tr');
            let template = `
                <td>${index+1}</td>
                <td class="nombre">${usuario.nombre}</td>
                <td>${usuario.correo}</td>
                <td>${usuario.fecha}</td>
                <td>
                    <div class="btn-group" id="acciones">
                        <div class="px-1">
                            <a href="index.php?pagina=editar&id=${usuario.id}" class="btn btn-warning">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger eliminar-registro">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>

                    </div>
                </td>
            `;
            row.innerHTML = template;

            tablaUsuarios.appendChild(row);
        });
    })
    .catch(error => {
        console.log(error);
    });

}

function enviarForm(e){
    e.preventDefault();
    const datos = new FormData(formRegistro);

    const action = formRegistro.getAttribute('action');
    datos.append('action',action);

    const url = 'controllers/ajaxController.php';
    fetch(url,{
        method: 'POST',
        body: datos,
    })
    .then(res => res.json())
    .then(respuesta => {
        if(respuesta.respuesta == 'ok'){
            Swal.fire({
                title: 'Correcto',
                text: 'El registro se guardo con exito',
                icon: 'success',
                timer: 1500
            })

            formRegistro.reset();
            setTimeout(() => {
                window.location.href = 'index.php?pagina=ingreso';
            }, 1500);
        }

    })
    .catch(error => {
        Swal.fire({
            title: 'Error',
            text: 'Hubo un error',
            icon: 'error',
            timer: 1500
        })
    });
    
}

function enviarLoguin(e){
    e.preventDefault();
    const datos = new FormData(formLoguin);
    datos.append('action','loguinUsuario');
    const url = 'controllers/ajaxController.php';
    fetch(url,{
        method: 'POST',
        body: datos,
    })
    .then(res => res.json())
    .then(respuesta => {
        if(respuesta.respuesta == 'ok'){
            Swal.fire({
                title: 'Correcto',
                text: `Bienvenid@ ${respuesta.usuario.nombre}`,
                icon: 'success',
                timer: 1500
            })

            formLoguin.reset();
            setTimeout(() => {
                window.location.href = 'index.php?pagina=inicio';
            }, 1500);
        }

    })
    .catch(error => {
        Swal.fire({
            title: 'Error',
            text: 'Hubo un error',
            icon: 'error',
            timer: 1500
        })
    });
    
}

function formEliminar(e){
    e.preventDefault();
    console.log('eliminar');
    // const formDelete = e.target;
    // const fila = formDelete.parentElement.parentElement.parentElement;
    // const datos = new FormData(formDelete);
    // const action = formDelete.getAttribute('action');
    // datos.append('action',action);
    // const url = 'controllers/ajaxController.php';

    // Swal.fire({
    //     title: '¿Estas seguro?',
    //     text: "Un registro eliminado no se puede recuperar",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     cancelButtonText: 'Cancelar',
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Si, eliminar'
    //   }).then(function(result){
    //     if(result.value){
    //         fetch(url,{
    //             method: 'POST',
    //             body: datos,
    //         })
    //         .then(res => res.json())
    //         .then(respuesta => {
    //             if(respuesta.respuesta == 'ok'){
    //                 Swal.fire({
    //                     title: 'Correcto',
    //                     text: respuesta.msg,
    //                     icon: 'success',
    //                     timer: 1500
    //                 })
                    
    //                 fila.remove();
    //             }

    //         })
    //         .catch(error => {
    //             Swal.fire({
    //                 title: 'Error',
    //                 text: 'Hubo un error',
    //                 icon: 'error',
    //                 timer: 1500
    //             })
    //             console.log(error)
    //         });
    //     }
    //   })  
}