   <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ url('admin') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('user-manage') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User Management
              </p>
            </a>
          </li>



          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
             
              <li class="nav-item">
                <a href="{{ url('charts') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="{{ url('calender') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="{{ url('holiday-list') }}" class="nav-link">
            <i class="nav-icon fa fa-calendar-o" aria-hidden="true"></i>
              <p>
                  Holidays
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('designation-list') }}" class="nav-link">
              <i class="nav-icon fa fa-briefcase" aria-hidden="true"></i>
              <p>
                  Designations
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('department-list') }}" class="nav-link">
              <i class="nav-icon fa fa-bars" aria-hidden="true"></i>
              <p>
                  Departments
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('employee-add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('employee-list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              </ul>
          </li>


          <li class="nav-item">
            <a href="{{ url('leaveType-list') }}" class="nav-link">
              <i class="nav-icon fa fa-paper-plane" aria-hidden="true"></i>
              <p>
                  Leave Types
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Leave
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('leave-add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('leave-list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              </ul>
          </li>

          <li class="nav-item">
            <a href="{{ url('notification-list') }}" class="nav-link">
              <i class="nav-icon far fa-bell"></i>
              <p>
                  Notifications
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-paper-plane"></i>
              <p>
                Project Detail
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('project-add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('project-list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              </ul>
          </li>
          
             <!-- <li class="nav-item">
            <a href="{{ url('projects') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Projects
              </p>
            </a>
          </li>
          
            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Tasks
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
             
            <li class="nav-item">
            <a href="{{ url('task-add') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Add Task
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('task-list') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Task Lits
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

            </ul>
            
              <li class="nav-item">
            <a href="{{ url('project-listing') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                User Projects Listing
                 <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          
          
          </li> -->
  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>