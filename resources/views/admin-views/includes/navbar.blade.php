 <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
     <a class="navbar-brand" href="{{ route('dashboard-admin') }}">SUPER ADMIN</a>
     <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i
             data-feather="menu"></i></button>
    
     <ul class="navbar-nav align-items-center ml-auto">
         
         <li class="nav-item dropdown no-caret mr-2 dropdown-user">
             <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                 href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false"><img class="img-fluid" src="{{ asset('/image/'.Auth::user()->foto )}}" /></a>
             <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                 aria-labelledby="navbarDropdownUserImage">
                 <h6 class="dropdown-header d-flex align-items-center">
                     <img class="dropdown-user-img" src="{{ asset('/image/'.Auth::user()->foto )}}" />
                     <div class="dropdown-user-details">
                         <div class="dropdown-user-details-name">{{ Auth::user()->nama_user }}</div>
                         <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                     </div>
                 </h6>
                 <div class="dropdown-divider"></div>
                 <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
             </div>
         </li>
     </ul>
 </nav>
