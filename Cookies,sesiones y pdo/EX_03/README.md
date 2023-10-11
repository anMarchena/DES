**EX_03**

Para este codigo he creado tres ficheros.

index.php: Esta es la página principal que muestra el nombre del usuario y los puntos acumulados. Si nose ha iniciado sesión, se redirige a la página de inicio de sesión (login.php). 
Los puntos se incrementan en 10 cada vez que se carga la página.

login.php: En esta pagina esta el formulario para el inicio de sesion. Si el usuario ya ha iniciado sesión, se redirige a la página principal (index.php). Cuando el usuario inicia sesión, se establecen los puntos acumulados en cero.

logout.php: El archivo de cierre de sesión. Si el usuario ha iniciado sesión, se destruye la sesión y se redirige a la página de inicio.