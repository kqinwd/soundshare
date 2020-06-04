 <!-- SIDENAV -->
 <!-- Bootstrap row -->
 <div class="row" id="body-row">
     <!-- Sidebar -->
     <div id="sidebar-container" class="sidebar-expanded d-none d-lg-block">
         <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
         <!-- Bootstrap List Group -->
         <ul class="list-group">
             <!-- Separator with title -->
             <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                 <small>MAIN MENU</small>
             </li>
             <!-- /END Separator -->
             <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                 <div class="d-flex w-100 justify-content-start align-items-center">
                     <span class="mr-3"><svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                         </svg></span>
                     <span class="menu-collapsed">Profile</span>
                     <span class="ml-3"><svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd" />
                         </svg></span>
                 </div>
             </a>
             <!-- Submenu content -->
             <div id='submenu1' class="collapse sidebar-submenu">
                 <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                     <span class="menu-collapsed">Settings</span>
                 </a>
                 <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                     <span class="menu-collapsed">Password</span>
                 </a>
             </div>

             <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                 <div class="d-flex w-100 justify-content-start align-items-center">
                     <span class="mr-3"><svg class="bi bi-music-note-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z" />
                             <path fill-rule="evenodd" d="M12 3v10h-1V3h1z" clip-rule="evenodd" />
                             <path d="M11 2.82a1 1 0 01.804-.98l3-.6A1 1 0 0116 2.22V4l-5 1V2.82z" />
                             <path fill-rule="evenodd" d="M0 11.5a.5.5 0 01.5-.5H4a.5.5 0 010 1H.5a.5.5 0 01-.5-.5zm0-4A.5.5 0 01.5 7H8a.5.5 0 010 1H.5a.5.5 0 01-.5-.5zm0-4A.5.5 0 01.5 3H8a.5.5 0 010 1H.5a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
                         </svg></span>
                     <span class="menu-collapsed">Playlists <span class="badge badge-pill badge-primary ml-2">2</span></span>
                     <span class="ml-3"><svg class="bi bi-chevron-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd" />
                         </svg></span>
                 </div>
             </a>
             <!-- Submenu content -->
             <div id='submenu2' class="collapse sidebar-submenu">
                 <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                     <span class="menu-collapsed">Summer</span>
                 </a>
                 <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                     <span class="menu-collapsed">Workout</span>
                 </a>
             </div>

             <a href="#" class="bg-dark list-group-item list-group-item-action">
                 <div class="d-flex w-100 justify-content-start align-items-center">
                     <span class="mr-3"><svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd" />
                         </svg></span>
                     <span class="menu-collapsed">Friends </span>
                 </div>
             </a>
             <!-- Separator with title -->
             <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                 <small>OPTIONS</small>
             </li>
             <!-- /END Separator -->
             <!-- <a href="#" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-calendar fa-fw mr-3"></span>
                        <span class="menu-collapsed">Calendar</span>
                    </div>
                </a> -->

             <!-- Separator without title -->
             <!-- <li class="list-group-item sidebar-separator menu-collapsed"></li> -->
             <!-- /END Separator -->
             <a href="#" class="bg-dark list-group-item list-group-item-action">
                 <div class="d-flex w-100 justify-content-start align-items-center">
                     <span class="mr-3"><svg class="bi bi-gear-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 01-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 01.872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 012.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 012.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 01.872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 01-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 01-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 100-5.86 2.929 2.929 0 000 5.858z" clip-rule="evenodd" />
                         </svg></span>
                     <span class="menu-collapsed">Settings</span>
                 </div>
             </a>
             <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                 <div class="d-flex w-100 justify-content-start align-items-center">
                     <span class="mr-3"><svg class="bi bi-chevron-compact-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 01.223.67L6.56 8l2.888 5.776a.5.5 0 11-.894.448l-3-6a.5.5 0 010-.448l3-6a.5.5 0 01.67-.223z" clip-rule="evenodd" />
                         </svg></span>
                     <span id="collapse-text" class="menu-collapsed">Hide Menu</span>
                 </div>
             </a>
         </ul><!-- List Group END-->
     </div><!-- sidebar-container END -->