/**
 * Created by zhjl on 2017/4/15.
 */
//signup验证
var signupBox = document.getElementsByClassName("signup-box")[0];
var userName =/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,10}$/;
var usernameerror = document.getElementsByClassName("username-error")[0];
var passworderror = document.getElementsByClassName("password-error")[0];
var passworderror2 = document.getElementsByClassName("password-error2")[0];
var btn = document.getElementsByClassName("signup-box-button")[0];

btn.onclick = function(){
    if (!userName.test(signupBox.children[0].value)) {
        usernameerror.style.display = "block"
        passworderror.style.display = "none"
        passworderror.style.display = "none"
        return false;
    }
    if (!userName.test(signupBox.children[2].value)) {
        passworderror.style.display = "block"
        usernameerror.style.display = "none"
        passworderror2.style.display = "none"
        return false;
    }
    if(signupBox.children[4].value!==signupBox.children[2].value){
        passworderror2.style.display = "block"
        usernameerror.style.display = "none"
        passworderror.style.display = "none"
        return false;
    }
}




