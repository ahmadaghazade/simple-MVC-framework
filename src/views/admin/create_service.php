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
                        <li class="breadcrumb-item"><a href="/admin/dashboard/services">خدمات ما</a></li>
                        <li class="breadcrumb-item active">ساخت خدمت جدید</li>
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
                            <h3 class="card-title">ساخت خدمت جدید</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/dashboard/service/store" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputTitle1">عنوان</label>
                                    <input name="title" type="text" class="form-control" id="exampleInputTitle1" placeholder="عنوان را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputIconClass1">کلاس آیکون نمایشی</label>
                                    <input name="icon_class" type="text" class="form-control" id="exampleInputIconClass1" placeholder="کلاس را وارد کنید">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMainContent1">مقدار نمایش داده شده در صفحه اصلی</label>
                                    <input name="main_content" type="text" class="form-control" id="exampleInputMainContent1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDescription1">توضیحات کامل</label>
                                    <textarea name="description" type="text" class="form-control" id="exampleInputDescription1" placeholder=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label>انتخاب فایل</label>
                                    <input name="main_image" type="file">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </section>

</div>

<?php include __DIR__ . "/partials/footer.php"; ?>