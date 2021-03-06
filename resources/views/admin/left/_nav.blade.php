<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview"><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> <span>Админ-панель</span></a></li>
    <li class="{{{ (Request::is('admin/products*') ? 'treeview active' : 'treeview') }}}"><a href="#"><i class="fa fa-sticky-note-o"></i>
            <span>Каталог</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{{ (Request::is('admin/products/categories*') ? 'treeview active' : 'treeview') }}}"><a href="{{ route('admin.products.categories.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Категории</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-olive">{{ $countCategories }}</small>
                    </span>
                </a>
            </li>
            <li class="{{{ (Request::is('admin/products/products*') ? 'treeview active' : 'treeview') }}}"><a href="{{ route('admin.products.products.index') }}"><i class="fa fa-circle-o text-blue"></i> <span>Товары</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-olive">{{ $countProducts }}</small>
                    </span>
                </a>
            </li>
        </ul>
    </li>
    <li><a href=""><i class="fa fa-tags"></i> <span>Теги</span></a></li>
    <li><a href="">
            <i class="fa fa-commenting"></i> <span>Комментарии</span>
            <span class="pull-right-container">
          <small class="label pull-right bg-green">12</small>
        </span>
        </a>
    </li>
    <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
    <li><a href=""><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>

</ul>