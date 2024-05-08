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
    if (authForm.className=="form-back visible" || regForm.className=="form-back visible")
    {
        regForm.className="form-back not-visible";
        authForm.className="form-back not-visible";
    }
    else
        authForm.className="form-back visible";
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
    console.log(login.value);
    console.log(psw.value);
    console.log(cpsw.value);
    if (psw.value === cpsw.value){
        jQuery.ajax({
            type: "POST",
            url: './php/regNewAccount.php',
            dataType: 'json',
            data: {login: login.value, password: psw.value},
            success: function (obj, textstatus) {
                        if( !('error' in obj) ) {
                            yourVariable = obj.result;
                        }
                        else {
                            console.log(obj.error);
                        }
                    }
        });
    }
}