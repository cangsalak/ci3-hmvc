<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?=lang('Welcome_Back')?></h1>
                                    </div>
                                    <?php if($timeout_left !== FALSE):?>
                                        <div class='form-errors'>
                                            <p>You have been locked out for too many incorrect login attempts. Please wait <?=ceil($timeout_left)?> minutes before attempting to login again.</p>
                                        </div>
                                        <?php if(custom_constants::email_login_allowed === TRUE):?>
                                            <p>If you have forgot your password then click on the reset password link below.</p>
                                        <? else:?>
                                            <p>If you have forgot your username or password then click on the forgot username or reset password link below.</p>
                                        <?php endif;?>
                                    <?php else:?>
                                        <?=form_open(custom_constants::login_page_url,['class' => 'user']);?>
                                        <!-- <form  class="user"> -->
                                            <div class="form-group">
                                                <input type="text" value="<?php echo set_value('username/email'); ?>" name="username/email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp" maxlength="320"
                                                    placeholder="<?=lang('enter_email')?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" value="<?php echo set_value('password'); ?>"class="form-control form-control-user"
                                                    id="exampleInputPassword" maxlength="32" placeholder="<?=lang('password')?>">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" value="<?php echo set_value('customCheck'); ?>" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck"><?=lang('Remember Me')?></label>
                                                </div>
                                            </div>
                                            <button name="submit" value="login" class="btn btn-primary btn-user btn-block">
                                                <?=lang('Login')?>
                                            </button>
                                            <hr>
                                            <a href="#" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> <?=lang('Login with Google')?> 
                                            </a>
                                            <a href="#" class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> <?=lang('Login with Facebook')?> 
                                            </a>
                                        <?= form_close();?>
                                    <?php endif;?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?=base_url('forgot_password')?>"><?=lang('Forgot Password?')?> </a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?=base_url('signup')?>"><?=lang('Create an Account!')?> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>