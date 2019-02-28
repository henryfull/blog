var inputPasswordCopy = document.getElementsByName("passwordcopy");

inputPasswordCopy[0].addEventListener("keyup", checkPass);

function checkPass(event) {
    let inputPassword = document.getElementsByName("password")[0];

    console.log(inputPassword.value);
    
    if (event.target.value == inputPassword.value ) {
        document.getElementsByClassName("checkin")[0].style.color = "green";
        document.getElementById("btn-register").removeAttribute("disabled");
        document.getElementById("msg-alert-pass").textContent = "La contraseña coincide";
        document.getElementById("msg-alert-pass").style.backgroundColor = "green";

    }   
    else{
        document.getElementsByClassName("checkin")[0].style.color = "red";
        document.getElementById("msg-alert-pass").textContent = "La contraseña no coincide";
        document.getElementById("msg-alert-pass").style.backgroundColor = "red";
        document.getElementById("btn-register").setAttribute("disabled","");
        
    }

}


function chekUser(event) {

    let longitud = event.target.value.length;
    let content = this.value.slice(0, longitud - 1);
    //    console.log(event.keyCode);

    if (event.keyCode >= 186 && event.keyCode <= 224 || event.keyCode == 16) {
        this.value = content;
    }
    else {

        if (event.target.value.length >= 5) {

            var theObject = new XMLHttpRequest();
            
            theObject.open('POST', '?c=Loginregister&a=comprobarUsername', true);
            theObject.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            theObject.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {

                    var arrayObject = JSON.parse(theObject.responseText);
                    if (arrayObject == true) {
                        document.getElementsByClassName("alert")[0].style.display = "block";
                        event.target.style.outlineColor = "red";
                    }
                    else {
                        document.getElementsByClassName("alert")[0].style.display = "none";
                        event.target.style.outlineColor = "green";
                    }
                }
            }
            theObject.send('username=' + event.target.value + '');
        }
        else {
            document.getElementsByClassName("alert")[0].style.display = "none";

        }
    }
}

