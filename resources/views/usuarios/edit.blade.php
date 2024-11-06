<!-- Start Generation Here -->

    <form action="{{ route('usuarios.update', $usuario) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="codigo" class="block text-sm font-medium text-gray-700">Código <i class="fas fa-barcode"></i></label>
                <input type="text" name="codigo" id="codigo" value="{{ $usuario->codigo }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres <i class="fas fa-user"></i></label>
                <input type="text" name="nombres" id="nombres" value="{{ $usuario->nombres }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos <i class="fas fa-user-tag"></i></label>
                <input type="text" name="apellidos" id="apellidos" value="{{ $usuario->apellidos }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="cedula" class="block text-sm font-medium text-gray-700">Cédula <i class="fas fa-id-card"></i></label>
                <input type="text" name="cedula" id="cedula" value="{{ $usuario->cedula }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="codigo_pais" class="block text-sm font-medium text-gray-700">Código de País <i class="fas fa-globe"></i></label>
                <input type="text" name="codigo_pais" id="codigo_pais" value="{{ $usuario->codigo_pais }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono <i class="fas fa-phone"></i></label>
                <input type="text" name="telefono" id="telefono" value="{{ $usuario->telefono }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="servicio" class="block text-sm font-medium text-gray-700">Servicio <i class="fas fa-concierge-bell"></i></label>
                <input type="text" name="servicio" id="servicio" value="{{ $usuario->servicio }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="plan" class="block text-sm font-medium text-gray-700">Plan <i class="fas fa-list-alt"></i></label>
                <select name="plan" id="plan" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="5 Mbps" {{ $usuario->plan == '5 Mbps' ? 'selected' : '' }}>5 Mbps</option>
                    <option value="10 Mbps" {{ $usuario->plan == '10 Mbps' ? 'selected' : '' }}>10 Mbps</option>
                    <option value="15 Mbps" {{ $usuario->plan == '15 Mbps' ? 'selected' : '' }}>15 Mbps</option>
                    <option value="20 Mbps" {{ $usuario->plan == '20 Mbps' ? 'selected' : '' }}>20 Mbps</option>
                    <option value="30 Mbps" {{ $usuario->plan == '30 Mbps' ? 'selected' : '' }}>30 Mbps</option>
                </select>
            </div>
            
            <div>
                <label for="sector" class="block text-sm font-medium text-gray-700">Sector <i class="fas fa-industry"></i></label>
                <input type="text" name="sector" id="sector" value="{{ $usuario->sector }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>

            <div>
                <label for="estacion_base" class="block text-sm font-medium text-gray-700">Estación Base <i
                        class="fas fa-signal"></i></label>
                <select name="estacion_base" id="estacion_base" value="{{ $usuario->estacion_base }}" required
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
                <select name="tecnologia" id="tecnologia" value="{{ $usuario->tecnologia }}" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="PtMP">PtMP</option>
                    <option value="UDP">UDP</option>
                    <option value="PtP">PtP</option>
                </select>
            </div>
            
            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado <i class="fas fa-check-circle"></i></label>
                <select name="estado" id="estado" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="activo" {{ $usuario->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $usuario->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    <option value="pendiente" {{ $usuario->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                </select>
            </div>
            
            <div>
                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio <i class="fas fa-calendar-alt"></i></label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ $usuario->fecha_inicio }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            
            <div>
                <label for="fecha_finalizacion" class="block text-sm font-medium text-gray-700">Fecha de Finalización <i class="fas fa-calendar-alt"></i></label>
                <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" value="{{ $usuario->fecha_finalizacion }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
        </div>
        <div class="text-left">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-700">
                Actualizar Usuario
            </button>
        </div>
    </form>

