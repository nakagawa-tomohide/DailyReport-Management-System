// 商品データをモーダルに表示
$(document).on('click', '.editBtn', function () {
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
        $('#reportName').val(data.name);
        $('#reportLocation').val(data.location);
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
    const reportName = $('#reportName').val();
    const reportLocation = $('#reportLocation').val();
    const reportMachine = $('#reportMachine').val();
    const reportFuel = $('#reportFuel').val();


    // データを送信
    $.ajax({
        url: `/reports/${reportId}`,
        type: 'PUT', // 更新はPUTリクエスト
        dataType: 'json',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRFトークン
            name: reportName,
            location: reportLocation,
            machine: reportMachine,
            fuel: reportFuel,
        }
    })
    .done(function() {
        alert('更新が完了しました');
        $('#editModal').modal('hide');

            // Ajaxでリストを再描写
            fetchItemList();
        })
    .fail(function (xhr, status, error) {
        console.log(`Error: ${status}, ${error}`);
        alert('更新に失敗しました');
    });
});

// 商品を削除
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
            tableBody.append(`
                <tr>
                    <td>${report.created_at}</td>
                    <td>${report.name}</td>
                    <td>${report.location}</td>
                    <td>${report.machine}</td>
                    <td>${report.fuel}</td>
                    <td class="edit-btn"><button class="btn btn-info editBtn" data-id="${report.id}">編集</button></td>
                </tr>
            `);
        });
    })
    .fail(function(xhr, status, error) {
        console.log(`Error: ${status}, ${error}`)
        alert('リストの取得に失敗しました');
    })
};
