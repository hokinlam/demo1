/**
 * Created by zhjl on 2017/4/15.
 */

//login验证
var loginBox = document.getElementsByClassName("login-box")[0];
var p =/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,10}$/;
var btn = loginBox.children[4];
var usernameerror = document.getElementsByClassName("username-error")[0];
var passworderror = document.getElementsByClassName("password-error")[0];

btn.onclick = function () {
    if(!loginBox.children[0].value) {
        usernameerror.style.display = "block"
        passworderror.style.display = "none"
        return false;
    }
    if(!loginBox.children[2].value) {
        usernameerror.style.display = "none"
        passworderror.style.display = "block"
        return false;
    }
    if(!p.test(loginBox.children[0].value)){
        usernameerror.style.display = "block"
        passworderror.style.display = "none"
        return false;
    }
    if(!p.test(loginBox.children[2].value)){
        usernameerror.style.display = "none"
        passworderror.style.display = "block"
        return false;
    }
}


