@extends('main')
@section('content')
<div class="main-container">
    <!--- Banner -->
    <div class="inner-banner">
        <div class="container">
            <div class="inner-banner-container">
                <h1>My Account</h1>
            </div>
        </div>
    </div>
    <!--- Banner -->
    <div class="clearfix"></div>
    <div class="myaccount-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-start  row">
                        @include('myaccounts.parts.navigation')

                        <div class="tab-content col-md-8" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="myaccount-card">
                                    <p class="myaccount-label">FIRST NAME / LAST NAME</p>
                                    <h5 class="text-capitalize">{{ $customer->name }}</h5>
                                    <button class="btn-blue" data-bs-toggle="modal" data-bs-target="#changeNameModel">CHANGE
                                        NAME</button>
                                </div>

                                <div class="myaccount-card">
                                    <p class="myaccount-label">EMAIL ADDRESS</p>
                                    <h5>{{ $customer->email }}</h5>
                                    <!--button class="btn-blue">CHANGE
                                        EMAIL</button-->
                                </div>

                                <div class="myaccount-card">
                                    <p class="myaccount-label">PASSWORD</p>
                                    <h5>xxxxxxxxxxxx</h5>
                                    <button class="btn-blue" data-bs-toggle="modal" data-bs-target="#changePasswordModel">CHANGE PASSWORD</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changeNameModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form name="frmchangename" id="frmchangename" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Change name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nameCard" class="form-label">FIRST NAME / LAST NAME</label>
                        <input type="text" name="fullname" class="form-control mb-0" id="fullname" value="{{ $customer->name }}" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-gray" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-blue" id="btnchangename">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="changePasswordModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form name="frmchangepassword" id="frmchangepassword" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Change password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nameCard" class="form-label">OLD PASSWORD</label>
                        <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nameCard" class="form-label">NEW PASSWORD</label>
                        <input type="password" name="newpassword" class="form-control" id="changenewpassword" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nameCard" class="form-label">NEW PASSWORD AGAIN</label>
                        <input type="password" name="confirmpassword" class="form-control mb-0" id="changeconfirmpassword" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-gray" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-blue" id="btnchangepassword">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection