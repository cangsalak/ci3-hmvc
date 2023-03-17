<?php
if(isset($values_posted))
{
	foreach($values_posted as $post_name => $post_value)
	{
		$input[$post_name]['value'] = $post_value;
	}
}
if($logged_in === TRUE)
{
	echo "<p>You are already registered and logged in.</p>";
	echo "<p><a href='" . base_url() . custom_constants::admin_page_url . "'>Click here</a>
	to go to the admin page.</a>";
}
?>

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?=lang('Create an Account!')?></h1>
                            </div>
                            <?=form_open(custom_constants::register_url,['class' => 'user']);?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user <?= (form_error('first_name') != '') ? 'is-invalid' : ''; ?>" name="first_name" value="<?=set_value('first_name')?>" id="exampleFirstName" placeholder="<?=lang('First Name')?>">
                                        <?= form_error('first_name', '<small class="text-small text-danger">', '</small>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user <?= (form_error('surname') != '') ? 'is-invalid' : ''; ?>" name="surname" value="<?=set_value('surname')?>" id="exampleLastName" placeholder="<?=lang('Last Name')?>">
                                        
                                        <?= form_error('surname', '<small class="text-small text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?= (form_error('username') != '') ? 'is-invalid' : ''; ?>" name="username" value="<?=set_value('username')?>" id="username" placeholder="<?=lang('username')?>">
                                        <?= form_error('username', '<small class="text-small text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user <?= (form_error('email') != '') ? 'is-invalid' : ''; ?>" name="email" value="<?=set_value('email')?>" id="email" placeholder="<?=lang('Email Address')?>">
                                        <?= form_error('email', '<small class="text-small text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user <?= (form_error('email_confirmation') != '') ? 'is-invalid' : ''; ?>" name="email_confirmation" value="<?=set_value('email_confirmation')?>" id="exampleInputEmail" placeholder="<?=lang('Email Address Confirmation')?>">
                                        <?= form_error('email_confirmation', '<small class="text-small text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user <?= (form_error('password') != '') ? 'is-invalid' : ''; ?>" name="password" value="<?=set_value('password')?>" id="exampleInputPassword" placeholder="<?=lang('Password')?>">
                                        <?= form_error('password', '<small class="text-small text-danger">', '</small>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user <?= (form_error('password_confirmation') != '') ? 'is-invalid' : ''; ?>" name="password_confirmation" value="<?=set_value('password_confirmation')?>" id="exampleRepeatPassword" placeholder="<?=lang('Repeat Password')?>">
                                        <?= form_error('password_confirmation', '<small class="text-small text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <button name="submit" class="btn btn-primary btn-user btn-block">
                                    <?=lang('Register Account')?>
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> <?=lang('Register with Google')?>
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> <?=lang('Register with Facebook')?>
                                </a>
                             <?= form_close();?>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?=base_url('forgot_password')?>"><?=lang('Forgot Password?')?></a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=base_url('signin')?>"><?=lang('Already have an account? Login!')?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>