
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: 'body'
});

$('.edit-silo__block-form #name').keyup(function(e) {
    // Do something

});

$('.edit-silo__block-form #number').keyup(function(e) {
    // Do something
    console.log('Number has changed');
});

$('.edit-silo__block-form #type').keyup(function(e) {
    // Keyup does not work

});

$('.edit-silo__block-form #volume').keyup(function(e) {
    // Do something
    var amount = parseInt(e.target.value);

    var silo__top = $('.silo__image__top');
    var silo__middle = $('.silo__image__middle');
    var silo__bottom = $('.silo__image__bottom');

    silo__top.removeClass();
    silo__middle.removeClass();
    silo__bottom.removeClass();

    $('.silo__percentage').html(amount + '%');
    if(amount >= 90) {
        silo__top.addClass('silo__image__top').addClass('full');
        silo__middle.addClass('silo__image__middle').addClass('full');
        silo__bottom.addClass('silo__image__bottom').addClass('full');
    } else if(amount >= 50) {
        silo__top.addClass('silo__image__top').addClass('default');
        silo__middle.addClass('silo__image__middle').addClass('medium');
        silo__bottom.addClass('silo__image__bottom').addClass('medium');
    } else {
        silo__top.addClass('silo__image__top').addClass('default');
        silo__middle.addClass('silo__image__middle').addClass('default');
        silo__bottom.addClass('silo__image__bottom').addClass('empty');
    }
});