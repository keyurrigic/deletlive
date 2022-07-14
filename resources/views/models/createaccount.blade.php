<div class="modal fade" id="CreateAccountModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form name="registeraccount" method="post" id="registeraccount">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="registerfirstname" class="form-label">First Name / Last Name</label>
                        <input type="text" name="name" class="form-control" id="registerfirstname" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="registeremail" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="registeremail" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="registerpassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="registerpassword" placeholder="">
                    </div>
                    <div class="form-group ">
                        <label for="registerrepassword" class="form-label">Re-enter Password</label>
                        <input type="password" name="confirmpassword" class="form-control mb-0" id="registerrepassword"
                            placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-gray" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-blue" id="btncreateaccount">Create Account</button>
                    <!--button type="button" class="btn-blue" data-bs-toggle="modal" data-bs-target="#VerifyEmailModel">Create
                        Account</button-->
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="VerifyEmailModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Check your email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="follow-instruction">Pelease check your email and click on the verification link.</h6>
            </div>
            <div class="modal-footer bg-none">
                <button type="button" class="btn-blue ms-auto" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
