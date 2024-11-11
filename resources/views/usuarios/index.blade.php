<x-app-layout>

    <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
        <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border">
          <div class="flex items-center justify-between gap-8 mb-8">
            <div>
              <h5
                class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                Usuarios
              </h5>
              <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                Datos generales de clientes
              </p>
            </div>
            <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
              <button onclick="openModal('create')"
                class="flex select-none items-center gap-3 rounded-lg bg-blue-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button">
                </svg>
                Nuevo Usuario
              </button>

              <button
                class="flex select-none items-center gap-3 rounded-lg bg-green-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button">
                Importar a Excel
              </button>

              <button
                class="flex select-none items-center gap-3 rounded-lg bg-green-700 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button">
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

        </div>
        <div class="p-6 px-0 overflow-scroll">
          <table class="w-full mt-4 text-left table-auto min-w-max" id="usuariosTable">
            <thead>
              <tr>
                <th
                  class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                  <p
                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Datos Personales
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                    </svg>
                  </p>
                </th>
                <th
                  class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                  <p
                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Servicio
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                    </svg>
                  </p>
                </th>
                <th
                  class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                  <p
                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Tecnología
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                    </svg>
                  </p>
                </th>
                <th
                  class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                  <p
                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Estado
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                    </svg>
                  </p>
                </th>

                <th
                  class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                  <p
                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                    Operaciones
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                    </svg>
                  </p>
                </th>
                <th
                  class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                  <p
                    class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                  </p>
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
              <tr>
                <td class="p-4 border-b border-blue-gray-50">
                  <div class="flex items-center gap-3">
                    
                    <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="flex flex-col">
                      <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900"> <b>
                        {{ $usuario->nombres }} {{ $usuario->apellidos }} <br> 
                        {{ $usuario->cedula }} <br>
                        {{ $usuario->codigo_pais }} {{ $usuario->telefono }} <br>
                        {{ $usuario->codigo }} 
                    </div>
                  </div>
                </td>
                <td class="p-4 border-b border-blue-gray-50">
                  <div class="flex flex-col">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                      {{  $usuario->servicio }} ( {{ $usuario->plan }} )
                    </p>
                    
                  </div>
                </td>
                <td class="p-4 border-b border-blue-gray-50">
                  <div class="w-max">
                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{  $usuario->tecnologia }} 
                      </p>
                  </div>
                </td>
                <td class="p-4 border-b border-blue-gray-50">
                  <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                   {{ $usuario->estado }}
                  </p>
                </td>
                <td class="p-4 border-b border-blue-gray-50">

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
        </div>
        <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
          <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
            Page 1 of 10
          </p>
          <div class="flex gap-2">
            <button
              class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button">
              Previous
            </button>
            <button
              class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button">
              Next
            </button>
          </div>
        </div>
      </div>

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

            function inportarExcel() {
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
