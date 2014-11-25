var LoginPage = function(e) {
    this.register = $(e).find('.register');
    this.login = $(e).find('.login');
    this.register.find('.login-switch').on('click', $.proxy(this.showLogin, this));
    this.login.find('.register-switch').on('click', $.proxy(this.showRegister, this));
};

LoginPage.prototype.showLogin = function() {
    this.login.show();
    this.register.hide();
};

LoginPage.prototype.showRegister = function() {
    this.register.show();
    this.login.hide();
};

LoginPage.prototype.login = function() {
    $.ajax({
        url: '/login',
        type: 'POST',
        data: this.register.find('.login-form').serialize(),
        beforeSend: function() {
        },
        error:function() {
        },
        success: function(data) {
        },
        complete: function() {
        }
    });
};

LoginPage.prototype.loginError = function() {

};

LoginPage.prototype.register = function() {
    $.ajax({
        url: '/register',
        type: 'POST',
        data: this.register.find('.register-form').serialize(),
        beforeSend: function() {
        },
        error:function() {
        },
        success: function(data) {
        },
        complete: function() {
        }
    });
};

/**
 * @todo Separate from login error since we probably want
 *   per-field validation here but not there
 */
LoginPage.prototype.registerError = function() {

};

$(function() {
    var login = new LoginPage($('#main'));
});