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
                        <li class="breadcrumb-item active">خدمات ما</li>
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
                            <h3 class="card-title">جدول خدمات ما</h3>

                            <div class="card-tools">
                                <a href="/admin/dashboard/service/create" class="mr-1 btn btn-sm btn-success float-left">ساخت خدمت جدید</a>

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
                                    <th>عنوان</th>
                                    <th>خلاصه متن</th>
                                    <th>تصویر</th>
                                    <th>تنظیمات</th>
                                </tr>
                                <?php foreach ($services as $service){ ?>
                                <tr>
                                    <td><?= $service['id'] ?></td>
                                    <td><?= $service['title'] ?></td>
                                    <td><?= $service['description'] ?></td>
                                    <td>
                                        <img src="<?php echo $service['main_image']; ?>">
                                    </td>
                                    <td>
                                        <a href="/admin/dashboard/service/edit/<?php echo $service['id']?>" class="btn btn-app">
                                            <i class="fa fa-edit"></i>
                                            ویرایش
                                        </a>
                                        <a href="/admin/dashboard/service/delete/<?php echo $service['id']?>" class="btn btn-app">
                                            <i class="fa fa-close"></i>
                                            حذف
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
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
