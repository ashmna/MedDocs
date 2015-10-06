<div ng-controller="userController">
<form  id="wrapper" method="post" name="loginForm" ng-submit="login(loginForm)" novalidate>
  <div id="box" class="animated bounceIn">
    <div id="top_header">
      <a href="#">
        <img class="logo" src="/global/img/logo.png" alt="logo">
      </a>
      <h5>
        Sign in to continue to your<br/>
        Cloud Account.
      </h5>
    </div>
    <di id="inputs">
      <div class="form-control">
        <input type="text" placeholder="<?= _('Username') ?>" ng-model="userLogin.username" required autofocus>
        <i class="fa fa-user-md"></i>
      </div>
      <div class="form-control">
        <input type="password" placeholder="<?= _('Password') ?>" ng-model="userLogin.password" required autocomplete="off">
        <i class="fa fa-key"></i>
      </div>
      <input type="submit" value="<?= _('Sign In') ?>">
    </di>
    <div id="bottom">
      <div class="squared-check">
        <input type="checkbox" value="1" id="remember" name="check" ng-model="userLogin.rememberMe">
        <label for="remember"></label>

        <div class="cb-label"><?= _('Remember') ?></div>
      </div>
      <a class="right_a" href="#"><?= _('Forgot password?') ?></a>
    </div>
  </div>
</form>
</div>