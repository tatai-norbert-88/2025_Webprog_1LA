function validateForm() {
    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let message = document.getElementById('message').value.trim();

    if (name === '' || email === '' || message === '') {
        alert('Minden mező kitöltése kötelező!');
        return false;
    }

    // Egyszerű email ellenőrzés
    if (!email.includes('@')) {
        alert('Érvénytelen email cím!');
        return false;
    }

    return true;
}