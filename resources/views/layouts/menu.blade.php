@php
$urlAdmin=config('fast.admin_prefix');
@endphp

@can('dashboard')
@php
$isDashboardActive = Request::is($urlAdmin);
@endphp
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ $isDashboardActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Inicio</p>
    </a>
</li>
@endcan

@can('generator_builder.index')
@php
$isUserActive = Request::is($urlAdmin.'*generator_builder*');
@endphp
<li class="nav-item">
    <a href="{{ route('generator_builder.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>Generador de CRUD</p>
    </a>
</li>
@endcan

@can('attendances.index')
@php
$isUserActive = Request::is($urlAdmin.'*attendances*');
@endphp

<li class="nav-item">
    <a href="{{ route('attendances.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i>

        <p>Entradas y salidas</p>
    </a>
</li>
@endcan

@canany(['users.index','roles.index','permissions.index'])
@php
$isUserActive = Request::is($urlAdmin.'*users*');
$isRoleActive = Request::is($urlAdmin.'*roles*');
$isPermissionActive = Request::is($urlAdmin.'*permissions*');
@endphp
<li class="nav-item {{($isUserActive||$isRoleActive||$isPermissionActive)?'menu-open':''}} ">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shield-virus"></i>
        <p>
            Seguridad
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('users.index')
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Usuarios
                </p>
            </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ $isRoleActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    Roles
                </p>
            </a>
        </li>
        @endcan
        @can('permissions.index')
        <li class="nav-item ">
            <a href="{{ route('permissions.index') }}" class="nav-link {{ $isPermissionActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-shield-alt"></i>
                <p>
                   Permisos
                </p>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcan
@can('fileUploads.index')
<li class="nav-item">
    <a href="{{ route('fileUploads.index') }}" class="nav-link {{ Request::is('fileUploads*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>Archivos del CMS</p>
    </a>
</li>
@endcan
<li class="nav-item">
    <a href="{{ route('herramientas.index') }}"
       class="nav-link {{ Request::is('herramientas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>Herramientas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('departamentos.index') }}"
       class="nav-link {{ Request::is('departamentos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>Departamentos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('areasDeTrabajos.index') }}"
       class="nav-link {{ Request::is('areasDeTrabajos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>Areas de trabajo</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('activosDeLaEmpresas.index') }}"
       class="nav-link {{ Request::is('activosDeLaEmpresas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>Activos de la empresa</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ route('cargos.index') }}"
       class="nav-link {{ Request::is('cargos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>@lang('models/cargos.plural')</p>
    </a>
</li>






<li class="nav-item">
    <a href="{{ route('analists.index') }}"
       class="nav-link {{ Request::is('analists*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>Analistas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('asignars.index') }}"
       class="nav-link {{ Request::is('asignars*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>Asignar a analista</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('equipo1s.index') }}"
       class="nav-link {{ Request::is('equipo1s*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>Vincular Piezas y Activos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('piezas.index') }}"
       class="nav-link {{ Request::is('piezas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>@lang('models/piezas.plural')</p>
    </a>
</li>



