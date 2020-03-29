let page = document.querySelector('.page');
let themeButton = document.querySelector('.theme-button');
// page.classList.remove('light-theme');
// page.classList.add('dark-theme');

themeButton.onclick = function() {
    page.classList.toggle('light-theme');
    page.classList.toggle('dark-theme');
};

let message = document.querySelector('.subscription-message');
message.textContent = 'Какой <strong>непонятливый</strong> браузер!';


let form = document.querySelector('.subscription');
let email = document.querySelector('.subscription-email');
form.onsubmit = function(evt) {
    // Инструкция ниже отменяет отправку данных
    evt.preventDefault();
    // message.textContent = 'Форма отправлена!';
    message.textContent = 'Адрес ' + email.value + ' добавлен в список получателей рассылки.';
};