<header class="header header-sticky mb-3">
  <div class="container-fluid">
    <div class="d-flex">
      <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
        <svg class="icon icon-lg">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
        </svg>
      </button>
      <div class="header-nav d-none d-sm-flex align-items-center px-1">
        <i class="cil-user icon me-2"></i>Administrator
      </div>
    </div>
    <ul class="header-nav ms-3">
      <div class="d-flex align-items-center px-2">
        <span><?= session()->get('admin'); ?></span>
      </div>
      <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/admin_user.png" alt="admin_user"></div>
        </a>
        <div class="dropdown-menu dropdown-menu-end pt-0">
          <div class="dropdown-header bg-light py-2">
            <div class="fw-semibold">Account</div>
          </div>
            <a class="dropdown-item" href="/profile">
              <svg class="icon me-2">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
              </svg> Profile
            </a>
            <a class="dropdown-item" href="/lock_screen">
              <svg class="icon me-2">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
              </svg> Lock Account
            </a>
            <a class="dropdown-item" href="/logout">
              <svg class="icon me-2">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
              </svg> Logout
            </a>
        </div>
      </li>
    </ul>
  </div>
</header>