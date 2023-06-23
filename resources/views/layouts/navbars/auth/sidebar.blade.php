<style>
  .icon-tour img{
    width: 100%;
    height: 15px;
  }
  .active{
    color: #fff;
  }
</style>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
        <img src="/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
        <span class="ms-3 font-weight-bold">Tayga</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('admin/dashboard') ? 'active' : '') }}"    href="{{ route('dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="{{ Request::is('admin/dashboard') ? "color:#fff;" : '' }}">
              <title>shop </title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(0.000000, 148.000000)">
                      <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                      <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Главная</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('admin/user-management') ? 'active' : '') }}" href="{{ route('user-management') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i  class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark "style={{ (Request::is('admin/user-management')) ? "color:#fff;" : '' }} aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Пользователи</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('tour/all') ? 'active' : '') }}" href="{{ route('tour.all') }}">
            <div class="icon icon-tour icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img alt="Mountains SVG Vector Icon" src="https://www.svgrepo.com/show/40561/mountains.svg" width="250" height="250" decoding="async" style="{{ Request::is('tour/all') ? "color:#fff;" : '' }}" data-nimg="1" >
            </div>
            <span class="nav-link-text ms-1">Туры</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('rooms') ? 'active' : '') }}" href="{{ route('room.all') }}">
            <div class="icon icon-tour icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img alt="Mountains SVG Vector Icon" src="https://svgsilh.com/svg/40309.svg" style={{ Request::is('rooms') ? "color:#fff;" : '' }} width="250" height="250" decoding="async" data-nimg="1" >
            </div>
            <span class="nav-link-text ms-1">Номера</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('news') ? 'active' : '') }}" href="{{ route('news.all') }}">
            <div class="icon icon-tour icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img alt="Mountains SVG Vector Icon" src="https://icons.iconarchive.com/icons/iconsmind/outline/512/Newspaper-icon.png" style={{ Request::is('rooms') ? "color:#fff;" : '' }} width="250" height="250" decoding="async" data-nimg="1" >
            </div>
            <span class="nav-link-text ms-1">Новости</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('contact_us') ? 'active' : '') }}" href="{{ route('contact_us.all') }}">
            <div class="icon icon-tour icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <img alt="Mountains SVG Vector Icon" src="data:image/png;base64,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" style={{ Request::is('rooms') ? "color:#fff;" : '' }} width="250" height="250" decoding="async" data-nimg="1" >
            </div>
            <span class="nav-link-text ms-1">Сообщения</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="sidenav-footer mx-3 ">
    <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
      <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpeg')"></div>

    </div>
  </div>
</aside>
