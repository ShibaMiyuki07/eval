<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="/">Mikolo</a>
          <a class="sidebar-brand brand-logo-mini" href="/">M</a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{ asset('assets/images/faces/face15.jpg') }}" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{ $session['nom'] }} {{ $session['prenom'] }}</h5>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('point_vente.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-home"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>       
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('page.vente') }}">
              <span class="menu-icon">
                <i class="mdi mdi-coin"></i>
              </span>
              <span class="menu-title">Vente</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('page.renvoi') }}">
              <span class="menu-icon">
                <i class="mdi mdi-send"></i>
              </span>
              <span class="menu-title">Renvoyer</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('page.reception') }}">
              <span class="menu-icon">
                <i class="mdi mdi-call-received"></i>
              </span>
              <span class="menu-title">Reception</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('vente.liste') }}">
              <span class="menu-icon">
                <i class="mdi mdi-view-list"></i>
              </span>
              <span class="menu-title">Liste des Vente</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action='{{ route("pv.search") }}' method='post'>
                  @csrf
                  <input type="text" class="form-control" name='reference' placeholder="Reference...">
                  <input type="text" class="form-control" name='prix_min' placeholder="Prix Min...">
                  <input type="text" class="form-control" name='prix_max' placeholder="Prix Max...">
                  <button class='btn btn-success'>Rechercher</button>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ $session['nom'] }} {{ $session['prenom'] }}</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class='row'>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des laptops à recevoir</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Marque </th>
                            <th> Processeur </th>
                            <th> Ecran </th>
                            <th> Disque Dur </th>
                            <th> Reference </th>
                            <th>Quantite envoye</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($transferts as $transfert)
                          <tr>
                            <td> {{ $transfert->laptop->marque->marque }} </td>
                            <td>{{ $transfert->laptop->processeur->marque->marque }}{{ $transfert->laptop->processeur->caracteristique }}</td>
                            <td>{{ $transfert->laptop->ecran->caracteristique }},{{ $transfert->laptop->ecran->frequence }}Hz</td>
                            <td>{{ $transfert->laptop->disque_dur->capacite }}Go, produit par {{ $transfert->laptop->disque_dur->marque->marque }}</td>
                            <td> {{ $transfert->laptop->reference }}</td>
                            <td>{{ $transfert->quantite }}</td>
                            <form method='post' action='{{ route("recuPV.insert") }}'>
                            <td>
                                @csrf
                                <input type='hidden' name='total' value='{{ $transfert->quantite }}'>
                                <input type='hidden' name='idlaptop' value='{{ $transfert->idlaptop }}'>
                                <input type='hidden' name='idpv' value='{{ $idPV }}'>
                                <input  type='hidden' name='idtransfert_magasin' value='{{ $transfert->idtransfert_magasin }}'>
                                <input type='number' class="form-control" name='qte' placeholder='Quantite reçu..'>
                            </td>
                            <td><button class='btn btn-success'>Ajouter</button></td>
                            </form>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>