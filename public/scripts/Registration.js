
// currently copy pasted from old work; revise accordingly based on new code

lucide.createIcons();

const submit = document.getElementById('submit');
const clear = document.getElementById('clear');
inputArray = document.getElementsByTagName("input");
const req1 = document.getElementsByClassName("req1");
const req2 = document.getElementsByClassName("req2");
const req3 = document.getElementsByClassName("req3");

const openForm = item => {
    if (document.getElementById(item.id).style.display == "none" || document.getElementById(item.id).style.display == "") {
        document.getElementById(item.id).style.display = "flex";

    } else {
        document.getElementById(item.id).style.display = "none";

    }
}

const clearReq = () => {
    for (var index = 0; index < req1.length; index++) {
        req1[index].style.color = "var(--black)";
    }
    req1[1].className = "fa-solid fa-circle-exclamation req1"
    for (var index = 0; index < req2.length; index++) {
        req2[index].style.color = "var(--black)";
    }
    req2[1].className = "fa-solid fa-circle-exclamation req2"
    for (var index = 0; index < req3.length; index++) {
        req3[index].style.color = "var(--black)";
    }
    req3[1].className = "fa-solid fa-circle-exclamation req3"
}

const passReq2 = /^(?=.*[A-Z])(?=.*[a-z])/;
const passReq3 = /^(?=.*[!@#$%^&*])/;

const checkPass = () => {
    const password = document.getElementById("password");
    if (password.value != null && password.value.length >= 8) {
        for (var index = 0; index < req1.length; index++)
            req1[index].style.color = "green";
        if (req1[1].className == "fa-solid fa-circle-exclamation req1" || req1[1].className == "fa-solid fa-xmark req1") {
            req1[1].className = "fa-solid fa-check req1"
        }
    } else if (password.value.length != 0 && password.value.length < 8) {
        for (var index = 0; index < req1.length; index++)
            req1[index].style.color = "red";
        if (req1[1].className == "fa-solid fa-circle-exclamation req1" || req1[1].className == "fa-solid fa-check req1") {
            req1[1].className = "fa-solid fa-xmark req1"
        }
    } else if (password.value.length == 0) {
        for (var index = 0; index < req1.length; index++)
            req1[index].style.color = "var(--black)";
        req1[1].className = "fa-solid fa-circle-exclamation req1";
        for (var index = 0; index < req2.length; index++)
            req2[index].style.color = "var(--black)";
        req2[1].className = "fa-solid fa-circle-exclamation req2";
        for (var index = 0; index < req3.length; index++)
            req3[index].style.color = "var(--black)";
        req3[1].className = "fa-solid fa-circle-exclamation req3";
    }

    // password requirement 2
    if (password.value.match(passReq2)) {
        for (var index = 0; index < req2.length; index++)
            req2[index].style.color = "green";
        if (req2[1].className == "fa-solid fa-circle-exclamation req2" || req2[1].className == "fa-solid fa-xmark req2") {
            req2[1].className = "fa-solid fa-check req2"
        }
    } else if (!password.value.match(passReq2) && password.value.length > 0) {
        for (var index = 0; index < req2.length; index++)
            req2[index].style.color = "red";
        if (req2[1].className == "fa-solid fa-circle-exclamation req2" || req2[1].className == "fa-solid fa-check req2") {
            req2[1].className = "fa-solid fa-xmark req2"
        }
    }

    // pass req 3
    if (password.value.match(passReq3)) {
        for (var index = 0; index < req3.length; index++)
            req3[index].style.color = "green";
        if (req3[1].className == "fa-solid fa-circle-exclamation req3" || req3[1].className == "fa-solid fa-xmark req3") {
            req3[1].className = "fa-solid fa-check req3"
        }
    } else if (!password.value.match(passReq3) && password.value.length > 0) {
        for (var index = 0; index < req2.length; index++)
            req3[index].style.color = "red";
        if (req3[1].className == "fa-solid fa-circle-exclamation req3" || req3[1].className == "fa-solid fa-check req3") {
            req3[1].className = "fa-solid fa-xmark req3"
        }
    }
}

const checkConfirm = () => {
    const password = document.getElementById("password");
    const cpass = document.getElementById('cpass');

    if (password.value != cpass.value && cpass.value.length != 0) {
        document.getElementById("errorPass").style.display = "block";
    } else if (password.value == cpass.value || cpass.value.length == 0) {
        document.getElementById("errorPass").style.display = "none";
    }
}

const isNumber = evt => {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function toggle(input, icon) {
    var pass = document.getElementById(input.id);
    var eye = document.getElementById(icon.id);
    if (pass.type == "password") {
        pass.type = "text";
        eye.className = "fa-solid fa-eye-slash";
    } else {
        pass.type = "password";
        eye.className = "fa-solid fa-eye";
    }
}

function checkReq(id) {
    const password = document.getElementById('password');
    const submitReg = document.getElementById('regSub');
    const cpass = document.getElementById('cpass');
    if (password.value.length >= 8 && password.value.match(passReq2) && password.value.match(passReq3) && password.value == cpass.value) {
        openForm(id);
    } else {
        alert("Invalid Password!");
    }
}


function toggleSide() {
    let sidenav = document.getElementById('sidenav');

    sidenav.classList.toggle('hidden');
    sidenav.classList.toggle('flex');
}

function validate_password() {
    let pass = document.getElementById('pass').value;
    let confirm_pass = document.getElementById('conpass').value;
    var paswnum = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;
    var paswsym = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (confirm_pass == "") {
        document.getElementById('error_msg').style.color = 'green';
        document.getElementById('error_msg').innerHTML =
            '';
        document.getElementById('create').disabled = false;
        document.getElementById('create').style.opacity = (1);
    }
    else if (pass != confirm_pass) {
        document.getElementById('error_msg').style.color = 'red';
        document.getElementById('error_msg').innerHTML
            = 'Password and Confirm Password do not match';
        document.getElementById('create').disabled = true;
        document.getElementById('create').style.opacity = (0.4);
    }
    else if (pass.match(paswnum) || pass.match(paswsym) && confirm_pass.match(paswnum) || confirm_pass.match(paswsym)) {
        document.getElementById('error_msg').style.color = 'green';
        document.getElementById('error_msg').innerHTML =
            '';
        document.getElementById('create').disabled = false;
        document.getElementById('create').style.opacity = (1);
    }
    else {
        document.getElementById('error_msg').style.color = 'red';
        document.getElementById('error_msg').innerHTML
            = 'Password must contain at least 8 characters, a combination of uppercase and lowercase letters, and at least one or more number or special character';
        document.getElementById('create').disabled = true;
        document.getElementById('create').style.opacity = (0.4);
    }
}