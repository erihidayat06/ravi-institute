 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link {{ Request::is('admin') ? '' : 'collapsed' }}" href="/admin">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('admin/jurnal*') ? '' : 'collapsed' }}" href="/admin/jurnal">
                 <i class="bi bi-card-list"></i>
                 <span>Data Jurnal</span>
             </a>
         </li><!-- End Dashboard Nav -->



     </ul>

 </aside><!-- End Sidebar-->
