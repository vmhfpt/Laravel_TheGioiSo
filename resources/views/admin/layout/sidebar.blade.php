<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>



<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="https://aphoto.vn/wp-content/uploads/2019/01/anhdep6.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Trang quản trị viên</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://aphoto.vn/wp-content/uploads/2019/01/anhdep6.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$user->name}}</a>
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
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-bars"></i>
                  <p>
                    Thiết lập web
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{asset('admin/config-footer/list')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Danh sách Footer</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{asset('admin/config-footer/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Thêm Footer
                      </p>
                    </a>
                  </li>

                </ul>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-bars"></i>
                  <p>
                    Nền tảng
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{asset('admin/platform/add')}} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Thêm nền tảng</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{asset('admin/platform/list')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Danh sách nền tảng</p>
                    </a>
                  </li>

                </ul>
              </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/category/add')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/category/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Màu sắc
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/color/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách màu sắc</p>
                </a>
              </li>


            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Sản Phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/product/add')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/product/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Đánh giá & Xếp hạng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/comment/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách đánh giá</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/rating/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách xếp hạng
                  </p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Thương hiệu sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/brands/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách thương hiệu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/brands/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm thương hiệu
                  </p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Quản lý slide
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/slide/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách slide</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/slide/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm slide
                  </p>
                </a>
              </li>

            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Phí vận chuyển
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/ship/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách phí vận chuyển</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/ship/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm phí vận chuyển
                  </p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Biến thể sản phẩm (Thuộc tính sản phẩm)
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/atribute/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách thuộc tính</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/atribute/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm thuộc tính
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href={{asset('admin/atribute/list-platform')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách nền tảng (thuộc tính)</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Giá trị thuộc tính sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/value-atribute/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách giá trị thuộc tính</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/value-atribute/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm giá trị cho thuộc tính
                  </p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Danh mục tin tức
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/category-news/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/category-news/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục
                  </p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Tin tức
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/news/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách tin tức</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/news/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm tin tức
                  </p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Kiểu xem sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/view-mode/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách hiển thị</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('admin/view-mode/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm kiểu xem
                  </p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Đơn hàng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href={{asset('admin/oder/list')}} class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách đơn hàng</p>
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
