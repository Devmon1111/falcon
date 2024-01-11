<?php
$arr = $this->session->flashdata();
if (!empty($arr['success_message'])) {
    $html = '<div class="container" style="margin-left:360px; margin-top: 20px; width:910px; height:70px; background-color: #DEFFBD; border-radius: 10px;">';
    $html .= '<div class="alert alert-dismissible" role="alert" style="color: #000000;">';
    $html .= '<i class="fa-solid fa-circle-check" style="color: green; font-size:28px;"></i>';
    $html .= '<a style="margin-left: 20px; font-size:25px;">';
    $html .= $arr['success_message'];
    $html .= '</a>';
    $html .= '</div>';
    $html .= '</div>';
    echo $html;
}
?>
<div class="container mt-3" style="margin-left: 350px;">
    <div class="card mb-3 mt-2 " id="passwordSection" style="width: 70%;">
        <div class="card-header" style="background-color: #D9D9D9;">
            <h4 class="card-title">Edit profile</h4>
        </div>
        <div class="card-body">

            <form action="edit_profile" method="post">

                <div class="row" style="font-size: 20px;">
                    <div class="col-sm-6">
                        <label for="currentPasswordLabel" class="form-label">Firstname</label>
                    </div>
                    <div class="col-sm-6">
                        <label for="currentPasswordLabel" class="form-label">Surname</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" name="firstname" class="form-control" id="inputFirstname" value="<?php echo $news_item['firstname']; ?>" />
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="lastname" class="form-control" id="inputLastname" value="<?php echo $news_item['lastname']; ?>" />
                    </div>
                </div>

                <div class="row mt-4" style="font-size: 20px;">
                    <div class="col-sm-12">
                        <label for="confirmNewPasswordLabel" class="form-label">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7">
                        <input type="email" name="email" class="form-control" id="inputEmail" value="<?php echo $news_item['email']; ?>" disabled />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-left: 80%; margin-top:200px;">
                    Save Change
                </button>
                <!-- ส่วนกลับไปยังหน้าหลัก -->
                <hr>
                <div class="text-center" style="border: none;">
                    <a href="<?php echo base_url() ?>" class="link-secondary">Go back to homepage</a>
                </div>
        </div>
        </form>
    </div>
</div>
</div>