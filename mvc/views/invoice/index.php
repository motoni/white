<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-invoice"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_invoice')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                    <div class="col-sm-12">
                        <div class="panel panel-default panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title headings">Expected Income :
                                    <span class="subtitle">
                                        <?php 
                                            foreach($totalpayments as $amount) {
                                                echo "N" . number_format(floatval($amount->total), 2);
                                            } 
                                        ?>
                                    </span>
                                </h4>
                                <h5 class="panel-title headings">Fee Type :
                                    <span class="subtitle">All Fees</span>
                                </h5>
                            </div>
                        </div>
                </div>
                
                    <div class="col-sm-12">
                        <div class="row">
                          <div class="col-lg-4 col-xs-4">
                            <section class="small-box box-border">
                              <a class="box-container" href="#">
                                <header class="title">
                                   <h4>Paid</h4>
                                </header>
                              <center>
                                <?php 
                                    foreach ($fullpayments as $amount) {$fully_paid = $amount->full;}
                                    foreach ($partialpayments as $amount) {$partially_paid = $amount->partial;}
                                    foreach ($totalpayments as $amount) {$totalexpected = $amount->total;}
                                    $amountnotpaid = $totalexpected - ($fully_paid + $partially_paid);
                                    $paid_percent = round(($fully_paid/$totalexpected)*100); 
                                    $partial_percent = round(($partially_paid/$totalexpected)*100); 
                                    $notpaid_percent = round(($amountnotpaid/$totalexpected)*100);
                                     

                                ?>
                                <div class="amount-legend"><?php echo "N", number_format($fully_paid, 2); ?></div>
                                <p class="percent"><?php echo htmlentities($paid_percent . "%"); ?><span class="pvalue">
                                  
                                  </span>
                                  <span class="small-text">Paid</span></p>
                                <canvas id="paid-graph" class="chart-on-canvas" width="100" height="100"></canvas>
                              </center>
                              <div id="paid-legend" class="chart-legend"></div>
                            </a>
                            </section>
                          </div>
                          <div class="col-lg-4 col-xs-4">
                            <section class="small-box box-border">
                              <a class="box-container" href="#">
                                <header class="title">
                                   <h4>Partially Paid</h4>
                                </header> 
                                <center>
                                  <div class="amount-legend"><?php echo "N", number_format($partially_paid, 2); ?></div>
                                  <p class="percent"><?php echo htmlentities($partial_percent . "%"); ?><span class="pvalue">
                                    
                                    </span><span class="small-text">Partial</span></p>
                                  <canvas id="partial-graph" class="chart-on-canvas" width="100" height="100"></canvas>
                                </center>
                                <div id="partial-legend" class="chart-legend"></div>
                            </a>
                            </section>
                          </div>
                          <div class="col-lg-4 col-xs-4">
                            <section class="small-box box-border">
                              <a class="box-container" href="#">
                                <header class="title">
                                   <h4>Unpaid</h4>
                                </header> 
                                <center>
                                  <div class="amount-legend"><?php echo "N", number_format($amountnotpaid, 2); ?></div>
                                  <p class="percent"><?php echo htmlentities($notpaid_percent . "%"); ?><span class="pvalue">
                                    
                                    </span><span class="small-text">Unpaid</span></p>
                                  <canvas id="unpaid-graph" class="chart-on-canvas" width="100" height="100"></canvas>
                                </center>
                                <div id="unpaid-legend" class="chart-legend"></div>
                            </a>
                            </section>
                          </div>
                        </div>
                    </div>
                    <script type="text/javascript" src="<?php echo base_url('assets/chartjs/chart.js'); ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('assets/scripts/graphs.js'); ?>"></script>
                           
                    <script>
                        
                         $.ajax({
                              type: 'GET',
                              dataType: "json",
                              url: "<?=base_url('invoice/invoice_analysis')?>",
                              dataType: "html",
                              success: function(data) {
                                var response = jQuery.parseJSON(data);
                                afpaid = response.afpaid;
                                appaid = response.appaid;
                                anpaid = response.anpaid;
                                tpaid = response.tpaid;
                                st = response.st;
                               
                                if (st == 1) {
                                var fdata = [ // Fully Paid Data
                                  {
                                    value: afpaid,
                                    color: "#46BFBD",
                                    highlight: "#5AD3D1",
                                    label: "Paid"
                                  },

                                  {
                                    value: tpaid,
                                    color:"#F7464A",
                                    highlight: "#FF5A5E",
                                    label: "Total"
                                  },

                                ];

                                var pdata = [ // Partially Paid
                                  {
                                    value: appaid,
                                    color: "#46BFBD",
                                    highlight: "#5AD3D1",
                                    label: "Partially Paid"
                                  },

                                  {
                                    value: tpaid,
                                    color:"#F7464A",
                                    highlight: "#FF5A5E",
                                    label: "Total"
                                  },

                                ];

                                var udata = [ // Unpaid
                                  {
                                    value: anpaid,
                                    color: "#46BFBD",
                                    highlight: "#5AD3D1",
                                    label: "Unpaid"
                                  },

                                  {
                                    value: tpaid,
                                    color:"#F7464A",
                                    highlight: "#FF5A5E",
                                    label: "Total"
                                  },

                                ];
                            }else{
                                var fdata = [ // Fully Paid Data
                                      {
                                        value: 1,
                                        color: "#46BFBD",
                                        highlight: "#5AD3D1",
                                        label: "Paid"
                                      },

                                      {
                                        value: 1,
                                        color:"#F7464A",
                                        highlight: "#FF5A5E",
                                        label: "Total"
                                      },

                                    ];

                                    var pdata = [ // Partially Paid
                                      {
                                        value: 1,
                                        color: "#46BFBD",
                                        highlight: "#5AD3D1",
                                        label: "Partially Paid"
                                      },

                                      {
                                        value: tpaid,
                                        color:"#F7464A",
                                        highlight: "#FF5A5E",
                                        label: "Total"
                                      },

                                    ];

                                    var udata = [ // Unpaid
                                      {
                                        value: 1,
                                        color: "#46BFBD",
                                        highlight: "#5AD3D1",
                                        label: "Unpaid"
                                      },

                                      {
                                        value: 1,
                                        color:"#F7464A",
                                        highlight: "#FF5A5E",
                                        label: "Total"
                                      },

                                    ];
                            }

                            var options = {
                                  segmentShowStroke: false,
                                  animateRotate: true,
                                  animateScale: false,
                                  percentageInnerCutout: 55,
                                  tooltipTemplate: "<%= value %>"
                                }

                                displayInvoiceDoughnutGraph(fdata, "#paid-graph", "#paid-legend", options); // Display Paid Invoice Chart
                                displayInvoiceDoughnutGraph(pdata, "#partial-graph", "#partial-legend", options); // Display Paid Invoice Chart
                                displayInvoiceDoughnutGraph(udata, "#unpaid-graph", "#unpaid-legend", options); // Display Paid Chart
                        }

                    });

                    </script>

                    
                       

                   
                    <div class="col-sm-12">


                <?php
                    $usertype = $this->session->userdata("usertype");
                    if($usertype == "Admin" || $usertype == "Accountant") {
                ?>
                <h5 class="page-header">
                    <a href="<?php echo base_url('invoice/add') ?>">
                        <i class="fa fa-plus"></i> 
                        <?=$this->lang->line('add_title')?>
                    </a>
                </h5>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('invoice_feetype')?></th>
                                <th><?=$this->lang->line('invoice_date')?></th>
                                <th><?=$this->lang->line('invoice_status')?></th>
                                <th><?=$this->lang->line('invoice_student')?></th>
                                <th><?=$this->lang->line('invoice_paymentmethod')?></th>
                                <th><?=$this->lang->line('invoice_amount')?></th>
                                <th><?=$this->lang->line('invoice_due')?></th>
                                <th><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($invoices)) {$i = 1; foreach($invoices as $invoice) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('invoice_feetype')?>">
                                        <a href="<?php echo base_url('invoice/analysis/' . $invoice->feetypeID); ?>"><?php echo $invoice->feetype; ?></a>
                                    </td>

                                    <td data-title="<?=$this->lang->line('invoice_date')?>">
                                        <?php echo $invoice->date; ?>
                                    </td>
       
                                    <td data-title="<?=$this->lang->line('invoice_status')?>">
                                        <?php 

                                            $status = $invoice->status;
                                            $setstatus = '';
                                            if($status == 0) {
                                                $status = $this->lang->line('invoice_notpaid');
                                            } elseif($status == 1) {
                                                $status = $this->lang->line('invoice_partially_paid');
                                            } elseif($status == 2) {
                                                $status = $this->lang->line('invoice_fully_paid');
                                            }

                                            echo "<button class='btn btn-success btn-xs'>".$status."</button>";

                                        ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('invoice_student')?>">
                                        <?php echo $invoice->student; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('invoice_paymentmethod')?>">
                                        <?php echo $invoice->paymenttype; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('invoice_amount')?>">
                                        <?php echo $siteinfos->currency_symbol. $invoice->amount; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('invoice_due')?>">
                                        <?php echo $siteinfos->currency_symbol. ($invoice->amount - $invoice->paidamount); ?>
                                    </td>

                                    
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php echo btn_view('invoice/view/'.$invoice->invoiceID, $this->lang->line('view')) ?>
                                        <?php if($usertype == "Admin" || $usertype == "Accountant") { ?>
                                        <?php echo btn_edit('invoice/edit/'.$invoice->invoiceID, $this->lang->line('edit')) ?>
                                        <?php echo btn_delete('invoice/delete/'.$invoice->invoiceID, $this->lang->line('delete'))?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if(classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('setfee/setfee_list')?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>
