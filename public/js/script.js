// 商品データをモーダルに表示
$(document).on('click', '.editBtn', function () {
    const itemId = $(this).data('id');

    // 商品データを取得
    $.ajax({
        url: `/items/${itemId}/edit`, //ルートを適宣変更
        type: 'GET',
        success: function(data) {
            // モーダルにデータをセット
            $('#itemId').val(data.id);
            $('#itemName').val(data.name);
            $('#itemType').val(data.type);
            $('#itemDetail').val(data.detail);

            $('#editModal').modal('show');
        },
        error: function () {
            alert('データの取得に失敗しました')
        }
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
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // CSRFトークン
            name: itemName,
            type: itemType,
            detail: itemDetail
        },
        success: function () {
            alert('更新が完了しました');
            $('#editModal').modal('hide');

            // 必要に応じて一覧を更新
            location.reload(); // またはAjaxでリストを再描写
        },
        error: function () {
            alert('更新に失敗しました');
        }
    });
});