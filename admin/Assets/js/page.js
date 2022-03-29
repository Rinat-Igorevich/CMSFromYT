let page = {
    ajaxMethod: 'POST',

    add: function () {
        let formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('#formContent').val());

        $.ajax({
            url: '/admin/page/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {

            },
            success: function (result) {
                console.log(result);
            },
            error: function(jqXHR, status, errorThrown) {
                console.log('ОШИБКА AJAX запроса: ' + status, jqXHR);
            }
        });
    },

    update: function () {
        let formData = new FormData();

        formData.append('page_id', $('#formPageId').val());
        formData.append('title', $('#formTitle').val());
        formData.append('content', $('#formContent').val());

        $.ajax({
            url: '/admin/page/update/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {

            },
            success: function (result) {
                console.log(result);
            }
        });
    }
};

console.log(page);