 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth())
        <li class="treeview @if($menu_active=='videos'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
          <span class="glyphicon glyphicon-film" aria-hidden="true"></span>Videos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='videosadd'){{'active'}}@endif"><a href="{{route('videos.create')}}">Videos Create</a></li>
           <li class="@if($submenu_active=='videoslist'){{'active'}}@endif"><a href="{{route('videos.list')}}">Videos List</a></li>
          </ul>
        </li>
      {{-- Pictures Menu --}}
       <li class="treeview @if($menu_active=='pictures'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
         <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Pictures</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='picturesadd'){{'active'}}@endif"><a href="{{route('pictures.create')}}">Pictures Create</a></li>
           <li class="@if($submenu_active=='pictureslist'){{'active'}}@endif"><a href="{{route('pictures.list')}}">Pictures List</a></li>
          </ul>
        </li>
        {{-- quotes Menu --}}
        <li class="treeview @if($menu_active=='gossips'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
         <span class="glyphicon glyphicon-book" aria-hidden="true"></span>Quotes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='quotesadd'){{'active'}}@endif"><a href="{{route('quotes.create')}}">Quotes Create</a></li>
           <li class="@if($submenu_active=='quoteslist'){{'active'}}@endif"><a href="{{route('quotes.list')}}">Quotes List</a></li>
          </ul>
        </li>
        {{-- Sayari Menu --}}
        <li class="treeview @if($menu_active=='sayari'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
         <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Sayari</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='sayariadd'){{'active'}}@endif"><a href="{{route('sayari.create')}}">Sayari Create</a></li>
           <li class="@if($submenu_active=='sayarilist'){{'active'}}@endif"><a href="{{route('sayari.list')}}">Sayari List</a></li>
          </ul>
        </li>
        {{-- Gossip Menu --}}
        <li class="treeview @if($menu_active=='gossips'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
         <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>Gossips</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='gossipsadd'){{'active'}}@endif"><a href="{{route('gossips.create')}}">Gossips Create</a></li>
           <li class="@if($submenu_active=='gossipslist'){{'active'}}@endif"><a href="{{route('gossips.list')}}">Gossips List</a></li>
          </ul>
        </li>
        {{-- Sports Menu --}}
        <li class="treeview @if($menu_active=='sports'){{'active menu-open'}}@endif">
          <a href="javascript:void(0)">
         <span class="glyphicon glyphicon-film glyphicon-king" aria-hidden="true"></span>Sports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li class="@if($submenu_active=='sportsadd'){{'active'}}@endif"><a href="{{route('sports.create')}}">Sports Create</a></li>
           <li class="@if($submenu_active=='sportslist'){{'active'}}@endif"><a href="{{route('sports.list')}}">Sports List</a></li>
          </ul>
        </li>
      @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>