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
                        <li class="breadcrumb-item active">تنظیمات سایت</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">جدول تنظیمات سایت</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tr>
                                        <th>شماره</th>
                                        <th>آدرس</th>
                                        <th>ایمیل</th>
                                        <th>آدرس فیسبوک</th>
                                        <th>آدرس ایکس</th>
                                        <th>آدرس اینستاگرام</th>
                                        <th>آدرس پینترست</th>
                                        <th>شماره تماس</th>
                                        <th>عملیات</th>
                                    </tr>
                                    <tr>
                                        <td><?= $settings['id'] ?></td>
                                        <td><?= $settings['address'] ?></td>
                                        <td><?= $settings['email_address'] ?></td>
                                        <td><?= $settings['facebook_link'] ?></td>
                                        <td><?= $settings['x_link'] ?></td>
                                        <td><?= $settings['instagram_link'] ?></td>
                                        <td><?= $settings['pinterest_link'] ?></td>
                                        <td><?= $settings['phone'] ?></td>
                                        <td>
                                            <a href="/admin/dashboard/site-settings/edit" class="btn btn-app">
                                                <i class="fa fa-edit"></i>
                                                ویرایش
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include __DIR__ . "/partials/footer.php"; ?>
