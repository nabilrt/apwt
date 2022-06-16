function showPassword(){
    var x=document.getElementById('passw').value;
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
