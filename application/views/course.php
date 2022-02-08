
<!--
=========================================================
Material Kit - v2.0.7
=========================================================

Product Page: https://www.creative-tim.com/product/material-kit
Copyright 2020 Creative Tim (https://www.creative-tim.com/)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Kit by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?=base_url()?>/assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url()?>/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/material-kit/index.html">
          Material Kit </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="material-icons">apps</i> Components
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="<?=base_url()?>/index.html" class="dropdown-item">
                <i class="material-icons">layers</i> All Components
              </a>
              <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                <i class="material-icons">content_paste</i> Documentation
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
              <i class="material-icons">cloud_download</i> Download
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.creative-tim.com/product/material-kit-pro" target="_blank">
              <i class="material-icons">unarchive</i> Upgrade to PRO
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter" rel="nofollow">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" data-original-title="Like us on Facebook" rel="nofollow">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" data-original-title="Follow us on Instagram" rel="nofollow">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('<?=base_url()?>/assets/img/bg2.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>Material Kit.</h1>
            <h3>A Badass Bootstrap 4 UI Kit based on Material Design.</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
        <div class="title">
          <h2>Courses</h2>
        </div>
        <!--  buttons -->
        <!--  card -->
        <div class="row">
        <div class="col-md-9">
        <div class="box-body">
              <div class="table-responsive">
              <table  id="example1"   class="table table-striped table-bordered smart-form" >
                <thead>
                <tr>
                  <th>ID Anggota</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Alamat</th>
                 
                  <th>Action</th>
                      
                </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td><?php echo 'row1' ?> </td>
                            <td><?php echo 'row2' ?> </td>
                            <td><?php echo 'row3' ?></td>
                            <td><?php echo 'row 4' ?></td>
                           
                            <td nowrap><a href="" class="btn btn-success btn-sm position-sticky"><i class="fa fa-edit"></i>Edit</a>
                            <a  onclick="" href="" class="btn btn-danger btn-sm position-sticky"><i class="fa fa-trash"></i>Delete</a>
                            </td>
                               
                        </tr>
                   
 
            
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Anggota</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Alamat</th>
                  <?php 
                    $level = $this->session->userdata('Level');
                    if ($level == 1) {
                  ?>
                  <th>Action</th>
                    <?php } ?>
                </tr>
                </tfoot>
              </table>
              </div>
              </div>
                <div class="widget-body-toolbar" align ="right" style="padding-right">
                <nav>
              
                </nav>
              </div>
            <!-- /.box-body -->
        </div>

        <div class="col-md-3">
        <div class="card card-nav-tabs" style="width: 15rem;">
           <!--  <div class="card-header card-header-danger">
                Featured  
            </div> -->
            <div class="col">
                    <div class="small-img-row" style="display: flex; background: #efefef; margin: 20px 0; align-items: center; border-radius: 6px; overflow: hidden;">
                        <div class="small-img">
                            <img src="">
                        </div>
                        <p>Chapter 1</p>
                    </div>
                    <div class="small-img-row" style="display: flex; background: #efefef; margin: 20px 0; align-items: center; border-radius: 6px; overflow: hidden;">
                        <div class="small-img">
                            <img src="">
                        </div>
                        <p>Chapter 2</p>
                    </div>
                    <div class="small-img-row" style="display: flex; background: #efefef; margin: 20px 0; align-items: center; border-radius: 6px; overflow: hidden;">
                        <div class="small-img">
                            <img src="">
                        </div>
                        <p>Chapter 3</p>
                    </div>
                    <div class="small-img-row" style="display: flex; background: #efefef; margin: 20px 0; align-items: center; border-radius: 6px; overflow: hidden;">
                        <div class="small-img">
                            <img src="">
                        </div>
                        <p><a href="Dashboard/course" >Chapter 4</a></p>
                    </div>
            </div>
           
            </div>
        </div>
       
  <footer class="footer" data-background-color="black">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com/">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/blog">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="<?=base_url()?>/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>/assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="<?=base_url()?>/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?=base_url()?>/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>/assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>