<div class="modal fade" id="loginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form name="loginfrm" method="post" id="loginfrm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Login / Create account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="alert alert-danger login-error" role="alert">
                        Invalid Username / Password.        
                    </div>
                    <div class="alert alert-danger login-error-verify" role="alert">
                        Please verify your email first.        
                    </div>
                    <div class="form-group">
                        <label for="loginemail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="loginemail" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="loginpassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="loginpassword" placeholder="">
                    </div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#forgorpasswordModel" class="forgorpasswordModel">I
                        forgot my password</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-gray" data-bs-toggle="modal"
                        data-bs-target="#CreateAccountModel">Create Account</button>
                    <button type="submit" class="btn-blue" id="btnlogin">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>