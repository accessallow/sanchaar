<div class='row-fluid'>
    <div class='span8'>
                  <table class='table table-bordered' >
                      <tr style="background-color: #0064cd;color:white;">
                          <td colspan="4">Inbox</td>
                      </tr>
                  </table>
        <div style="height: 450px; overflow-y: auto;">
                <table class="table table-bordered"  >
                      <tr style="background-color: black;color: white;">
                          <td>Sender</td>
                          <td style='width:130px;text-align: center;'>Action</td>
                          
                          
                          
                      </tr>
                    <?php 
                    foreach($messages as $message){ ?>
                      <tr>
                          <td><?php echo $message['reciever_username'];?></td>
                          <td><div class="btn-group pull-right">
  <button class="btn"><i class='icon-trash'></i></button>
  <a class="btn" href="<?php echo URL.'index.php/student/sentbox/'.$message['id']; ?>"><i class='icon-eye-open'></i></a>
  <button class="btn"><i class='icon-retweet'></i></button>
</div>
                        
                             </td>
                          
                         
                      </tr>   
                      
                   <?php }?>
                </table></div>
    </div>
    <div class='span4'>
        <table class='table table-bordered'>
            <tr>
                <td style="background-color: #0064cd;color:white;">Message</td>
          
            </tr>
            <tr>  
            <form action='<?php echo URL.'index.php/student/sentbox';?>' id='frm1' method='post'>
    <input type='hidden' name='sender' value = "<?php if(isset($msg)) echo $msg['reciever_username'];?>"/>
                <td><textarea id="ta" class='input-block-level' name="message" rows="5"> 
                    <?php if(isset($msg))
                    {
                        echo $msg['msg'];
                    }
                        ?>
                    </textarea>
                </td>
            </form>
            </tr>
             <tr>  
             <td>
<button onclick="document.getElementById('frm1').submit();"class='btn' id='btn1'><i class='icon-retweet'></i> Reply</button>         
<button class='btn' id='btn2'><i class='icon-trash'></i> Delete</button>  
  

             </td>
             </tr>
        </table>
        
        
       
        
       
    </div>
</div>
<script>
    function send_enable(){
        document.getElementById("btn3").class="btn btn-success";
    }
    
</script>