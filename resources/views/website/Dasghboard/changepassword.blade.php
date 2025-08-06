<div class="row align-items-center">
<div class="col-lg-6">
<div class="form-section">

<form id="changePasswordForm">
    @csrf
<div class="currentpass form-item">
<label for="currentpass" class="form-label">Current Password*</label>
<input type="password" class="form-control" name="current_password" id="current_password" placeholder="******">
<p></p>
</div>
<div class="password form-item">
<label for="pass" class="form-label">Password*</label>
<input type="password" class="form-control" name="new_password" id="new_password" placeholder="******">
<p></p>
</div>
<div class="re-password form-item">
<label for="repass" class="form-label">Re-enter Password*</label>
<input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="******">
<p></p>

</div>
<div class="form-btn">
<button type="submit" class="shop-btn">Update Password</button>

<a href="#" class="shop-btn cancel-btn">Cancel</a>
</div>
</form>

</div>
</div>
<div class="col-lg-6">
<div class="reset-img text-end">
<img src="assets/images/homepage-one/reset.webp" alt="reset">
</div>
</div>
</div>
