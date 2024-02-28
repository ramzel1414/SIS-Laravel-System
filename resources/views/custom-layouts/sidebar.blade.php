<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Noble<span>UI</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main Menu</li>
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link my-2">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a href={{ route('student.index') }} class="nav-link my-2">
          <i class="link-icon" data-feather="pen-tool"></i>
          <span class="link-title">Students</span>
        </a>
      </li>
      <li class="nav-item">
        <a href={{ route('subject.index') }} class="nav-link my-2">
          <i class="link-icon" data-feather="layout"></i>
          <span class="link-title">Subjects</span>
        </a>
      </li>
      <li class="nav-item">
        <a href={{ route('teacher.index') }} class="nav-link my-2">
          <i class="link-icon" data-feather="edit"></i>
          <span class="link-title">Teachers</span>
        </a>
      </li>
      <li class="nav-item">
        <a href={{ route('grade.index') }} class="nav-link my-2">
          <i class="link-icon" data-feather="percent"></i>
          <span class="link-title">Grades</span>
        </a>
      </li>
      <li class="nav-item">
        <a href={{ route('logout') }} class="nav-link my-2">
          <i class="link-icon" data-feather="log-out"></i>
          <span class="link-title">Logout</span>
        </a>
      </li>
      



    </ul>
  </div>
</nav>