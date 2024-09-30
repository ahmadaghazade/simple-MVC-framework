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
                        <li class="breadcrumb-item"><a href="/admin/dashboard/page_content">محتوای صفحه</a></li>
                        <li class="breadcrumb-item active">ویرایش محتوا</li>
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
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">ویرایش محتوا </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/admin/dashboard/page_content/update/<?= $content['id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputKey1">کلید</label>
                                    <input value="<?= $content['key'] ?>" name="key" type="text" class="form-control" id="exampleInputKey1" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSection1">محل نمایش</label>
                                    <input value="<?= $content['section'] ?>" name="section" type="text" class="form-control" id="exampleInputSection1" disabled>
                                </div>

                                <?php if ($content['type'] === 'file'){ ?>
                                   <div class="form-group">
                                        <label>انتخاب فایل</label>
                                        <input name="file" type="file">
                                    </div>
                                <?php }else { ?>

                                    <div class="form-group">
                                        <label for="exampleInputValue1">مقدار</label>
                                        <input value="<?= $content['value'] ?>" name="value" type="text" class="form-control" id="exampleInputValue1">
                                    </div>
                                <?php } ?>


                                <?php if ($content['type'] === "file"){ ?>
                                    <div class="form-group">
                                        <label>مقدار قبلی =></label>
                                        <img src="<?= $content['value'] ?>"
                                    </div>
                                <?php } ?>


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