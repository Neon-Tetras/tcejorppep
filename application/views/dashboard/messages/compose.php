<?php echo validation_errors(); ?>
<div class="container">

    <div class="row">
        <form action="<?=site_url("dashboard/send_message")?>" method="post" enctype="multipart/form-data">
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6">
            <h2>Write new message</h2>
              <?php 
            $arr = $this->session->flashdata(); 
            if(!empty($arr['message_sending_success'])){
                $html = '<div class="alert alert-success fade in alert-dismissible">';
                $html .= '<strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                $html .= $arr['message_sending_success']; 
                $html .= '</strong></div>';
                echo $html;
            }else  if(!empty($arr['message_sending_error'])){
                $html = '<div class="alert alert-danger fade in alert-dismissible">';
                $html .= '<strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                $html .= $arr['message_sending_error']; 
                $html .= '</strong></div>';
                echo $html;
                
            }
          ?>
            <div class="form-group">
                <p>Subject:</p>
                <input type="text" class="form-control" name="subject" required  value="<?= set_value("subject")?>"/>
                <br/>
                <span style="font-size: 14px; color:red;"><?=form_error("subject"); ?></span>

            </div>

            <div class="form-group" >

                <input type="checkbox" name=" " id="isBroadcast" value="1"/> Broadcast message

            </div>

            <div class="form-group" id="select_recipient">

                <p>Select Recipient:</p>
                <select id="users" class="form-control" name="recipient">
                    <?php foreach ($all_users as $user): ?>
                    <option value="<?= $user->getId(); ?>" 
                        <?php echo $selected = ($user->getId() == set_value("users") ? "selected" : "")?>>
                            <?=
                                ucwords(sprintf("%s %s-(%s)", 
                                   $user->getFirstName(), 
                                    $user->getLastName(),
                                    $user->getUsername())); 
                            ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="form-group">
                <p>Message body:</p>
                <textarea class="form-control" rows="20" required name="body"><?=set_value("body")?></textarea>
                <br/>
                <span style="font-size: 14px; color:red;"> <?=form_error("body"); ?></span>
            </div>
            
            <div class="form-group">
                <div class="col-md-6"></div>
                <div class="col-md-4"></div>
                <div class="col-md-2">
                      <button class="btn btn-primary" type="submit" >
                          Send&nbsp;<i class="glyphicon glyphicon-send"></i></button>
                </div>
                
              
            </div>
        </div>

        <div class="col-lg-3 col-md-3"></div>
        </form>
    </div>
</div>
<script>
  $(function(){
      $("#isBroadcast").change(function(){
//          alert("Hi");
         if(this.checked){
            
             $("#select_recipient").hide();
         }else{
             
              $("#select_recipient").show();
         }
      });
  });
</script>