<?php 
    include("./verificarUsuario.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Formulario</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div id="contenedor">
        <header>
            <div id="botones">
                <input type="text" id="orden" value="ID" hidden>
                <button id="load">Load</button>
                <button id="clear">Clear</button>
                <a href="../../index.html"><button id="volver">Volver al listado del ejercicio</button></a>
                <button id="agregar">Agregar Automóvil</button>
                <a href="../logout.php"><button id="cerrarSession">Cerrar sesión</button></a>
            </div>
        </header>
        <table>
            <thead>
                <tr>
                    <th campo-dato="id" class="th" id="thId">ID</th>
                    <th campo-dato="marca" class="th" id="thMarca">Marca</th>
                    <th campo-dato="modelo" class="th" id="thModelo">Modelo</th>
                    <th campo-dato="precio" class="th" id="thPrecio">Precio</th>
                    <th campo-dato="anio" class="th" id="thAnio">Año</th>
                    <th class="th">Foto</th>
                    <th class="th">Modificar</th>
                    <th class="th">Eliminar</th>
                </tr>
                <tr>
                    <td campo-dato="id" class="th"><input id="FId" type="text"></td>
                    <td campo-dato="marca" class="th">
                        <select id="FMarca">
                            <option value="">Todas</option>
                        </select>
                    </td>
                    <td campo-dato="modelo" class="th"><input id="FModelo" type="text"></td>
                    <td campo-dato="precio" class="th"><input id="FPrecio" type="text"></td>
                    <td campo-dato="anio" class="th"><input id="FAnio" type="text"></td>
                    <td class="thEmpty"></td>
                    <td class="thEmpty"></td>
                    <td class="thEmpty"></td>
                </tr>
            </thead>
            <tbody id="tabla"></tbody>
        </table>
        
        
        <!-- Modal para agregar automóvil -->
            <div id="modalAgregar" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="cerrarModalAgregar()">&times;</span>
                    <h2>Agregar Automóvil</h2>
                    <form action="./crear.php" method="POST" enctype="multipart/form-data">
                        <!-- Campos del formulario de creación -->
                        <input type="text" name="marca" placeholder="Marca" required>
                        <input type="text" name="modelo" placeholder="Modelo" required>
                        <input type="number" name="precio" placeholder="Precio" required>
                        <input type="number" name="anio" placeholder="Año" required>
                        <input type="file" name="imagen" required>
                        <input type="submit" name="modalButton" value="Agregar Automóvil">
                    </form>
                </div>
            </div>
            
            <div id="modalEditar" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="cerrarModalEditar()">&times;</span>
                    <h2>Editar Automóvil</h2>
                    <form id="modalFormEditar" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="editId" name="id">
                        <input type="text" id="editMarca" name="marca" placeholder="Marca" required>
                        <input type="text" id="editModelo" name="modelo" placeholder="Modelo" required>
                        <input type="number" id="editPrecio" name="precio" placeholder="Precio" required>
                        <input type="number" id="editAnio" name="anio" placeholder="Año" required>
                        <input type="file" id="editImagen" name="imagen">
                        <input type="submit" name="modalButton" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
        <footer id="footer">
            Footer
        </footer>
    </div>

    <script src="../../jquery.js"></script>

    <script>
        function cargarDesplegable() {
            var desplegable = $("#FMarca");
            var marcas = []; // Array para almacenar marcas únicas
        
            $.ajax({
                type: "get",
                url: "./brands.php",
                success: function(respuestaServer) {
                    alert(respuestaServer);
                    var objRespuesta = JSON.parse(respuestaServer);
                    objRespuesta.marcas.forEach(marca => {
                        if (!marcas.includes(marca.nombreMarca)) {
                            // Agregar marca al array de marcas únicas
                            marcas.push(marca.nombreMarca);
                            // Crear la opción y agregarla al desplegable
                            var opcion = document.createElement("option");
                            opcion.innerHTML = marca.nombreMarca;
                            desplegable.append(opcion);
                        }
                    });
                }
            });
        }

        $(document).ready(function(){
            cargarDesplegable();

            $("#thId, #thMarca, #thModelo, #thPrecio").click(function() {
                $("#orden").val($(this).attr("campo-dato"));
                $("#load").trigger("click");
            });

            $("#thAnio").click(function(){
                $("#orden").val("Fecha");
                $("#load").trigger("click");
            });

            $("#load").click(function(){
                alert("Cargando...");
                $("#tabla").empty();
                $("#tabla").html("<h3><i>Cargando datos...</i></h3>");

                $.ajax({
                    type: "get",
                    url: "./dataBase.php",
                    data: { 
                        orden: $("#orden").val(), 
                        id: $("#FId").val(),
                        marca: $("#FMarca").val(),
                        modelo: $("#FModelo").val(),
                        precio: $("#FPrecio").val(),
                        anio: $("#FAnio").val()
                    },
                    success: function(respuestaServer){
                        alert(respuestaServer);
                        $("#tabla").empty();
                        var objJson = JSON.parse(respuestaServer);
                        objJson.automoviles.forEach(function(valor, indice) {
                            var objTr = document.createElement("tr");
                            var tdId = document.createElement("td");
                            var tdMarca = document.createElement("td");
                            var tdModelo = document.createElement("td");
                            var tdPrecio = document.createElement("td");
                            var tdAnio = document.createElement("td");
                            var tdPDF = document.createElement("td");
                            var tdEliminar = document.createElement("td");
                            var btnEliminar = document.createElement("button");
                            var tdModificar = document.createElement("td");
                            var btnModificar = document.createElement("button");

                            tdId.innerHTML = valor.id;
                            objTr.appendChild(tdId);
                            tdMarca.innerHTML = valor.marca;
                            objTr.appendChild(tdMarca);
                            tdModelo.innerHTML = valor.modelo;
                            objTr.appendChild(tdModelo);
                            tdPrecio.innerHTML = valor.precio;
                            objTr.appendChild(tdPrecio);
                            tdAnio.innerHTML = valor.anio;
                            objTr.appendChild(tdAnio);

                            tdPDF.innerHTML = "<button class='boton' campo-dato='pdf' onclick='abrirPDF(" + valor.id + ")'>PDF</button>";
                            objTr.appendChild(tdPDF);

                            btnModificar.innerHTML = "Modificar";
                            btnModificar.value = valor.id;
                            btnModificar.addEventListener("click", function() {
                                abrirModalEditar(this.value);
                            });
                            tdModificar.appendChild(btnModificar);
                            objTr.appendChild(tdModificar);
                            
                            btnEliminar.innerHTML = "Eliminar";
                            btnEliminar.value = valor.id;
                            btnEliminar.addEventListener("click", function() {
                                eliminarAutomovil(this.value);
                            });
                            tdEliminar.appendChild(btnEliminar);
                            objTr.appendChild(tdEliminar);

                            $("#tabla").append(objTr);
                        });

                        $("#footer").html("Cantidad de registros: " + objJson.largo);
                    }
                });
            });

            $("#clear").click(function(){
                $("#tabla").empty();
                flag = 0;
            });
        });

        function eliminarAutomovil(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este automóvil?")) {
                $.ajax({
                    type: "post",
                    url: "./eliminar.php",
                    data: {
                        id: id
                    },
                    success: function(respuestaServer) {
                        alert(respuestaServer);
                        // Actualizar la tabla después de eliminar
                        $("#load").trigger("click");
                    }
                });
            }
        }
        
        $("#agregar").click(function(){
            abrirModalAgregar();
        });
        
        function abrirModalAgregar() {
            document.getElementById("modalAgregar").style.display = "block";
        }

        // Función para cerrar el modal de agregar automóvil
        function cerrarModalAgregar() {
            document.getElementById("modalAgregar").style.display = "none";
        }
        
        function abrirPDF(id) {
            window.open("./getPdf.php?id=" + id, "_blank");
        }

        function abrirModalEditar(id) {
            alert("Se va a modificar el registro: " + id);
            $.ajax({
                type: "get",
                url: "./getAutomovil.php",
                data: {
                    id: id
                },
                success: function(respuestaServer) {
                    console.log(respuestaServer);
                    var automovil = JSON.parse(respuestaServer);
                    document.getElementById("editId").value = automovil.id;
                    document.getElementById("editMarca").value = automovil.marca;
                    document.getElementById("editModelo").value = automovil.modelo;
                    document.getElementById("editPrecio").value = automovil.precio;
                    document.getElementById("editAnio").value = automovil.anio;
                    document.getElementById("modalEditar").style.display = "block";
                }
            });
        }

        function cerrarModalEditar() {
            document.getElementById("modalEditar").style.display = "none";
        }
        
       $("#modalFormEditar").submit(function(e) {
            var datos = new FormData($("#modalFormEditar")[0]);

            $.ajax({
                type: "POST",
                method: "POST",
                enctype: "multipart/form-data",
                url: "./actualizar.php",
                processData: false,
                contentType: false,
                cache: false,
                data: datos,
                success: function(respuestaServer) {
                    alert(respuestaServer);
                    $("#load").trigger("click");
                    cerrarModalEditar();
                }
            });
        });

        
    </script>
</body>
</html>
