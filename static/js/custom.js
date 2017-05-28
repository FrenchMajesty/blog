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
    },


    'editPost': function () {

        // Image uploader
        const input = document.getElementById('file-0')
        if(input) initializeImageReplacer(input)

        // Text replacer
        const htmlEditor = document.getElementById('html-editor')
        if(htmlEditor) initializeTextEditor($(htmlEditor))

        // Update post
        const form = document.querySelector('form')
              form.addEventListener('submit', handleUpdatePost)

    },


    'feedManager': function () {

        // Delete publication
        const deleteButtons = document.querySelectorAll('.fa-trash-o')
              deleteButtons.forEach(button => button.parentNode.addEventListener('click', handleDeletePost))
    },


    'galleryManager': function () {

        // Delete gallery publication
        const deleteButtons = document.querySelectorAll('.fa-trash-o')
              deleteButtons.forEach(button => button.parentNode.addEventListener('click', handleDeletePost))
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

function handleUpdatePost(e) {
    e.preventDefault()

    let formData = new FormData(e.target)

    submitAjaxTo('', formData)
    .done(response => {
        response = JSON.parse(response)

        // Show message
        $('#edit-message').html(response)
    })
}

function handleDeletePost(e) {
    const id = e.target.parentElement.getAttribute('data-id'),
          token = document.getElementById('delete-token').value

    if(confirm('Are you sure you want to delete this publication? This operation cannot be reverted.')) {

        let formData = new FormData()
            formData.append('id', id)
            formData.append('token', token)

        submitAjaxTo('/blog/panel/feed/delete', formData)
        .done(response => {
            response = JSON.parse(response)

            if(response === true) $(`[data-item=${id}]`).hide() // Remove post form list
        })
    }
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

function initializeImageReplacer(input) {

    const size = input.getAttribute('data-image-size'),
          url = input.getAttribute('data-image')

    let image = new Image()
        image.src = url

    image.onload = () => {

        $(input).fileinput({
            allowedFileExtensions: ['jpg', 'png', 'jpeg', 'gif'],
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: true,
            initialPreviewAsData: true,
            initialPreview: [
                url
            ],
            initialPreviewConfig: [
                {caption: "imagename.jpg", size: size, width: `${image.width}px`, url: "{$url}", key: 1}
            ]
        })
    }
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
