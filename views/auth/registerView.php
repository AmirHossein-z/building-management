  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">ساخت حساب</h5>
                  </div>

                  <form class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">نام شما</label>
                      <input type="text" name="username" class="form-control" id="username" required>
                      <div class="invalid-feedback">لطفا نام خود را وارد کنید</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">ایمیل</label>
                      <input type="email" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">لطفا ایمیل خود را وارد کنید</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">ساخت حساب</button>
                    </div>
                    <div class="col-12">
                    <p class="small mb-0">حساب دارید؟ <a href="<?php echo URL.'auth/login' ?>">وارد شوید</a></p>
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
