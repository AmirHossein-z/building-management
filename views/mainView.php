<style>
body {
overflow:hidden;
}
.bgimg {
  width:100vw;
  height:110vh;
  display:flex;
  justify-content:center;
  align-items:center;
  background-position: center;
  background-size: cover;
  filter:brightness(50%);
}
</style>

<div class="bgimg" style="background-image:url('<?php echo URL?>assets/img/building_bg.jpg')"></div>
<div class="position-absolute block z-2 top-50 start-50 translate-middle">
  <h1 class="text-white mb-4">نرم افزار مدیریت ساختمان</h1>
  <div class="d-flex justify-content-between align-items-center gap-2">
  <a class="btn btn-warning w-100" href="<?php echo URL?>auth/register">ثبت نام</a>
  <a class="btn btn-primary w-100" href="<?php echo URL ?>auth/login">ورود</a>
  </div>
</div>
