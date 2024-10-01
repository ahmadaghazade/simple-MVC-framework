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
                            <li class="breadcrumb-item"><a href="/admin/dashboard/blogs">بلاگ</a></li>
                            <li class="breadcrumb-item active">ویرایش بلاگ</li>
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
                                <h3 class="card-title">ویرایش بلاگ</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="/admin/dashboard/blog/update/<?= $blog['id'] ?>" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputTitle1">عنوان</label>
                                        <input name="title" value="<?= $blog['title'] ?>" type="text" class="form-control" id="exampleInputTitle1" placeholder="عنوان را وارد کنید">
                                    </div>
                                    <div class="form-group">
                                        <label for="mytextarea">توضیحات</label>
                                        <textarea name="description" type="text" class="form-control" id="mytextarea" placeholder=""><?= $blog['description'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputTags1">تگ ها</label>
                                        <textarea name="tags" type="text" class="form-control" id="exampleInputTags1" placeholder="مثلا : سیاسی،اقتصادی"><?= $blog['tags'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputWriter1">نام نویسنده</label>
                                        <input value="<?= $blog['writer'] ?>" name="writer" type="text" class="form-control" id="exampleInputWriter1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>انتخاب تصویر شاخص</label>
                                        <input name="main_image" type="file">
                                    </div>
                                    <div class="form-group">
                                        <label>تصویر قبلی</label>
                                        <img src=<?= $blog['main_image'] ?>>
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