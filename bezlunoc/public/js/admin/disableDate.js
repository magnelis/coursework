window.onload = function() {
    let today = new Date();
    let tomorrow = new Date(today.getTime() + (24 * 60 * 60 * 1000));
    let dayTomorrow = tomorrow.toISOString().split('T')[0];
    document.getElementsByName("date")[0].setAttribute('min', dayTomorrow);
}
