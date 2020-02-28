(()=> {
    'use strict';
    window.addEventListener('load', () => {
        const loginUser = document.getElementById("loginUser");
        const respuestaErronea = document.getElementById('respuestaErronea');
        respuestaErronea.style.display = "none";
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('login-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, (form) => {
            form.addEventListener('submit',  (event) => {
                event.preventDefault();
                event.stopPropagation();
                if (form.checkValidity()) {
                    let dataForm = new FormData(loginUser);
                    fetch('modulos/php/login.php',{
                        method : 'POST',
                        body : dataForm
                    })
                    .then((response)=>response.json())
                    .then((data)=>{
                        console.log(data)
                        if(data.estatus === 'ok'){
                            location.href = raiz+"modulos/paginas/pagina-principal.php";
                        }else{
                            if(data.length !== undefined){
                                respuestaErronea.innerHTML  = '';
                                data.forEach((res) => {
                                    respuestaErronea.innerHTML += `<p class="mb-0">${res}</p>`;
                                });
                            }else{
                                respuestaErronea.innerHTML = data.mensaje; 
                            }
                            respuestaErronea.style.display="block";
                        }
                    })
                    .catch((error)=>console.log(error));
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();