function navigateForms() {
    document.querySelector('#register-form').style.display = 'none';
    let createBtn = document.querySelector('#create-account-btn');
    createBtn.addEventListener('click', () => {
        document.querySelector('#register-form').style.display = 'block';
        document.querySelector('#login-form').style.display = 'none';
    })
}
navigateForms();