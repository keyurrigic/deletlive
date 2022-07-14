<div class="nav flex-column nav-pills myaccount-links col-md-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link <?php echo ($menu=="my-account") ? 'active' : ''; ?>" id="v-pills-home-tab" type="button" onClick="window.location.href='/my-account'">Personal data</button>
    <button class="nav-link <?php echo ($menu=="address") ? 'active' : ''; ?>" id="v-pills-profile-tab" type="button" onClick="window.location.href='/my-account/address'" >Addresses</button>
    <button class="nav-link <?php echo ($menu=="orders") ? 'active' : ''; ?>" id="v-pills-messages-tab" type="button" onClick="window.location.href='/my-account/orders'" >Orders and billing</button>
    <button class="nav-link <?php echo ($menu=="support") ? 'active' : ''; ?>" id="v-pills-settings-tab" type="button" onClick="window.location.href='/my-account/support'">Support</button>
</div>