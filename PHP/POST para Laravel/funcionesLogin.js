
        document.getElementById('login-form').addEventListener('submit', async (event) => {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const datos = {
                email: email,
                password: password,
            }

            const instAxios = axios.create(
                {
                    withCredentials:true,
                    xsrfCookieName: 'XSRF-TOKEN',
                    xsrfHeaderName: 'X-XSRF-TOKEN',
                }  
            )

            //instAxios.get('http://localhost:8000/sanctum/csrf-cookie')
            instAxios.post(
                'http://localhost:8000/api/login',
                datos, 
                {
                    headers: {
                        'Content-Type': 'application/json'  
                    }
                },
               // withCredentials: true,
            )
                .then(function(response) {
                    alert("Login Exitoso")
                    console.log('Datos enviados correctamente:', response.data);
                    //verPublicaciones()
                    //Recepción de la respuesta de la API
                    localStorage.setItem('auth-token', response.data.token);
                })
                .catch(function(error) {
                    console.error('Error al enviar los datos:', error);
                    // Manejo de los errores
                });


        });
