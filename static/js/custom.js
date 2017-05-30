// Event handler binder for site pages

const pageLoaded = {


    'login': function () {

        // Handle login
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
    },


    'myDetails': function() {

        // Update details
        const form = document.querySelector('form')
              form.addEventListener('submit', handleUpdateDetails)

        // Initialize image uploader
        const input = document.getElementById('file-0')
        initializeImageReplacer(input)

        // Password field activation
        const passwords = document.querySelectorAll('input[type="password"]')
              passwords.forEach(pwd => pwd.addEventListener('change', handleActivatePassword))
    },


    'myContacts': function () {

        // Add social fields
        const addButton = document.querySelector('button.btn-golden')
              addButton.addEventListener('click', addNewSocials)

        setInterval(() => {
            // Set social fields
            const socials = document.querySelectorAll('select')
                  socials.forEach(selector => selector.addEventListener('change', setSocials))

            // Remove social fields
            const removeButtons = document.querySelectorAll('.btn-danger')
                  removeButtons.forEach(button => button.addEventListener('click', removeSocials))
        },100)

        // Update social medias
        const form = document.querySelector('form')
              form.addEventListener('submit', handleUpdateSocials)
    }

}

function addNewSocials(e) {

    const socialsEntry = $('#socialTemplate').html(),
          numOfFields = document.querySelectorAll('select').length,
          numOfSocials = document.querySelector('select').querySelectorAll('option').length - 1

    if(numOfFields < numOfSocials)
        $(socialsEntry).insertAfter('.row:last')
    else
        e.target.setAttribute('disabled', '') // Prevent from adding too much socials
}

function removeSocials(e) {
    e.preventDefault()

    const row = e.target.parentElement.parentElement.parentElement
    $(row).remove()
}

function setSocials(e) {

    let social = e.target.options[e.target.options.selectedIndex].label,
        input = e.target.parentElement.parentElement.querySelector('input')

    input.setAttribute('placeholder', `${social} username`)
    input.setAttribute('name', `${social.toLowerCase()}-handle`)
}

function handleActivatePassword(e) {
    let pwds = document.querySelectorAll('input[type="password"]')

    if(pwds[0].value.length > 0 || pwds[1].value.length > 0) {
        // Activate password fields
        pwds.forEach(input => input.setAttribute('required', ''))
    } else {
        // Disable them
         pwds.forEach(input => input.removeAttribute('required'))
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

function handleUpdateDetails(e) {
    e.preventDefault()

    let formData = new FormData(e.target)

    submitAjaxTo('', formData)
    .done(response => {
        console.log(response)
       response = JSON.parse(response)

        // Show message
        $('#details-message').html(response)
    })
}

function handleUpdateSocials(e) {
    e.preventDefault()

    const socialSites = Array.from(e.target.querySelectorAll('select')).map((select) => select.value)

    // Match social medias to handles
    let socialMedias, result = {}

    socialSites.forEach(socialMedia => {
        result[socialMedia] = document.querySelector(`input[name="${socialMedia}-handle"]`).value
    })
    socialMedias = JSON.stringify(result)

    let formData = new FormData(e.target)
        formData.append('value', socialMedias)

    submitAjaxTo('', formData)
    .done(response => {
        response = JSON.parse(response)

        // Show message
        $('#socials-message').html(response)
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
