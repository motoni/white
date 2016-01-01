<?php 
    $usertype = $this->session->userdata("usertype");
    if($usertype == "Admin") {
?>
  <div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('student')?>">
                <div class="icon bg-aqua" style="padding: 9.5px 18px 8px 18px;">
                    <i class="fa icon-student"></i>
                </div>
                <div class="inner ">
                    <h3>
                        <?=count($student)?>
                    </h3>
                    <p>
                        <?=$this->lang->line("menu_student")?>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('teacher')?>">
                <div class="icon bg-red" style="padding: 9.5px 18px 8px 18px;">
                    <i class="fa icon-teacher"></i>
                </div>
                <div class="inner ">
                    <h3>
                        <?=count($teacher)?>
                    </h3>
                    <p>
                        <?=$this->lang->line("menu_teacher")?>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('parentes')?>">
                <div class="icon bg-yellow">
                    <i class="fa fa-user"></i>
                </div>
                <div class="inner ">
                    <h3>
                        <?=count($parents)?>
                    </h3>
                    <p>
                        <?=$this->lang->line("menu_parent")?>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('sattendance')?>">
                <div class="icon bg-blue" style="padding: 9.5px 18px 8px 18px;">
                    <i class="fa icon-attendance"></i>
                </div>
                <div class="inner ">
                  <h3>
                      <?=count($attendance)?>
                  </h3>
                  <p>
                    <?=$this->lang->line("menu_attendance")?>
                  </p>
                </div>
            </a>
        </div>
    </div>
  </div>

  <script type="text/javascript" src="<?php echo base_url('assets/chartjs/chart.js'); ?>"></script>
  <div class="row">
     <div class="col-lg-9">
        <div class="box">
          <div class="box-header" style="background-color:#926dde;">
            <h3 class="box-title">
                <?=$this->lang->line('dashboard_earning_graph')?>
              </h3>
          </div>

          <div class="box-body" style="background-color:#926dde;">
            <canvas style="padding-right:25px" id="graph" width="200" height="101"/></canvas>
          </div>        
       </div>
      </div>
      <div class="col-lg-3">
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <center><canvas id="pai" width="200" height="200"/></canvas></center>
            </section>
          </div>
          <div class="col-lg-12">
            <section class="panel">
              <center><canvas id="chart-area" width="200" height="200"/></canvas></center>
            </section>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-xs-6">
      <section class="small-box">
        <a class="box-container" href="#">
          <header class="title">
             <h4>Staff Attendance</h4>
          </header>
        <center>
          <p class="percent"><span class="pvalue">
            <?php 
                $total = count($teacher);
                $present = count($tPresentAttendance);
                $result = round(($present/$total), 2)*100;
                echo $result . "%";
              ?>
            </span><span class="small-text">Present</span></p>
          <canvas id="teachers-absent-graph" class="chart-on-canvas" width="100" height="100"></canvas>
        </center>
        <div id="js-legend" class="chart-legend"></div>
      </a>
      </section>
    </div>
    <div class="col-lg-6 col-xs-6">
      <section class="small-box">
        <a class="box-container" href="#">
          <header class="title">
             <h4>Students Attendance</h4>
          </header> 
          <center>
            <p class="percent"><span class="pvalue">
              <?php 
                $total = count($student);
                $present = count($attendance);
                $result = round(($present/$total), 2)*100;
                echo $result . "%";
              ?>
              </span><span class="small-text">Present</span></p>
            <canvas id="students-absent-graph" class="chart-on-canvas" width="100" height="100"></canvas>
          </center>
          <div id="js-legend" class="chart-legend"></div>
      </a>
      </section>
    </div>
  </div>
<script type="text/javascript" src="<?php echo base_url('assets/scripts/graphs.js'); ?>"></script>
<script>
  $(document).ready(function() {

    /* ============= Attendance Chart data ===================== */

    var tdata = [ // Teachers Data
          {
            value: <?=count($tPresentAttendance) ? count($tPresentAttendance) : 1 ?>,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Present"
          },

          {
            value: <?=count($tAbsentAttendance) ? count($tAbsentAttendance) : 1 ?>,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Absent"
          },

        ];

        var sdata = [ // Students Data
          {
            value: <?=count($attendance) ? count($attendance) : 1 ?>,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Present"
          },

          {
            value: <?=count($sAbsentAttendance) ? count($sAbsentAttendance) : 1 ?>,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Absent"
          },

        ];

        var options = {
          segmentShowStroke: false,
          animateRotate: true,
          animateScale: false,
          percentageInnerCutout: 55,
          tooltipTemplate: "<%= value %>"
        }

       displayAttendanceDoughnutGraph(tdata, "#teachers-absent-graph", options); // Display Teachers Attendance Chart
       displayAttendanceDoughnutGraph(sdata, "#students-absent-graph", options); // Display Students Attendance Chart

  }); 
</script>
<script type="text/javascript" src="<?php echo base_url('assets/chartjs/chart.js'); ?>"></script>
  <script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
      $.ajax({
        type: 'GET',
        dataType: "json",
        url: "<?=base_url('dashboard/graphcall')?>",
        dataType: "html",
        success: function(data) {
          var response = jQuery.parseJSON(data);
          var barChartData = {
            labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug", 'Sep', "Oct", "Nov", "Dec"],
            datasets : [{
              fillColor : "rgba(255,255,255,1)", // bar color
              strokeColor : "rgba(151,187,205,0.8)", //hover color
              highlightFill : "rgba(242,245,233,1)", // hithlight color
              highlightStroke : "rgba(151,187,205,1)", // highlight hover color
              data : response.balance
            }]
          }

          $(document).ready(function() { 
            var graph = document.getElementById("graph").getContext("2d");
            window.myBar = new Chart(graph).Bar(barChartData, {
              responsive : true,
              scaleGridLineColor : "rgba(255,255,255,1)",
              scaleShowHorizontalLines: true,
              scaleShowVerticalLines: false,
              barStrokeWidth : 1,
              barValueSpacing : 15,
            });
          });
        }
      });

      $.ajax({
          type: 'GET',
          dataType: "json",
          url: "<?=base_url('dashboard/paymentscall')?>",
          dataType: "html",
          success: function(data) {
            var response = jQuery.parseJSON(data);
            npaid = response.npaid;
            ppaid = response.ppaid;
            fpaid = response.fpaid;
            cash = response.cash;
            cheque = response.cheque;
            paypal = response.paypal;
            stripe = response.stripe;
            st = response.st;

            if(st == 1) {
              var pieData = [{
                value: npaid,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "<?=$this->lang->line('dashboard_notpaid')?>"
              }, {
                value: ppaid,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "<?=$this->lang->line('dashboard_partially_paid')?>"
              }, {
                value: fpaid,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "<?=$this->lang->line('dashboard_fully_paid')?>"
              }];

              if((cash == 0 && cheque == 0 && paypal == 0)) {
                var doughnutData = [{
                  value: 1,
                  color:"#4D5360",
                  highlight: "#616774",
                  label: "<?=$this->lang->line('dashboard_sample')?>"
                }];
              } else {
                var doughnutData = [{
                  value: cash,
                  color:"#084D5F",
                  highlight: "#0B6B85",
                  label: "<?=$this->lang->line('dashboard_cash')?>"
                }, {
                  value: cheque,
                  color: "#D48197",
                  highlight: "#F294AD  ",
                  label: "<?=$this->lang->line('dashboard_cheque')?>"
                }, {
                  value: paypal,
                  color: "#D70D71",
                  highlight: "#B50B5F",
                  label: "<?=$this->lang->line('dashboard_paypal')?>"
                }];
              }
            } else {
              var pieData = [{
                value: 1,
                color:"#4D5360",
                highlight: "#616774",
                label: "<?=$this->lang->line('dashboard_sample')?>"
              }];

              var doughnutData = [{
                value: 1,
                color:"#4D5360",
                highlight: "#616774",
                label: "<?=$this->lang->line('dashboard_sample')?>"
              }];
            }


            window.onload = function(){
              var ctx = document.getElementById("pai").getContext("2d");
              window.myPie = new Chart(ctx).Pie(pieData);

              var ctx = document.getElementById("chart-area").getContext("2d");
              window.myPie = new Chart(ctx).Pie(doughnutData);
            }
          }
      });

    
      
  </script>

<?php 
  foreach ($events as $event) {
    $event_title = $event->title;
    $create_date = $event->create_date;

  }

?>

  <script type="text/javascript" src="<?php echo base_url('assets/fullcalendar/fullcalendar.min.js'); ?>"></script>

  <script type="text/javascript">
    $(function() {
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'prev,next'
            },
            buttonText: {//This is to add icons to the visible buttons
                prev: "<span class='fa fa-caret-left'></span>",
                next: "<span class='fa fa-caret-right'></span>",
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            events: [

                <?php 
                  foreach ($events as $event) : 
                    $event_title = $event->title;
                    $date = $event->date;
                ?>


            {
                title: "<?= $event_title; ?>",
                start: "<?= $date; ?>",
                end: "<?= $date; ?>"
              },

              <?php endforeach ?>
            ]
        });
    });
  </script>

  <div class="row"> 
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div><!-- /.col -->

    <div class="col-sm-6">
      <div class="box">
        <div class="box-header" style="background-color:#FDB45C;">
          <h3 class="box-title">
              <?=$this->lang->line('dashboard_notice')?>
            </h3>
        </div>

        <div class="box-body" style="padding: 0px;">
          <table class="table table-hover">
              <tbody>
                <?php 

                  if(count($notices)) {
                    $i =1;
                    foreach ($notices as $key => $notice) {
                      if($i != 8) {
                        echo "<tr>";
                          echo "<td>";
                            echo $i;
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->title) > 20) {
                               $title = substr($notice->title, 0,20). ".."; 
                            } else {
                                $title = $notice->title;
                            }
                            echo strip_tags($title);
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->notice) > 80) {
                              $discription = substr($notice->notice, 0,80). ".."; 
                            } else {
                                $discription = $notice->notice;
                            }
                            echo strip_tags($discription);
                          echo "</td>";

                          echo "<td>";
                            echo btn_dash_view('notice/view/'.$notice->noticeID, $this->lang->line('view'));
                          echo "</td>";
                        echo "</tr>";
                        $i++;
                      } else {
                        break;
                      }
                      
                    }
                  }


                ?>
              </tbody>
          </table>
        </div>

      </div>
    </div>

   <div class="row">
    
  </div><!-- /.row -->

  </div>

<?php } elseif($usertype == "Teacher") { ?>
  <div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('student')?>">
                <div class="icon bg-aqua" style="padding: 9.5px 18px 8px 18px;">
                    <i class="fa icon-student"></i>
                </div>
                <div class="inner ">
                    <h3>
                        <?=count($student)?>
                    </h3>
                    <p>
                        <?=$this->lang->line("menu_student")?>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('teacher')?>">
              <div class="icon bg-red" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-teacher"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($teacher)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_teacher")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('subject')?>">
              <div class="icon bg-yellow" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-subject"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($subject)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_subject")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('sattendance')?>">
              <div class="icon bg-blue" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-attendance"></i>
              </div>
              <div class="inner ">
                <h3>
                    <?=count($attendance)?>
                </h3>
                <p>
                  <?=$this->lang->line("menu_attendance")?>
                </p>
              </div>
          </a>
      </div>
    </div>
  </div>

  <div class="row"> 
    <div class="col-sm-4">
      <?php if(count($user)) { ?>

        <section class="panel">
          <div class="profile-db-head">
            <a href="<?=base_url('profile/index')?>">
              <?=img(base_url('uploads/images/'.$user->photo));?>
            </a>

            <h1><?=$user->name?></h1>
            <p><?=$this->lang->line($user->usertype)?></p>

          </div>
          <table class="table table-hover">
              <tbody>
                  <tr>
                    <td>
                      <i class="glyphicon glyphicon-user" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_username')?></td>
                    <td><?=$user->username?></td>
                  </tr>
                  <tr>
                      <td>
                        <i class="fa fa-envelope" style="color:#FDB45C;"></i>
                      </td>
                      <td><?=$this->lang->line('dashboard_email')?></td>
                    <td><?=$user->email?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class="fa fa-phone" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_phone')?></td>
                    <td><?=$user->phone?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class=" fa fa-globe" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_address')?></td>
                    <td><?=$user->address?></td>
                  </tr>
              </tbody>
          </table>
        </section>
      <?php } ?>
    </div>


    <div class="col-sm-8">
      <div class="box">
        <div class="box-header" style="background-color:#FDB45C;">
          <h3 class="box-title">
              <?=$this->lang->line('dashboard_notice')?>
            </h3>
        </div>

        <div class="box-body" style="padding: 0px;">
          <table class="table table-hover">
              <tbody>
                <?php 

                  if(count($notices)) {
                    $i =1;
                    foreach ($notices as $key => $notice) {
                      if($i != 8) {
                        echo "<tr>";
                          echo "<td>";
                            echo $i;
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->title) > 20) {
                               $title = substr($notice->title, 0,20). ".."; 
                            } else {
                                $title = $notice->title;
                            }
                            echo strip_tags($title);
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->notice) > 80) {
                              $discription = substr($notice->notice, 0,80). ".."; 
                            } else {
                                $discription = $notice->notice;
                            }
                            echo strip_tags($discription);
                          echo "</td>";

                          echo "<td>";
                            echo btn_dash_view('notice/view/'.$notice->noticeID, $this->lang->line('view'));
                          echo "</td>";
                        echo "</tr>";
                        $i++;
                      } else {
                        break;
                      }
                      
                    }
                  }


                ?>
              </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <script type="text/javascript" src="<?php echo base_url('assets/fullcalendar/fullcalendar.min.js'); ?>"></script>

    <script type="text/javascript">
    $(function() {
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'prev,next'
            },
            buttonText: {//This is to add icons to the visible buttons
                prev: "<span class='fa fa-caret-left'></span>",
                next: "<span class='fa fa-caret-right'></span>",
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            events: [

                <?php 
                  foreach ($events as $event) : 
                    $event_title = $event->title;
                    $date = $event->date;
                ?>


            {
                title: "<?= $event_title; ?>",
                start: "<?= $date; ?>",
                end: "<?= $date; ?>"
              },

              <?php endforeach ?>
            ]
        });
    });
  </script>


<?php } elseif($usertype == "Accountant") { ?>
  <div class="row">

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('teacher')?>">
              <div class="icon bg-aqua" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-teacher"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($teacher)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_teacher")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('feetype')?>">
              <div class="icon bg-yellow" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-feetype"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($feetype)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_feetype")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('invoice')?>">
                <div class="icon bg-red" style="padding: 9.5px 18px 8px 18px;">
                    <i class="fa icon-invoice"></i>
                </div>
                <div class="inner ">
                    <h3>
                        <?=count($invoice)?>
                    </h3>
                    <p>
                        <?=$this->lang->line("menu_invoice")?>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('expense')?>">
              <div class="icon bg-blue" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-expense"></i>
              </div>
              <div class="inner ">
                <h3>
                    <?=count($expense)?>
                </h3>
                <p>
                  <?=$this->lang->line("menu_expense")?>
                </p>
              </div>
          </a>
      </div>
    </div>
  </div>

  <div class="row"> 
    <div class="col-sm-4">
      <?php if(count($user)) { ?>
        <section class="panel">
          <div class="profile-db-head">
            <a href="<?=base_url('profile/index')?>">
              <?=img(base_url('uploads/images/'.$user->photo));?>
            </a>

            <h1><?=$user->name?></h1>
            <p><?=$this->lang->line($user->usertype)?></p>

          </div>
          <table class="table table-hover">
              <tbody>
                  <tr>
                    <td>
                      <i class="glyphicon glyphicon-user" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_username')?></td>
                    <td><?=$user->username?></td>
                  </tr>
                  <tr>
                      <td>
                        <i class="fa fa-envelope" style="color:#FDB45C;"></i>
                      </td>
                      <td><?=$this->lang->line('dashboard_email')?></td>
                    <td><?=$user->email?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class="fa fa-phone" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_phone')?></td>
                    <td><?=$user->phone?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class=" fa fa-globe" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_address')?></td>
                    <td><?=$user->address?></td>
                  </tr>
              </tbody>
          </table>
        </section>
      <?php } ?>
    </div>

    <div class="col-sm-8">
      <div class="box">
        <div class="box-header" style="background-color:#FDB45C;">
          <h3 class="box-title">
              <?=$this->lang->line('dashboard_notice')?>
            </h3>
        </div>

        <div class="box-body" style="padding: 0px;">
          <table class="table table-hover">
              <tbody>
                <?php 

                  if(count($notices)) {
                    $i =1;
                    foreach ($notices as $key => $notice) {
                      if($i != 8) {
                        echo "<tr>";
                          echo "<td>";
                            echo $i;
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->title) > 20) {
                               $title = substr($notice->title, 0,20). ".."; 
                            } else {
                                $title = $notice->title;
                            }
                            echo strip_tags($title);
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->notice) > 80) {
                              $discription = substr($notice->notice, 0,80). ".."; 
                            } else {
                                $discription = $notice->notice;
                            }
                            echo strip_tags($discription);
                          echo "</td>";

                          echo "<td>";
                            echo btn_dash_view('notice/view/'.$notice->noticeID, $this->lang->line('view'));
                          echo "</td>";
                        echo "</tr>";
                        $i++;
                      } else {
                        break;
                      }
                      
                    }
                  }


                ?>
              </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <script type="text/javascript" src="<?php echo base_url('assets/fullcalendar/fullcalendar.min.js'); ?>"></script>

  <script type="text/javascript">
    $(function() {
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'prev,next'
            },
            buttonText: {//This is to add icons to the visible buttons
                prev: "<span class='fa fa-caret-left'></span>",
                next: "<span class='fa fa-caret-right'></span>",
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            events: [

                <?php 
                  foreach ($events as $event) : 
                    $event_title = $event->title;
                    $date = $event->date;
                ?>


            {
                title: "<?= $event_title; ?>",
                start: "<?= $date; ?>",
                end: "<?= $date; ?>"
              },

              <?php endforeach ?>
            ]
        });
    });
  </script>
<?php } elseif($usertype == "Librarian") { ?>
  <div class="row">

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('teacher')?>">
              <div class="icon bg-aqua" style="padding: 9.5px 22px 8px 22px;">
                  <i class="fa icon-teacher"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($teacher)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_teacher")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('lmember')?>">
                <div class="icon bg-red" style="padding: 9.5px 22px 8px 22px;">
                    <i class="fa icon-member"></i>
                </div>
                <div class="inner ">
                    <h3>
                        <?=count($lmember)?>
                    </h3>
                    <p>
                        <?=$this->lang->line("menu_member")?>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('book')?>">
              <div class="icon bg-yellow" style="padding: 9.5px 22px 8px 22px;">
                  <i class="fa icon-lbooks"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($book)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_books")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('issue')?>">
              <div class="icon bg-blue" style="padding: 9.5px 22px 8px 22px;">
                  <i class="fa icon-issue"></i>
              </div>
              <div class="inner ">
                <h3>
                    <?=count($issue)?>
                </h3>
                <p>
                  <?=$this->lang->line("menu_issue")?>
                </p>
              </div>
          </a>
      </div>
    </div>
  </div>

  <div class="row"> 
    <div class="col-sm-4">
      <?php if(count($user)) { ?>
        <section class="panel">
          <div class="profile-db-head">
            <a href="<?=base_url('profile/index')?>">
              <?=img(base_url('uploads/images/'.$user->photo));?>
            </a>

            <h1><?=$user->name?></h1>
            <p><?=$this->lang->line($user->usertype)?></p>

          </div>
          <table class="table table-hover">
              <tbody>
                  <tr>
                    <td>
                      <i class="glyphicon glyphicon-user" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_username')?></td>
                    <td><?=$user->username?></td>
                  </tr>
                  <tr>
                      <td>
                        <i class="fa fa-envelope" style="color:#FDB45C;"></i>
                      </td>
                      <td><?=$this->lang->line('dashboard_email')?></td>
                    <td><?=$user->email?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class="fa fa-phone" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_phone')?></td>
                    <td><?=$user->phone?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class=" fa fa-globe" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_address')?></td>
                    <td><?=$user->address?></td>
                  </tr>
              </tbody>
          </table>
        </section>
      <?php } ?>
    </div>

    <div class="col-sm-8">
      <div class="box">
        <div class="box-header" style="background-color:#FDB45C;">
          <h3 class="box-title">
              <?=$this->lang->line('dashboard_notice')?>
            </h3>
        </div>

        <div class="box-body" style="padding: 0px;">
          <table class="table table-hover">
              <tbody>
                <?php 

                  if(count($notices)) {
                    $i =1;
                    foreach ($notices as $key => $notice) {
                      if($i != 8) {
                        echo "<tr>";
                          echo "<td>";
                            echo $i;
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->title) > 20) {
                               $title = substr($notice->title, 0,20). ".."; 
                            } else {
                                $title = $notice->title;
                            }
                            echo strip_tags($title);
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->notice) > 80) {
                              $discription = substr($notice->notice, 0,80). ".."; 
                            } else {
                                $discription = $notice->notice;
                            }
                            echo strip_tags($discription);
                          echo "</td>";

                          echo "<td>";
                            echo btn_dash_view('notice/view/'.$notice->noticeID, $this->lang->line('view'));
                          echo "</td>";
                        echo "</tr>";
                        $i++;
                      } else {
                        break;
                      }
                      
                    }
                  }


                ?>
              </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <script type="text/javascript" src="<?php echo base_url('assets/fullcalendar/fullcalendar.min.js'); ?>"></script>

  <script type="text/javascript">
    $(function() {
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'prev,next'
            },
            buttonText: {//This is to add icons to the visible buttons
                prev: "<span class='fa fa-caret-left'></span>",
                next: "<span class='fa fa-caret-right'></span>",
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            events: [

                <?php 
                  foreach ($events as $event) : 
                    $event_title = $event->title;
                    $date = $event->date;
                ?>


            {
                title: "<?= $event_title; ?>",
                start: "<?= $date; ?>",
                end: "<?= $date; ?>"
              },

              <?php endforeach ?>
            ]
        });
    });
  </script>

<?php } elseif($usertype == "Student") { ?>
  <div class="row">

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('teacher')?>">
              <div class="icon bg-aqua" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-teacher"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($teacher)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_teacher")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('subject')?>">
                <div class="icon bg-red" style="padding: 9.5px 18px 8px 18px;">
                    <i class="fa icon-subject"></i>
                </div>
                <div class="inner ">
                    <h3>
                        <?=count($subject)?>
                    </h3>
                    <p>
                        <?=$this->lang->line("menu_subject")?>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('issue')?>">
              <div class="icon bg-yellow" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-issue"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($issue)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_issue")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('invoice')?>">
              <div class="icon bg-blue" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-invoice"></i>
              </div>
              <div class="inner ">
                <h3>
                    <?=count($invoice)?>
                </h3>
                <p>
                  <?=$this->lang->line("menu_invoice")?>
                </p>
              </div>
          </a>
      </div>
    </div>
  </div>

  <div class="row"> 
    <div class="col-sm-4">
      <?php if(count($user)) { ?>
        <section class="panel">
          <div class="profile-db-head">
            <a href="<?=base_url('profile/index')?>">
              <?=img(base_url('uploads/images/'.$user->photo));?>
            </a>

            <h1><?=$user->name?></h1>
            <p><?=$this->lang->line($user->usertype)?></p>

          </div>
          <table class="table table-hover">
              <tbody>
                  <tr>
                    <td>
                      <i class="glyphicon glyphicon-user" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_username')?></td>
                    <td><?=$user->username?></td>
                  </tr>
                  <tr>
                      <td>
                        <i class="fa fa-envelope" style="color:#FDB45C;"></i>
                      </td>
                      <td><?=$this->lang->line('dashboard_email')?></td>
                    <td><?=$user->email?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class="fa fa-phone" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_phone')?></td>
                    <td><?=$user->phone?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class=" fa fa-globe" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_address')?></td>
                    <td><?=$user->address?></td>
                  </tr>
              </tbody>
          </table>
        </section>
      <?php } ?>
    </div>

    <div class="col-sm-8">
      <div class="box">
        <div class="box-header" style="background-color:#FDB45C;">
          <h3 class="box-title">
              <?=$this->lang->line('dashboard_notice')?>
            </h3>
        </div>

        <div class="box-body" style="padding: 0px;">
          <table class="table table-hover">
              <tbody>
                <?php 

                  if(count($notices)) {
                    $i =1;
                    foreach ($notices as $key => $notice) {
                      if($i != 8) {
                        echo "<tr>";
                          echo "<td>";
                            echo $i;
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->title) > 20) {
                               $title = substr($notice->title, 0,20). ".."; 
                            } else {
                                $title = $notice->title;
                            }
                            echo strip_tags($title);
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->notice) > 80) {
                              $discription = substr($notice->notice, 0,80). ".."; 
                            } else {
                                $discription = $notice->notice;
                            }
                            echo strip_tags($discription);
                          echo "</td>";

                          echo "<td>";
                            echo btn_dash_view('notice/view/'.$notice->noticeID, $this->lang->line('view'));
                          echo "</td>";
                        echo "</tr>";
                        $i++;
                      } else {
                        break;
                      }
                      
                    }
                  }


                ?>
              </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <script type="text/javascript" src="<?php echo base_url('assets/fullcalendar/fullcalendar.min.js'); ?>"></script>

    <script type="text/javascript">
    $(function() {
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'prev,next'
            },
            buttonText: {//This is to add icons to the visible buttons
                prev: "<span class='fa fa-caret-left'></span>",
                next: "<span class='fa fa-caret-right'></span>",
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            events: [

                <?php 
                  foreach ($events as $event) : 
                    $event_title = $event->title;
                    $date = $event->date;
                ?>


            {
                title: "<?= $event_title; ?>",
                start: "<?= $date; ?>",
                end: "<?= $date; ?>"
              },

              <?php endforeach ?>
            ]
        });
    });
  </script>

<?php } elseif($usertype == "Parent") { ?>
  <div class="row">

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('teacher')?>">
              <div class="icon bg-aqua" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-teacher"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=count($teacher)?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_teacher")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <div class="small-box ">
            <a class="small-box-footer" href="<?=base_url('book')?>">
                <div class="icon bg-red" style="padding: 9.5px 18px 8px 18px;">
                    <i class="fa icon-lbooks"></i>
                </div>
                <div class="inner ">
                    <h3>
                        <?=count($books)?>
                    </h3>
                    <p>
                        <?=$this->lang->line("menu_books")?>
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('issue')?>">
              <div class="icon bg-yellow" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-issue"></i>
              </div>
              <div class="inner ">
                  <h3>
                      <?=$issue?>
                  </h3>
                  <p>
                      <?=$this->lang->line("menu_issue")?>
                  </p>
              </div>
          </a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box ">
          <a class="small-box-footer" href="<?=base_url('invoice')?>">
              <div class="icon bg-blue" style="padding: 9.5px 18px 8px 18px;">
                  <i class="fa icon-invoice"></i>
              </div>
              <div class="inner ">
                <h3>
                    <?=$invoice?>
                </h3>
                <p>
                  <?=$this->lang->line("menu_invoice")?>
                </p>
              </div>
          </a>
      </div>
    </div>
  </div>

  <div class="row"> 
    <div class="col-sm-4">
      <?php if(count($user)) { ?>
        <section class="panel">
          <div class="profile-db-head">
            <a href="<?=base_url('profile/index')?>">
              <?=img(base_url('uploads/images/'.$user->photo));?>
            </a>

            <h1><?=$user->name?></h1>
            <p><?=$this->lang->line($user->usertype)?></p>

          </div>
          <table class="table table-hover">
              <tbody>
                  <tr>
                    <td>
                      <i class="glyphicon glyphicon-user" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_username')?></td>
                    <td><?=$user->username?></td>
                  </tr>
                  <tr>
                      <td>
                        <i class="fa fa-envelope" style="color:#FDB45C;"></i>
                      </td>
                      <td><?=$this->lang->line('dashboard_email')?></td>
                    <td><?=$user->email?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class="fa fa-phone" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_phone')?></td>
                    <td><?=$user->phone?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class=" fa fa-globe" style="color:#FDB45C;"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_address')?></td>
                    <td><?=$user->address?></td>
                  </tr>
              </tbody>
          </table>
        </section>
      <?php } ?>
    </div>

    <div class="col-sm-8">
      <div class="box">
        <div class="box-header" style="background-color:#FDB45C;">
          <h3 class="box-title">
              <?=$this->lang->line('dashboard_notice')?>
            </h3>
        </div>

        <div class="box-body" style="padding: 0px;">
          <table class="table table-hover">
              <tbody>
                <?php 

                  if(count($notices)) {
                    $i =1;
                    foreach ($notices as $key => $notice) {
                      if($i != 8) {
                        echo "<tr>";
                          echo "<td>";
                            echo $i;
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->title) > 20) {
                               $title = substr($notice->title, 0,20). ".."; 
                            } else {
                                $title = $notice->title;
                            }
                            echo strip_tags($title);
                          echo "</td>";

                          echo "<td>";
                            if(strlen($notice->notice) > 80) {
                              $discription = substr($notice->notice, 0,80). ".."; 
                            } else {
                                $discription = $notice->notice;
                            }
                            echo strip_tags($discription);
                          echo "</td>";

                          echo "<td>";
                            echo btn_dash_view('notice/view/'.$notice->noticeID, $this->lang->line('view'));
                          echo "</td>";
                        echo "</tr>";
                        $i++;
                      } else {
                        break;
                      }
                      
                    }
                  }


                ?>
              </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  <script type="text/javascript" src="<?php echo base_url('assets/fullcalendar/fullcalendar.min.js'); ?>"></script>

    <script type="text/javascript">
    $(function() {
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title',
                right: 'prev,next'
            },
            buttonText: {//This is to add icons to the visible buttons
                prev: "<span class='fa fa-caret-left'></span>",
                next: "<span class='fa fa-caret-right'></span>",
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            events: [

                <?php 
                  foreach ($events as $event) : 
                    $event_title = $event->title;
                    $date = $event->date;
                ?>


            {
                title: "<?= $event_title; ?>",
                start: "<?= $date; ?>",
                end: "<?= $date; ?>"
              },

              <?php endforeach ?>
            ]
        });
    });
  </script>


<?php } ?>

