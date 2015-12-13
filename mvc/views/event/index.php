
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="glyphicon glyphicon-book"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_event')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php
                    $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin") {
                ?>
                <h5 class="page-header">
                    <a href="<?php echo base_url('event/add') ?>">
                        <i class="fa fa-plus"></i> 
                        <?=$this->lang->line('add_title')?>
                    </a>
                </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('event_title')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('event_date')?></th>
                                <th class="col-sm-4"><?=$this->lang->line('event_event')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($events)) {$i = 1; foreach($events as $event) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_title')?>">
                                        <?php 
                                            if(strlen($event->title) > 25)
                                                echo strip_tags(substr($event->title, 0, 25)."...");
                                            else 
                                                echo strip_tags(substr($event->title, 0, 25));
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_date')?>">
                                        <?php echo date("d M Y", strtotime($event->date)); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_event')?>">
                                        <?php 
                                            if(strlen($event->event) > 60)
                                                echo strip_tags(substr($event->event, 0, 60)."...");
                                            else 
                                                echo strip_tags(substr($event->event, 0, 60));
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php echo btn_view('event/view/'.$event->eventID, $this->lang->line('view')) ?>
                                        <?php echo btn_edit('event/edit/'.$event->eventID, $this->lang->line('edit')) ?>
                                        <?php echo btn_delete('event/delete/'.$event->eventID, $this->lang->line('delete')) ?>
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
                <?php } else {  ?>
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('event_title')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('event_date')?></th>
                                <th class="col-sm-4"><?=$this->lang->line('event_event')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($events)) {$i = 1; foreach($events as $event) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_title')?>">
                                        <?php 
                                            if(strlen($event->title) > 25)
                                                echo substr($event->title, 0, 25)."...";
                                            else 
                                                echo substr($event->title, 0, 25);
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_date')?>">
                                        <?php echo date("d M Y", strtotime($event->date)); ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_event')?>">
                                        <?php 
                                            if(strlen($event->event) > 60)
                                                echo substr($event->event, 0, 60)."...";
                                            else 
                                                echo substr($event->event, 0, 60);
                                        ?>
                                    </td>
                                    <td data-title='Action'>
                                        <?php echo btn_view('event/view/'.$event->eventID, $this->lang->line('view')) ?>
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>