<?= $this->extend('Templates/index'); ?>

<?= $this->section('content'); ?>
<div class="d-flex flex-column align-items-center min-vh-100">
    <div class="col-3 col-sm-2 col-xl-1 px-4 mt-5 mb-2 d-flex">
        <img src="<?= base_url(); ?>/img/logoBPDNew.png" alt="logo" class="w-50 mx-auto">
    </div>
    <div class="h3 my-3 text-center font-roboto"><span style="border-bottom: 3px solid dodgerblue; color:dodgerblue;">LOGIN</span> REMINDER</div>
    <div class="d-grid w-100">
        <div class="col-8 col-sm-7 col-md-6 col-lg-4 mx-auto rounded">

            <form action="" method="post" class="col-10 mx-auto py-3 font-poppins">
                <?= csrf_field() ?>
                <!-- input username -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="username" class="input-group-text h-100"><i class="fas fa-user"></i></label>
                    </div>
                    <input type="text" class="form-control" id="username" name="login" placeholder="Username">
                </div>

                <!-- input password -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="password" class="input-group-text h-100"><i class="fas fa-lock"></i></label>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>

                <div class="mb-3">
                    <button type="submit" name="btn-login" class="btn btn-primary w-100 font-roboto">LOGIN</button>
                </div>
                <hr>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>