<style>
    a {
        text-decoration: none
    }

    .img-icon {
        color: white;
        margin-right: 6px;
        margin-left: 3px;
        width: 20px;
    }
</style>
{{-- <link rel="stylesheet" href="{{ asset('/public/fontawesome-free-6.2.0/css/all.min.css') }}"> --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="center brand-text font-weight-light" style="font-weight: 800!important">Library-World</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Book
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('managementBooks.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Book</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('managementBooks.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Book</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{ asset('/public/images/type-icon.png') }}" alt="" class="img-icon">
                        <p>
                            Genre
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('managementType.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add genre</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('managementType.listType') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List genre</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{ asset('/public/images/id-card.png') }}" alt="" class="img-icon">
                        <p>
                            Return-borrow Card
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('managementReborrow.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Card</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('managementReborrow.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List card</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{ asset('/public/images/group.png') }}" alt="" class="img-icon">
                        <p>
                            Readers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('managementReaders.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Reader</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('managementReaders.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Reader</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Report
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('statistical') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chart amount book of type</p>
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