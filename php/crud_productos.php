<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="../css/crud_productos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Administración de componentes</h2>
    <a href="../menu_admin.php"><button>Regresar</button></a>
    <!-- Tabla de productos -->
    <table id="productosTable" border="1">
        <thead>
            <tr>
                <th>id_producto</th>
                <th>nombre</th>
                <th>descripcion</th>
                <th>precio</th>
                <th>stock</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <!-- Formulario de Edición de Producto -->
    <div id="modalEditar" style="display:none;">
        <h3>Editar Producto</h3>
        <form id="mostrarEditarProducto">
            <!-- Campos de edición: id_producto, nombre, descripcion, precio -->
            id_producto: <span id="editId_producto"></span><br>
            nombre: <input type="text" id="editNombre"><br>
            descripcion: <input type="text" id="editDescripcion"><br>
            precio: <input type="text" id="editPrecio"><br>
            <!--  -->
            stock: <input type="text" id="editStock"><br>
            <button type="button" onclick="guardarEdicion()">Guardar</button>
            <button type="button" onclick="cancelarEdicion()">Cancelar</button>
        </form>
    </div>

    <!-- Botón para agregar producto -->
    <button class="button" type="button" onclick="mostrarAgregarProducto()">Agregar Producto</button>

    <!-- Modal para agregar producto -->
    <div id="modalAgregar" style="display:none;">
        <h3>Agregar Producto</h3>
        <form id="mostrarAgregarProducto">
            <!-- Campos de agregar: nombre, descripcion, precio -->
            nombre: <input type="text" id="agregarNombre"><br>
            descripcion: <input type="text" id="agregarDescripcion"><br>
            precio: <input type="text" id="agregarPrecio"><br>
            stock: <input type="text" id="agregarStock"><br>
            <button type="button" onclick="guardarAgregarProducto()">Guardar</button>
            <button type="button" onclick="cancelarAgregarProducto()">Cancelar</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            // Cargar la lista de productos al cargar la página
            cargarProductos();
        });

        function cargarProductos() {
            $.ajax({
                url:'cargar_productos.php',
                type:'Get',
                success:function(response) {
                    $('#productosTable tbody').html(response);
                }
            });
        }

        function mostrarEditarProducto(id_producto, nombre, descripcion, precio, stock) {
            // Llenar los campos del formulario de edición
            document.getElementById('editId_producto').innerText = id_producto;
            document.getElementById('editNombre').value = nombre;
            document.getElementById('editDescripcion').value = descripcion;
            document.getElementById('editPrecio').value = precio;
            document.getElementById('editStock').value = stock;


            // Mostrar la ventana modal de edición
            document.getElementById('modalEditar').style.display ='block';  
        }

        function guardarEdicion() {
            // Obtener los datos del formulario de edición
            var id_producto = document.getElementById('editId_producto').innerText;
            var nombre = document.getElementById('editNombre').value;
            var descripcion = document.getElementById('editDescripcion').value;
            var precio = document.getElementById('editPrecio').value;
            var stock = document.getElementById('editStock').value;
            

            // Enviar los datos editados al servidor usando AJAX
            $.ajax({
                type: 'POST',
                url: 'guardaredicion_product.php',
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
                    // Actualizar la lista de productos después de la edición
                    cargarProductos();
                }
            }); 
        }

        function eliminarProducto(id_producto) {
            if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
                // Enviar la solicitud para eliminar el producto al servidor usando AJAX
                $.ajax({
                    type: 'POST',
                    url: 'eliminar_productos.php',
                    data: {
                        id_producto: id_producto
                    },
                    success: function (response) {
                        alert(response);
                        // Actualizar la lista de productos después de la eliminación
                        cargarProductos();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error al intentar eliminar el producto.");
                    }
                });
            }
        }

        function mostrarAgregarProducto() {
            // Limpiar los campos del formulario de agregar producto
            document.getElementById('agregarNombre').value = '';
            document.getElementById('agregarDescripcion').value = '';
            document.getElementById('agregarPrecio').value = '';
            document.getElementById('agregarStock').value = '';

            // Mostrar la ventana modal de agregar
            document.getElementById('modalAgregar').style.display = 'block';
        }

        function guardarAgregarProducto() {
            // Obtener los datos del formulario de agregar producto
            var nombre = document.getElementById('agregarNombre').value;
            var descripcion = document.getElementById('agregarDescripcion').value;
            var precio = document.getElementById('agregarPrecio').value;
            var stock = document.getElementById('agregarStock').value;
    
            // Enviar los datos del nuevo producto al servidor usando AJAX
            $.ajax({
                type: 'POST',
                url: 'registrar_productos.php',
                data: {
                    nombre,
                    descripcion,
                    precio,
                    stock
                },
                success: function(response) {
                    alert('Producto agregado correctamente');
                    document.getElementById('modalAgregar').style.display = 'none';
                    // Actualizar la lista de productos después de la adición
                    cargarProductos();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Error al agregar el producto.");
                }
            });
        }

        function cancelarEdicion() {
            // Ocultar la ventana modal de edición
            document.getElementById('modalEditar').style.display = 'none';
        }

        function cancelarAgregarProducto() {
            // Ocultar la ventana modal de agregar
            document.getElementById('modalAgregar').style.display = 'none';
        }
    </script>
</body>
</html>
