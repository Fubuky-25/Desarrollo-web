<?php
session_start();
$ruta = ['assets' => '../../', 'components' => '../'];
$_SESSION ['ruta'] = $ruta;
require_once '../mvc/v1/conexion.php';
require_once '../mvc/v1/models/usuario.php';

$usuario = new Usuario();
$usuarios = $usuario->getAll();
?>

<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $_SESSION['titulos']['webTitle']; ?></title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Mantenedor de Usuarios" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"
    />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="<?php echo $ruta['assets']; ?>assets/css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media = 'all'"
    />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?php echo $ruta['assets']; ?>assets/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <?php include_once $ruta['components'] . 'components/nav-v1.php'; ?>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <?php include_once $ruta['components'] . 'components/aside-v1.php'; ?>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Mantenedor de Usuarios</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="/Desarrollo-web/">Backoffice</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                  <li class="breadcrumb-item"><button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#mantenedorAgregar">Agregar <i class="bi bi-plus"></i></button></li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
              <!--begin::Col-->
              <div class="col-12">

                <?php if (!empty($_SESSION['errores']['items'])) { ?>

                    <?php if (!empty($_SESSION['errores']['items']['email'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error email:</strong> <?php echo $_SESSION['errores']['items']['email']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php } ?>

                    <?php if (!empty($_SESSION['errores']['items']['name'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error nombre:</strong> <?php echo $_SESSION['errores']['items']['name']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php } ?>

                    <?php if (!empty($_SESSION['errores']['items']['lastname'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error apellido:</strong> <?php echo $_SESSION['errores']['items']['lastname']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php } ?>

                    <?php if (!empty($_SESSION['errores']['items']['telefono'])) { ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Error teléfono:</strong>
                              <?php echo $_SESSION['errores']['items']['telefono']; ?>
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          </div>
                    <?php } ?>

                    <?php if (!empty($_SESSION['errores']['items']['password'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error contraseña:</strong> <?php echo $_SESSION['errores']['items']['password']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php } ?>

                    <?php if (!empty($_SESSION['errores']['items']['password_confirm'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error confirmar contraseña:</strong> <?php echo $_SESSION['errores']['items']['password_confirm']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php } ?>
                    <?php if(isset($_SESSION['errores']['items']['rol'])){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error rol:</strong>
                            <?php echo $_SESSION['errores']['items']['rol']; ?>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert"
                                aria-label="Close">
                            </button>
                        </div>
                      <?php } ?>
                <?php } ?>
                <?php
                if (isset($_SESSION['errores'])) {
                  unset($_SESSION['errores']);
                }
                ?>
                </div>
              <!--end::Col-->
              <!--begin::Col-->
              <?php if(isset($_SESSION['mensaje'])){ ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">

                    <strong>Éxito:</strong>

                    <?php
                        echo $_SESSION['mensaje'];
                        unset($_SESSION['mensaje']);
                    ?>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

                <?php } ?>
              <div class="col-md-12">
                <!--begin::DataTable-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">

                      <div class="card-title">
                          Lista de usuarios del sistema
                      </div>

                      <span class="badge bg-primary">

                          <?php echo count($usuarios); ?>

                          usuarios

                      </span>
                     </div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                    <div class="row p-3">

                      <div class="col-md-4">

                          <input
                              type="text"
                              id="buscadorUsuarios"
                              class="form-control"
                              placeholder="🔍 Buscar usuario...">

                      </div>

                      <div class="col-md-3">

                          <select
                              id="filtroRol"
                              class="form-select">

                              <option value="">
                                  Todos los roles
                              </option>

                              <option value="Administrador">
                                  Administrador
                              </option>

                              <option value="Vendedor">
                                  Vendedor
                              </option>

                              <option value="Usuario">
                                  Usuario
                              </option>

                          </select>

                      </div>

                      <div class="col-md-3">

                          <select
                              id="filtroEstado"
                              class="form-select">

                              <option value="">
                                  Todos los estados
                              </option>

                              <option value="Activo">
                                  Activo
                              </option>

                              <option value="Inactivo">
                                  Inactivo
                              </option>

                          </select>

                      </div>

                    </div>


                    <table id="tablaUsuarios"class="table table-sm" role="table">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>

                          <th>Nombre Completo</th>

                          <th>Correo</th>

                          <th>Teléfono</th>

                          <th>Rol</th>

                          <th>Estado</th>

                          <th style="width: 40px">
                              Acciones
                          </th>
                        </tr>
                      </thead>
                          
                        <tbody>

                          <?php foreach($usuarios as $usuario){ ?>

                          <tr class="align-middle">

                              <td>
                                  <?php echo $usuario['id']; ?>
                              </td>

                              <td>
                                  <?php
                                      echo $usuario['nombres']
                                      . ' ' .
                                      $usuario['apellidos'];
                                  ?>
                              </td>

                              <td>
                                  <?php echo $usuario['correo']; ?>
                              </td>

                              <td>
                                  <?php echo $usuario['telefono']; ?>
                              </td>

                              <td>

                                  <?php

                                  switch($usuario['rol']){

                                      case 1:

                                          echo '
                                          <span class="badge bg-danger">
                                              Administrador
                                          </span>';

                                          break;

                                      case 2:

                                          echo '
                                          <span class="badge bg-warning text-dark">
                                              Vendedor
                                          </span>';

                                          break;

                                      default:

                                          echo '
                                          <span class="badge bg-info">
                                              Usuario
                                          </span>';

                                          break;
                                  }

                                  ?>

                              </td>

                              <td>

                                  <?php if($usuario['activo']){ ?>

                                      <span class="badge bg-success">
                                          Activo
                                      </span>

                                  <?php } else { ?>

                                      <span class="badge bg-danger">
                                          Inactivo
                                      </span>

                                  <?php } ?>

                              </td>

                              <td>

                                  <div class="btn-group">

                                      <button
                                          type="button"
                                          class="btn btn-sm btn-secondary dropdown-toggle"
                                          data-bs-toggle="dropdown"
                                          aria-expanded="false">

                                          <i class="bi bi-list"></i>

                                      </button>

                                      <ul class="dropdown-menu">

                                          <li>

                                              <a
                                                  class="dropdown-item btn-ver-usuario"

                                                  href="#"

                                                  data-id="<?php echo $usuario['id']; ?>"

                                                  data-nombres="<?php echo $usuario['nombres']; ?>"

                                                  data-apellidos="<?php echo $usuario['apellidos']; ?>"

                                                  data-correo="<?php echo $usuario['correo']; ?>"

                                                  data-telefono="<?php echo $usuario['telefono']; ?>"

                                                  data-rol="<?php echo $usuario['rol']; ?>"

                                                  data-activo="<?php echo $usuario['activo']; ?>"

                                                  data-bs-toggle="modal"
                                                  data-bs-target="#modalVerUsuario">

                                                  Ver

                                              </a>

                                          </li>

                                          <li>

                                              <a class="dropdown-item" href="#">
                                                  Editar
                                              </a>

                                          </li>

                                          <?php if($usuario['activo']){ ?>

                                              <li>

                                                  <a
                                                      class="dropdown-item text-danger"
                                                      href="./status/?id=<?php echo $usuario['id']; ?>&estado=0">

                                                      Apagar

                                                  </a>

                                              </li>

                                          <?php } else { ?>

                                              <li>

                                                  <a
                                                      class="dropdown-item text-success"
                                                      href="./status/?id=<?php echo $usuario['id']; ?>&estado=1">

                                                      Encender

                                                  </a>

                                              </li>

                                          <?php } ?>

                                      </ul>

                                  </div>

                              </td>

                          </tr>

                          <?php } ?>

                          </tbody>
                    </table>
                  </div>
                  <!--end::Body-->
                </div>
                <!--end::DataTable-->
              </div>
              
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        
        <div class="modal fade" id="mantenedorAgregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="./add/" method="post">
                <div class="modal-body">
                  
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                    <label for="email">Usuario(utilice su correo)</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                    <label for="name">Nombre</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                    <label for="lastname">Apellido</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="">
                    <label for="telefono">Telefono</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Contraseña</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Password">
                    <label for="password_confirm">Confirmar Contraseña</label>
                  </div>

                  <div class="form-floating">
                    <select class="form-select" id="rol" name="rol" aria-label="Floating label select example">
                      <option value="" selected>
                        Seleccione un rol
                      </option>
                      <option value="1">Administrador</option>
                      <option value="2">Vendedor</option>
                      <option value="3">Usuario</option>
                    </select>
                    <label for="rol">Seleccione un rol para el usuario</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
              </form>
              
            </div>
          </div>
        </div>
        
        <div
          class="modal fade"
          id="modalVerUsuario"
          tabindex="-1">

          <div class="modal-dialog modal-dialog-centered">

              <div class="modal-content">

                  <div class="modal-header">

                      <h5 class="modal-title">
                          Detalle Usuario
                      </h5>

                      <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal">
                      </button>

                  </div>

                  <div class="modal-body text-center">

                      <i
                          class="bi bi-person-circle"
                          style="font-size: 6rem;">
                      </i>

                      <h3
                          class="mt-3"
                          id="detalleNombre">
                      </h3>

                      <hr>

                      <div class="row text-start">

                          <div class="col-4">
                              <strong>Correo</strong>
                          </div>

                          <div class="col-8"
                              id="detalleCorreo">
                          </div>

                      </div>

                      <br>

                      <div class="row text-start">

                          <div class="col-4">
                              <strong>Teléfono</strong>
                          </div>

                          <div class="col-8"
                              id="detalleTelefono">
                          </div>

                      </div>

                      <br>

                      <div class="row text-start">

                          <div class="col-4">
                              <strong>Rol</strong>
                          </div>

                          <div class="col-8"
                              id="detalleRol">
                          </div>

                      </div>

                      <br>

                      <div class="row text-start">

                          <div class="col-4">
                              <strong>Estado</strong>
                          </div>

                          <div class="col-8"
                              id="detalleEstado">
                          </div>

                      </div>

                  </div>

              </div>

          </div>

        </div>



      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <?php include_once $ruta['components'] . 'components/footer-v1.php'; ?>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?php echo $ruta['assets']; ?>assets/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        // Disable OverlayScrollbars on mobile devices to prevent touch interference
        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--begin::Bootstrap Tooltips-->
    <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
      tooltipTriggerList.forEach((tooltipTriggerEl) => {
        new bootstrap.Tooltip(tooltipTriggerEl);
      });
    </script>
    <!--end::Bootstrap Tooltips-->
    <!--begin::Bootstrap Toasts-->
    <script>
      const toastTriggerList = document.querySelectorAll('[data-bs-toggle="toast"]');
      toastTriggerList.forEach((btn) => {
        btn.addEventListener('click', (event) => {
          event.preventDefault();
          const toastEle = document.getElementById(btn.getAttribute('data-bs-target'));
          const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastEle);
          toastBootstrap.show();
        });
      });
    </script>
    <!--end::Bootstrap Toasts-->
    <!--end::Script-->
    <script>

      document
      .querySelectorAll('.btn-ver-usuario')
       .forEach(function(btn){

        btn.addEventListener('click', function(){

                                  document.getElementById(
                                      'detalleNombre'
                                  ).innerHTML =
                                      this.dataset.nombres
                                      + ' ' +
                                      this.dataset.apellidos;

                                  document.getElementById(
                                      'detalleCorreo'
                                  ).innerHTML =
                                      this.dataset.correo;

                                  document.getElementById(
                                      'detalleTelefono'
                                  ).innerHTML =
                                      this.dataset.telefono;

                                  let rol = 'Usuario';

                                  if(this.dataset.rol == 1){
                                      rol = 'Administrador';
                                  }

                                  if(this.dataset.rol == 2){
                                      rol = 'Vendedor';
                                  }

                                  document.getElementById(
                                      'detalleRol'
                                  ).innerHTML = rol;

                                  document.getElementById(
                                      'detalleEstado'
                                  ).innerHTML =
                                      this.dataset.activo == 1
                                      ? 'Activo'
                                      : 'Inactivo';

                              });

                          });

                          </script>
                          <script>

                            document.addEventListener(
                                'DOMContentLoaded',
                                function(){

                                    const buscador =
                                        document.getElementById(
                                            'buscadorUsuarios'
                                        );

                                    const filtroRol =
                                        document.getElementById(
                                            'filtroRol'
                                        );

                                    const filtroEstado =
                                        document.getElementById(
                                            'filtroEstado'
                                        );

                                    function filtrarTabla(){

                                        let texto =
                                            buscador.value.toLowerCase();

                                        let rol =
                                            filtroRol.value.toLowerCase();

                                        let estado =
                                            filtroEstado.value.toLowerCase();

                                        let filas =
                                            document.querySelectorAll(
                                                '#tablaUsuarios tbody tr'
                                            );

                                        filas.forEach(function(fila){

                                            let nombre =
                                                fila.cells[1]
                                                .textContent
                                                .toLowerCase();

                                            let correo =
                                                fila.cells[2]
                                                .textContent
                                                .toLowerCase();

                                            let telefono =
                                                fila.cells[3]
                                                .textContent
                                                .toLowerCase();

                                            let rolFila =
                                                fila.cells[4]
                                                .textContent
                                                .trim()
                                                .toLowerCase();

                                            let estadoFila =
                                                fila.cells[5]
                                                .textContent
                                                .trim()
                                                .toLowerCase();

                                            let coincideBusqueda =
                                                nombre.includes(texto)
                                                ||
                                                correo.includes(texto)
                                                ||
                                                telefono.includes(texto);

                                            let coincideRol =
                                                rol === ''
                                                ||
                                                rolFila.includes(rol);

                                            let coincideEstado =
                                                estado === ''
                                                ||
                                                estadoFila.includes(estado);

                                            if(
                                                coincideBusqueda
                                                &&
                                                coincideRol
                                                &&
                                                coincideEstado
                                            ){
                                                fila.style.display = '';
                                            }
                                            else{
                                                fila.style.display = 'none';
                                            }

                                        });

                                    }

                                    buscador.addEventListener(
                                        'keyup',
                                        filtrarTabla
                                    );

                                    filtroRol.addEventListener(
                                        'change',
                                        filtrarTabla
                                    );

                                    filtroEstado.addEventListener(
                                        'change',
                                        filtrarTabla
                                    );

                                });

                            </script>
  </body>
  <!--end::Body-->
</html>