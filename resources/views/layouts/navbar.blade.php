<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">            
        <li class="nav-item">
           <a class="nav-link" href="{{url('/users/'.Auth::user()->id.'/edit')}}">{{Auth::user()->name}} {{Auth::user()->last_name}}</a>
        </li>  

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>        

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

        <li class="nav-item">
            <form method="post" action="{{route('logout')}}" class="form-logout">
             @csrf
             <button class="btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </li>
    </ul>

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Home
                        </p>
                    </a>
                </li>

                <li class="nav-item nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>CRM<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="/lead" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                   Lead
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/deal" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                   Deal
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/company" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                   Company
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/contact" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Contact
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/task" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Task
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/streaam" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Streaam
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/project" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Projects
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/group" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                   Group
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/disk" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Disk
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/department" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Department
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i>
                        <p>Users <i class="right fas fa-angle-left"></i></p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="/users" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/roles" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Roles
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/permission" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Permissions
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
