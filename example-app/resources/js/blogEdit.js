$(document).on("click", ".edit-button", function () {
    const postId = parseInt($(this).attr('id').slice(5));

    const blogPost = $(`#blog-${postId}`);
    const topic = blogPost.find('.blog-topic').text();
    const author = blogPost.find('.blog-author').text().slice(3);
    const body = blogPost.find('.blog-body').text();

    if ($('#fullscreen-overlay').length !== 0) {
        return;
    }
    $('body').prepend(`
            <div id='fullscreen-overlay'>
                    <div class='pop-up'>
                    Редактирование записи блога
                        <div class="blog-edit-form">
                            <label id="author-label" for="author">
                                <span class="label-text">Автор сообщения</span>
                                <input id="author-edit" name="author" type="text" placeholder="Введите ФИО автора" value="${author}" required />
                            </label>
                            <label id="topic-edit-label" for="topic">
                                <span class="label-text">Тема сообщения</span>
                                <input id="topic-edit" name="topic" type="text" placeholder="Введите тему сообщения" value="${topic}" required />
                            </label>
                            <label>
                                <span class="label-text">Текст сообщения</span>
                                <textarea id="body-edit" name="body" required>${body}</textarea>
                            </label>
                            <div class="bottom-buttons">
                                <button id='yes-popup'>Сохранить изменения</button>
                                <button id='no-popup' class="back-button">Вернуться назад</button>
                            </div>
                        </div>
                    </div>
            </div>
    `);

    $('#yes-popup').on('click', () => submit(postId));
    $('#no-popup').on('click', () => $("#fullscreen-overlay").remove())
});

const submit = (postId) => {
    const requestBody = {
        topic: $('#topic-edit').val(),
        author: $('#author-edit').val(),
        body: $('#body-edit').val()
    }

    const iframe = $('<iframe>', {
        style: 'display: none;',
        name: 'hiddenIframe'
    }).appendTo('body');

    const form = $('<form>', {
        action: `/admin/blog/${postId}`,
        method: 'POST',
        enctype: 'application/json',
        target: 'hiddenIframe'
    }).appendTo('body');

    $('<input>', {
        type: 'hidden',
        name: '_method',
        value: 'PUT'
    }).appendTo(form);

    $('<input>', {
        type: 'hidden',
        name: '_token',
        value: $('meta[name="_token"]').attr('content')
    }).appendTo(form);

    $('<input>', {
        type: 'hidden',
        name: 'data',
        value: JSON.stringify(requestBody)
    }).appendTo(form);

    form.appendTo(iframe);

    form.submit();

    $('#fullscreen-overlay').remove();

    const blogPost = $(`#blog-${postId}`);
    blogPost.find('.blog-topic').text(requestBody.topic);
    blogPost.find('.blog-author').text('By '+requestBody.author);
    blogPost.find('.blog-body').text(requestBody.body);
};
