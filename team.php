<?php

include('class/game.php');
include('class/summoner.php');
include('class/champion.php');

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tanukings - Team</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/plugins/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin-2.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Tanukings - Team</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="refresh.php"><i class="fa fa-gear fa-fw"></i>Actualiser les statistiques.</a>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="team.php"><i class="fa fa-dashboard fa-fw"></i> Statistiques de l'équipe</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Statistiques en SoloQ<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="solo.php?player=TnK Vodkaas"><i class="fa fa-wheelchair fa-fw"></i>TnK Vodkaas (boloss tagteam)</a>
                                    </li>
                                    <li>
                                        <a href="solo.php?player=TNK AlexKos">TNK AlexKos</a>
                                    </li>
                                    <li>
                                        <a href="solo.php?player=PKBRO Barràc">PKBRO Barràc</a>
                                    </li>
                                    <li>
                                        <a href="solo.php?player=TNK LeKikiFlo">TNK LeKikiFlo</a>
                                    </li>
                                    <li>
                                        <a href="solo.php?player=TNK Akeru">TNK Akeru</a>
                                    </li>
                                    <li>
                                        <a href="solo.php?player=TNK Friize">TNK Friize</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">TNK AlexKos</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                $summoner = new summoner('TNK AlexKos');
                $summonerId = $summoner->getId();
                $typeGame = 'RANKED_TEAM_5x5';
                $rankedsTeam = game::getInfo($summonerId, $typeGame);
                ?>
                <table class="table table-striped table-bordered table-hover dataTable test no-footer">
                    <thead>
                        <tr>
                            <th>Champion</th>
                            <th>Win</th>
                            <th>Kill</th>
                            <th>Death</th>
                            <th>Assist</th>
                            <th>Creep Score</th>
                            <th>Durée de la game</th>
                            <th>Pink acheté</th>
                            <th>Wards posé</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($rankedsTeam as $rankedTeam) { 
                            $champion = new champion($rankedTeam['champ_ID']);
                            $championIcon = $champion->getLinkChampionSquare();
                            if($rankedTeam['victory'] == 0){
                                $win = 'style="background-color : red;"';
                            }
                            else{
                                $win = 'style="background-color : green;"';
                            }
                        ?>
                    <tbody>
                            
                            <td><img src="<?php echo $championIcon; ?>" style="width: 25%; height: 25%;"></img></td>
                            <td <?php echo $win; ?>></td>
                            <td><?php echo $rankedTeam['kill']; ?></td>
                            <td><?php echo $rankedTeam['death']; ?></td>
                            <td><?php echo $rankedTeam['assist']; ?></td>
                            <td><?php echo $rankedTeam['cs']; ?></td>
                            <td><?php echo $rankedTeam['time']; ?></td>
                            <td><?php echo $rankedTeam['pinkBought']; ?></td>
                            <td><?php echo $rankedTeam['wardPlaced']; ?></td>
                        
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
                <div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-wheelchair fa-fw"></i>TnK Vodkaas (boloss tagteam)</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                $summoner = new summoner('TNK Vodkaas');
                $summonerId = $summoner->getId();
                $typeGame = 'RANKED_TEAM_5x5';
                $rankedsTeam = game::getInfo($summonerId, $typeGame);
                ?>
                <table class="table table-striped table-bordered table-hover dataTable test no-footer">
                    <thead>
                        <tr>
                            <th>Champion</th>
                            <th>Win</th>
                            <th>Kill</th>
                            <th>Death</th>
                            <th>Assist</th>
                            <th>Creep Score</th>
                            <th>Durée de la game</th>
                            <th>Pink acheté</th>
                            <th>Wards posé</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($rankedsTeam as $rankedTeam) { 
                            $champion = new champion($rankedTeam['champ_ID']);
                            $championIcon = $champion->getLinkChampionSquare();
                            if($rankedTeam['victory'] == 0){
                                $win = 'style="background-color : red;"';
                            }
                            else{
                                $win = 'style="background-color : green;"';
                            }
                        ?>
                    <tbody>
                            
                            <td><img src="<?php echo $championIcon; ?>" style="width: 25%; height: 25%;"></img></td>
                            <td <?php echo $win; ?>></td>
                            <td><?php echo $rankedTeam['kill']; ?></td>
                            <td><?php echo $rankedTeam['death']; ?></td>
                            <td><?php echo $rankedTeam['assist']; ?></td>
                            <td><?php echo $rankedTeam['cs']; ?></td>
                            <td><?php echo $rankedTeam['time']; ?></td>
                            <td><?php echo $rankedTeam['pinkBought']; ?></td>
                            <td><?php echo $rankedTeam['wardPlaced']; ?></td>
                        
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
                <div>
                </div>
                <!-- /.row -->
            </div>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">PKBRO Barràc</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                $summoner = new summoner('PKBRO Barràc');
                $summonerId = $summoner->getId();
                $typeGame = 'RANKED_TEAM_5x5';
                $rankedsTeam = game::getInfo($summonerId, $typeGame);
                ?>
                <table class="table table-striped table-bordered table-hover dataTable test no-footer">
                    <thead>
                        <tr>
                            <th>Champion</th>
                            <th>Win</th>
                            <th>Kill</th>
                            <th>Death</th>
                            <th>Assist</th>
                            <th>Creep Score</th>
                            <th>Durée de la game</th>
                            <th>Pink acheté</th>
                            <th>Wards posé</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($rankedsTeam as $rankedTeam) { 
                            $champion = new champion($rankedTeam['champ_ID']);
                            $championIcon = $champion->getLinkChampionSquare();
                            if($rankedTeam['victory'] == 0){
                                $win = 'style="background-color : red;"';
                            }
                            else{
                                $win = 'style="background-color : green;"';
                            }
                        ?>
                    <tbody>
                            
                            <td><img src="<?php echo $championIcon; ?>" style="width: 25%; height: 25%;"></img></td>
                            <td <?php echo $win; ?>></td>
                            <td><?php echo $rankedTeam['kill']; ?></td>
                            <td><?php echo $rankedTeam['death']; ?></td>
                            <td><?php echo $rankedTeam['assist']; ?></td>
                            <td><?php echo $rankedTeam['cs']; ?></td>
                            <td><?php echo $rankedTeam['time']; ?></td>
                            <td><?php echo $rankedTeam['pinkBought']; ?></td>
                            <td><?php echo $rankedTeam['wardPlaced']; ?></td>
                        
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
                <div>
                </div>
                <!-- /.row -->
            </div>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">TNK LeKikiFlo</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                $summoner = new summoner('TNK LeKikiFlo');
                $summonerId = $summoner->getId();
                $typeGame = 'RANKED_TEAM_5x5';
                $rankedsTeam = game::getInfo($summonerId, $typeGame);
                ?>
                <table class="table table-striped table-bordered table-hover dataTable test no-footer">
                    <thead>
                        <tr>
                            <th>Champion</th>
                            <th>Win</th>
                            <th>Kill</th>
                            <th>Death</th>
                            <th>Assist</th>
                            <th>Creep Score</th>
                            <th>Durée de la game</th>
                            <th>Pink acheté</th>
                            <th>Wards posé</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($rankedsTeam as $rankedTeam) { 
                            $champion = new champion($rankedTeam['champ_ID']);
                            $championIcon = $champion->getLinkChampionSquare();
                            if($rankedTeam['victory'] == 0){
                                $win = 'style="background-color : red;"';
                            }
                            else{
                                $win = 'style="background-color : green;"';
                            }
                        ?>
                    <tbody>
                            
                            <td><img src="<?php echo $championIcon; ?>" style="width: 25%; height: 25%;"></img></td>
                            <td <?php echo $win; ?>></td>
                            <td><?php echo $rankedTeam['kill']; ?></td>
                            <td><?php echo $rankedTeam['death']; ?></td>
                            <td><?php echo $rankedTeam['assist']; ?></td>
                            <td><?php echo $rankedTeam['cs']; ?></td>
                            <td><?php echo $rankedTeam['time']; ?></td>
                            <td><?php echo $rankedTeam['pinkBought']; ?></td>
                            <td><?php echo $rankedTeam['wardPlaced']; ?></td>
                        
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
                <div>
                </div>
                <!-- /.row -->
            </div>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">TNK Akeru</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                $summoner = new summoner('TNK Akeru');
                $summonerId = $summoner->getId();
                $typeGame = 'RANKED_TEAM_5x5';
                $rankedsTeam = game::getInfo($summonerId, $typeGame);
                ?>
                <table class="table table-striped table-bordered table-hover dataTable test no-footer">
                    <thead>
                        <tr>
                            <th>Champion</th>
                            <th>Win</th>
                            <th>Kill</th>
                            <th>Death</th>
                            <th>Assist</th>
                            <th>Creep Score</th>
                            <th>Durée de la game</th>
                            <th>Pink acheté</th>
                            <th>Wards posé</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($rankedsTeam as $rankedTeam) { 
                            $champion = new champion($rankedTeam['champ_ID']);
                            $championIcon = $champion->getLinkChampionSquare();
                            if($rankedTeam['victory'] == 0){
                                $win = 'style="background-color : red;"';
                            }
                            else{
                                $win = 'style="background-color : green;"';
                            }
                        ?>
                    <tbody>
                            
                            <td><img src="<?php echo $championIcon; ?>" style="width: 25%; height: 25%;"></img></td>
                            <td <?php echo $win; ?>></td>
                            <td><?php echo $rankedTeam['kill']; ?></td>
                            <td><?php echo $rankedTeam['death']; ?></td>
                            <td><?php echo $rankedTeam['assist']; ?></td>
                            <td><?php echo $rankedTeam['cs']; ?></td>
                            <td><?php echo $rankedTeam['time']; ?></td>
                            <td><?php echo $rankedTeam['pinkBought']; ?></td>
                            <td><?php echo $rankedTeam['wardPlaced']; ?></td>
                        
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
                <div>
                </div>
                <!-- /.row -->
            </div>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">TNK Friize</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                $summoner = new summoner('TNK Friize');
                $summonerId = $summoner->getId();
                $typeGame = 'RANKED_TEAM_5x5';
                $rankedsTeam = game::getInfo($summonerId, $typeGame);
                ?>
                <table class="table table-striped table-bordered table-hover dataTable test no-footer">
                    <thead>
                        <tr>
                            <th>Champion</th>
                            <th>Win</th>
                            <th>Kill</th>
                            <th>Death</th>
                            <th>Assist</th>
                            <th>Creep Score</th>
                            <th>Durée de la game</th>
                            <th>Pink acheté</th>
                            <th>Wards posé</th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($rankedsTeam as $rankedTeam) { 
                            $champion = new champion($rankedTeam['champ_ID']);
                            $championIcon = $champion->getLinkChampionSquare();
                            if($rankedTeam['victory'] == 0){
                                $win = 'style="background-color : red;"';
                            }
                            else{
                                $win = 'style="background-color : green;"';
                            }
                        ?>
                    <tbody>
                            
                            <td><img src="<?php echo $championIcon; ?>" style="width: 25%; height: 25%;"></img></td>
                            <td <?php echo $win; ?>></td>
                            <td><?php echo $rankedTeam['kill']; ?></td>
                            <td><?php echo $rankedTeam['death']; ?></td>
                            <td><?php echo $rankedTeam['assist']; ?></td>
                            <td><?php echo $rankedTeam['cs']; ?></td>
                            <td><?php echo $rankedTeam['time']; ?></td>
                            <td><?php echo $rankedTeam['pinkBought']; ?></td>
                            <td><?php echo $rankedTeam['wardPlaced']; ?></td>
                        
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
                <div>
                </div>
                <!-- /.row -->
            </div>
            

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="js/plugins/morris/raphael.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/sb-admin-2.js"></script>

        <!-- DataTable JavaScript -->
        <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

        <!-- Initialisation de DataTable -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('.dataTable').DataTable({
                    //"columns": [
                    //    {"width": "10%"},
                    //    null,
                    //    {"width": "15%"},
                    //    {"width": "5%"}
                    //],
                    "order": [[0, "desc"]],
                    "language": {
                        "url"
                                : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    }
                });
            });
        </script>

    </body>

</html>
