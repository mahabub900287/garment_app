 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">
     <div data-simplebar class="h-100">
         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li>
                     <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                         <i class="ti-home"></i>
                         {{-- <span class="badge rounded-pill bg-primary float-end">2</span> --}}
                         <span>Dashboard</span>
                     </a>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fas fa-user-shield"></i>
                         <span>Admintration</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('admin.users.index') }}">User</a></li>
                     </ul>

                 </li>
                 <li>
                     <a href="{{ route('admin.newsletter.index') }}" class="waves-effect"> <i
                             class="ti-email"></i><span>Newsletter Subscriber</span></a>
                 </li>
                 <li>
                     <a href="{{ route('admin.setting.index') }}" class="waves-effect"> <i
                             class="ti-settings"></i><span> Settings </span></a>
                 </li>
             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
 <!-- Left Sidebar End -->
