$(function(){
    const calendarEl = $('#calendar')[0];
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "ja",

        // 日付をクリック、または範囲を選択したイベント
        selectable: true,
        select: function(info) {

            // 入力ダイヤログ
            const eventName = prompt("イベントを入力してください");

            // イベント登録処理
            if(eventName) {
                $.ajax({
                    url: "/schedule-add",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        start_date: info.start.valueOf(),
                        end_date: info.end.valueOf(),
                        event_name: eventName,
                    },
                })
                .done(function(response){
                    calendar.addEvent({
                        id: response.id,
                        title: eventName,
                        start: info.start,
                        end: info.end,
                        allDay: true,
                    });
                })
                .fail(function(){
                    alert('登録に失敗しました');
                });
            }
        },

        // イベントクリックで削除
        eventClick: function (info) {
            if (confirm(`イベント「${info.event.title}」を削除しますか？`)) {
                $.ajax({
                    url: "/schedule-delete",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        id: info.event.id,
                    },
                })
                .done(function() {
                    info.event.remove();
                })
                .fail(function(jqXHR) {
                    console.log("エラー詳細:", jqXHR.responseJSON);
                    alert("イベントの取得に失敗しました");
                });
            }
        },

        // イベント取得処理の呼び出し
        events: function (info, successCallback) {
            $.ajax({
                url: "/schedule-get",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    start_date: info.start.valueOf(),
                    end_date: info.end.valueOf(),
                },
            })
            .done(function(response) {
                // FullCalendarにイベントを反映
                successCallback(response);
            })
            .fail(function(jqXHR) {
                console.error("エラー詳細:", jqXHR.responseJSON);
                alert("イベントの取得に失敗しました");
            });
        }
    });
    calendar.render();
});