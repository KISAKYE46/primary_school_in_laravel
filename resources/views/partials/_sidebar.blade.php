<aside class="main-sidebar p-2  sidebar-default-dark text-warning elevation-1" >
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link text-dark">
      <img src="public/dist/img/default_badge.png" alt="Our Logo" class="brand-image img-circle elevation-3 card"
           style="opacity: .9">
      <span class="brand-text font-weight-light">{{strtoupper("School Name ")}}</span>
     
    </a>

    <!-- Sidebar -->
    <div class="sidebar text-dark">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
      
        <div class="image">
          <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">

            @if (session()->has("user"))

              @if (session()->get("role")=="student")
              {{session()->get("user")->student_full_name}}
              @endif

              @if (session()->get("role")=="teacher")
              {{session()->get("user")->teacher_full_name}}
              @endif

              @if (session()->get("role")=="admin")
              {{session()->get("user")->full_name}}
              @endif
              
             
            @else
              Guest User
            @endif
          
          </a>
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview " id="home">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" for="#home">
              <li class="nav-item active">
                <a href="dashboard" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item has-treeview" id="finance">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Finances
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" for="#finance" >
              <li class="nav-item" >
                <a href="fees" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fees Structure</p>
                </a>
              </li>

              @if(session()->get("role")=="student")
              <li class="nav-item">
                <a href="payments" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Payments</p>
                </a>
              </li>

              @else
              <li class="nav-item">
                <a href="payments" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payments</p>
                </a>
              </li>
              @endif
             
              
            </ul>
          </li>

          @if (session()->get("role")=="admin")

          <li class="nav-item has-treeview" id="accounts">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Accounts
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" for="#accounts">
              <li class="nav-item">
                <a href="users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admins</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="teachers" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teachers</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="students" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>

             

            
              
              
            </ul>
          </li>
          


          <li class="nav-item has-treeview" id="subjects">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Subjects
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" for="#subjects">
              <li class="nav-item">
                <a href="subjects" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Subjects</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="subject_categories" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Categories</p>
                </a>
              </li>
              
            </ul>
          </li>



          <li class="nav-item has-treeview" id="classes">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-pen"></i>
              <p>
                Classes
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" for="#classes">


              <li class="nav-item">
                <a href="levels" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Levels</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="classes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Classes</p>
                </a>
              </li>
              
            </ul>
          </li>


          <li class="nav-item has-treeview" id="student-cats">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Student Categories
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" for="#student-cats"> 

              <li class="nav-item">
                <a href="student_categories" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Categories</p>
                </a>
              </li>

             
              
            </ul>
          </li>





          
          @endif

          

          <li class="nav-item has-treeview" id="events">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                School Events
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" for="#events">

              @if (session()->get("role")=="student")
              <li class="nav-item">
                <a href="events" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Events</p>
                </a>
              </li>
              @else

              <li class="nav-item">
                <a href="events" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Events</p>
                </a>
              </li>
              
              @endif
              
            </ul>
          </li>





          
          @if (session()->get("role")=="admin")

          <li class="nav-item has-treeview" id="terms">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Academic Terms
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" for="#terms">


              <li class="nav-item">
                <a href="terms" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Terms</p>
                </a>
              </li>

             
              
            </ul>
          </li>
          @endif


          <li class="nav-item has-treeview" id="time-tables">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Time Tables
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" for="#time-tables">


              

              @if (session()->get("role")=="admin")
              <li class="nav-item">
                <a href="timetables" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Time Tables</p>
                </a>
              </li>
              @else
              <li class="nav-item">
                <a href="timetables" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Time Tables</p>
                </a>
              </li>
              @endif

              @if (session()->get("role")=="admin")
              <li class="nav-item">
                <a href="study_sessions" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Study Sessions</p>
                </a>
              </li>
              @endif


             
              
            </ul>
          </li>

          <li class="nav-item has-treeview" id="exams">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                 Exams
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview" for="#exams">

              @if (session()->get("role")=="student")
              <li class="nav-item">
                <a href="marks" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Marks</p>
                </a>
              </li>
              @else
              <li class="nav-item">
                <a href="marks" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Marks</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="exam_sets" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Sets</p>
                </a>
              </li>
              @endif  
              
            </ul>
            <ul class="nav nav-treeview" for="#">

              @if (session()->get("role")=="student")
              <li class="nav-item">
                <a href="marks" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Marks</p>
                </a>
              </li>
              @else
              <li class="nav-item">
                <a href="marks" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Marks</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="exam_sets" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam Sets</p>
                </a>
              </li>
              @endif  
              
            </ul>
          </li>





          <li class="nav-item has-treeview" id="grading">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                 Grading System
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview" for="#grading">

              @if (session()->get("role")=="admin")
              <li class="nav-item">
                <a href="grading" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Grading</p>
                </a>
              </li>   
              @endif  
              
            </ul>
            
          </li>









        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  

  