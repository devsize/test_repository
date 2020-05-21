let timestamp = $.cookie('test_cookie');

if (timestamp !== undefined) {
  let allowedTime = 60;
  let text = $('.cookies').css('color', 'white').text();

  setInterval(() => {
    let currentTime = Math.floor(Date.now() / 1000);
    let timeToLogout = allowedTime - (currentTime - timestamp);
    if (timeToLogout <= 0) {
      clearInterval();
      // window.location.href = '/'
      // $('.nav').lastChild().trigger('click');
      $('.cookies').remove();
    }

    let newText = `${text} You will be logout after : ${timeToLogout}`;
    $('.cookies').text(newText);
  }, 1000);
}
