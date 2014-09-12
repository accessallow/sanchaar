<div class="row-fluid">
    <div class="span8">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <td colspan="4" style="background-color: #0064cd;color:white;">Registered Complaints</td>
            </tr>
            
            <tr>
                <td>Complaint Id</td>
                <td>Date</td>
                <td>Subject</td>  
                 <td>Action</td>  
            </tr>
            <?php foreach($complaints as $c){?>
            <tr>
                <td><?php echo $c['complaint_id'];?></td>
                <td><?php echo $c['time'];?></td>
                <td><?php echo $c['subject'];?></td> 
                <td><a href='<?php echo URL.'index.php/student/complaint/'.$c['complaint_id'];?>'>Open</a></td> 
            </tr>
            <?php } ?>
        </table> 
    </div>
    <div class="span4">
       
         <table class="table table-bordered">
            <tr>
                <td colspan="2" style="background-color: #0064cd;color:white;">New Complaint</td>
            </tr>
             <form id="frm_c_1" action="<?php echo URL.'index.php/student/complaint'?>" method="post">
            <tr>
                <td>
                    <input type="hidden" name="complainer_username" value="<?php echo $this->session->userdata('username');?>"/>
                    <input type='text' name='subject' placeholder="Subject" class='input-block-level'/>
                    <textarea class="span12" rows="5" name='c_text'></textarea>
                    <button class="btn btn-primary pull-right" 
                            onclick="document.getElementById('frm_c_1').submit();"
                            >Submit</button>
                </td>
            </tr>
             </form>
            <td colspan="2" style="background-color: #0064cd;color:white;">Update/Delete</td>
            <tr>
            <form action="<?php echo URL.'index.php/student/update_complaint';?>" id="frm_c_2" method="post">
            <td>
                <input type="hidden" value="<?php
                if(isset($complaint_id)){
                echo $complaint_id;
                }
                ?>" name="complaint_id"/>
                <textarea class="span12" rows="7">
                <?php
                if(isset($c_text)){
                echo $c_text;
                }
                ?>
                </textarea>
            <button class="btn btn-primary" onclick="document.getElementById('frm_c_2').submit();">Update</button>
              </form>
            <button class="btn btn-danger" onclick="window.location='<?php 
            if(isset($complaint_id)){
            echo URL.'index.php/student/delete_complaint/'.$complaint_id;
            }
            ?>';">Delete</button>
            </td>
            </tr>
          
            <tr>
                <td>
                    <button class="btn">Register New Complaint</button>
                </td>
            </tr>
           
        </table> 
    </div>
</div>