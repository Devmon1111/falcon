<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Settings > Change Password - Workshop For Beginners</title>
    <link rel="stylesheet" href="../assets/css/custom.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main>

        <?php
        $arr = $this->session->flashdata();
        if (!empty($arr['success_message'])) {
            $html = '<div class="container" style="margin-top: 10px; background-color: #DEFFBD; border-radius: 10px; width:910px; height:70px; margin-left: 360px;">';
            $html .= '<div class="alert alert-dismissible" role="alert" style="color: #000;">';
            $html .= '<i class="fa-solid fa-circle-check" style="color: green; font-size:28px;"></i>';
            $html .= '<a style="margin-left: 20px; font-size:25px;">';
            $html .= $arr['success_message'];
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        } else if (!empty($arr['fail_message'])) {
            $html = '<div class="container" style="margin-top: 10px; border-radius: 10px; width:910px; height:70px; margin-left: 360px;">';
            $html .= '<div class="alert alert-danger alert-dismissible" role="alert">';
            $html .= '<i class="fa-solid fa-triangle-exclamation " style=" font-size:28px;";></i>';
            $html .= '<a style="margin-left: 20px; font-size:25px;">';
            $html .= $arr['fail_message'];
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        }
        ?>

        <div class="container mt-3" style="margin-left: 350px;">

            <div class="card mb-3 mt-2 " style="width: 70%;" id="passwordSection">
                <div class="card-header">
                    <h4 class="card-title">Change password</h4>
                </div>
                <div class="card-body">

                    <?php echo form_open('auth/change_password'); ?>
                    <div class="row mb-4">
                        <div class="col-sm-3">
                            <label for="currentPasswordLabel" class="form-label">Current password</label>
                        </div>
                        <div class="col-sm-9">
                            <input value="<?php echo set_value('oldpassword') ?>" type="password" class="form-control" name="oldpassword" id="currentPasswordLabel" placeholder="Enter current password" required />
                            <a style="color:#FF0000;"><?php echo form_error('oldpassword') ?></a>
                            <div class="invalid-feedback">
                                Please enter current password
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3">
                            <label for="newPassword" class="form-label">New password</label>
                        </div>
                        <div class="col-sm-9">
                            <input value="<?php echo set_value('newpassword') ?>" type="password" class="form-control" name="newpassword" id="newPassword" placeholder="Enter new password" required />
                            <a style="color:#FF0000;"><?php echo form_error('newpassword') ?></a>
                            <div class="invalid-feedback">
                                Please enter new password
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-3">
                            <label for="confirmNewPasswordLabel" class="form-label">Confirm new password</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="mb-3">
                                <input value="<?php echo set_value('confnewpassword') ?>" type="password" class="form-control" name="confnewpassword" id="confirmNewPasswordLabel" placeholder="Confirm your new password" required />
                                <a style="color:#FF0000;"><?php echo form_error('confnewpassword') ?></a>
                                <div class="invalid-feedback">
                                    Please enter confirm new password
                                </div>
                            </div>
                            <h5>Password requirements:</h5>
                            <p class="fs-6 mb-2">
                                Ensure that these requirements are met:
                            </p>

                            <ul class="fs-6">
                                <li>
                                    Minimum 5 characters long - the more, the better
                                </li>
                                <li>At least one lowercase character</li>
                                <li>At least one uppercase character</li>
                                <li>
                                    At least one number, symbol, or whitespace character
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">
                                Save Change
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end: main content -->
        </div>

    </main>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>