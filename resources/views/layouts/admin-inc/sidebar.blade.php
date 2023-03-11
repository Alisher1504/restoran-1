<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
  <div class="sidebar-brand d-none d-md-flex">
  </div>
  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
      <a class="nav-link text-white {{ Request::is('/') ? 'bg-primary text-white' : '' }}" href="{{ url('/') }}">Home Page</a>
      {{-- <span class="badge badge-sm bg-info ms-auto">NEW</span> --}}
    </li>
    <li class="nav-item">
      <a class="nav-link text-white {{ Request::is('admin/dashboard') ? 'bg-primary text-white' : '' }}" href="{{ url('admin/dashboard') }}">Dashboard</a>
      {{-- <span class="badge badge-sm bg-info ms-auto">NEW</span> --}}
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('admin/category') ? 'bg-primary text-white' : '' }}" href="{{ url('admin/category') }}">Category</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('admin/menu') ? 'bg-primary text-white' : '' }}"  href="{{ url('admin/menu') }}">Menu</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('admin/reservation') ? 'bg-primary text-white' : '' }}" href="{{ url('admin/reservation') }}">Reservation</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('admin/table') ? 'bg-primary text-white' : '' }}" href="{{ url('admin/table') }}">Table</a>
    </li>

  </ul>
  <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>