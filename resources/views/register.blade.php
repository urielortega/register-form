<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Register - EventosTec</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

        <link rel="stylesheet" href="{{asset('css/style.css')}}">

    </head>
    <body class="text-center">
        
        <main class="form-signin">
            <form id="register-form">
                <h1 class="h3 mb-5 fw-bold">
                    <i class="bi bi-balloon"></i>
                    EventosTec
                </h1>
                
                <div class="form-floating">
                    <input type="text" class="form-control" id="name" placeholder="John Doe">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating">                    
                    {{-- onblur permite ejecutar la función "verifyEmail" al cambiar el foco de este campo a otro componente --}}
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" onblur="verifyEmail()">
                    <label for="email">Email</label>                    
                </div>  
                <div class="alert alert-danger" role="alert" id="error-msg" style="display: none">
                    Email not available
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit" id="registerButton">Register</button>
                
            </form>
            <p class="mt-5 mb-3 text-muted">&copy; EventosTec</p>
        </main>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script>
            function verifyEmail() {
                const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                // const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                const button = document.getElementById('registerButton');
                let email = document.getElementById('email').value;
                let errorMsg = document.getElementById('error-msg');
                
                fetch('/verify', {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        'X-CSRF-TOKEN': csrfToken
                    },
                    method: 'post',
                    credentials: "same-origin",
                    body: JSON.stringify({email: email})
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    if(data.status === 'unavailable') {
                        errorMsg.style.display = 'block'
                        button.disabled = true; // Se bloquea el botón de Registro
                    } else {
                        errorMsg.style.display = 'none'
                        button.disabled = false; // Se habilita el botón de Registro
                    }
                })
            }
        </script>
        
    </body>
</html>
