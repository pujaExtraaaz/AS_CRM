<?php
    $setting = App\Models\Utility::colorset();
    $header_text = !empty(\App\Models\Utility::settings()['company_name']) ? \App\Models\Utility::settings()['company_name'] : env('APP_NAME');
    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';

    if (isset($setting['color_flag']) && $setting['color_flag'] == 'true') {
        $themeColor = 'custom-color';
    } else {
        $themeColor = $color;
    }
    $users = \Auth::user();
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    // $currantLang = $users->currentLanguage();
    $languages = \App\Models\Utility::languages();
    $footer_text = isset(\App\Models\Utility::settings()['footer_text']) ? \App\Models\Utility::settings()['footer_text'] : '';
    $seo_setting = App\Models\Utility::getSeoSetting();

    $company_logo = Utility::getValByName('company_logo');
    $favicon = Utility::getValByName('company_favicon');
    $currantLang = Cookie::get('LANGUAGE');
    if (!isset($currantLang)) {
        $currantLang = 'en';
    }
?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CRMGo SaaS - Projects, Accounting, Leads, Deals & HRM Tool">
    <meta name="author" content="Rajodiya Infotech">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/favicon.png'))); ?>" type="image" sizes="16x16">
    <title>
        <?php echo e(Utility::getValByName('header_text') ? Utility::getValByName('header_text') : config('app.name', 'LeadGo')); ?>

        &dash; <?php echo e(__('Form')); ?>

    </title>
    <!-- Primary Meta Tags -->

    <meta name="title" content="<?php echo e($seo_setting['meta_keywords']); ?>">
    <meta name="description" content="<?php echo e($seo_setting['meta_description']); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:title" content="<?php echo e($seo_setting['meta_keywords']); ?>">
    <meta property="og:description" content="<?php echo e($seo_setting['meta_description']); ?>">
    <meta property="og:image" content="<?php echo e(asset('uploads/metaevent/' . $seo_setting['meta_image'])); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:title" content="<?php echo e($seo_setting['meta_keywords']); ?>">
    <meta property="twitter:description" content="<?php echo e($seo_setting['meta_description']); ?>">
    <meta property="twitter:image" content="<?php echo e(asset('uploads/metaevent/' . $seo_setting['meta_image'])); ?>">


    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>" type="text/css">


    <!-- Favicon icon -->


    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">

    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">


</head>

<body class="<?php echo e($themeColor); ?>">
    <div class="container-fluid container-application">
        <div class="main-content position-relative">
            <div class="page-content">
                <div class="min-vh-100 py-5 d-flex align-items-center">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-sm-8 col-lg-5">
                                <div class="row center mb-3">
                                    <a class="navbar-brand" href="#">
                                        <img src="<?php echo e(asset(Storage::url('uploads/logo/logo-dark.png'))); ?>"
                                            class="auth-logo">
                                    </a>
                                </div>

                                <div class="card shadow zindex-100 mb-0">
                                    <?php if($form->is_active == 1): ?>
                                        <?php echo e(Form::open(['route' => ['form.view.store'], 'method' => 'post'])); ?>

                                        <div class="card-body px-md-5 py-5">

                                            <div class="">
                                                <h4 class="text-primary mb-3"><?php echo e($form->name); ?></h4>
                                            </div>
                                            <input type="hidden" value="<?php echo e($code); ?>" name="code">

                                            <?php if($objFields && $objFields->count() > 0): ?>
                                                <?php $__currentLoopData = $objFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($objField->type == 'text'): ?>
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('field-' . $objField->id, __($objField->name), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::text('field[' . $objField->id . ']', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'field-' . $objField->id])); ?>

                                                        </div>
                                                    <?php elseif($objField->type == 'email'): ?>
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('field-' . $objField->id, __($objField->name), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::email('field[' . $objField->id . ']', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'field-' . $objField->id])); ?>

                                                        </div>
                                                    <?php elseif($objField->type == 'number'): ?>
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('field-' . $objField->id, __($objField->name), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::number('field[' . $objField->id . ']', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'field-' . $objField->id])); ?>

                                                        </div>
                                                    <?php elseif($objField->type == 'date'): ?>
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('field-' . $objField->id, __($objField->name), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::date('field[' . $objField->id . ']', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'field-' . $objField->id])); ?>

                                                        </div>
                                                    <?php elseif($objField->type == 'textarea'): ?>
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('field-' . $objField->id, __($objField->name), ['class' => 'form-label'])); ?>

                                                            <?php echo e(Form::textarea('field[' . $objField->id . ']', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'field-' . $objField->id])); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <div class="mt-4">
                                                    <?php echo e(Form::submit(__('Submit'), ['class' => 'btn btn-primary'])); ?>

                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <?php echo e(Form::close()); ?>

                                    <?php else: ?>
                                        <div class="page-title">
                                            <h5><?php echo e(__('Form is not active.')); ?></h5>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- [ auth-signup ] end -->

    <!-- Required Js -->
    <script src="<?php echo e(asset('assets/js/vendor-all.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
    <script>
        feather.replace();
    </script>


    <script>
        function show_toastr(title, message, type) {
            var o, i;
            var icon = '';
            var cls = '';
            if (type == 'success') {
                icon = 'fas fa-check-circle';
                // cls = 'success';
                cls = 'primary';
            } else {
                icon = 'fas fa-times-circle';
                cls = 'danger';
            }

            console.log(type, cls);
            $.notify({
                icon: icon,
                title: " " + title,
                message: message,
                url: ""
            }, {
                element: "body",
                type: cls,
                allow_dismiss: !0,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                offset: {
                    x: 15,
                    y: 15
                },
                spacing: 10,
                z_index: 1080,
                delay: 2500,
                timer: 2000,
                url_target: "_blank",
                mouse_over: !1,
                animate: {
                    enter: o,
                    exit: i
                },
                // danger
                template: '<div class="toast text-white bg-' + cls +
                    ' fade show" role="alert" aria-live="assertive" aria-atomic="true">' +
                    '<div class="d-flex">' +
                    '<div class="toast-body"> ' + message + ' </div>' +
                    '<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>' +
                    '</div>' +
                    '</div>'
                // template: '<div class="alert alert-{0} alert-icon alert-group alert-notify" data-notify="container" role="alert"><div class="alert-group-prepend alert-content"><span class="alert-group-icon"><i data-notify="icon"></i></span></div><div class="alert-content"><strong data-notify="title">{1}</strong><div data-notify="message">{2}</div></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            });
        }
    </script>

    <?php if(Session::has('success')): ?>
        <script>
            toastrs('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            toastrs('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>
</body>

</html>
<?php /**PATH /home/u766425373/domains/extraaaz.com/public_html/live/resources/views/form_builder/form_view.blade.php ENDPATH**/ ?>