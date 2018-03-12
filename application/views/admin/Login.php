<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/admin/css/matrix-login.css" />
    <link href="<?=base_url()?>public/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" action="<?=base_url('admin/login')?>" method="post">
        <div class="control-group normal_text"> <h3>TPI ADMIN PANEL</h3></div>
        <?php
        if(isset($flash))
        {
            echo $flash;
        }
        ?>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                    <input type="text" placeholder="Username" name="username"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                    <input type="password" placeholder="Password" name="password"/>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left">
                <input type="submit" class="btn btn-success" value="login" name="submit"/>
            </span>
        </div>
    </form>
</div>

</body>

</html>