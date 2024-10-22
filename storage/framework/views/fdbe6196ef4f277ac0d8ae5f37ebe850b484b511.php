<?php $__env->startSection('content'); ?>
<style>
    .main-bar {
        background-color: #fff !important;
    }

</style>

<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->
    <div style="height:94px;"></div>
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->

    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Agent User</a></li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb  Templates End -->
    <!-- contact area -->
    <div class="container">
        <div class="section-content">
            <?php if(Session::has('success')): ?>
            
            <script>
                alert('<?php echo e(Session::get('success')); ?>');
            </script>
            <?php endif; ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form id="spf_form" method="post" action="<?php echo e(route('add.user.special')); ?>"
                            enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group">
                                <label for="">Promoter: <span class="type_err"></span></label>
                                <input id="promoter" type="text"
                                    class="form-control" name="promoter"
                                    value="<?php echo e(old('promoter')); ?>" placeholder="promoter" required autofocus>

                                <?php if($errors->has('promoter')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('promoter')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <label for="">Full Name: <span class="type_err"></span></label>
                                <input id="name" type="text"
                                    class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name"
                                    value="<?php echo e(old('name')); ?>" placeholder="Name" required autofocus>

                                <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="">Phone No: <span class="type_err"></span></label>
                                <input id="phone_no" type="text"
                                    class="form-control<?php echo e($errors->has('phone_no') ? ' is-invalid' : ''); ?>"
                                    name="phone_no" value="<?php echo e(old('phone_no')); ?>" minLength="11" maxLength="11"
                                    placeholder="Mobile Number" required>

                                <?php if($errors->has('phone_no')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('phone_no')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <label for="">Email: <span class="type_err"></span></label>
                                <input id="email" type="email"
                                    class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
                                    placeholder="Email" value="<?php echo e(old('email')); ?>">

                                <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="">Password: <span class="type_err"></span></label>
                                <input id="password" type="text"
                                    class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                    name="password" placeholder="Password" required>

                                <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <label for="">Area: <span class="type_err"></span></label>
                                <select name="area" id="sa" style="text-transform:none;" class="form-control" required>
                                    <option value="">Select Area</option>
                                    <option value="Adabor"> Adabor</option>
                                    <option value="Azampur"> Azampur</option>
                                    <option value="Badda"> Badda</option>
                                    <option value="Darus Salam"> Darus Salam</option>
                                    <option value="Dhanmondi"> Dhanmondi</option>
                                    <option value="Gulshan"> Gulshan</option>
                                    <option value="Kafrul"> Kafrul</option>
                                    <option value="Kalabagan"> Kalabagan</option>
                                    <option value="Khilgaon"> Khilgaon</option>
                                    <option value="Khilkhet"> Khilkhet</option>
                                    <option value="Mirpur">Mirpur</option>
                                    <option value="Mohammadpur"> Mohammadpur</option>
                                    <option value="Motijheel"> Motijheel</option>
                                    <option value="New Market"> New Market</option>
                                    <option value="Old Town"> Old Town</option>
                                    <option value="Pallabi"> Pallabi</option>
                                    <option value="Paltan"> Paltan</option>
                                    <option value="Ramna"> Ramna</option>
                                    <option value="Rampura"> Rampura</option>
                                    <option value="Sabujbagh"> Sabujbagh</option>
                                    <option value="Shahbagh"> Shahbagh</option>
                                    <option value="Sher-e-Bangla Nagar"> Sher-e-Bangla Nagar</option>
                                    <option value="Tejgaon"> Tejgaon</option>
                                    <option value="Uttar Khan"> Uttar Khan</option>
                                    <option value="Uttara"> Uttara</option>
                                    <option value="Vatara"> Vatara</option>
                                </select>
                                <?php if($errors->has('area')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('area')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="">Address: <span class="type_err"></span></label>
                                <textarea name="address" rows="2" class="form-control" placeholder="Address"
                                    required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">MFS Type: <span class="type_err"></span></label>
                                <select name="mfs_type" id="mfs_type" style="text-transform:none;" class="form-control"
                                    required>
                                    <option value="bkash">bKash</option>
                                    <option value="rocket">Rocket</option>
                                    <option value="sure_cash">Sure Cash</option>
                                </select>

                                <?php if($errors->has('mfs_type')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('mfs_type')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="">MFS Number: <span class="type_err"></span></label>
                                <input type="text" class="form-control" maxlength="12" minlength="11" name="mfs_number" id="mfs_number">

                                <?php if($errors->has('mfs_number')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('mfs_number')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="">Profile Picture: <span class="type_err"></span></label>
                                <input type="file" class="form-control" name="profile_picture" id="profile_picture"
                                    accept="image/*" onchange="uploadPhotos('/')">
                                <?php if($errors->has('profile_picture')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('profile_picture')); ?></strong>
                                </span>
                                <?php endif; ?>

                                <input type="text" name="profile_picture_base64" id="profile_picture_base64" hidden>
                                <span style="display: none" id="show_img_upload">Image is uploading wait......</span>
                                <img src="" style="height:100px;width:80" id="my_image" alt="">
                            </div>
                           

                            <input type="text" name="reason" value="special_user" hidden>
                            <input type="text" name="user_type" value="user" hidden>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>

            </div>
        </div>

        <!-- .message -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    window.uploadPhotos = function (url) {

        var file = event.target.files[0];

        // Ensure it's an image
        if (file.type.match(/image.*/)) {
            console.log('An image has been loaded');

            // Load the image
            var reader = new FileReader();
            reader.onload = function (readerEvent) {
                var image = new Image();
                image.onload = function (imageEvent) {

                    // Resize the image
                    var canvas = document.createElement('canvas'),
                        max_size = 544,// TODO : pull max size from a site config
                        width = image.width,
                        height = image.height;
                    if (width > height) {
                        if (width > max_size) {
                            height *= max_size / width;
                            width = max_size;
                        }
                    } else {
                        if (height > max_size) {
                            width *= max_size / height;
                            height = max_size;
                        }
                    }
                    canvas.width = width;
                    canvas.height = height;
                    canvas.getContext('2d').drawImage(image, 0, 0, width, height);
                    var dataUrl = canvas.toDataURL('image/jpeg');
                    $.event.trigger({
                        type: "imageResized",
                        url: dataUrl
                    });
                }
                image.src = readerEvent.target.result;
            }
            reader.readAsDataURL(file);
        }
    }


    $(document).on("imageResized", function (event) {
        if (event.url) {
            $bb = event.url;
            $('#show_img_upload').hide();
            $('#profile_picture').hide();
            $('#profile_picture').val("");
            $('#profile_picture_base64').val($bb);
            $('#my_image').attr('src',$bb);
        }

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>