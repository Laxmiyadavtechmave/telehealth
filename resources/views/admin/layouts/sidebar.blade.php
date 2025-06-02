 <!-- Sidebar -->
 <div class="sidebar" id="sidebar">
     <div class="custom-sidebar">

         <div class="sidetopMenus_wrap">
             <!-- Tooltip Menu Item -->
             <div class="custom-menu-item">
                 <a href="{{ route('superadmin.dashboard') }}">
                     <div class="custom-icon">
                         <iconify-icon icon="mynaui:home"></iconify-icon>
                     </div>
                 </a>

                 <div class="tooltip-line">
                     <!-- Image placed at starting point of the line -->
                     <div class="tooltip-dot-glow"></div>

                     <svg viewBox="0 0 130 60">
                         <path d="M0,30 L60,30 L90,0 L130,0" />
                     </svg>
                 </div>

                 <!-- Tooltip -->
                 <div class="custom-tooltip">Home</div>
             </div>
             <!-- Tooltip Menu Item -->
             <div class="custom-menu-item">
                 <a href="{{ route('superadmin.user.index') }}">
                     <div class="custom-icon">
                         <iconify-icon icon="prime:users"></iconify-icon>
                     </div>
                 </a>

                 <div class="tooltip-line">
                     <div class="tooltip-dot-glow"></div>

                     <svg viewBox="0 0 130 60">
                         <path d="M0,30 L60,30 L90,0 L130,0" />
                     </svg>
                 </div>

                 <!-- Tooltip -->
                 <div class="custom-tooltip">All Users</div>
             </div>


             <!-- Tooltip Menu Item -->
             <div class="custom-menu-item">
                 <a href="{{ route('superadmin.role.index') }}">
                     <div class="custom-icon">
                         <iconify-icon icon="oui:app-users-roles"></iconify-icon>
                     </div>
                 </a>

                 <div class="tooltip-line">
                     <div class="tooltip-dot-glow"></div>

                     <svg viewBox="0 0 130 60">
                         <path d="M0,30 L60,30 L90,0 L130,0" />
                     </svg>
                 </div>

                 <!-- Tooltip -->
                 <div class="custom-tooltip">Role & Permission Settings (RBAC)</div>
             </div>

             <div class="custom-menu-item">
                 <a href="##">
                     <div class="custom-icon">
                         <iconify-icon icon="hugeicons:analytics-02"></iconify-icon>
                     </div>
                 </a>

                 <div class="tooltip-line">
                     <div class="tooltip-dot-glow"></div>

                     <svg viewBox="0 0 130 60">
                         <path d="M0,30 L60,30 L90,0 L130,0" />
                     </svg>
                 </div>


                 <div class="custom-tooltip">Reports</div>
             </div>

             

            <form method="POST" action="{{ route('superadmin.logout') }}" id="logout-form">
                 @csrf
                 <div class="custom-menu-item" onclick="document.getElementById('logout-form').submit()"
                     style="cursor: pointer;">
                     <div class="custom-icon">
                         <iconify-icon icon="hugeicons:logout-square-02"></iconify-icon>
                     </div>

                     <div class="tooltip-line">
                         <!-- Image placed at starting point of the line -->
                         <div class="tooltip-dot-glow"></div>

                         <svg viewBox="0 0 130 60">
                             <path d="M0,30 L60,30 L90,0 L130,0" />
                         </svg>
                     </div>

                     <!-- Tooltip -->
                     <div class="custom-tooltip">Logout</div>
                 </div>
             </form>


         </div>

     </div>

 </div>
 <!-- /Sidebar -->
