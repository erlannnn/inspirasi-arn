  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            {{-- <i class="fa fa-lightbulb"></i> --}}
            <i>
                <img src="/assets_frontend/img/logo-arn.png" alt="" width="30%">
            </i>
        </div>
        {{-- <div class="sidebar-brand-text mx-3">FIPARN</div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item">
        <a class="nav-link" href="/dashboard/tv_show">
            <i class="fas fa-fw fa-film"></i>
            <span>Artikel</span></a>
    </li> 
    
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/category_tvshow">
            <i class="fas fa-fw fa-film"></i>
            <span>Category</span></a>
    </li>     
    <li class="nav-item">
        <a class="nav-link" href="/dashboard/genre">
            <i class="fas fa-fw fa-film"></i>
            <span>Tags</span></a>
    </li>        
</ul>
<!-- End of Sidebar -->