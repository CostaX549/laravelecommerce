<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url ('admin/orders') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#categorias" aria-expanded="false" aria-controls="categorias">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Categorias</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categorias">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ url ('admin/category/create') }}">Adicionar categoria</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url ('admin/category') }}">Ver categorias</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#produtos" aria-expanded="false" aria-controls="produtos">
              <i class="mdi mdi-plus-circle menu-icon"></i>
              <span class="menu-title">Produtos</span>
              <i class="menu-arrow"></i>
            </a>
            
          <div class="collapse" id="produtos">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href=" {{ url ('admin/products/create') }}">Adicionar produto</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ url ('admin/products') }}">Ver produtos</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Form elements</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/brands') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Marcas</span>
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/colors') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Cores</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url ('admin/sliders') }}">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Sliders</span>
            </a>
          </li>
        </ul>
      </nav>