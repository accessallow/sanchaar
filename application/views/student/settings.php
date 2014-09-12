
<div class="row-fluid">
    <div class="span8">
        <?php echo form_open('student/change_password');?>
         <table class='table table-bordered' >
                      <tr style="background-color: #0064cd;color:white;">
                          <td colspan="4">Change Password</td>
                      </tr>
                      <tr>
                          <td><input name="old_password" type="password" placeholder="Current passowrd" />
                              <br/>
                          <input name="new_password" type="password" placeholder="New passowrd"/>
                           <br/>
                           <input name="confirm_new_password" type="password" placeholder="Confirm new passowrd"/>
                           <br/>
                           <input type="submit" class="btn" value="Change"/></td>
                      </tr>
                      <tr>
                          
                          
                      </tr>
                 
                  </table>
        
        <?php echo form_close();?>
      
    </div>
    <div class='span4'>
         <form action="<?php echo IMAGE_SERVER.'setimage.php?user='.$roll_number;?>" method="post" enctype="multipart/form-data">
         <table class='table table-bordered' >
                      <tr style="background-color: #0064cd;color:white;">
                          <td colspan="4">Change Profile Image</td>
                      </tr>
                      <tr>
                           <td>
                           <img src='<?php echo URL.'/images/img_unknown.jpg';?>' 
                                style='width:130px ;height:150px;'
                                class="img-polaroid"/>
                           <input type="file" name="image" size="20"/>
                           <input type="submit" class="btn pull-right" value="Change"/></td>
                      </tr>
                      <tr>
                          
                          
                      </tr>
                 
                  </table>
         </form>
    </div>
</div>