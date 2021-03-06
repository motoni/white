

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-issue"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_issue')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <div class="col-sm-6 col-sm-offset-3 list-group">
                    <div class="list-group-item list-group-item-warning">
                        <form style="" class="form-horizontal" role="form" method="post">  
                            <div class="form-group">              
                                <label for="studentID" class="col-sm-2 col-sm-offset-2 control-label">
                                    <?=$this->lang->line("issue_student")?>
                                </label>
                                <div class="col-sm-6">
                                    <?php
                                        $array = array("0" => $this->lang->line("issue_select_student"));
                                        if($students) {
                                            foreach ($students as $student) {
                                                $array[$student->studentID] = $student->name;
                                            }
                                        }
                                        echo form_dropdown("studentID", $array, set_value("studentID", $set), "id='studentID' class='form-control'");
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-lg-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('issue_book')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('issue_serial_no')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('issue_due_date')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('issue_fine')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('action')?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(count($issues)) {$i = 1; foreach($issues as $issue) {

                                    if($issue->return_date == "" || empty($issue->return_date)) {
                            ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('issue_book')?>">
                                        <?php echo $issue->book; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('issue_serial_no')?>">
                                        <?php echo $issue->serial_no; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('issue_due_date')?>">
                                        <?php echo $issue->due_date; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('issue_fine')?>">
                                        <?php
                                            $date = date("Y-m-d");
                                            if(strtotime($date) > strtotime($issue->due_date)) {
                                                echo $issue->fine;
                                            } 
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php
                                            echo btn_view('issue/view/'.$issue->issueID, $this->lang->line('view'));
                                        ?>
                                    </td>
                                    
                                </tr>
                            <?php $i++; }}} ?>
                        </tbody>
                    </table>
                </div>

            </div> <!-- col-sm-12 -->
            
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->
<script type="text/javascript">
    $('#studentID').change(function() {
        var studentID = $(this).val();
        if(studentID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('issue/student_list')?>",
                data: "id=" + studentID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>