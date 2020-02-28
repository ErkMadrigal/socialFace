(()=> {
    'use strict';
    window.addEventListener('load', () => {
        const respuestaCorrecta = document.getElementById('respuestaCorrecta');
        const respuestaErronea = document.getElementById('respuestaErronea');
        respuestaCorrecta.style.display = 'none';
        respuestaErronea.style.display = 'none';
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, (form) => {
            form.addEventListener('submit',  (event) => {
                event.preventDefault();
                event.stopPropagation();
                if (form.checkValidity()) {
                    let formRegistrar = document.getElementById('modificar');
                    let dataForm = new FormData(formRegistrar);
                    fetch('../php/modificar-estado.php',{
                        method : 'POST',
                        body : dataForm
                    })
                    .then((response) => response.json())
                    .then((data)=>{
                        if(data.estado === 'ok'){
                            respuestaCorrecta.innerHTML = data.mensaje;
                            respuestaCorrecta.style.display = 'block';
                            respuestaErronea.style.display = 'none';
                            formRegistrar.reset();
                            formRegistrar.classList.remove('was-validated');
                        }else{
                            if(data.length !== undefined){
                                respuestaErronea.innerHTML  = '';
                                data.forEach((res) => {
                                    respuestaErronea.innerHTML += `<p class="mb-0">${res}</p>`;
                                });
                            }else{
                                respuestaErronea.innerHTML = data.mensaje;
                            }
                            respuestaErronea.style.display = 'block';
                            respuestaCorrecta.style.display = 'none';
                        }
                    })
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
