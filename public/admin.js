function admin_menu_laptop() {
    var admin_canvas = document.getElementById('admin_canvas');
    if (admin_canvas.classList.contains('d-canvas-block')) {
        admin_canvas.classList.add('canvas_animate_back')
        admin_canvas.classList.remove('canvas_animate_forward')
        setTimeout(function() {
            admin_canvas.classList.remove('d-canvas-block')
            admin_canvas.classList.add('d-none')
        }, 1000)
        container.classList.remove('px-admin')
        container.classList.add('px-admin-back')
    } else {
        admin_canvas.classList.remove('canvas_animate_back')
        admin_canvas.classList.remove('d-none')
        admin_canvas.classList.add('d-canvas-block')
        admin_canvas.classList.add('canvas_animate_forward')
        container.classList.remove('px-admin-back')
        container.classList.add('px-admin')
    }
};

function admin_menu_tel() {
    var admin_canvas = document.getElementById('admin_canvas');
    if (admin_canvas.classList.contains('d-canvas-none')) {
        admin_canvas.classList.add('canvas_animate_forward')
        admin_canvas.classList.remove('canvas_animate_back')
        admin_canvas.classList.remove('d-canvas-none')
        admin_canvas.classList.add('d-block')
        container.classList.remove('px-admin-tel')
        container.classList.add('container')
        blackout.classList.remove('d-none')
        blackout.classList.remove('blackout-back')
        blackout.classList.add('blackout-forward')
        document.getElementById('admin_body').style = 'overflow-x: hidden; overflow-y: hidden;'
    } else {
        admin_canvas.classList.add('canvas_animate_back')
        setTimeout(function() {
            admin_canvas.classList.remove('d-block')
            admin_canvas.classList.add('d-canvas-none')
            blackout.classList.add('d-none')
        }, 1100)
        admin_canvas.classList.remove('canvas_animate_forward')
        container.classList.remove('container')
        container.classList.add('px-admin-tel')
        blackout.classList.remove('blackout-forward')
        blackout.classList.add('blackout-back')
        document.getElementById('admin_body').style = 'overflow-x: hidden;'

    }
};