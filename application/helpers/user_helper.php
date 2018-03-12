<?php


function user_auth()
{
    $user_id = $_SESSION['tpi'];
    if($user_id)
    {
        return true;
    }
    else
    {
        redirect(base_url('user/login'));
    }
}

function admin_auth()
{
    $admin_id = $_SESSION['admin_tpi'];
    if($admin_id)
    {
        return true;
    }
    else
    {
        redirect(base_url('admin/login'));
    }
}