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
    <div class="row">
        <div class="col-md-12">
            <?php
            $success = $this->session->userdata('success');
            if ($success != "") {
            ?>
            <div class ="alert alert-success"><?php echo $success;?></div>
            <?php
            } 
            ?>
            <?php
            $failure = $this->session->userdata('failure');
            if ($failure != "") {
                ?>
                <div class ="alert alert-failure"><?php echo $failure;?></div>
                <?php
                } 
                ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-6"><h2>帳號列表</h2></div>
            <div class="col-6">
                <a href="<?php echo base_url().'index.php/account_info/create';?>" class="btn btn-primary">新增</a>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>帳號</th>
                    <th>姓名</th>
                    <th>性別</th>
                    <th>生日</th>
                    <th>信箱</th>
                    <th>備註</th>
                    <th>編輯</th>
                    <th>刪除</th>
                </tr>

                <?php if(!empty($account_info))  { foreach($account_info as $value) {?>
                <tr>
                    <td><?php echo $value['account']?></td>
                    <td><?php echo $value['name']?></td>
                    <td><?php echo $value['gender']?></td>
                    <td><?php echo $value['birthday']?></td>
                    <td><?php echo $value['email']?></td>
                    <td><?php echo $value['note']?></td>
                    <td>
                        <a href="<?php echo base_url().'index.php/account_info/edit/'.$value['user_id']?>" class="btn btn-success">編輯</a>
                    </td>
                    <td>
                        <a onclick="del_confirm('<?php echo 'delete/'.$value['user_id']?>')" class="btn btn-danger" >刪除</a>
                    </td>
                </tr>
                <?php } } else {?>
                <tr>
                    <td colspan="5">尚無帳號紀錄</td>
                </tr>
                <?php }?>

            </table>
        </div>
    </div>
</div>
<script>
function del_confirm(para) {
	answer = confirm('確認刪除?');
	if (answer)
		location.href= para;
}
</script>
</body>
</html>