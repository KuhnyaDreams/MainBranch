
let regForm = document.getElementById("regForm");
let authForm = document.getElementById("authForm");
let backgrounds = document.querySelectorAll('.form-back');
let containers = document.querySelectorAll('.container');
function ChangeToReg(){
    authForm.className="form-back not-visible";
    regForm.className="form-back visible";
}
function ChangeToAuth(){
    regForm.className="form-back not-visible";
    authForm.className="form-back visible";
}
function ShowAuth(){
    if(!getCookie('userlogin')){
        if (authForm.className=="form-back visible" || regForm.className=="form-back visible")
        {
            regForm.className="form-back not-visible";
            authForm.className="form-back not-visible";
        }
        else
            authForm.className="form-back visible";
    }else{
        let profileBlock = document.getElementById('profile');
        let menu = document.querySelector('.left-menu');
        
        if (profileBlock.className == 'profile not-visible' && menu.className =="left-menu"){
            ShowAccount();
        }
        if ((profileBlock.className == 'profile' && menu.className =="left-menu") || (profileBlock.className == 'profile not-visible' && menu.className =="left-menu not-visible")){
            ShowMenu();
            ShowAccount();
        }
    }
}
for (let back of backgrounds){
    for (let c of containers){
        back.onclick = function(e) {
            if(e.target != c) {
                ShowAuth();
            }
        }
    }
}
for (let c of containers){
    c.onclick = function(e){
        e.stopPropagation();
    }
}

let regbt = document.getElementById('regButton');
let login = document.getElementById('login');
let psw = document.getElementById('password');
let cpsw = document.getElementById('confirmPassword');

regbt.onclick = function(){
    
    if (psw.value == cpsw.value){
        $.ajax({
            type: "POST",
            url: '../php/regNewAccount.php',
            data: {login: login.value, password: psw.value},
            success: function (response) {
                login.value = '';
                psw.value='';
                cpsw.value='';
                location.reload();
            },
        });
    }
}


let logbt = document.getElementById('logButton');
let authlogin = document.getElementById('authlogin');
let authpsw = document.getElementById('authpassword');

logbt.onclick = function(){

    console.log(authlogin.value, authpsw.value);
    $.ajax({
        type: "POST",
        url: '../php/authAccount.php',
        data: {login: authlogin.value, password: authpsw.value},
        success: function (response) {
            if (response=='success'){
                authlogin.value = '';
                authpsw.value = '';
                console.log(getCookie('userID') + getCookie('userlogin'));
                location.reload();
            }else{

            }
        },
    });
}
    
    