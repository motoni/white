 <form  role="form" method="post" enctype="multipart/form-data">
             <?php 
                        if(form_error('table')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        
                        <div class="col-sm-5">
                            <select name="table" class="form-control" data-validate="required">
                              <option value="">--Select--</option>
            <option value="teacher">Teacher</option>
            <option value="parent">Parent</option>
            <option value="student">Student</option>
            </select>
                        </div> 
                    </div>
           
           <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"></label>
                        
                        <div class="col-sm-5">
                            <input type="file" name="userfile" class="form-control" data-validate="required" data-message-required="">
                        </div>
                    </div>
                     
                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="Create" >
                        </div>
                    </div>
        <?php echo form_close(); ?>