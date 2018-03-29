<html>
    <head>


        <title>Login</title>

        <style>
             .nav-tabs > li.active > a, .nav-pills > li.active > a:focus {
        color: white;
        background-color: red;
    }
    .container{
        margin-top: 100px;
        
    }
        .nav-pills > li.active > a:hover {
            background-color: red;
            color:white;
        }
        
        a:link{
            color: black;
        }
        a:active{
            color:white;
        }
        li:active{
            color: white;
        }
          .red{
                background-color: #97310e; 
                width: 200px;

            }
            .red:hover{
                background-color: greenyellow;
            }
        
        </style>
    </head>

   <div class="container">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <h2 style="text-align:left;"> Welcome to Pep Project</h2>
                </div>
                <div class="col-md-4">

                </div>

            </div>
        
        <div class="row"  >

            <div class="col-md-4"></div>

            <div class="col-md-4 col-centered" style="border: 1px   inset #222 ;" >


                <p></p>
                <ul class="nav nav-tabs  nav-justified ">
                  
                    <li id="login_tab"><a data-toggle="pill" href="#login">Login</a></li>
                    <li id="register_tab" class="active"><a data-toggle="pill" href="#register">Register</a></li>

                </ul>

                <div class="tab-content">
                    <div id="login" class="tab-pane fade">
                        <?php echo validation_errors(); ?>
                            <div id="login-form"  >
                                <h3 style="text-align:center;">Login</h3>
                                <center>
                                    <span class="" style="font-size:12px; color:red;">
                                        <?php
                                        if (isset($login_error)): echo $login_error;
                                        endif;
                                        ?>

                                    </span>
                                </center>


                                <?php if (filter_input(INPUT_GET, 'blocked') != null): ?> 
                                    <span class="" style="font-size:12px; color:red;">
                                        <strong>Your account has been disabled. Please contact admin</strong>
                                    </span> 

                                <?php endif; ?>

                                <form  action="login" method="POST" role="form" >

                                    <input class="form-control" type="email"  id="email" 
                                           placeholder="Email" name="email"   value=""
                                           autocomplete="off" 
                                           title="username@domain.com" 
                                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required/>

                                    <p></p>

                                    <input class="form-control" type="password"  
                                           id="password" placeholder="Password" name="password"  required value=""/>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <p></p>
                                    <input style="float:right; margin-bottom: 20px; margin-top: 10px; " id="loginbut" type="submit"
                                           class="btn btn-primary" value="Login" 
                                           name="login" />


                                </form>

                                <p style="float:left;  margin-top: 10px; "><a href="<?= site_url("auth/forgot_password")?>" >Forgot Password?</a></p> 
                                <p></p>
                            </div>



                            <p></p>
                        <p></p>
                    </div>
                    <div id="register" class="tab-pane fade in active">
                     
            
<form name="user_reg_form" id="user_register_form" action="register" method="post">
    <h3 style="text-align:center;">Register</h3>

    <p></p>

    <div class="row">
            <div class="col-md-6">
                First Name: <p></p>

                
                <input type="text" name="first_name" 
                       value="<?= set_value("first_name"); ?>"
                       id="fullname" class="form-control"/>
                <p></p>
                
                <span>
                    <center> 
                        <span style="font-size: 14px; color:red;">
                            <?php echo form_error("first_name"); ?>
                    </center>
                </span>
                        
            </div>
        
        <div class="col-md-6">
                Last Name: <p></p>

                
                <input type="text" name="last_name" 
                       value="<?= set_value("last_name"); ?>"
                       id="fullname" class="form-control"/>
                <p></p>
                
                <span>
                    <center> 
                        <span style="font-size: 14px; color:red;">
                            <?php echo form_error("last_name"); ?>
                    </center>
                </span>
                        
            </div>

    </div>
    
    <div class="row">
        
            <div class="col-md-6">
                Username: <p></p>
                <input type="text" name="username" value="<?= set_value("username"); ?>" id="username" class="form-control"/>
                <p></p>
                <center>   <span style="font-size: 14px; color:red;"><?php echo form_error("username"); ?></span></center>
                
            </div>
        
        <div class="col-md-6">
            
    Email<p></p>

    <input type="email" name="email" class="form-control" 
           required value="<?= set_value("email"); ?>"
           pattern="[aA-zZ0-9._%+-]+@[aZ-zZ0-9.-]+\.[aA-zZ]{2,3}$" 
           title="username@domain.com"
           /><p></p>

    <p><center> 
            <span style="font-size: 14px; color:red;">
                <?= form_error("email"); ?>
        </center>
        </div>
    </div>



</p>


Mobile Phone:
<p></p> <input type="tel" name="phone" 
               value="<?= set_value("phone"); ?>" 
               class="form-control" id="phone" required />

<p><center> <span  style="font-size: 14px; color:red;"><?= form_error("phone"); ?></center></p>

<div class="row">
    <div class="col-md-6">
        Password <p></p>
        <input type="password" id="password" name="password" 
               value="<?php echo set_value("password"); ?>" 
               required class="form-control" /><p></p>
        <p> </p>

        <center> 
            <span  style="font-size: 14px; color:red;">
                <?php echo form_error("password"); ?>
            </span>
        </center>
        <p></p>
    </div>
    
    
    
    <div class="col-md-6">

        <p></p>Confirm Password<p></p>
        <input type="password" name="confirm" id="confirm" 
               value="<?php echo set_value("confirm"); ?>" 
               required class="form-control" /><p></p>

        <p></p>
        <center>
            <span id="pwd_error2" style="font-size: 14px; color:red;">
                <?php echo form_error("confirm"); ?>
            </span>
        </center>
    </div>
    
    
</div>

<div style="position: relative; margin-bottom: 20px;">

    <input type="checkbox" name="terms_of_service"  id="terms_of_use" style="float:left;" /> 
    <label for="terms_of_use" style="float:left;">I have read and agree with the <a href='#'>Terms of use</a></label>
</div>
<p>&nbsp;</p>
<button style="text-align:right; "   value="submit"
        class="btn btn-success" 
        name="submit" >  
    Submit</button>
</form>
           
                    </div>

                </div>


            </div>
            <div class="col-md-4"></div>

        </div>

    </div>
   </body>
</html>