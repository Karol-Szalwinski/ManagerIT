<!doctype html>
<html>

    <head>
        <meta charset="UTF-8">
        <!--IE Compatibility modes-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--Mobile first-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Table</title>

        <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
        <meta name="author" content="">

        <meta name="msapplication-TileColor" content="#5bc0de" />
        <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

        <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Metis core stylesheet -->
        <link rel="stylesheet" href="assets/css/main.css">

        <!-- metisMenu stylesheet -->
        <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">

        <!-- animate.css stylesheet -->
        <link rel="stylesheet" href="assets/lib/animate.css/animate.css">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--For Development Only. Not required -->
        <script>
            less = {
                env: "development",
                relativeUrls: false,
                rootpath: "/assets/"
            };
        </script>
        <link rel="stylesheet" href="assets/css/style-switcher.css">
        <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>

    </head>

    <body class="  ">
        <div class="bg-dark dk" id="wrap">
            <div id="top">
                <!-- .navbar -->
                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container-fluid">


                        <!-- Brand and toggle get grouped for better mobile display -->
                        <header class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="index.html" class="navbar-brand"><img src="assets/img/logo.png" alt=""></a>

                        </header>



                        <div class="topnav">
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
                                   class="btn btn-default btn-sm" id="toggleFullScreen">
                                    <i class="glyphicon glyphicon-fullscreen"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="E-mail" data-toggle="tooltip"
                                   class="btn btn-default btn-sm">
                                    <i class="fa fa-envelope"></i>
                                    <span class="label label-warning">5</span>
                                </a>
                                <a data-placement="bottom" data-original-title="Messages" href="#" data-toggle="tooltip"
                                   class="btn btn-default btn-sm">
                                    <i class="fa fa-comments"></i>
                                    <span class="label label-danger">4</span>
                                </a>
                                <a data-toggle="modal" data-original-title="Help" data-placement="bottom"
                                   class="btn btn-default btn-sm"
                                   href="#helpModal">
                                    <i class="fa fa-question"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a href="login.html" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom"
                                   class="btn btn-metis-1 btn-sm">
                                    <i class="fa fa-power-off"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip"
                                   class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <a data-placement="bottom" data-original-title="Show / Hide Right" data-toggle="tooltip"
                                   class="btn btn-default btn-sm toggle-right">
                                    <span class="glyphicon glyphicon-comment"></span>
                                </a>
                            </div>

                        </div>




                        <div class="collapse navbar-collapse navbar-ex1-collapse">

                            <!-- .nav -->
                            <ul class="nav navbar-nav">
                                <li><a href="dashboard.html">Dashboard</a></li>
                                <li class="active"><a href="table.html">Tables</a></li>
                                <li><a href="file.html">File Manager</a></li>
                                <li class='dropdown '>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        Form Elements <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="form-general.html">General</a></li>
                                        <li><a href="form-validation.html">Validation</a></li>
                                        <li><a href="form-wysiwyg.html">WYSIWYG</a></li>
                                        <li><a href="form-wizard.html">Wizard &amp; File Upload</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /.nav -->
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </nav>
                <!-- /.navbar -->                        <header class="head">
                    <div class="search-bar">
                        <form class="main-search" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Live Search ...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-sm text-muted" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <!-- /.main-search -->                                </div>
                    <!-- /.search-bar -->
                    <div class="main-bar">
                        <h3>
                            <i class="fa fa-desktop"></i>&nbsp;
                            Licencja Windows 10
                        </h3>
                    </div>
                    <!-- /.main-bar -->
                </header>
                <!-- /.head -->
            </div>
            <!-- /#top -->
            <?php require_once 'sidebar.php'; ?>
            <!-- /#left -->
            <div id="content">
                <div class="outer">
                    <div class="inner bg-light lter">
                        <!-- /.row -->

                        <div class="row">
                            
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="box">
                                    <header>
                                        <div class="icons"><i class="fa fa-list"></i></div>
                                        <h5>Dane podstawowe</h5>

                                        <div class="toolbar">
                                            <div class="btn-group">
                                                <a href="#condensedTable" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                                                    <i class="fa fa-angle-up"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm close-box"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </header>
                                    <div id="condensedTable" class="body collapse in">
                                        <table class="table table-condensed responsive-table">

                                            <tbody>
                                                <tr>                                                    
                                                    <td>Imie</td>
                                                    <td>Małgorzata</td>
                                                </tr>
                                                <tr>
                                                    <td>Nazwisko</td>
                                                    <td>Domańska</td>
                                                </tr>
                                                <tr>
                                                    <td>Stanowisko</td>
                                                    <td>Sekretarka</td>
                                                </tr>
                                                <tr>
                                                    <td>Dział</td>
                                                    <td>Biuro</td>
                                                </tr>
                                                <tr>
                                                    <td>Adres email</td>
                                                    <td>goska@firma.pl</td>
                                                </tr>
                                                <tr>
                                                    <td>Telefon</td>
                                                    <td>603 324 302</td>
                                                </tr>
                                            </tbody>                </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->
                                                    
                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="box">
                                    <header>
                                        <div class="icons"><i class="fa fa-list"></i></div>
                                        <h5>Przypisany sprzęt</h5>

                                        <div class="toolbar">
                                            <div class="btn-group">
                                                <a href="#condensedTable" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                                                    <i class="fa fa-angle-up"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm close-box"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </header>
                                    <div id="condensedTable" class="body collapse in">
                                        <table class="table table-condensed responsive-table">
                                            <thead>
                                                <tr>
                                                    <th>Nazwa</th>
                                                    <th>Typ</th>
                                                    <th>Model</th>
                                                    <th>Naklejka</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>                                                    
                                                    <td>P-102-P-BIURO</td>
                                                    <td>Desktop</td>
                                                    <td>Optiplex 760</td>
                                                    <td>Tak</td>
                                                </tr>
                                            </tbody>                </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->

                            <!-- .col-lg-6 -->
                            <div class="col-lg-6">
                                <div class="box">
                                    <header>
                                        <div class="icons"><i class="fa fa-list"></i></div>
                                        <h5>Licencje</h5>

                                        <div class="toolbar">
                                            <div class="btn-group">
                                                <a href="#condensedTable" data-toggle="collapse" class="btn btn-default btn-sm minimize-box">
                                                    <i class="fa fa-angle-up"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm close-box"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </header>
                                    <div id="condensedTable" class="body collapse in">
                                        <table class="table table-condensed responsive-table">
                                            <thead>
                                                <tr>
                                                    <th>Program</th>
                                                    <th>Typ licencji</th>
                                                    <th>Wygasa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>                                                    
                                                    <td>Windows XP</td>
                                                    <td>OEM</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr>                                                    
                                                    <td>Office 365</td>
                                                    <td>Roczna</td>
                                                    <td>05.15.2017</td>
                                                </tr>
                                                <tr>
                                                    <td>Stacja Allegro</td>
                                                    <td>zwykła</td>
                                                    <td>-</td>
                                                </tr>

                                            </tbody>                </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-6 -->

                        </div>
                        <!-- /.row -->



                    </div>
                    <!-- /.inner -->
                </div>
                <!-- /.outer -->
            </div>
            <!-- /#content -->
            <div id="right" class="bg-light lter">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Best check yo self, you're not looking too good.
                </div>
                <!-- .well well-small -->
                <div class="well well-small dark">
                    <ul class="list-unstyled">
                        <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span></li>
                        <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span></li>
                        <li>Popularity <span class="dynamicbar pull-right">Loading..</span></li>
                        <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span></li>
                    </ul>
                </div>
                <!-- /.well well-small -->
                <!-- .well well-small -->
                <div class="well well-small dark">
                    <button class="btn btn-block">Default</button>
                    <button class="btn btn-primary btn-block">Primary</button>
                    <button class="btn btn-info btn-block">Info</button>
                    <button class="btn btn-success btn-block">Success</button>
                    <button class="btn btn-danger btn-block">Danger</button>
                    <button class="btn btn-warning btn-block">Warning</button>
                    <button class="btn btn-inverse btn-block">Inverse</button>
                    <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
                    <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
                    <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
                    <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
                    <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
                    <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
                </div>
                <!-- /.well well-small -->
                <!-- .well well-small -->
                <div class="well well-small dark">
                    <span>Default</span><span class="pull-right"><small>20%</small></span>

                    <div class="progress xs">
                        <div class="progress-bar progress-bar-info" style="width: 20%"></div>
                    </div>
                    <span>Success</span><span class="pull-right"><small>40%</small></span>

                    <div class="progress xs">
                        <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                    </div>
                    <span>warning</span><span class="pull-right"><small>60%</small></span>

                    <div class="progress xs">
                        <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
                    </div>
                    <span>Danger</span><span class="pull-right"><small>80%</small></span>

                    <div class="progress xs">
                        <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
                    </div>
                </div>                    </div>
            <!-- /#right -->
        </div>
        <!-- /#wrap -->
        <footer class="Footer bg-dark dker">
            <p>2016 &copy; Metis Bootstrap Admin Template</p>
        </footer>
        <!-- /#footer -->
        <!-- #helpModal -->
        <div id="helpModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /#helpModal -->
        <!--jQuery -->
        <script src="assets/lib/jquery/jquery.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.26.6/js/jquery.tablesorter.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

        <!--Bootstrap -->
        <script src="assets/lib/bootstrap/js/bootstrap.js"></script>
        <!-- MetisMenu -->
        <script src="assets/lib/metismenu/metisMenu.js"></script>
        <!-- Screenfull -->
        <script src="assets/lib/screenfull/screenfull.js"></script>


        <!-- Metis core scripts -->
        <script src="assets/js/core.js"></script>
        <!-- Metis demo scripts -->
        <script src="assets/js/app.js"></script>

        <script>
            $(function () {
                Metis.MetisTable();
                Metis.metisSortable();
            });
        </script>

        <script src="assets/js/style-switcher.js"></script>
    </body>

</html>
