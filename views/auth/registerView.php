<main style="background-image:url(<?php echo URL ?>assets/img/bg_1.jpg)">
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3"
              style="background: rgba(255, 255, 255, 0.14);border-radius: 16px;box-shadow: 0 4px 30px rgba(0,0, 0, 0.1);backdrop-filter: blur(6.9px);-webkit-backdrop-filter: blur(6.9px);border: 1px solid rgba(255, 255, 255, 0.23);">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4 text-white">ساخت حساب</h5>
                </div>

                <form class="row g-3 needs-validation" method="POST" action="<?php echo URL ?>auth/registered">
                  <div class="col-12 text-white">
                    <label for="username" class="form-label">نام شما</label>
                    <input type="text" name="username" class="form-control" id="username" required>
                    <div class="invalid-feedback">لطفا نام خود را وارد کنید</div>
                  </div>

                  <div class="col-12 text-white">
                    <label for="email" class="form-label">ایمیل</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    <div class="invalid-feedback">لطفا ایمیل خود را وارد کنید</div>
                  </div>

                  <div class="col-12 text-white">
                    <label for="phone" class="form-label">تلفن</label>
                    <input type="number" name="phone" class="form-control" id="phone" required>
                    <div class="invalid-feedback">شماره تلفن خود را وارد کنید</div>
                  </div>

                  <div class="col-12 text-white">
                    <label for="password" class="form-label">رمز</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">لطفا رمز خود را وارد کنید</div>
                  </div>

                  <div class="col-sm-10 text-white">
                    <div class="form-check form-check-inline form-check-reverse">
                      <label class="form-check-label" for="role-member">عضو ساختمان</label>
                      <input class="form-check-input" type="radio" name="role" id="role-member" value="role-member"
                        checked>
                    </div>
                    <div class="form-check form-check-inline form-check-reverse">
                      <label class="form-check-label" for="role-manager">مدیر</label>
                      <input class="form-check-input" type="radio" name="role" id="role-manager" value="role-manager">
                    </div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">ساخت حساب</button>
                  </div>
                  <div class="col-12 text-center">
                    <p class="small mb-0 text-white">حساب دارید؟ <a class="text-decoration-underline"
                        href="<?php echo URL . 'auth/login' ?>">وارد شوید</a></p>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->

<style>
  input {
    background-color: transparent !important;
  }
</style>