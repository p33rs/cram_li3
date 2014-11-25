<?php $this->html->script('login.js', ['inline' => false]); ?>

<section id="login" class="login">
    <ul class="errors"></ul>
    <form class="login-form" method="post" action="<?=$this->url(['controller' => 'Users', 'action' => 'login', 'type' => 'json'])?>">
        <dl>
            <dt><label for="login-username">Username</label></dt>
            <dd><input type="text" name="username" id="login-username" /></dd>
            <dt><label for="login-password">Password</label></dt>
            <dd><input type="password" name="password" id="login-password" /></dd>
        </dl>
        <input type="submit" name="submitted" value="Log In"/>
    </form>
    <button class="register-switch">Sign Up</button>
</section>

<section id="register" class="register">
    <ul class="errors"></ul>
    <form class="register-form" method="post" action="<?=$this->url(['controller' => 'Users', 'action' => 'register', 'type' => 'json'])?>">
        <dl>
            <dt><label for="register-username">Username</label></dt>
            <dd><input type="text" name="username" id="register-username" /></dd>
            <dt><label for="register-firstname">First Name</label></dt>
            <dd><input type="text" name="firstname" id="register-firstname" /></dd>
            <dt><label for="register-lastname">Last Name</label></dt>
            <dd><input type="text" name="lastname" id="register-lastname" /></dd>
            <dt><label for="register-email">Email address</label></dt>
            <dd><input type="text" name="email" id="register-email" /></dd>
            <dt><label for="register-password">Password</label></dt>
            <dd><input type="password" name="password" id="register-password" /></dd>
            <dt><label for="register-password2">Confirm</label></dt>
            <dd><input type="password" name="password2" id="register-password2" /></dd>
        </dl>
        <input type="submit" name="submitted" value="Sign Up" />
    </form>
    <button class="login-switch">Log in</button>
</section>