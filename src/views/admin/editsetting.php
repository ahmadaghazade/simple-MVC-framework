<?php include __DIR__ . '/partials/header.php'; ?>

<?php include __DIR__ . "/partials/sidebar.php"; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">داشبورد</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="/admin/dashboard/">خانه</a></li>
                        <li class="breadcrumb-item"><a href="/admin/dashboard/site-settings/">تنظیمات سایت</a></li>
                        <li class="breadcrumb-item active">ویرایش تنظیمات سایت</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ویرایش اطلاعات</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/dashboard/site-settings/create" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">آدرس ایمیل</label>
                                    <input name="email_address" type="email" class="form-control" id="exampleInputEmail1" value=<?= $settings['email_address']?> >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputAddress1">آدرس</label>
                                    <textarea name="address" type="text" class="form-control" id="exampleInputAddress1"><?= htmlspecialchars($settings['address'])?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFacebookLink1">آدرس فیسبوک</label>
                                    <input name="facebook_link" type="text" class="form-control" id="exampleInputFacebookLink1" value= <?= $settings['facebook_link']?> >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputXLink1">آدرس ایکس</label>
                                    <input name="x_link" type="text" class="form-control" id="exampleInputXLink1" value= <?= $settings['x_link']?> >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputInstagramLink1">آدرس اینستاگرام</label>
                                    <input name="instagram_link" type="text" class="form-control" id="exampleInputInstagramLink1" value= <?= $settings['instagram_link']?> >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPinterestLink1">آدرس پینترست</label>
                                    <input name="pinterest_link" type="text" class="form-control" id="exampleInputPinterestLink1" value= <?= $settings['pinterest_link']?> >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhoneLink1">شماره تماس</label>
                                    <input name="phone" type="text" class="form-control" id="exampleInputPhoneLink1" value= <?= $settings['phone']?> >
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div><!-- /.row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include __DIR__ . "/partials/footer.php"; ?>
