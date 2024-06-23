<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($pageTitle); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/sass/app.scss'); ?>
</head>

<body>
    
    <?php $__env->startSection('content'); ?>
        <div class="container-sm my-5">
            <form action="<?php echo e(route('employees.update', ['id' => $employee->id])); ?>" method="POST"
                enctype="multipart/form-data">

                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="row justify-content-center">
                    <div class="p-5 bg-light rounded-3 col-xl-6">
                        <div class="mb-3 text-center">
                            <i class="bi-person-circle fs-1"></i>
                            <h4>Edit Employee</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="formlabel">First Name</label>
                                <input class="form-control
                        <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="firstName"id="firstName"
                                    value="<?php echo e($errors->any() ? old('firstName') : $employee->firstname); ?>"
                                    placeholder="Enter First Name">
                                <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="textdanger"><small><?php echo e($message); ?></small></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">LastName</label>
                                <input class="form-control <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text"
                                    name="lastName" id="lastName"
                                    value="<?php echo e($errors->any() ? old('lastName') : $employee->lastname); ?>"
                                    placeholder="Enter Last Name">
                                <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="textdanger"><small><?php echo e($message); ?></small></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="formlabel">Email</label>
                                <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text"
                                    name="email" id="email"
                                    value="<?php echo e($errors->any() ? old('email') : $employee->email); ?>"
                                    placeholder="Enter Email">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="textdanger"><small><?php echo e($message); ?></small></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="age" class="formlabel">Age</label>
                                <input class="form-control <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> isinvalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="text" name="age"
                                    id="age" value="<?php echo e($errors->any() ? old('age') : $employee->age); ?>"
                                    placeholder="Enter Age">
                                <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="textdanger"><small><?php echo e($message); ?></small></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="position" class="formlabel">Position</label>
                                <select name="position" id="position" class="form-select">
                                    <?php
                                        $selected = '';
                                        if ($errors->any()) {
                                            $selected = old('position');
                                        } else {
                                            $selected = $employee->position_id;
                                        }
                                    ?>
                                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($position->id); ?>"
                                            <?php echo e($selected == $position->id ? 'selected' : ''); ?>>
                                            <?php echo e($position->code . '-' . $position->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="textdanger"><small><?php echo e($message); ?></small></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="cv" class="form-label">Curriculum Vitae (CV)</label>
                                <?php if($employee->original_filename): ?>
                                    <h5><?php echo e($employee->original_filename); ?></h5>
                                    <a href="<?php echo e(route('employees.downloadFile', ['employeeId' => $employee->id])); ?>"
                                        class="btn btn-primary btn-sm mt-2">
                                        <i class="bi bi-download me-1"></i> Download CV
                                    </a>
                                <?php else: ?>
                                    <h5>Tidak ada</h5>
                                <?php endif; ?>
                                <input type="file" class="form-control mt-2" name="cv" id="cv">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 d-grid">
                                <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-outline-dark btn-lg mt-3"><i
                                        class="bi-arrow-left-circleme-2"></i> Cancel</a>
                            </div>
                            <div class="col-md-6 d-grid">
                                <button type="submit" class="btn btn-dark
                        btn-lg mt-3"><i
                                        class="bi-check-circle me-2"></i> Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php $__env->stopSection(); ?>

    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
</body>

</html>

<?php echo $__env->make('ori_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Kuliah\Kuliah\Semester 4\FRAMEWORK LARAVEL\Praktikum\Routing-Laravel-MG6\resources\views/employee/edit.blade.php ENDPATH**/ ?>