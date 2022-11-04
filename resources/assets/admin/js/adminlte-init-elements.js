$('.select2').select2();

$(function () {
  bsCustomFileInput.init();
});

$('.nav-sidebar a').each(function() {
    let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    let link = this.href;
    if (link === location) {
        $(this).addClass('active');
        $(this).closest('.has-treeview').addClass('menu-open');
    }
})
