// 商品データをモーダルに表示
$(document).on('click', '.editBtn', function () {
    const itemId = $(this).data('id');

    // 商品データを取得
    $.ajax({
        url: `/items/${itemId}/edit`, //ルートを適宣変更
        type: 'GET',
        dataType: 'json'
    })
    .done(function(data) { // dataにはJSONが入っている
        // モーダルにデータをセット
        $('#itemId').val(data.id);
        $('#itemName').val(data.name);
        $('#itemType').val(data.type);
        $('#itemDetail').val(data.detail);

        $('#editModal').modal('show');
    })
    .fail(function (xhr, status, error) {
        console.log(`Error: ${status}, ${error}`);
        alert('データの取得に失敗しました');
    });
});

// 編集内容を保存
$('#saveChanges').on('click', function() {
    const itemId = $('#itemId').val();
    const itemName = $('#itemName').val();
    const itemType = $('#itemType').val();
    const itemDetail = $('#itemDetail').val();

    // データを送信
    $.ajax({
        url: `/items/${itemId}`,
        type: 'PUT', // 更新はPUTリクエスト
        dataType: 'json',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRFトークン
            name: itemName,
            type: itemType,
            detail: itemDetail
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
    const itemId = $(this).data('id');

    $.ajax ({
        url: `items/${itemId}/delete`,
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
        url: `items/fetchItems`,
        type: 'GET',
        dataType: 'json'
    })
    .done(function(data) {
        let tableBody = $('#itemList tbody');
        tableBody.empty();
        data.forEach(item => {
            tableBody.append(`
                <tr>
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td>${item.type}</td>
                    <td>${item.detail}</td>
                    <td class="edit-btn"><button class="btn btn-info editBtn" data-id="${item.id}">編集</button></td>
                </tr>
            `);
        });
    })
    .fail(function(xhr, status, error) {
        console.log(`Error: ${status}, ${error}`)
        alert('リストの取得に失敗しました');
    })
};
