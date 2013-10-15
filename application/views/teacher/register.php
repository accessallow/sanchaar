<div class='row-fluid'>
    <?php echo validation_errors('<div class="alert alert-error">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Error!</strong> ','</div>');?>
    <?php echo form_open('teacher/validate_signup');?>
    <div class='span8'>
                  <table class='table table-bordered'>
                      <tr>
                          <td colspan="4" style="background-color: #0064cd;color:white;">Personal Details</td>
                      </tr>
                      <tr>
                          <td><label>Name</label></td>
                          <td><input type="text" name='name' value="<?php echo $this->input->post('roll_number');?>"/></td>
                          <td><label>Department</label></td>
                          <td><select name='department'>
                                   
                               <option value="0">Select Department</option>  
                               <?php foreach ($departments as $department) {?>
                               <option value="<?php echo $department['branch_id'];?>"><?php echo $department['branch_name'];?></option>  
                               <?php } ?>
                             
                              </select>  
                          </td>
                      </tr>
                      <tr>
                          <td><label>Joining Year</label></td>
                          <td><select name='joining_year'>
                              <option value="0">Select Year</option>   
                              <?php  for($y = 1994;$y<=date('Y');$y++){?>
                                  <option value="<?php echo $y;?>"><?php echo $y;?></option>
                              <?php   }?>
                              </select>
                          </td>
                           <td><label>Personal Contact</label></td>
                           <td><input type="text" name='personal_contact' value="<?php echo $this->input->post('personal_contact');?>"/></td>
                      </tr>
                      <tr>
                         <td><label>Qualifications</label></td>
                         <td colspan="3"><textarea name='qualification' class="input-block-level" rows="5"><?php echo $this->input->post('branch');?></textarea></td>
                         
                      </tr>
                     
                  </table>
    </div>
    <div class='span4'>
        <table class='table table-bordered'>
            <tr>
                <td style="background-color: #0064cd;color:white;">Username</td>
                
            </tr>
            <tr>
             <td>
                    <div class='form-horizontal'>
                    <input type='text' name='username' value="<?php echo $this->input->post('username');?>"/> 
                   
                    <button class='btn'onclick=''><i class='icon icon-search'></i></button>
                     <i class='icon icon-check'></i>
                    </div>
                    </td>
                    
            </tr>
        </table>
          <table class='table table-bordered'>
            <tr>
                <td style="background-color: #0064cd;color:white;">Password</td>
                
            </tr>
            <tr>
             <td>
                    <div class='form-horizontal'>
                    <input type='password' name='password' value="<?php echo $this->input->post('password');?>"/> 
                    
                 
                   
                    </div>
             </td>
                    
            </tr>
            <tr>
             <td>
                    <div class='form-horizontal'>
                    <input type='password' name='confirm_password' value="<?php echo $this->input->post('confirm_password');?>"/> 
                    
                 
                   
                    </div>
             </td>
                    
            </tr>
        </table>
        
           <table class='table table-bordered'>
            <tr>
                <td style="background-color: #0064cd;color:white;">Captcha</td>
                
            </tr>
            <tr>
             <td>
                    <div class='form-horizontal'>
                    <input type='text' name='captcha' value="<?php echo $this->input->post('captcha');?>"/> 
                    
                 
                   
                    </div>
             </td>
                    
            </tr>
          
        </table>
        
       
    </div>
     <input type="submit" value="Register"class="btn  btn-primary btn-large pull-right"/>
     <?php echo form_close();?>
</div>