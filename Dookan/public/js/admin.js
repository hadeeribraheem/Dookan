
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.querySelector('.toggle-sidebar-btn');
    const navmargin = document.querySelector('.header-nav');
    const body = document.getElementsByTagName('body')[0]; // Access the first element

    if (window.innerWidth <= 912) {
        body.classList.add('sidebar-hidden');
        navmargin.classList.remove('ms-auto');
    } else {
        body.classList.remove('sidebar-hidden');
        navmargin.classList.add('ms-auto');
    }

    toggleButton.addEventListener('click', function() {
        body.classList.toggle('sidebar-hidden');
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth <= 912) {
            if (!body.classList.contains('sidebar-hidden')) {
                body.classList.add('sidebar-hidden');
            }
            navmargin.classList.remove('ms-auto');
        } else {
            if (body.classList.contains('sidebar-hidden')) {
                body.classList.remove('sidebar-hidden');
            }
            navmargin.classList.add('ms-auto');
        }
    });
});


/*function confirmDelete(form) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit(); // Submits the form if the user confirms
        }
    });*/

/*document.addEventListener('scroll', function () {
    const backToTopBtn = document.getElementById('back-to-top');
    if (window.scrollY > 100) {
        backToTopBtn.classList.add('active');
    } else {
        backToTopBtn.classList.remove('active');
    }
});

document.getElementById('back-to-top').addEventListener('click', function (e) {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});*/




