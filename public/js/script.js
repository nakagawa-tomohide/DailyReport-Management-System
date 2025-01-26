// 登録モーダルを表示
$(document).on('click', '.addBtn', function() {
    $('#addModal .error-message').text('');
    $('#addModal').modal('show');
});

// モーダルが閉じられたときにフォーカスを外す
$(document).on('hidden.bs.modal', function() {
    if ($(document.activeElement).length) {
        $(document.addElement).get(0)?.blur;
    }
});

// 日報を登録
$('#add').on('click', function() {
    const reportDate = $('#addReportDate').val();
    const reportStartTime = $('#addReportStartTime').val();
    const reportEndTime = $('#addReportEndTime').val();
    const reportName = $('#addReportName').val();
    const reportLocation = $('#addReportLocation').val();
    const reportWorkDescription = $('#addReportWorkDescription').val();
    const reportMachine = $('#addReportMachine').val();
    const reportFuel = $('#addReportFuel').val();

    $.ajax ({
        url: '/reports/add',
        type: 'POST',
        dataType: 'json',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            date: reportDate,
            start_time: reportStartTime,
            end_time: reportEndTime,
            name: reportName,
            location: reportLocation,
            workDescription: reportWorkDescription,
            machine: reportMachine,
            fuel: reportFuel,
        }
    })
    .done(function() {
        $('#addModal').modal('hide');

        fetchItemList();
    })
    .fail(function(xhr) {

        if (xhr.status === 422) {
            // バリデーションエラーの場合
            const errors = JSON.parse(xhr.responseText).errors;
            displayValidationErrors('#addModal', errors);
        } else {
            alert('登録に失敗しました');
            $('#editModal').modal('hide');
        }
    })
})

// 日報データをモーダルに表示
$(document).on('click', '.editBtn', function () {
    $('#editModal .error-message').text('');
    const reportId = $(this).data('id');

    // 日報データを取得
    $.ajax({
        url: `/reports/${reportId}/edit`, //ルートを適宣変更
        type: 'GET',
        dataType: 'json'
    })
    .done(function(data) { // dataにはJSONが入っている
        // モーダルにデータをセット
        $('#reportId').val(data.id);
        $('#reportDate').val(data.date);
        $('#reportStartTime').val(data.start_time);
        $('#reportEndTime').val(data.end_time);
        $('#reportName').val(data.name);
        $('#reportLocation').val(data.location);
        $('#reportWorkDescription').val(data.workDescription);
        $('#reportMachine').val(data.machine);
        $('#reportFuel').val(data.fuel);

        $('#editModal').modal('show');
    })
    .fail(function () {
        alert('データの取得に失敗しました');
    });
});

// モーダルが閉じられたときにフォーカスを外す
$(document).on('hidden.bs.modal', function() {
    if ($(document.activeElement).length) {
        $(document.addElement).get(0)?.blur;
    }
});

// 編集内容を保存
$('#saveChanges').on('click', function() {
    const reportId = $('#reportId').val();
    const reportDate = $('#reportDate').val();
    const reportStartTime = $('#reportStartTime').val();
    const reportEndTime = $('#reportEndTime').val();
    const reportName = $('#reportName').val();
    const reportLocation = $('#reportLocation').val();
    const reportWorkDescription = $('#reportWorkDescription').val();
    const reportMachine = $('#reportMachine').val();
    const reportFuel = $('#reportFuel').val();


    // データを送信
    $.ajax({
        url: `/reports/${reportId}`,
        type: 'PUT', // 更新はPUTリクエスト
        dataType: 'json',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRFトークン
            date: reportDate,
            start_time: reportStartTime,
            end_time: reportEndTime,
            name: reportName,
            location: reportLocation,
            workDescription: reportWorkDescription,
            machine: reportMachine,
            fuel: reportFuel,
        }
    })
    .done(function() {
        $('#editModal').modal('hide');
            // Ajaxでリストを再描写
            fetchItemList();
        })
    .fail(function (xhr) {

        if (xhr.status === 422) {
            // バリデーションエラーの場合
            const errors = JSON.parse(xhr.responseText).errors;
            // エラー表示用の関数を呼び出し
            displayValidationErrors('#editModal', errors);
        } else {
            alert('更新に失敗しました');
            $('#editModal').modal('hide');
        }
    });
});

// 日報を削除
$(document).on('click', '.deleteBtn', function(){
    const reportId = $(this).data('id');

    $.ajax ({
        url: `reports/${reportId}/delete`,
        type: 'GET',
        dataType: 'json',
    })
    .done(function(){
        alert('削除が完了しました');

        fetchItemList();
    })
    .fail(function(){
        alert('削除に失敗しました');
    });
});

// Ajaxでリストを再描写する
function fetchItemList() {
    $.ajax({
        url: `reports/fetchReports`,
        type: 'GET',
        dataType: 'json'
    })
    .done(function(data) {
        let tableBody = $('#reportList tbody');
        tableBody.empty();
        data.forEach(report => {

            let editDeleteBtns = '';
            if (report.canEdit) {
                editDeleteBtns = `
                    <button class="btn btn-info editBtn" data-id="${report.id}">編集</button>
                    <button class="btn btn-danger deleteBtn" data-id="${report.id}">削除</button>
                `;
            }
            tableBody.append(`
                <tr>
                    <td>${report.date}</td>
                    <td>${report.startTime}</td>
                    <td>${report.endTime}</td>
                    <td>${report.name}</td>
                    <td>${report.location}</td>
                    <td>${report.workDescription}</td>
                    <td>${report.machine}</td>
                    <td>${report.fuel}</td>
                    <td class="edit-delete-btn">
                        ${editDeleteBtns}
                    </td>
                </tr>
            `);
        });
    })
    .fail(function() {
        alert('リストの取得に失敗しました');
    })
};

// モーダルにエラーメッセージを表示
function displayValidationErrors(modalSelector, errors) {
    // モーダル内の既存のエラーメッセージをクリア
    $(`${modalSelector} .error-message`).text('');

    // 各フィールドに対応するエラーメッセージを表示
    for (const field in errors) {
        const fieldErrors = errors[field]; // エラーメッセージの配列
        const errorElement = $(`${modalSelector} #error-${field}`); // フィールドに対応するエラー要素

        if (errorElement.length > 0) {
            errorElement.text(fieldErrors.join(', ')); // エラーメッセージを表示
        }
    }
}
