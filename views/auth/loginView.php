  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">وارد حساب خود شوید</h5>
                  </div>

                  <form class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">ایمیل</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">لطفا ایمیل خود را وارد کنید</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">پسورد</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">لطفا پسورد خود را وارد کنید</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">ورود</button>
                    </div>
                    <div class="col-12">
                    <p class="small mb-0">حساب ندارید؟<a href="<?php echo URL.'auth/register' ?>">ساخت حساب کاربری</a></p>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
