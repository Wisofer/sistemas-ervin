<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js" integrity="sha512-ifx27fvbS52NmHNCt7sffYPtKIvIzYo38dILIVHQ9am5XGDQ2QjSXGfUZ54Bs3AXdVi7HaItdhAtdhKz8fOFrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="bg-gray-100">

    <!-- Modal de Errores -->
    <div id="modalErrores" class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="modal-content bg-white rounded-lg p-6 relative">
            <span class="close cursor-pointer text-red-500 text-2xl absolute top-2 right-4" onclick="cerrarModal()">&times;</span>
            <h2 class="text-lg font-semibold mb-4">Errores</h2>
            <div id="alertaErrores" class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 hidden" role="alert">
                <span class="font-medium">¡Atención!</span> Verifica los errores a continuación.
            </div>
            <!-- Sección para mostrar errores del servidor -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2 class="text-lg font-semibold mt-4">Código Generado</h2>
            <input type="text" id="codigoModal" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
    </div>

    <!-- Formulario de Usuario -->
    <div class="container mx-auto p-6">
        <form action="{{ route('usuarios.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Código -->
                <div>
                    <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
                    <input type="text" name="codigo" id="codigo" required readonly
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <!-- Nombres -->
                <div>
                    <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
                    <input type="text" name="nombres" id="nombres" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <!-- Apellidos -->
                <div>
                    <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                </div>
                <!-- Más campos aquí según sea necesario... -->
                <!-- Botón de envío -->
                <div>
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Crear Usuario
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Script para generar código y mostrar/ocultar el modal -->
    <script>
        function generarCodigo() {
            const numeros = '0123456789';
            const letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            let codigo = '';

            for (let i = 0; i < 4; i++) {
                codigo += numeros.charAt(Math.floor(Math.random() * numeros.length));
            }
            for (let i = 0; i < 4; i++) {
                codigo += letras.charAt(Math.floor(Math.random() * letras.length));
            }

            return codigo;
        }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('codigo').value = generarCodigo();
    });
</script>

<form action="{{ route('usuarios.store') }}" method="POST" class="space-y-4">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código <i
                    class="fas fa-barcode"></i></label>
            <input type="text" name="codigo" id="codigo" required readonly
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres <i
                    class="fas fa-user"></i></label>
            <input type="text" name="nombres" id="nombres" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos <i
                    class="fas fa-user-tag"></i></label>
            <input type="text" name="apellidos" id="apellidos" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="cedula" class="block text-sm font-medium text-gray-700">Cédula <i
                    class="fas fa-id-card"></i></label>
            <input type="text" name="cedula" id="cedula" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="codigo_pais" class="block text-sm font-medium text-gray-700">Código de País <i
                    class="fas fa-globe"></i></label>
            <input type="text" name="codigo_pais" id="codigo_pais" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono <i
                    class="fas fa-phone"></i></label>
            <input type="text" name="telefono" id="telefono" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="servicio" class="block text-sm font-medium text-gray-700">Servicio <i
                    class="fas fa-concierge-bell"></i></label>
            <input type="text" name="servicio" id="servicio" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="plan" class="block text-sm font-medium text-gray-700">Plan <i
                    class="fas fa-list-alt"></i></label>
            <select name="plan" id="plan" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="5 Mbps">5 Mbps</option>
                <option value="10 Mbps">10 Mbps</option>
                <option value="15 Mbps">15 Mbps</option>
                <option value="20 Mbps">20 Mbps</option>
                <option value="30 Mbps">30 Mbps</option>
            </select>
        </div>

        <div>
            <label for="sector" class="block text-sm font-medium text-gray-700">Sector <i
                    class="fas fa-industry"></i></label>
            <input type="text" name="sector" id="sector" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="estacion_base" class="block text-sm font-medium text-gray-700">Estación Base <i
                    class="fas fa-signal"></i></label>
            <select name="estacion_base" id="estacion_base" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="N1">N1</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="X">X</option>
                <option value="R1">R1</option>
                <option value="R2">R2</option>
                <option value="R3">R3</option>
            </select>
        </div>

        <div>
            <label for="tecnologia" class="block text-sm font-medium text-gray-700">Tecnología <i
                    class="fas fa-laptop"></i></label>
            <select name="tecnologia" id="tecnologia" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="PtMP">PtMP</option>
                <option value="UDP">UDP</option>
                <option value="PtP">PtP</option>
            </select>
        </div>

        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado <i
                    class="fas fa-check-circle"></i></label>
            <select name="estado" id="estado" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
                <option value="pendiente">Pendiente</option>
            </select>
        </div>

        <div>
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio <i
                    class="fas fa-calendar-alt"></i></label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ date('Y-m-d') }}" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

        <div>
            <label for="fecha_finalizacion" class="block text-sm font-medium text-gray-700">Fecha de Finalización <i
                    class="fas fa-calendar-alt"></i></label>
            <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>

    </div>

    <div>
        <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <i class="fas fa-user-plus"></i> Crear Usuario
        </button>
    </div>
</form>
