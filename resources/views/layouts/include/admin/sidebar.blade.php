<aside class="main-sidebar sidebar-dark-secondary bg-secodary elevation-4">
<nav class="sidebar bg-secondary" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">
          <i class="mdi mdi-border-all menu-icon"></i>
          <span class="menu-title">Items</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('invoices.index') }}">
          <i class="mdi mdi-border-all menu-icon"></i>
          <span class="menu-title">Invoices</span>
        </a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">
          <i class="mdi mdi-lan menu-icon"></i>
          <span class="menu-title">Category</span>
        </a>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account-multiple-plus menu-icon"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow text-white"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav sub-menu">
            <li class="nav-item "> <a class="nav-link "  href="{{ route('users.index') }}"> <i class="mdi mdi-account">  Users</i>  </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ route('customers.index') }}">  <i class="mdi mdi-account-multiple">  Customers</i>  </a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
</aside>
