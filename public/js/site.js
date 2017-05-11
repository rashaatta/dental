/**
 * Created by Rasha on 5/10/2017.
 */

// Jquery function which listens for click events on elements which have a data-delete attribute
$('[data-delete]').click(function (e) {
    e.preventDefault();
    // If the user confirm the delete
    if (confirm('Do you really want to delete the element ?')) {
        // Get the route URL
        var url = $(this).prop('href');
        // Get the token
        var token = $(this).data('delete');
        // Create a form element
        var $form = $('<form/>', {action: url, method: 'get'});
        // Add the DELETE hidden input method
        var $inputMethod = $('<input/>', {type: 'hidden', name: '_method', value: 'get'});
        // Add the token hidden input
        var $inputToken = $('<input/>', {type: 'hidden', name: '_token', value: token});
        // Append the inputs to the form, hide the form, append the form to the <body>, SUBMIT !
        $form.append($inputMethod, $inputToken).hide().appendTo('body').submit();
//                console.log('done!!!!');
    }
});




