 <div class='row-fluid'>
    <div class='span8'>
                  <table class='table table-bordered' >
                      <tr style="background-color: #0064cd;color:white;">
                          <td colspan="4">Upload Notice</td>
                      </tr>
                       <tr>
                           <td>
                               <form action='<?php echo URL.'index.php/teacher/process_notice';?>' method='post'>
                           <input type='text' class='input-block-level' name='notice_subject' placeholder="Notice Subject"/>
                           <br/>
                           <textarea class='input-block-level' name='notice_link' placeholder="Paste your File Link Here"></textarea>
                           
                           <input type='submit' class='btn btn-primary pull-right' value='Upload'/>
                               </form>
                           </td>
                          
                      </tr>
                        <tr>
                           
                            
                      </tr>
                      
                    
                    
                  </table>
    </div>
     
</div>
<script>
    function send_enable(){
        document.getElementById("btn3").class="btn btn-success";
    }
    
</script>