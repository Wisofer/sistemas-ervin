<x-app-layout>
    <div class="py-6">
        <h1 class="text-3xl font-bold text-center mb-4">Lista de Usuarios</h1>
        <div class="text-right mb-4">
            <div class="flex justify-end space-x-2">
                <button onclick="openModal('create')" class="bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Agregar Usuario
                </button>
                <button onclick="exportarExcel()" class="bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Exportar a Excel
                </button>
            </div>
        </div>

        <div class="mb-4">
            <div class="flex items-center">
                <input type="text" id="search" placeholder="Buscar..." class="border border-gray-300 rounded-l px-4 py-2 w-1/3" />
                <button onclick="filterTable()" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-r">
                    <i class="fas fa-search"></i>
                </button>
                <button onclick="resetSearch()" class="bg-gray-300 text-black font-bold py-2 px-4 rounded-r">
                    Resetear
                </button>
            </div>
        </div>

        <table class="min-w-full bg-white border border-gray-300" id="usuariosTable">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Código</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Cédula</th>
                    <th class="py-2 px-4 border-b">Código de País</th>
                    <th class="py-2 px-4 border-b">Teléfono</th>
                    <th class="py-2 px-4 border-b">Servicio</th>
                    <th class="py-2 px-4 border-b">Plan</th>
                    <th class="py-2 px-4 border-b">Sector</th>
                    <th class="py-2 px-4 border-b">Estación Base</th>
                    <th class="py-2 px-4 border-b">Tecnología</th>
                    <th class="py-2 px-4 border-b">Estado</th>
                    <th class="py-2 px-4 border-b">Fecha de Inicio</th>
                    <th class="py-2 px-4 border-b">Fecha de Finalización</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $usuario->codigo }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->apellidos }} {{ $usuario->nombres }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->cedula }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->codigo_pais }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->telefono }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->servicio }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->plan }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->sector }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->estacion_base }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->tecnologia }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->estado }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->fecha_inicio }}</td>
                        <td class="py-2 px-4 border-b">{{ $usuario->fecha_finalizacion }}</td>
                        <td class="py-2 px-4 border-b">
                            <button onclick="openModal('show', '{{ $usuario->id }}')" class="text-blue-600 hover:text-blue-800" title="Ver más">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="openModal('edit', '{{ $usuario->id }}')" class="text-yellow-600 hover:text-yellow-800 mx-2" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="confirmDelete('{{ $usuario->nombres }} {{ $usuario->apellidos }}', '{{ route('usuarios.destroy', $usuario) }}')" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="myModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg w-full max-w-4xl p-6">
                <div class="flex justify-between items-center border-b">
                    <h2 class="text-lg font-semibold" id="modalTitle">Formulario de Usuarios</h2>
                    <button onclick="closeModal()" class="text-gray-500">&times;</button>
                </div>
                <div id="modalContent" class="py-2">
                </div>
                <div class="flex justify-end ">
                    <button onclick="closeModal()" class="mr-3 bg-gray-300 px-4 py-2 rounded">Cerrar</button>
                </div>
            </div>
        </div>

        <div id="confirmDeleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg w-full max-w-md p-6">
                <h2 class="text-lg font-semibold mb-4">Confirmar Eliminación</h2>
                <p id="confirmMessage"></p>
                <div class="flex justify-end mt-4">
                    <button onclick="closeConfirmDeleteModal()" class="mr-3 bg-gray-300 px-4 py-2 rounded">Cancelar</button>
                    <button id="confirmDeleteButton" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
                </div>
            </div>
        </div>

        <div id="loader" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="loader"></div>
        </div>

        <style>
            .loader {
                border: 8px solid #f3f3f3;
                border-top: 8px solid #3498db;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>

        <script>
            let deleteUrl = '';

            function openModal(action, id = null) {
                document.getElementById('loader').classList.remove('hidden');
                setTimeout(() => {
                    document.getElementById('myModal').classList.remove('hidden');

                    let url = '';
                    if (action === 'create') {
                        url = '/usuarios/create';
                        document.getElementById('modalTitle').innerText = 'Formulario de Usuarios';
                    } else if (action === 'show') {
                        url = '/usuarios/' + id;
                        document.getElementById('modalTitle').innerText = 'Detalles del Usuario';
                    } else if (action === 'edit') {
                        url = '/usuarios/' + id + '/edit';
                        document.getElementById('modalTitle').innerText = 'Editar Usuario';
                    }

                    fetch(url)
                        .then(response => response.text())
                        .then(data => {
                            document.getElementById('modalContent').innerHTML = data;
                        })
                        .catch(error => console.error('Error al cargar el contenido del modal:', error))
                        .finally(() => {
                            document.getElementById('loader').classList.add('hidden');
                        });
                }, 2000);
            }

            function closeModal() {
                document.getElementById('myModal').classList.add('hidden');
            }

            function confirmDelete(nombreCompleto, url) {
                document.getElementById('confirmMessage').innerText = `¿Está seguro de que desea eliminar a ${nombreCompleto}?`;
                deleteUrl = url;
                document.getElementById('confirmDeleteModal').classList.remove('hidden');
            }

            function closeConfirmDeleteModal() {
                document.getElementById('confirmDeleteModal').classList.add('hidden');
            }

            document.getElementById('confirmDeleteButton').onclick = function() {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;

                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);

                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }

            function exportarExcel() {
                window.location.href = '/';
            }

            function filterTable() {
                const input = document.getElementById('search');
                const filter = input.value.toLowerCase();
                const table = document.getElementById('usuariosTable');
                const tr = table.getElementsByTagName('tr');

                for (let i = 1; i < tr.length; i++) {
                    let showRow = false;
                    const td = tr[i].getElementsByTagName('td');
                    for (let j = 0; j < td.length; j++) {
                        if (td[j]) {
                            const txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                                showRow = true;
                                break;
                            }
                        }
                    }
                    tr[i].style.display = showRow ? "" : "none";
                }
            }

            function resetSearch() {
                document.getElementById('search').value = '';
                filterTable();
            }
        </script>
    </div>
</x-app-layout>
