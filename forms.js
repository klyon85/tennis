function phoneCheck() {
    
        var validFlag = true;
        var given = document.getElementById("phone").value;
        var toFormat = given.toString();
        var stripCharacters = toFormat.replace(/\D/g,''); //this will remove any additional characters the user entered
        if (stripCharacters.length != 10) {
             alert("Phone number must be 10 digits!");
             document.getElementById("phone").value = "";
             validFlag = false;
        }
        
        if(validFlag == true) {
        
        var formattedNumber = "";
        var firstSegment = stripCharacters.slice(0,3);
        var secondSegment = stripCharacters.slice(3,6);
        var thirdSegment = stripCharacters.slice(6,10);
        
        formattedNumber = "(" + firstSegment + ")" + " - " + secondSegment + " - " + thirdSegment;
                
        document.getElementById("phone").value = formattedNumber;
        }
}

function emailCheck() {
    var given2 = document.getElementById("email").value;
    var toFormat2 = given2.toString();
    if (toFormat2.indexOf("@") < 1) {
        alert("Please enter a valid email address!");
        document.getElementById("email").value = "";
        }
}

function passwordCheck() {

    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    
    if(pass1.toString() != pass2.toString()) {
    
        document.getElementById("pass1").value = "";
        document.getElementById("pass2").value = "";
        alert("Passwords did not match! Please try again.");
        
        }
}
