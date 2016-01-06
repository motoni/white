<?php
/*
| -----------------------------------------------------
| PRODUCT NAME:     INILABS SCHOOL MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:           INILABS TEAM
| -----------------------------------------------------
| EMAIL:            info@inilabs.net
| -----------------------------------------------------
| COPYRIGHT:        RESERVED BY INILABS IT
| -----------------------------------------------------
| WEBSITE:          http://inilabs.net
| -----------------------------------------------------
| MODIFIED BY:      INTELNETGS intelnetgs@yahoo.com
|------------------------------------------------------
*/

if (count($student)) {
    $usertype = $this->session->userdata("usertype");
    if ($usertype == "Admin" || $usertype == "Teacher") {
        ?>
        <div class="well">
            <div class="row">
                <div class="col-sm-6">
                    <button class="btn-cs btn-sm-cs" onclick="javascript:printDiv('printablediv')"><span class="fa fa-print"></span> <?= $this->lang->line('print') ?> </button>
                    <?php
                    echo btn_add_pdf('mark/print_preview/' . $student->studentID . "/" . $set, $this->lang->line('pdf_preview'))
                    ?>
                    <button class="btn-cs btn-sm-cs" data-toggle="modal" data-target="#mail"><span class="fa fa-envelope-o"></span> <?= $this->lang->line('mail') ?></button>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                        <li><a href="<?= base_url("mark/index/$set") ?>"><?= $this->lang->line('menu_mark') ?></a></li>
                        <li class="active"><?= $this->lang->line('view') ?></li>
                    </ol>
                </div>
            </div>
        </div>

    <?php } ?>

    <div id="printablediv">
        <section class="panel">
            <div class="profile-view-head">
                <a href="#">
                    <?= img(base_url('uploads/images/' . $student->photo)) ?>
                </a>

                <h1><?= $student->name ?></h1>
                <p><?= $this->lang->line("student_classes") . " " . $classes->classes ?></p>

            </div>
            <div class="panel-body profile-view-dis">

                <h1><?= $this->lang->line("mark_information") ?></h1>

                <div class="row">
                    <?php if ($marks && $exams) { ?>
                        <div class="col-lg-12">
                            <div id="hide-table">
                                <?php
                                $map1 = function($r) {
                                            return intval($r->examID);
                                        };
                                $marks_examsID = array_map($map1, $marks);
                                $max_semester = max($marks_examsID);
                                
                                $map2 = function($r) {
                                            return intval($r->examID);
                                        };
                                $examsID = array_map($map2, $exams);
                                //print_r($examsID);
                                $map3 = function($r) {
                                            return array("mark" => intval($r->mark), "semester" => $r->examID);
                                        };
                                $all_marks = array_map($map3, $marks);
                                
                                $map4 = function($r) {
                                            return array("gradefrom" => $r->gradefrom, "gradeupto" => $r->gradeupto);
                                        };
                                $grades_check = array_map($map4, $grades);
                                

                                $map5 = function($r) {
                                            return array("subject" => $r->subject, "mark" => $r->mark, "exam" => $r->exam, "studentID" => $r->studentID);
                                        };
                                $all_classmarks = array_map($map5, $classmarks);

                                $map6 = function($r) {
                                    return array("subject" => $r->subject);
                                };
                                $list_of_subjects = array_map($map6, $subjects);

                                $map7 = function($r) {
                                            return array("examID" => intval($r->examID), "termID" => $r->termID);
                                        };
                                $exam_terms = array_map($map7, $exams);
                               
                                                               
                                function get_marks_obtained($all_classmarks, $subject, $exam, $studentID) {

                                    $mark_obtained = array();

                                    for ($x = 0; $x <= count($all_classmarks) - 1; $x++) {

                                        if ($exam == $all_classmarks[$x]['exam']) {

                                            if ($studentID == $all_classmarks[$x]['studentID']){

                                                if ($all_classmarks[$x]['subject'] == $subject) {
                                                    $mark_obtained[$subject] = $all_classmarks[$x]['mark'];
                                                }
                                            }
                                        }
                                    }
                                    return $mark_obtained;
                                }

                                function get_highest_mark($all_classmarks, $subject, $exam) {

                                    $mark_obtained = array();

                                    for ($x = 0; $x <= count($all_classmarks) - 1; $x++) {

                                        if ($exam == $all_classmarks[$x]['exam']) {

                                            if ($all_classmarks[$x]['subject'] == $subject) {
                                                $mark_obtained[] = $all_classmarks[$x]['mark'];
                                            }
                                        }
                                    }
                                    return (max($mark_obtained));
                                }

                                function get_average_mark($all_classmarks, $subject, $exam) {

                                    $mark_obtained = array();

                                    for ($x = 0; $x <= count($all_classmarks) - 1; $x++) {

                                        if ($exam == $all_classmarks[$x]['exam']) {

                                            if ($all_classmarks[$x]['subject'] == $subject) {
                                                $mark_obtained[] = $all_classmarks[$x]['mark'];
                                            }
                                        }
                                    }
                                    $sum = array_sum($mark_obtained);
                                    $num = count($mark_obtained);
                                    $average = round($sum / $num, 0);
                                    return $average;
                                }
                                echo "<div class=\"col-lg-6\">";
                                foreach ($exams as $exam) {
                                    echo "<table class=\"table table-striped table-bordered\">";
                                    if ($exam->examID <= $max_semester) {

                                        $check = array_search($exam->examID, $marks_examsID);

                                        if ($check >= 0) {
                                            $f = 0;
                                            foreach ($grades_check as $key => $range) {
                                                foreach ($all_marks as $value) {
                                                    if ($value['semester'] == $exam->examID) {
                                                        if ($value['mark'] >= $range['gradefrom'] && $value['mark'] <= $range['gradeupto']) {
                                                            $f = 1;
                                                        }
                                                    }
                                                }
                                                if ($f == 1) {
                                                    break;
                                                }
                                            }
                                            if($f == 1) {
                                            echo "<caption>";
                                            echo "<h3>" . $exam->exam . "</h3>";
                                            echo "</caption>";

                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>";
                                            echo $this->lang->line("mark_subject");
                                            echo "</th>";
                                            echo "<th>";
                                            echo $this->lang->line("mark_mark");
                                            echo "</th>";
                                            echo "<th>";
                                            echo $this->lang->line("mark_high");
                                            echo "</th>";
                                            echo "<th>";
                                            echo $this->lang->line("mark_average");
                                            echo "</th>";
                                            if (count($grades) && $f == 1) {
                                                echo "<th>";
                                                echo $this->lang->line("mark_grade");
                                                echo "</th>";
                                            }
                                            echo "</tr>";
                                            echo "</thead>";
                                            }
                                        }
                                    }

                                    echo "<tbody>";

                                                                       
                                    foreach ($marks as $mark) {
                                        if ($exam->examID == $mark->examID) {
                                            echo "<tr>";
                                            echo "<td data-title='" . $this->lang->line('mark_subject') . "'>";
                                            echo $mark->subject;
                                            echo "</td>";
                                            echo "<td data-title='" . $this->lang->line('mark_mark') . "'>";
                                            echo $mark->mark;
                                            echo "</td>";
                                            echo "<td data-title='" . $this->lang->line('mark_high') . "'>";
                                            // call the get highest mark function and echo it
                                            echo get_highest_mark($all_classmarks, $mark->subject, $exam->exam);
                                            echo "</td>";
                                            echo "<td data-title='" . $this->lang->line('mark_average') . "'>";
                                            // call the get average mark function and echo it
                                            echo get_average_mark($all_classmarks, $mark->subject, $exam->exam);
                                                               
                                            echo "</td>";
                                            if (count($grades)) {
                                                foreach ($grades as $grade) {
                                                    if ($grade->gradefrom <= $mark->mark && $grade->gradeupto >= $mark->mark) {
                                                        echo "<td data-title='" . $this->lang->line('mark_grade') . "'>";
                                                        echo $grade->grade;
                                                        echo "</td>";
                                                        break;
                                                    }
                                                }
                                            }
                                            echo "</tr>";
                                    
                                        }

                                    }
                                    
                                    echo "</tbody>";
                                    echo "</table>";
                                }
                                echo "</div>";
                                ?>
                                <div class="col-lg-6">
                                    <div id="hide-table">
                                        <h3><?= $this->lang->line("mark-charts") ?></h3>

                        
                                    <?php 
                                    
                                        $last_exam = $max_semester;
                                        $highest_marks = array(); // array to store highest marks per subject
                                        $average_marks = array(); // array to store average marks per subject
                                        $subjects = array();
                                        $current_exam = "";
                                        $current_term = "";
                                        $k = 0;
                                   
                                        foreach ($exams as $exam) {                     
                                
                                            if ($exam->examID > $last_exam):
                                                break;
                                            endif;

                                        $current_exam = $exam->examID;
                                        $current_term = $exam->termID;
                                         

                                        
                                        foreach ($exam_terms as $value) {

                                            
                                            if ($value['examID'] == $last_exam){


                                                foreach ($marks as $mark) {

                                                if (($mark->examID == $current_exam) && ($mark->examID <= $last_exam)){

                                                    // get the highest marks for the current exam and store them in an array
                                                    $highest_marks_{$current_exam}[$k] = get_highest_mark($all_classmarks, $mark->subject, $exam->exam);
                                                    
                                                    // get the average marks for the current exam and store them in an array
                                                    $average_marks_{$current_exam}[$k] = get_average_mark($all_classmarks, $mark->subject, $exam->exam);
                                                    
                                                    // get the marks obtained for the current exam and store them in an array
                                                    $marks_obtained_{$current_exam}[$k] = get_marks_obtained($all_classmarks, $mark->subject, $exam->exam, $mark->studentID);

                                                    $subjects_{$current_exam}[$k] = $mark->subject;
                                                                                            
                                                    $k++;
                                                }
                                            }

                                            if(!empty($highest_marks_{$current_exam})) {

                                                //Convert array to list
                                                $highest_marks_list = implode(",", $highest_marks_{$current_exam});
                                                $average_marks_list = implode(",", $average_marks_{$current_exam});
                                                
                                                // Call recursive implode function...see heplers/action_helper.php
                                                $marks_obtained_list = recursive_implode($marks_obtained_{$current_exam});
                                                
                                                //Flatten and process array return quoted string
                                                $list_of_subjects = $subjects_{$current_exam};
                                                $subjects_list = process_subjects_array($list_of_subjects);         
                                                
                                                $canvasID = "marks-chart-" . $exam->examID;
                                                echo $exam->exam; 
                                                
                                        ?>

                                            
                                    
                                            <table class="table table-borderd">
                                                <caption><h5>Mark Obtained Vs Average Marks Vs Highest Marks</h5></caption>
                                                <tr>
                                                    <td>
                                                        <div class="chart-container">
                                                            <canvas id="<?= $canvasID ?>" width="300" height ="150"></canvas>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div id="bar-legend" class="chart-legend"></div>
                                                    </td>
                                                </tr>
                                            </table>

                                        <?php 
                                                    }
                                                }
                                            }
                                        ?>
                                        

                                        <script type="text/javascript" src="<?php echo base_url('assets/chartjs/chart.js'); ?>"></script>
                                        <script type="text/javascript" src="<?php echo base_url('assets/scripts/graphs.js'); ?>"></script>
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                var data = {
                                                                labels: [<?= $subjects_list ?>],
                                                                datasets: [
                                                                    {
                                                                        label: "Mark",
                                                                        fillColor: "rgba(70, 191, 189, 0.95)",
                                                                        strokeColor: "rgba(70, 191, 189, 0.95)",
                                                                        highlightFill: "rgba(70, 191, 189, 0.70)",
                                                                        highlightStroke: "rgba(70, 191, 189, 0.70)",
                                                                        data: [<?= $marks_obtained_list ?>]
                                                                    },
                                                                    {
                                                                        label: "Highest",
                                                                        fillColor: "rgba(70, 114, 191, 0.95)",
                                                                        strokeColor: "rgba(70, 114, 191, 0.95)",
                                                                        highlightFill: "rgba(70, 114, 191, 0.70)",
                                                                        highlightStroke: "rgba(70, 114, 191, 0.70)",
                                                                        data: [<?= $highest_marks_list ?>]
                                                                    },
                                                                    {
                                                                        label: "Average",
                                                                        fillColor: "rgba(212, 129, 151, 0.70)",
                                                                        strokeColor: "rgba(212, 129, 151, 0.70)",
                                                                        highlightFill: "rgba(212, 129, 151, 0.95)",
                                                                        highlightStroke: "rgba(212, 129, 151, 0.95)",
                                                                        data: [<?= $average_marks_list ?>]
                                                                    }
                                                                ]
                                                            };
                                                var options = {
                                                    scaleShowGridLines :false,
                                                    barShowStroke : false,
                                                    maintainAspectRatio: true,
                                                    scaleLineColor: "rgba(137, 129, 126, 0.0)",
                                                    scaleFontColor: "rgba(137, 129, 126, 0.95)"
                                                }
                                                displayMarksBarGraph(data, "<?= '#'. $canvasID ?>", options);
                                                    //alert("OK");
                                            });
                                        </script>
                                                                                        
                                        <?php } ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>


            </div>
        </section>
    </div>
    <!-- email modal starts here -->
    <form class="form-horizontal" role="form" action="<?= base_url('teacher/send_mail'); ?>" method="post">
        <div class="modal fade" id="mail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"><?= $this->lang->line('mail') ?></h4>
                    </div>
                    <div class="modal-body">

                        <?php
                        if (form_error('to'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                        ?>
                        <label for="to" class="col-sm-2 control-label">
                            <?= $this->lang->line("to") ?>
                        </label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="to" name="to" value="<?= set_value('to') ?>" >
                        </div>
                        <span class="col-sm-4 control-label" id="to_error">
                        </span>
                    </div>

                    <?php
                    if (form_error('subject'))
                        echo "<div class='form-group has-error' >";
                    else
                        echo "<div class='form-group' >";
                    ?>
                    <label for="subject" class="col-sm-2 control-label">
                        <?= $this->lang->line("subject") ?>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="subject" name="subject" value="<?= set_value('subject') ?>" >
                    </div>
                    <span class="col-sm-4 control-label" id="subject_error">
                    </span>

                </div>

                <?php
                if (form_error('message'))
                    echo "<div class='form-group has-error' >";
                else
                    echo "<div class='form-group' >";
                ?>
                <label for="message" class="col-sm-2 control-label">
                    <?= $this->lang->line("message") ?>
                </label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="message" style="resize: vertical;" name="message" value="<?= set_value('message') ?>" ></textarea>
                </div>
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
            <input type="button" id="send_pdf" class="btn btn-success" value="<?= $this->lang->line("send") ?>" />
        </div>
    </div>
    </div>
    </div>
    </form>
    <!-- email end here -->

    <?php if ($usertype == "Admin" || $usertype == "Teacher") { ?>
        <script language="javascript" type="text/javascript">
            function printDiv(divID) {
                //Get the HTML of div
                var divElements = document.getElementById(divID).innerHTML;
                //Get the HTML of whole page
                var oldPage = document.body.innerHTML;

                //Reset the page's HTML with div's HTML only
                document.body.innerHTML = 
                    "<html><head><title></title></head><body>" + 
                    divElements + "</body>";

                //Print Page
                window.print();

                //Restore orignal HTML
                document.body.innerHTML = oldPage;
            }
            function closeWindow() {
                location.reload(); 
            }

                                
            function check_email(email) {
                var status = false;     
                var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
                if (email.search(emailRegEx) == -1) {
                    $("#to_error").html('');
                    $("#to_error").html("<?= $this->lang->line('mail_valid') ?>").css("text-align", "left").css("color", 'red');
                } else {
                    status = true;
                }
                return status;
            }

            $("#send_pdf").click(function(){
                var to = $('#to').val();
                var subject = $('#subject').val();
                var message = $('#message').val();
                var id = "<?= $student->studentID; ?>";
                var set = "<?= $set; ?>";
                var error = 0;

                if(to == "" || to == null) {
                    error++;
                    $("#to_error").html("");
                    $("#to_error").html("<?= $this->lang->line('mail_to') ?>").css("text-align", "left").css("color", 'red');
                } else {
                    if(check_email(to) == false) {
                        error++
                    }
                } 

                if(subject == "" || subject == null) {
                    error++;
                    $("#subject_error").html("");
                    $("#subject_error").html("<?= $this->lang->line('mail_subject') ?>").css("text-align", "left").css("color", 'red');
                } else {
                    $("#subject_error").html("");
                }

                if(error == 0) {
                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url('mark/send_mail') ?>",
                        data: 'to='+ to + '&subject=' + subject + "&id=" + id+ "&message=" + message+ "&set=" + set,
                        dataType: "html",
                        success: function(data) {
                            location.reload();
                        }
                    });
                }
            });
        </script>
    <?php } ?>

<?php } ?>

<?php
$usertype = $this->session->userdata('usertype');
if ($usertype == "Parent" || $usertype == "Student") {
    ?>
    <script language="javascript" type="text/javascript">
        var url = window.location.href;
        $("a[href$='"+url+"']").parent().addClass('active');
    </script>

<?php } ?>