<!DOCTYPE html>
<html>
<head>
    <meta charset="Utf-8">
    <meta name="viewport" content ="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="../css/crud.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h2>Administración de usuarios</h2>
<a href="../menu_admin.php"><button>Regresar</button></a>
    <!-- Botón para agregar usuario --> 
   

    <!-- Tabla de usuarios -->
    <table id="usuariosTable" border="1">
        <thead>
            <tr>
                <th>id_usuario</th>
                <th>usuario</th>
                <th>correo</th>
                <th>contrasena</th>
                <th>opciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <!-- Formulario de Edición de Usuario -->
    <div id="modalEditar" style="display:none;">
        <h3>Editar Usuario</h3>
        <form id="mostrarEditarUsuario">
            <!-- Campos de edición: id_usuario, usuario, contrasena -->
            id_usuario: <span id="editId_usuario"></span><br>
            usuario: <input type="text" id="editUsuario"><br>
            correo: <input type="text" id="editCorreo"><br>
            contrasena: <input type="text" id="editContrasena"><br>
            <button type="button" onclick="guardarEdicion()">Guardar</button>
            <button type="button" onclick="cancelarEdicion()">Cancelar</button>
        </form>
    </div>
    <button class="button" type="button" onclick="mostrarAgregarUsuario()">Agregar Usuario</button>

    <!-- Modal para agregar usuario -->
    <div id="modalAgregar" style="display:none;">
        <h3>Agregar Usuario</h3>
        <form id="mostrarAgregarUsuario">
            <!-- Campos de agregar: usuario, correo, contrasena,-->
            usuario: <input type="text" id="agregarUsuario"><br>
            correo: <input type="text" id="agregarCorreo"><br>
            contrasena: <input type="text" id="agregarContrasena"><br>
            <button type="button" onclick="guardarAgregarUsuario()">Guardar</button>
            <button type="button" onclick="cancelarAgregarUsuario()">Cancelar</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            // Cargar la lista de usuarios al cargar la página
            cargarUsuarios();
        });

        function cargarUsuarios() {
            $.ajax({
                url:'cargar_usuarios.php',
                type:'Get',
                success:function(response) {
                    $('#usuariosTable tbody').html(response);
                }
            });
        }

        function mostrarEditarUsuario(id_usuario, usuario, correo, contrasena) {
            // Llenar los campos del formulario de edición
            document.getElementById('editId_usuario').innerText = id_usuario;
            document.getElementById('editUsuario').value = usuario;
            document.getElementById('editCorreo').value = correo;
            document.getElementById('editContrasena').value = contrasena;

            // Mostrar la ventana modal de edición
            document.getElementById('modalEditar').style.display ='block';  
        }

        function guardarEdicion() {
            // Obtener los datos del formulario de edición
            var id_usuario = document.getElementById('editId_usuario').innerText;
            var usuario = document.getElementById('editUsuario').value;
            var correo = document.getElementById('editCorreo').value;
            var contrasena = document.getElementById('editContrasena').value;

            // Enviar los datos editados al servidor usando AJAX
            $.ajax({
                type: 'POST',
                url: 'guardaredicion.php',
                data:{
                    id_usuario,
                    usuario,
                    correo,
                    contrasena
                    
                },
                success: function(response) {
                    alert('Usuario editado correctamente');
                    document.getElementById('modalEditar').style.display = 'none';
                    // Actualizar la lista de usuarios después de la edición
                    cargarUsuarios();
                }
            }); 
        }

        function eliminarUsuario(id_usuario) {
            if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
                // Enviar la solicitud para eliminar el usuario al servidor usando AJAX
                $.ajax({
                    type: 'POST',
                    url: 'eliminar_usuarios.php',
                    data: {
                        id_usuario: id_usuario
                    },
                    success: function (response) {
                        alert(response);
                        // Actualizar la lista de usuarios después de la eliminación
                        cargarUsuarios();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error al intentar eliminar el usuario.");
                    }
                });
                
            }
            
        }

        function mostrarAgregarUsuario() {
            // Limpiar los campos del formulario de agregar usuario
            
            document.getElementById('agregarUsuario').value = '';
            document.getElementById('agregarCorreo').value = '';
            document.getElementById('agregarContrasena').value = '';

            // Mostrar la ventana modal de agregar
            document.getElementById('modalAgregar').style.display = 'block';
        }

        function guardarAgregarUsuario() {
            // Obtener los datos del formulario de agregar usuario
            var usuario = document.getElementById('agregarUsuario').value;
            var correo = document.getElementById('agregarCorreo').value;
            var contrasena = document.getElementById('agregarContrasena').value;
            

            // Enviar los datos del nuevo usuario al servidor usando AJAX
            $.ajax({
                type: 'POST',
                url: 'registrar_usuarios.php',
                data: {
                    usuario,
                    correo,
                    contrasena
                   
                },
                success: function(response) {
                    alert('Usuario agregado correctamente');
                    document.getElementById('modalAgregar').style.display = 'none';
                    // Actualizar la lista de usuarios después de la adición
                    cargarUsuarios();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Error al agregar el usuario.");
                }
            });
        }

        function cancelarEdicion() {
        // Ocultar la ventana modal de edición
        document.getElementById('modalEditar').style.display = 'none';
    }

        function cancelarAgregarUsuario() {
        // Ocultar la ventana modal de agregar
        document.getElementById('modalAgregar').style.display = 'none';
    }
    </script>
</body>
</html>