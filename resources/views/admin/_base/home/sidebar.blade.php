<section class="sidebar">
  <ul class="sidebar-menu">
    <li class="header">Bienvenido {{ Auth::user()['employee'][0]['typeEmployee']['description'] }}</li>
    <li>
        <a href="orders">
          <i class="glyphicon glyphicon-apple"></i> <span>Pedidos</span>
        </a>
        @if( Auth::user()['employee'][0]['id_type_employee'] === 1 )
          <a href="products">
            <i class="glyphicon glyphicon-apple"></i> <span>Productos</span>
          </a>
          <a href="providers">
            <i class="glyphicon glyphicon-tree-deciduous"></i> <span>Proveedores</span>
          </a>
          <a href="typeEmployees">
            <i class="fa fa-users"></i> <span>Tipos de Empleado</span>
          </a>
          <a href="employees">
            <i class="fa fa-user"></i> <span>Empleados</span>
          </a>
          <a href="stores">
            <i class="fa fa-home"></i> <span>Tiendas</span>
          </a>
          <a href="departments">
            <i class="fa fa-map-marker"></i> <span>Departamentos</span>
          </a>
          <a href="storeProducts">
            <i class="fa fa-map-marker"></i> <span>Asignacion Productos</span>
          </a>
        @else
          @if( Auth::user()['employee'][0]['id_type_employee'] === 2 )
            <a href="products">
            <i class="glyphicon glyphicon-apple"></i> <span>Productos</span>
            </a>
          @else
            <a href="cars">
            <i class="fa fa-truck"></i> <span>Automoviles</span>
            </a>
          @endif
        @endif
    </li>
  </ul>
</section>
