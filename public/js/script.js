// 商品データをモーダルに表示
$(document).on('click', '.editBtn', function () {
    $('#editModal .error-message').text('');
    const reportId = $(this).data('id');

    // 商品データを取得
    $.ajax({
        url: `/reports/${reportId}/edit`, //ルートを適宣変更
        type: 'GET',
        dataType: 'json'
    })
    .done(function(data) { // dataにはJSONが入っている
        // モーダルにデータをセット
        $('#reportId').val(data.id);
        $('#reportDate').val(data.date);
        $('#reportName').val(data.name);
        $('#reportLocation').val(data.location);
        $('#reportWorkDescription').val(data.workDescription);
        $('#reportMachine').val(data.machine);
        $('#reportFuel').val(data.fuel);

        $('#editModal').modal('show');
    })
    .fail(function (xhr, status, error) {
        console.log(`Error: ${status}, ${error}`);
        alert('データの取得に失敗しました');
    });
});

// 編集内容を保存
$('#saveChanges').on('click', function() {
    const reportId = $('#reportId').val();
    const reportDate = $('#reportDate').val();
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
    .fail(function (xhr, status, error) {
        console.log(`Error: ${status}, ${error}, ${xhr.responseText}`);

        if (xhr.status === 422) {
            // バリデーションエラーの場合
            const errors = JSON.parse(xhr.responseText).errors;
            // エラー表示用の関数を呼び出し
            displayValidationErrors(errors);
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
    .fail(function(xhr, status, error){
        console.log(`Error: ${status}, ${error}`);
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
    .fail(function(xhr, status, error) {
        console.log(`Error: ${status}, ${error}`)
        alert('リストの取得に失敗しました');
    })
};

function displayValidationErrors(errors) {
    // モーダル内の既存のエラーメッセージをクリア
    $('#editModal .error-message').text('');

    // 各フィールドに対応するエラーメッセージを表示
    for (const field in errors) {
        const fieldErrors = errors[field]; // エラーメッセージの配列
        const errorElement = $(`#error-${field}`); // フィールドに対応するエラー要素

        if (errorElement.length > 0) {
            errorElement.text(fieldErrors.join(', ')); // エラーメッセージを表示
        }
    }
}
