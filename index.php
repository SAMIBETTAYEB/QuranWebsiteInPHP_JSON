<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
session_start();
$json_url = "http://mp3quran.net/api/_english.json";
$json=file_get_contents($json_url);
$json=preg_replace('/[\x00-\x1F\x80-\xFF]/', '',$json);
$json_d=json_decode($json);
//echo $json_d==null?"null":"Not null";
//echo $json_d->reciters[0]->name;
//echo json_last_error();


if(!isset($_SESSION["nbr"])){
  $_SESSION["nbr"]=1;
}else{
  $_SESSION["nbr"]+=1;
}



?>

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>القرآن الكريم</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <style type="text/css">
  html,body{
    direction: rtl;
    text-align: center;
    box-sizing:border-box!important;
  }
  .soura {
    width: 100%;
    background-color: #ddd;
    border: 1px solid #111;
    float: left;
    margin: 5px;
    text-align: left !important;
    border: 3px solid #000;
    font-size: 20px;
}
  .soura img:hover{
    cursor: pointer;
  }
  </style>
  <!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script type="text/javascript">
  var server="";
  $(document).ready(function(){
    $(".t").hide();
    $("#souars-panel").hide();
    $(".t").parent().parent().click(function(){
      //alert($(this).html());
      $(".t").slideUp();
      $(this).find("img").slideDown();
    });


    
    $(".r").click(function(){
      server=($(this).attr("data-r"));
                                              $.post("suras.php", {s: server+""}, function(result){
                                                $("#souars").html(result);
                                              });
      //$("#souars").load("suras.php");
      $("#souars-panel").slideDown(200);
      //$("#souars").html($(this).attr("data-r"));
      //$("#souars").load("suras.php");
      $("#souars").slideDown(function(){
      },500);
      $("#souars.soura.listen").click(function(){
      alert("sami");
      });
    });
  });
</script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo" style="position:fixed;top:0;left:0;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>القرآن الكريم</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>القرآن الكريم</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">تصفح</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">لديك 4 رسائل</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        فريق الدعم
                        <small><i class="fa fa-clock-o"></i> 5 دقائق</small>
                      </h4>
                      <!-- The message -->
                      <p>لماذا لا تقوم بقراءة القرآن الكريم؟</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">تصفح كافة الرَّسائل</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">لديك 10 إشعارات</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> الإشعار الأول 
                      عدد زياراتك للموقع هو: <?php echo $_SESSION["nbr"]; ?>
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">تصفح كافة الإشعارات</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">لديك 9 مهمات</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        المهمة الأولى
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% اكتملت</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">تصفح كافة المهام</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">زائر</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  زائر
                  <small>زائر</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">متابعون</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">مبيعات</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">أصدقاء</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">الملف الشخصي</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">تسجيل الخروج</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
        <ul id="audio_container">
          
          </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="position:fixed; top:0; left:0;">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>زائر</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> مُتَّصِل</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="بحث...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">قائمة</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>الصفحة الرئيسية</span></a></li>
        <!--<li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>-->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        القرآن الكريم
        <small>قرآن يتلى آناء الليل وأطراف النهار</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> المستوى</a></li>
        <li class="active">الحالي</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Your Page Content Here -->

      <div id="souars-panel" class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">السُّور</h3>
  </div>
  <div id="souars" class="panel-body">

  </div>
</div>
      
      
      <!--<div class="col-md-12"><div class="row"><h1>القرآء</h1></div>-->




<?php for($a=0;$a<count($json_d->reciters);$a+=4) { ?>
       <div class="row">
        <?php for($j=0;$j<4;$j++){ if($a+$j<count($json_d->reciters)){ ?>
  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <img class="t" src="http://www.ttopsoft.com/wp-content/uploads/%D8%A2%D9%8A%D8%A9.png" alt="...">
      <div class="caption">
        <h3><?php echo $json_d->reciters[$a+$j]->name ?></h3>
        <p><?php echo $json_d->reciters[$a+$j]->rewaya ?></p>
        <p><a href="#" class="btn btn-primary btn-block r" data-a="<?php echo $a+$j; ?>" data-r="<?php echo $json_d->reciters[$a+$j]->Server; ?>" role="button">تصفح</a></p>
      </div>
    </div>
  </div>
<?php } } ?>

</div>
  <?php } ?>





<?php 
/*
      <div class="row">
  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <img class="t" src="http://www.ttopsoft.com/wp-content/uploads/%D8%A2%D9%8A%D8%A9.png" alt="...">
      <div class="caption">
        <h3>القارئ الأول</h3>
        <p>القارئ الأول</p>
        <p><a href="#" class="btn btn-primary btn-block r" data-r="id-reciter" role="button">تصفح</a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <img class="t" src="http://www.ttopsoft.com/wp-content/uploads/%D8%A2%D9%8A%D8%A9.png" alt="...">
      <div class="caption">
        <h3>القارئ الثاني</h3>
        <p>القارئ الثاني</p>
        <p><a href="#" class="btn btn-primary btn-block r" data-r="id-reciter" role="button">تصفح</a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <img class="t" src="http://www.ttopsoft.com/wp-content/uploads/%D8%A2%D9%8A%D8%A9.png" alt="...">
      <div class="caption">
        <h3>القارئ الثاني</h3>
        <p>القارئ الثاني</p>
        <p><a href="#" class="btn btn-primary btn-block r" data-r="id-reciter" role="button">تصفح</a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <img class="t" src="http://www.ttopsoft.com/wp-content/uploads/%D8%A2%D9%8A%D8%A9.png" alt="...">
      <div class="caption">
        <h3>القارئ الثاني</h3>
        <p>القارئ الثاني</p>
        <p><a href="#" class="btn btn-primary btn-block r" data-r="id-reciter" role="button">تصفح</a></p>
      </div>
    </div>
  </div>

</div>


<div class="row">
  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <img class="t" src="http://www.ttopsoft.com/wp-content/uploads/%D8%A2%D9%8A%D8%A9.png" alt="...">
      <div class="caption">
        <h3>القارئ الأول</h3>
        <p>القارئ الأول</p>
        <p><a href="#" class="btn btn-primary btn-block r" data-r="id-reciter" role="button">تصفح</a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-3 col-md-3">
    <div class="thumbnail">
      <img class="t" src="http://www.ttopsoft.com/wp-content/uploads/%D8%A2%D9%8A%D8%A9.png" alt="...">
      <div class="caption">
        <h3>القارئ الثاني</h3>
        <p>القارئ الثاني</p>
        <p><a href="#" class="btn btn-primary btn-block r" data-r="id-reciter" role="button">تصفح</a></p>
      </div>
    </div>
  </div>

</div>

    <!--</div>-->
    



      <!--<div class="col-md-6"><div class="row"><h1>السُّور</h1></div></div>-->
*/ ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <strong>الله أكبر</strong>
    </div><strong>الحمد لله رب العالمين</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">آخر النشاطات</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">رمضان الكريم</h4>

                <p>سيكون يوم 28 ماي 2016 بإذن الله</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">تقدُّم المُهِمَّات</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                اكتمال بناء الموقع
                <span class="label label-danger pull-right">75%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 75%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
