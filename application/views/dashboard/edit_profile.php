<!--<div style="margin-top: 70px;"></div>-->


<div class="container">

    <div class="row" >
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-5 col-md-5" >
            <h2>Edit Profile</h2>
            <div class="row"  style="border: 1px outset #fff; padding: 10px;">

                <?php
                $arr = $this->session->flashdata();
                if (!empty($arr['message'])) {
                    $html = '<div class="alert alert-success fade in alert-dismissible">';
                    $html .= '<strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    $html .= $arr['message'];
                    $html .= '</strong></div>';
                    echo $html;
                }
                ?>
                <form action="<?= site_url("user/update"); ?>" method="post">
                    <div class="row" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>First Name:</p>
                                <input type="text" name="first_name" value="<?= $user_data->getFirstName(); ?>" class="form-control" required=""/>
                                <center><span><?php //echo form_error("first_name");      ?></span></center>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>Last Name:</p>
                                <input type="text" name="last_name"  required="" value="<?= $user_data->getLastName(); ?>" class="form-control"/>
                                <center><span><?php // echo form_error("last_name");      ?></span></center>
                            </div>
                        </div>


                    </div>
                    <div class="form-group">
                        <p>Username:</p>
                        <input type="text" name="username" readonly required="" value="<?= $user_data->getUsername(); ?>" class="form-control"/>
                        <center><span><?php //echo form_error("username");      ?></span></center>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <p>Email:</p>
                            <input type="text" name="email" readonly required="" value="<?= $user_data->getEmail(); ?>" class="form-control"/>
                            <center><span><?php //echo form_error("username");      ?></span></center>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>Phone:</p>
                                <input type="text" name="phone" value="<?= $user_data->getPhone(); ?>" class="form-control" required/>
                                <center><span><?php //echo form_error("first_name");      ?></span></center>
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-12 " >
                            <div class="col-md-6"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-2">

                                <input type="submit" name="submit"  required="" value="Update" class="btn btn-primary"/>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row" >

        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-5 col-md-5 page-header">
            <h2>Update KYC</h2>
            <?php
            $arr = $this->session->flashdata();
            if (!empty($arr['update_kyc'])) {
                $html = '<div class="alert alert-success fade in alert-dismissible">';
                $html .= '<strong><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                $html .= $arr['update_kyc'];
                $html .= '</strong></div>';
                echo $html;
            }
            ?>

            <div class="row" style="border: 1px outset #fff; padding: 10px;" id="kyc_panel">
                <?php if ($kyc && $kyc->getIdCard() && $kyc->getIdCard() != "" && $kyc->getStatus() == 1) { ?>
                    <div style="font-size: 14px; color:green"> Approved&nbsp;
                        <i class="glyphicon glyphicon-thumbs-up" style="font-size: 16px; color:green"></i>
                    </div>
                <?php } ?>
                <form action="<?= site_url("dashboard/update_picture") ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <h3>Picture</h3><p></p>

                        <div  class="row" id="preview1" >
                            <a rel="prettyPhoto">
                                <?php
                                if ($kyc && $kyc->getPicture() && $kyc->getPicture() != "") {
                                    ?>
                                <a href="<?php echo base_url() . $kyc->getPicture(); ?>">
                                    <img src="<?php echo base_url() . $kyc->getPicture(); ?>" width="100" height="100" alt="no_image"/>
                                </a>
                                <?php } else {
                                    ?>
                                    <img src="<?= base_url("assets/images/no_image.png") ?>" width="50" height="50" alt="no_image"/>
                                <?php } ?>
                            </a>
                        </div>
                        <p></p>
                        <div class="row">
                            <input type="file" name="picture" style="float:left;" accept="image/*" id="picture" />
                            <!--<input type="button" id="reset1" value="reset1" style="float:left;"  />-->
                        </div>

                        <p></p>


                        <input type="submit" name="submit"  class="btn btn-primary btn-sm" value="Update" id="uploadPicture" style="visibility: collapse;"/>



                    </div>
                </form>



                <form action="<?= site_url("dashboard/update_id") ?>" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <h3>ID Card</h3><p></p>
                        <div class="row" id="preview2" >
                            <?php
                            if ($kyc && $kyc->getIdCard() && $kyc->getIdCard() != "") {
                                ?>
                            <a href="<?php echo base_url() . $kyc->getIdCard(); ?>">
                                <img src="<?php echo base_url() . $kyc->getIdCard(); ?>" width="100" height="100" alt="no_image"/>
                            </a>
                            <?php } else {
                                ?>
                                <img src="<?= base_url("assets/images/no_id.png") ?>" width="50" height="50" alt="no_image"/>
                            <?php } ?>
                        </div>
                        <p></p>
                        <div class="row" >
                            <input type="file" name="idCard" style="float:left;" accept="image/*" id="idCard" />
                            <!--<input type="button" id="reset2" value="Clear" style="float:left;"  />-->
                        </div>
                        <p></p>
                        <div class="row" id="save_changes">

                            <input type="submit" name="submit"   class="btn btn-primary btn-sm" value="Update" id="uploadId" style="visibility: collapse;"/>

                        </div>

                    </div>
                </form>
                <p></p>

                <p></p>
                <p></p>


            </div>
            </form>
        </div>
    </div>


    <p></p>
    <!--
    <div class="col-md-4 page-header">
        
    <a href="#" id="update_kyc" >Update KYC</a>
    <p></p>
    -->


    <div class="col-md-4"></div>

</div>

<script type="text/javascript" charset="utf-8">

</script>

<script>

    $(function () {



        $('#preview1').imagepreview({
            input: '[name="picture"]',
            reset: '#reset1',
            preview: '#preview1'
        });

        $('#preview2').imagepreview({
            input: '[name="idCard"]',
            reset: '#reset2',
            preview: '#preview2'
        });
        $("a[rel^='prettyPhoto']").prettyPhoto();

        $("#update_kyc").click(function () {
            $("#kyc_panel").css("visibility", "visible");
        });

        $("#idCard").change(function () {
            $("#uploadId").css("visibility", "visible");

        });

        $("#picture").change(function () {
            $("#uploadPicture").css("visibility", "visible");

        });
    });
</script>
