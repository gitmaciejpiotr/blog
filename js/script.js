/*!
* Start Bootstrap - Clean Blog v6.0.8 (https://startbootstrap.com/theme/clean-blog)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-clean-blog/blob/master/LICENSE)
*/
window.addEventListener('DOMContentLoaded', () => {
    let scrollPos = 0;
    const mainNav = document.getElementById('mainNav');
    const headerHeight = mainNav.clientHeight;
    window.addEventListener('scroll', function() {
        const currentTop = document.body.getBoundingClientRect().top * -1;
        if ( currentTop < scrollPos) {
            // Scrolling Up
            if (currentTop > 0 && mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-visible');
            } else {
                console.log(123);
                mainNav.classList.remove('is-visible', 'is-fixed');
            }
        } else {
            // Scrolling Down
            mainNav.classList.remove(['is-visible']);
            if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-fixed');
            }
        }
        scrollPos = currentTop;
    });
})

/**
 * Send links of class "delete" via post after a confirmation dialog
 */
$("a.delete").on("click", function(e) {

    e.preventDefault();

    if (confirm("Are you sure?")) {

        var frm = $("<form>");
        frm.attr('method', 'post');
        frm.attr('action', $(this).attr('href'));
        frm.appendTo("body");
        frm.submit();
    }
});

/**
 * Add a method to validate a date time string
 */
$.validator.addMethod("dateTime", function(value, element) {

    return (value == "") || ! isNaN(Date.parse(value));

}, "Must be a valid date and time");

/**
 * Validate the article form
 */
$("#formArticle").validate({
	rules: {
		title: {
			required: true
		},
		content: {
			required: true
		},
		published_at: {
			dateTime: true
		}
	}
});

/**
 * Handle the publish button for publishing articles
 */
$("button.publish").on("click", function(e) {

    var id = $(this).data('id');
    var button = $(this);

    $.ajax({
        url: '/admin/publish-article.php',
        type: 'POST',
        data: {id: id}
    })
    .done(function(data) {

        button.parent().html(data);

    })
    .fail(function(data) {

        alert("An error occurred");

    });
});

/**
 * Show the date and time picker for the published at field
 */
$('#published_at').datetimepicker({
    format:'Y-m-d H:i:s'
});

/**
 * Validate the contact form
 */
$("#formContact").validate({
	rules: {
		email: {
			required: true,
			email: true
		},
		subject: {
			required: true
		},
		message: {
			required: true
		}
	}
});


