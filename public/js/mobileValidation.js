function isValidNumber(number) {
    return new libphonenumber.parsePhoneNumber(number).isValid()
}

document.addEventListener('DOMContentLoaded', function () {
    var form = document.querySelector('form[id="profiles"]');

    form.addEventListener('submit', function (event) {
        var mobileNumberInput = document.querySelector('#mobile');
        var mobileNumber = mobileNumberInput.value;
        var mobileCode = document.querySelector('.iti__selected-dial-code');
        var number = (mobileCode.textContent).concat(mobileNumber)
        var alertMsgElement = document.getElementById('mobileError');

        alertMsgElement.innerHTML = '';

        if (!isValidNumber(number)) {
            event.preventDefault();
            alertMsgElement.innerHTML = "Invalid mobile number";
        }
    });
});
