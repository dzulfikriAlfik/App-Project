<nav class="sidebar">
   <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
         SCH<span>PARTNER</span>
      </a>
      <div class="sidebar-toggler not-active">
         <span></span>
         <span></span>
         <span></span>
      </div>
   </div>
   <div class="sidebar-body">
      <ul class="nav">

         @if (session('role') == 'superadmin' || session('role') == 'admin')
         <li class="nav-item nav-category">Main</li>
         <li class="nav-item">
            <a href="/cms/dashboard" class="nav-link">
               <i class="link-icon" data-feather="home"></i>
               <span class="link-title">Dashboard</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="/cms/trivias" class="nav-link">
               <i class="link-icon" data-feather="info"></i>
               <span class="link-title">Trivia</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="/cms/video" class="nav-link">
               <i class="link-icon" data-feather="video"></i>
               <span class="link-title">Video</span>
            </a>
         </li>
         <!-- <li class="nav-item">
        <a href="/cms/blog" class="nav-link">
        <i class="link-icon" data-feather="file-text"></i>
        <span class="link-title">Blog</span>
        </a>
    </li> -->
         @endif

         @if (session('role') == 'superadmin')
         <li class="nav-item nav-category">SYSTEM</li>
         <!-- <li class="nav-item">
        <a href="/cms/systems" class="nav-link">
        <i class="link-icon" data-feather="settings"></i>
        <span class="link-title">System</span>
        </a>
    </li> -->
         <li class="nav-item">
            <a href="/cms/users" class="nav-link">
               <i class="link-icon" data-feather="users"></i>
               <span class="link-title">Users</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="/cms/systems" class="nav-link">
               <i class="link-icon" data-feather="settings"></i>
               <span class="link-title">System</span>
            </a>
         </li>
         @endif

      </ul>
   </div>
</nav>