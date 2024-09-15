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
                        <li class="breadcrumb-item"><a href="/admin/dashboard/brands">برند ها</a></li>
                        <li class="breadcrumb-item active">ساخت برند جدید</li>
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
                            <h3 class="card-title">لوگوی برند را اپلود کنید</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/dashboard/brand/store" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">ارسال فایل</label>
                                    <div class="">
                                        <div class="">
                                            <input name="image" type="file" class="" id="" required>
                                            <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>

</div>

<?php include __DIR__ . "/partials/footer.php"; ?>