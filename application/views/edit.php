<!DOCTYPE html>
<html>
<head>
    <title>Create user</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
<div class="navbar navbar-dark bg-success">
    <div class="container">
        <a href="#" class="navbar-brand">CRUD</a>
    </div>
</div>
<div class="container" style="padding-top: 10px">
    <h2>編輯</h2>
    <hr>
    <form method="post" name="update_user" action="<?php echo base_url().'index.php/account_info/edit/'.$user['user_id'];?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>帳號</label>
                <input type="text" name="account" value="<?php echo set_value('account', $user['account']);?>" class="form-control">
                <?php echo form_error('account');?>
            </div>
            <div class="form-group">
                <label>姓名</label>
                <input type="text" name="name" value="<?php echo set_value('name', $user['name']);?>" class="form-control">
                <?php echo form_error('name');?>
            </div>
            <div class="form-group">
                <label>性別</label>
                <select name="gender" value="<?php echo set_value('gender', $user['gender']);?>" class="form-control">
                    <option>男</option>
                    <option>女</option>
                </select>
                <?php echo form_error('gender');?>
            </div>
            <div class="form-group">
                <label>生日</label>
                <input type="date" name="birthday" value="<?php echo set_value('birthday', $user['birthday']);?>" class="form-control">
                <?php echo form_error('birthday');?>
            </div>
            <div class="form-group">
                <label>信箱</label>
                <input type="email" name="email" value="<?php echo set_value('email', $user['email']);?>" class="form-control">
                <?php echo form_error('email');?>
            </div>
            <div class="form-group">
                <label>備註</label>
                <input type="text" name="note" value="<?php echo set_value('note', $user['note']);?>" class="form-control">
            </div>
            <div class="form-group" style="padding-top: 20px">
                <button class="btn btn-primary">編輯</button>
                <a href="<?php echo base_url().'index.php/account_info/index';?>" class="btn-secondary btn">取消</a>
            </div>
        <div>
    </div>
    </form>
</div>

</body>
</html>