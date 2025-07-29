        <!-- Sidebar -->
        
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Voltrix<sup>game</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Configuracion
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Administración</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('usuarios') }}">
                            <i class="fa-solid fa-user fa-fw"></i>👥Usuarios
                        </a>
                        <a class="collapse-item" href="{{ route('voz.index') }}">
                            <i class="fa-solid fa-user fa-fw"></i>ComandoVoz
                        </a>
                        <a class="collapse-item" href="{{ route('comando.video') }}">
                            <i class="fa-solid fa-user fa-fw"></i>ComandoVideo
                        </a>
                    
                    
                    </div>
                        
                </div>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('products.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Productos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('productos.agregar')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>AgregarProducto</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('products.delete')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>BorrarProducto</span></a>
            </li>
             <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('productos.editar.tabla')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>EditarProducto</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('reporte.index')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>ReporteEstadistica</span>
                </a>


            </li>
            


        </ul>
        <!-- End of Sidebar -->