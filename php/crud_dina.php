<!DOCTYPE html>
<html>
<head>
    <meta charset="Utf-8">
    <meta name="viewport" content ="width=device-width, initial-scale=1">
    <title>CRUD PRODUCTOS</title>
    <link rel="stylesheet" type="text/css" href="css/cotidinamica-styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Datos de producto</h2>
    <!-- Botón para agregar usuario -->
   

    <!-- Tabla de usuarios -->
    <table id="usuariosTable" border="1" width="100%">
        <thead> 
            <tr>
                <th>Id de Producto</th>
                <th>Nombre de Producto</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>    
    <!-- <button type="button" onclick="mostrarAgregarProducto()">Agregar</button> -->

    <!-- Formulario de Edición de Usuario -->
    <div id="modalEditar" style="display:none;">
        <h3>Editar Usuario</h3>
        <form id="mostrarEditarProducto">
            <!-- Campos de edición: id_usuario, usuario, contrasena -->
            Id de Producto: <span id="editId_Producto"></span><br>
            Nombre: <input type="text" id="editNombre"><br>
            Descripcion: <input type="text" id="editDescripcion"><br>
            Precio: <input type="text" id="editPrecio"><br>
            Stock: <input type="text" id="editStock"><br>
            <button type="button" onclick="guardarEdicion()">Guardar</button>
            <button type="button" onclick="cancelarEdicion()">Cancelar</button>
        </form>
    </div>

    <!-- Modal para agregar usuario -->
    <div id="modalAgregar" style="display:none;">
        <h3>Agregar Producto</h3>
        <form id="mostrarAgregarProducto">
            <!-- Campos de agregar: usuario, correo, contrasena,-->
            Nombre: <input type="text" id="agregarProducto"><br>
            Descripcion: <input type="text" id="agregarDescripcion"><br>
            Precio: <input type="text" id="agregarPrecio"><br>
            Stock: <input type="text" id="agregarStock"><br>
            <button type="button" onclick="guardarAgregarUsuario()">Guardar</button>
            <button type="button" onclick="cancelarAgregarUsuario()">Cancelar</button>
        </form>
    </div>

    <div id="modalBUY" style="display:none;">
        <h3>Comprar Producto</h3>
        <form id="mostrarBUY">
            <!-- Campos de agregar: usuario, correo, contrasena,-->
            ID del producto: <span id="buyId_producto"></span><br>
            Stock del Producto: <input type="text" id="buyStock"><br>
            <button type="button" onclick="saveBUY()">Comprar</button>
            <button type="button" onclick="cancelarBUY()">Cancelar</button>
        </form>
    </div>

    <script defer>
        $(document).ready(function(){
            // Cargar la lista de usuarios al cargar la página
            cargarUsuarios();
        });

        function cargarUsuarios() {
            $.ajax({
                url:'cargar_usuarios_dina.php',
                type:'GET',
                success:function(response) {
                    $('#usuariosTable tbody').html(response);
                }
            });
        }

        function mostrarBUY(id_producto, stock){
            document.getElementById('buyStock').value = stock;
            document.getElementById('buyId_producto').innerText = id_producto;

            document.getElementById('modalBUY').style.display ='block';  
        }
        function saveBUY(){
            var stock = document.getElementById('buyStock').value;
            var id_producto = document.getElementById('buyId_producto').innerText

            $.ajax({
                type: 'POST',
                url: 'guardar_buy_dina.php',
                data:{  
                    id_producto,
                    stock
                },
                success: function(response) {
                    alert('Gracias por comprar!');
                    document.getElementById('modalBUY').style.display = 'none';
                    cargarUsuarios();
                }
            }); 
        }

        function mostrarEditarProducto(id_producto, nombre, descripcion, precio, stock) {
            // Llenar los campos del formulario de edición
            document.getElementById('editId_Producto').innerText = id_producto;
            document.getElementById('editNombre').value = nombre;
            document.getElementById('editDescripcion').value = descripcion;
            document.getElementById('editPrecio').value = precio;
            document.getElementById('editStock').value = stock;

            // Mostrar la ventana modal de edición
            document.getElementById('modalEditar').style.display ='block';  
        }

        function guardarEdicion() {
            // Obtener los datos del formulario de edición
            var id_producto = document.getElementById('editId_Producto').innerText;
            var nombre = document.getElementById('editNombre').value;
            var descripcion = document.getElementById('editDescripcion').value;
            var precio = document.getElementById('editPrecio').value;
            var stock = document.getElementById('editStock').value;

            // Enviar los datos editados al servidor usando AJAX
            $.ajax({
                type: 'POST',
                url: 'guardar_edicion_dina.php',
                data:{
                    id_producto,
                    nombre,
                    descripcion,
                    precio,
                    stock
                    
                },
                success: function(response) {
                    alert('Producto editado correctamente');
                    document.getElementById('modalEditar').style.display = 'none';
                    // Actualizar la lista de usuarios después de la edición
                    cargarUsuarios();
                }
            }); 
        }

        function eliminarUsuario(id_producto) {
            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                // Enviar la solicitud para eliminar el usuario al servidor usando AJAX
                $.ajax({
                    type: 'POST',
                    url: 'eliminar_usuarios_dina.php',
                    data: {
                        id_producto: id_producto
                    },
                    success: function (response) {
                        alert(response);
                        // Actualizar la lista de usuarios después de la eliminación
                        cargarUsuarios();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error al intentar eliminar el producto.");
                    }
                });
                
            }
            
        }

        function mostrarAgregarProducto() {
            // Llenar los campos del formulario de edición
            document.getElementById('agregarProducto').value = '';
            document.getElementById('agregarDescripcion').value = '';
            document.getElementById('agregarPrecio').value = '';
            document.getElementById('agregarStock').value = '';
            // Mostrar la ventana modal de agregar
            document.getElementById('modalAgregar').style.display = 'block';
        }

        function guardarAgregarUsuario() {
            // Obtener los datos del formulario de agregar usuario
            var nombre = document.getElementById('agregarProducto').value;
            var descripcion = document.getElementById('agregarDescripcion').value;
            var precio = document.getElementById('editPrecio').value;
            var stock = document.getElementById('editStock').value;


            // Enviar los datos del nuevo usuario al servidor usando AJAX
            $.ajax({
                type: 'POST',
                url: 'registrar_usuarios_dina.php',
                data: {
                    nombre,
                    descripcion,
                    precio,
                    stock
                },
                success: function(response) {
                    alert('Producto agregado correctamente');
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
        function cancelarBUY() {
        // Ocultar la ventana modal de BUY
        document.getElementById('modalBUY').style.display = 'none';
    }
    </script>
</body>
</html>
