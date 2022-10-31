<header id="header" id="home">
   <div class="header-top">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
               <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a href="#"><i class="fa fa-behance"></i></a></li>
               </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
               <a href="tel:{{ $company->company_phone }}"><span class="lnr lnr-phone-handset"></span> <span class="text">{{ $company->company_phone }}</span></a>
               <a href="mailto:{{ $company->company_email }}"><span class="lnr lnr-envelope"></span> <span class="text">{{ $company->company_email }}</span></a>
            </div>
         </div>
      </div>
   </div>
   <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
         <h3 class="company-name">{{ $company->company_name }}</h3>
         <nav id="nav-menu-container">
            <ul class="nav-menu">
               <li><a href="#">Home</a></li>
               <li><a href="#">About</a></li>
               <li><a href="#">Activity</a></li>
               <li><a href="#">Contact</a></li>
               <li class="menu-has-children"><a href="#">Reach us</a>
                  <ul>
                     <li><a href="#">Login</a></li>
                     <li><a href="#">Register</a></li>
                  </ul>
               </li>
            </ul>
         </nav><!-- #nav-menu-container -->
      </div>
   </div>
</header>
