<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-sattendance"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_sattendance')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->

    
	<div class="box-body">
	    <div class="row">
	        <div class="col-sm-12">
	        	<?php 
	        	    $usertype = $this->session->userdata("usertype");
	        	    if($usertype == "Admin" || $usertype == 'Teacher') {
	        	?>
	        	<h5 class="page-header">
	                <a href="<?php echo base_url('attendance/add') ?>">
	                    <i class="fa fa-plus"></i> 
	                    <?=$this->lang->line('add_title')?>
	                </a>
	            </h5>
	            <?php } ?>

	            <div class="col-sm-12">
	            	<form style="" class="form-horizontal" role="form" method="post">
			        	<div class="row list-group">
			        		<div class="col-sm-3 list-group-item">
			        			<div class="form-group row">
			        				<label for ="classesID "class="col-sm-4 control-label">Class</label>
			        				<div class="col-sm-8">
			        					<?php
			        						$array = array("0" => $this->lang->line("attendance_select_classes"));
			        						foreach ($classes as $classa) {
			        						    $array[$classa->classesID] = $classa->classes;
			        						}
			        						echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-control'");
			        					?>
			        				</div>
			        			</div>
			        		</div>
			        		<div class="col-sm-3 list-group-item">
			        			<div class="form-group row">
			        				<label for ="month "class="col-sm-4 control-label">Month</label>
			        				<div class="col-sm-8"><?php
			        						$array = array(
			        							"0" => $this->lang->line("attendance_select_month"),
			        							"1" => $this->lang->line("attendance_jan"),
			        							"2" => $this->lang->line("attendance_feb"),
			        							"3" => $this->lang->line("attendance_mar"),
			        							"4" => $this->lang->line("attendance_apr"),
			        							"5" => $this->lang->line("attendance_may"),
			        							"6" => $this->lang->line("attendance_jun"),
			        							"7" => $this->lang->line("attendance_jul"),
			        							"8" => $this->lang->line("attendance_aug"),
			        							"9" => $this->lang->line("attendance_sep"),
			        							"10" => $this->lang->line("attendance_oct"),
			        							"11" => $this->lang->line("attendance_nov"),
			        							"12" => $this->lang->line("attendance_dec"),
			        						);

			        						echo form_dropdown("month", $array, set_value("month"), "id='month' class='form-control'");
			        					?>
			        				</div>
			        			</div>
			        		</div>
			        		<div class="col-sm-3 list-group-item">
			        			<div class="form-group row">
			        				<label for ="year "class="col-sm-4 control-label">Year</label>
			        				<div class="col-sm-8">

			        					<?php		        						
			        						echo form_dropdown("Year", $years, set_value("year"), "id='year' class='form-control'");
			        					?>
			        				</div>
			        			</div>
			        		</div>
			        		<div class="col-sm-3 list-group-item">
			        			<div class="form-group row">
			        				<div class="col-sm-12">
			        				    <input type="button" class="btn btn-success" id="submit" value="<?=$this->lang->line("attendance_view")?>" >
			        				</div>
			        			</div>
			        		</div>
			        	</div>
	            	</form>
	            </div><!---col-sm-12-->
	        </div>
	                        <?php if(count($students) > 0 ) { ?>

	                            <div class="col-sm-12">

	                                <div class="nav-tabs-custom">
	                                    <ul class="nav nav-tabs">
	                                        <li class="active"><a data-toggle="tab" href="#all" aria-expanded="true"><?=$this->lang->line("attendance_all_students")?></a></li>
	                                        
	                                    </ul>



	                                    <div class="tab-content">
	                                        <div id="all" class="tab-pane active">
	                                            <div id="hide-table">
	                                            	<div class="row">
	                                            		<div class="col-sm-12">
	                                            			<h3>
	                                            				<span><?php echo $selectedmonth; ?></span>
	                                            				<span><?php echo $selectedyear; ?></span> |
	                                            				<span><?php echo $selectedclass; ?></span>
	                                            			</h3>
	                                            		</div>

	                                            	</div>
	                                                <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
	                                                    <thead>
	                                                        <tr>
	                                                            <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
	                                                            <th class="col-sm-2"><?=$this->lang->line('attendance_name')?></th>
	                                                            <?php
		                                                                for($i=1; $i<=$days_in_month; $i++) {
		                                                                   echo  "<th>".$this->lang->line('attendance_'.$i)."</th>";
		                                                                }
	                                                            ?>
	                                                        </tr>
	                                                    </thead>
	                                                   
	                                                    <tbody>
	                                                        <?php if(count($students)) {$i = 1; foreach($students as $student) { ?>
	                                                            <tr>
	                                                                <td data-title="<?=$this->lang->line('slno')?>">
	                                                                    <?php echo $i; ?>
	                                                                </td>

	                                                                <td data-title="<?=$this->lang->line('attendance_name')?>">
	                                                                    <?php echo $student->name; ?>
	                                                                </td>
	                                                                
                                                                    <?php 
                                                                       	for($k=1; $k<=$days_in_month; $k++) { ?>
                                                                    		<td data-title="<?=$this->lang->line('attendance_month')?>">
                                                                    			<?php 
                                                                    				$datestring = $k . " " . $selectedmonth . " "  . $selectedyear;
                                                                    				$timestamp = strtotime($datestring);
                                                                    				$searchdate = date('Y-m-d', $timestamp);
                                                                    				foreach ($attendances as $classattendance) {

                                                                    					if ($classattendance->date == $searchdate && $classattendance->student_id == $student->studentID) {

                                                                    						switch($classattendance->status) {
                                                                    							case '0' :
                                                                    								echo "X";
                                                                    								break;
                                                                    							case '1' :
                                                                    								echo "P";
                                                                    								break;
                                                                								case '2' :
                                                                									echo "A";
                                                                									break;
                                                                								
                                                                    						}
                                                                    					
                                                                    				    }
                                                                    				
                                                                    				}
                                                                    				
                                                                    			
                                                                    			?>
																			</td>
	                                                                  <?php }
	                                                        

	                                                                    ?>
	                                                                
	                                                            </tr>
	                                                        <?php $i++; }} ?>
	                                                    </tbody>
	                                                </table>
	                                            </div>

	                                        </div>

	                                        <?php foreach ($sections as $key => $section) { ?>
	                                                <div id="<?=$section->sectionID?>" class="tab-pane">
	                                                    <div id="hide-table">
	                                                        <table class="table table-striped table-bordered table-hover dataTable no-footer">
	                                                            <thead>
	                                                                <tr>
	                                                                    <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
	                                                                    <th class="col-sm-2"><?=$this->lang->line('attendance_name')?></th>
	                                                                </tr>
	                                                            </thead>
	                                                            <tbody>
	                                                                <?php if(count($allsection[$section->section])) { $i = 1; foreach($allsection[$section->section] as $student) { ?>
	                                                                    <tr>
	                                                                        <td data-title="<?=$this->lang->line('slno')?>">
	                                                                            <?php echo $i; ?>
	                                                                        </td>
	                                                                        <td data-title="<?=$this->lang->line('attendance_name')?>">
	                                                                            <?php echo $student->name; ?>
	                                                                        </td>
	                                                                   	</tr>
	                                                                <?php $i++; }} ?>
	                                                            </tbody>
	                                                        </table>
	                                                    </div>
	                                                </div>
	                                        <?php } ?>
	                                    </div>

	                                </div> <!-- nav-tabs-custom -->
	                            </div> <!-- col-sm-12 for tab -->

	                        <?php } else { ?>
	                            <div class="col-sm-12">

	                                <div class="nav-tabs-custom">
	                                    <ul class="nav nav-tabs">
	                                        <li class="active"><a data-toggle="tab" href="#all" aria-expanded="true"><?=$this->lang->line("attendance_all_students")?></a></li>
	                                    </ul>


	                                    <div class="tab-content">
	                                        <div id="all" class="tab-pane active">
	                                            <div id="hide-table">
	                                                <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
	                                                    <thead>
	                                                        <tr>
	                                                            <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
	                                                            <th class="col-sm-2"><?=$this->lang->line('attendance_name')?></th>
	                                                        </tr>
	                                                    </thead>
	                                                    <tbody>
	                                                        <?php if(count($students)) {$i = 1; foreach($students as $student) { ?>
	                                                            <tr>
	                                                                <td data-title="<?=$this->lang->line('slno')?>">
	                                                                    <?php echo $i; ?>
	                                                                </td>

	                                                                <td data-title="<?=$this->lang->line('attendance_name')?>">
	                                                                    <?php echo $student->name; ?>
	                                                                </td>
	                         	                                </tr>
	                                                        <?php $i++; }} ?>
	                                                    </tbody>
	                                                </table>
	                                            </div>

	                                        </div>
	                                    </div>
	                                </div> <!-- nav-tabs-custom -->
	                            </div>
	                        <?php } ?>


	                        <?php //} ?>

	                    </div> <!-- col-sm-12 -->
	                </div><!-- row -->
	            </div><!-- Body -->
	        </div><!-- /.box -->

	    </div>
	</div>
</div><!---end box-->





















<script type="text/javascript">
    $('#submit').click(function() {
    	var month = $('#month').val();
    	var year = $('#year').val();
        var classesID = $('#classesID').val();
        if(classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('attendance/attendance_list')?>",
                data: {"id" : classesID, "year" : year, "month" : month},
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }

    });
</script>
