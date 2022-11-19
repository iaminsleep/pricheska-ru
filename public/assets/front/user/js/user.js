document.addEventListener('DOMContentLoaded', function() {
    var cbs = document.querySelectorAll('[type="checkbox"]');

    function checkboxChange(event) {
        const checkbox = event.target;
        var instate=(checkbox.checked);
        for (var i = 0; i < cbs.length; i++) {
            cbs[i].checked = false;
        }
        if(instate)checkbox.checked = true;
    }

    [].forEach.call(cbs, function (cb) {
        cb.addEventListener("click", checkboxChange);
    });
});
