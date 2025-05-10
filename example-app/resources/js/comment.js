$(document).on("click", ".add-comment-btn", function () {
    const postId = parseInt($(this).attr('id').slice(9));
    if ($('#fullscreen-overlay').length !== 0) {
        return;
    }
    $('body').prepend(`
            <div id='fullscreen-overlay'>
                    <div class='pop-up'>
                        Введите комментарий
                        <textarea id="body"></textarea>
                        <div class="bottom-buttons">
                            <button id='yes-popup'>Отправить комментарий</button>
                            <button id='no-popup' class="back-button">Вернуться назад</button>
                        </div>
                    </div>
            </div>
    `);

    $('#yes-popup').on('click', () => submitComment(postId));
    $('#no-popup').on('click', () => $("#fullscreen-overlay").remove())
});

const submitComment = async (postId) => {
    const body = $('#body').val();

    if (!body) {
        alert("Введите текст комментария!");
        return;
    }

    console.log(postId, body);
    const res = await fetch(`http://${window.location.host}/blog/${postId}/comment`,
        {
            method: "POST",
            headers: {
                'Content-Type': 'text/html',
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            body: body
        }
    ).catch(err => alert(err.toString()));

    if (!res.ok) {
        alert("Network error");
        return;
    }

    alert("Комментарий был добавлен");

    $('#fullscreen-overlay').remove();

    const commentsContainer = $(`#post-comments-${postId}`);
    commentsContainer.empty();

    let newComments;

    await fetch(`http://${window.location.host}/api/blog/${postId}/comments`)
        .then(res => res.json())
        .then(json => newComments = json.data)
        .catch(err => alert(err.toString()))

    commentsContainer.append(newComments);
}
