<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style/footer.css">
    <title>Document</title>
</head>

<body>
    <?php if (empty($this->session->userdata['email'])) { ?>
        <!-- ไม่ให้ footer แสดงในหน้าก่อน login -->
    <?php } else { ?>
        <!-- ให้ footer แสดงในหน้า login -->
        <div class="footer">
            <footer>
            <div class="container text-center">
                <h5>ABOUT US</h5>
                <p>Come order products from Care Bear Shop.</p>
                <a href="<?php echo prep_url('facebook.com'); ?>"><img src="/assets/img/facebook.png" alt="" width="25px"></a>
                <a href="<?php echo prep_url('google.com'); ?>"><img src="/assets/img/google.png" alt="" width="25px" class="footer-icon"></a>
                <a href="<?php echo prep_url('instagram.com'); ?>"><img src="/assets/img/instagram.png" alt="" width="25px" class="footer-icon"></a>
                <a href="<?php echo prep_url('youtube.com'); ?>"><img src="/assets/img/youtube.png" alt="" width="25px" class="footer-icon"></a>
            </div>
        </footer>
        </div>
    <?php } ?>
</body>

</html>