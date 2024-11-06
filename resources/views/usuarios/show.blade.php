<div class="modal fade" id="usuarioModal" tabindex="-1" aria-labelledby="usuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%;">
        <div class="modal-content rounded-lg shadow-lg bg-white">
            <div class="modal-body p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-100 p-4 rounded-lg shadow">
                        <p class="text-gray-800 font-medium"><strong>Código:</strong> <span class="text-gray-600">{{ $usuario->codigo }}</span></p>
                        <p class="text-gray-800 font-medium"><strong>Nombre:</strong> <span class="text-gray-600">{{ $usuario->apellidos }} {{ $usuario->nombres }}</span></p>
                        <p class="text-gray-800 font-medium"><strong>Cédula:</strong> <span class="text-gray-600">{{ $usuario->cedula }}</span></p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow">
                        <p class="text-gray-800 font-medium"><strong>Código de País:</strong> <span class="text-gray-600">{{ $usuario->codigo_pais }}</span></p>
                        <p class="text-gray-800 font-medium"><strong>Teléfono:</strong> <span class="text-gray-600">{{ $usuario->telefono }}</span></p>
                        <p class="text-gray-800 font-medium"><strong>Servicio:</strong> <span class="text-gray-600">{{ $usuario->servicio }}</span></p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow">
                        <p class="text-gray-800 font-medium"><strong>Plan:</strong> <span class="text-gray-600">{{ $usuario->plan }}</span></p>
                        <p class="text-gray-800 font-medium"><strong>Sector:</strong> <span class="text-gray-600">{{ $usuario->sector }}</span></p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow">
                        <p class="text-gray-800 font-medium"><strong>Estación Base:</strong> <span class="text-gray-600">{{ $usuario->estacion_base }}</span></p>
                        <p class="text-gray-800 font-medium"><strong>Tecnología:</strong> <span class="text-gray-600">{{ $usuario->tecnologia }}</span></p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow">
                        <p class="text-gray-800 font-medium"><strong>Estado:</strong> <span class="text-gray-600">{{ $usuario->estado }}</span></p>
                        <p class="text-gray-800 font-medium"><strong>Fecha de Inicio:</strong> <span class="text-gray-600">{{ $usuario->fecha_inicio }}</span></p>
                        <p class="text-gray-800 font-medium"><strong>Fecha de Finalización:</strong> <span class="text-gray-600">{{ $usuario->fecha_finalizacion }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
