// Event handler binder for site pages

const pageLoaded = {


    'login': function () {

        // Login form
        const form = document.getElementById('login-form')
              form.addEventListener('submit', handleLogin)

        // Forget password
        // ..
    },


    'createPost': function () {

        // Post Type
        const typeButtons = document.querySelectorAll('input[name="type"]')
              typeButtons.forEach(button => button.addEventListener('click', changeNewPostType))

        // Create Post
        const form = document.querySelector('form')
              form.addEventListener('submit', handleCreatePost)
    }

}

function changeNewPostType(e) {

    const buttonsRow = e.target.parentElement.parentElement,
          buttonName = e.target.value
    let newInput = ''


    if(buttonName == 'picture') {
        newInput = $('<input class="comment-input" type="file" name="image" style="display: none;" required>')

    } else if(buttonName == 'text') {
        newInput = $(`<textarea id="text-editor" name="embed" style="height: 11em; display: none;"></textarea>`)

       initializeTextEditor(newInput)
    } else {
        newInput = $(`<textarea name="embed" class="comment-textarea" placeholder="Copy & Paste the <embed> link of your ${buttonName} here" style="height: 11em; display: none;"></textarea>`)
    }

    // Animate and show new input
    $('#new-row').html(newInput)
    newInput.slideDown(700)
}

function handleCreatePost(e) {
    e.preventDefault()

    let formData = new FormData(e.target)

    submitAjaxTo('', formData)
    .done(response => {
        response = JSON.parse(response)

        if(response.success) e.target.reset() // Clear form

        // Show Message
        $('#createPost-message').html(response.message)
    })
}

function handleLogin(e) {
    e.preventDefault()

    let formData = new FormData(e.target)

    submitAjaxTo('', formData)
    .done(response => {
        response = JSON.parse(response)

        if(response === true) window.location.replace('panel') // Redirect to panel

        // Show message
        $('#login-message').html(response)
    })
}

function initializeTextEditor(input) {
    setTimeout(() => {

        input.froalaEditor({
                height: 150
        })
        .on('froalaEditor.image.beforeUpload', () => {
            return false;
        })
    }, 5)
}
function submitAjaxTo(url, data) {
    return $.ajax(url, {
        type: 'POST',
        data: data,
        contentType: false,
        processData: false

    })
}
