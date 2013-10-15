<div class='row-fluid'>
   <?php echo validation_errors('<div class="alert alert-error">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Error!</strong> ','</div>');?>
    <?php if($this->session->flashdata('message')){?>
        <div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Access Failure!</strong> <?php echo $this->session->flashdata('message');?></div>
    <?php } ?>
    <div class='span4'>
       <form action='<?php echo URL.'index.php/start/validate_login';?>' method='POST'>
        <table class='table table-bordered'>
            <tr>
                <td style="background-color: #0064cd;color:white;">Login</td>
          
            </tr>
            <tr>  <td><input type='text' name='username' value='<?php echo $this->input->post('username');?>' class='input-block-level' placeholder="Username/Rollno"/> 
                    <br/>
                    <input type='text' name='password' value='<?php echo $this->input->post('password');?>' class='input-block-level' placeholder="Password"/>
                </td>
        
            </tr>
            <tr><td class='form-horizontal'>
            <select name='account_type'>
                <option value='0'>Account Type</option>
                <option value='1'>Student</option>
                <option value='2'>Teacher</option>
                <option value='3'>HOD</option>
                <option value='4'>Director</option>
            </select>
    <button type='submit' class='btn pull-right'><i class='icon-lock'></i> Login</button>          
                </td>
            </tr>
            
        </table>
    </form>  
        
       
        
       
    </div>
</div>
 
