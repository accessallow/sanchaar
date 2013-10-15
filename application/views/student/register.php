<div class='row-fluid'>
    <?php echo validation_errors('<div class="alert alert-error">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Error!</strong> ','</div>');?>
    <?php echo form_open('student/validate_signup');?>
    <div class='span8'>
                  <table class='table table-bordered'>
                      <tr>
                          <td colspan="4" style="background-color: #0064cd;color:white;">Personal Details</td>
                      </tr>
                      <tr>
                          <td><label>Roll No</label></td>
                          <td><input type="text" name='roll_number' value="<?php echo $this->input->post('roll_number');?>"/></td>
                          <td><label>Name</label></td>
                          <td><input type="text" name='student_name' value="<?php echo $this->input->post('student_name');?>"/></td>
                      </tr>
                        <tr>
                          <td><label>Semester</label></td>
                          <td><input type="text" name='semester'  value="<?php echo $this->input->post('semester');?>"/></td>
                          <td><label>Branch</label></td>
                          <td> 
                              <select name="branch">
                                   <option value="0">Select Branch</option>  
                                  <?php foreach ($branches as $branch) {?>
                                  <option value="<?php echo $branch['branch_id'];?>"><?php echo $branch['branch_name'];?></option>  
                                  <?php } ?>
                              </select>
                          </td>
                      </tr>
                        <tr>
                          <td><label>Personal Contact</label></td>
                          <td><input type="text" name='personal_contact' value="<?php echo $this->input->post('personal_contact');?>"/></td>
                          <td><label>Parental Contact</label></td>
                          <td><input type="text" name='parental_contact' value="<?php echo $this->input->post('parental_contact');?>"/></td>
                      </tr>
                        <tr>
                          <td><label>Living Town</label></td>
                          <td><input type="text" name='living_town' value="<?php echo $this->input->post('living_town');?>"/></td>
                          <td><label>Postal Address</label></td>
                          <td><textarea name='postal_address'><?php echo $this->input->post('postal_address');?></textarea></td>
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