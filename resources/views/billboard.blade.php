<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>公布欄</title>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<h1 style="text-align: center;">
    公告欄
</h1>

<table border='1' align='center' class="billboardList">
</table>


<div class="addBillboard">
    <h2>新增公布欄</h2>
    <div class="form-group">
        <label for="title">標題</label>
        <input type="text" class="title" />
    </div>
    <div class="form-group">
        <label for="body">內容</label>
        <input type="text" class="body" />
    </div>
    <div class="form-group">
        <label for="announcer">公布者</label>
        <input type="text" class="announcer" />
    </div>
    <div class="row">
        <div class="col-sm-6">
            <button type="button" class="add">新增</button>
        </div>
    </div>
</div>

</body>
</html>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>
<script>
    jQuery(document).ready(function(){
        jQuery.ajax({
            url: "{{ url('api/v1/billboard') }}",
            method: 'get',
            success: function(result){
                createDomElement(result.data)
            }
        });
    });

    function createDomElement(charge) {
        var baseElements =
            '<tr>' +
            '<th>標題</th>' +
            '<th>內容</th>' +
            '<th>公布者</th>' +
            '<th>操作</th>' +
            '</tr>';
        $('.billboardList').append(baseElements);

        const domElements = charge.map( place => {
            return `
    <tr class="data" data-id="${ place.id }">
        <td class="title">${ place.title }</td>
        <td class="body">${ place.body }</td>
        <td class="announcer">${ place.announcer }</td>
        <td><span class="del">刪除</span><br><span class="update">更新</span></td>
    </tr>
  `;
        }).join("");

        $('.billboardList').append(domElements);
    }

    $('.billboardList').on('click', '.update', function(){
        var fullMsg = $(this).closest('.data');
        var ID = fullMsg.data('id');
        var title = fullMsg.find('.title').text();
        var body = fullMsg.find('.body').text();
        var announcer = fullMsg.find('.announcer').text();
        var updateTemplate =
            '<td><input type="text" class="title" value="'+ title +'"></td>' +
            '<td><input type="text" class="body" value="'+ body +'"></td>' +
            '<td><input type="text" class="announcer" value="'+ announcer +'"></td>' +
            '<td><span class="submit">送出</span><br><span class="cancel">取消</span></td>';
        fullMsg.html(updateTemplate);

        $(".submit").on('click', function(){
            title = fullMsg.find('.title').val();
            body = fullMsg.find('.body').val();
            announcer = fullMsg.find('.announcer').val();
            $.ajax({
                url: "{{ url('api/v1/billboard') }}/" + ID,
                type: 'PUT',
                data: {
                    "title": title,
                    "body": body,
                    "announcer": announcer
                },
                success: function(e) {
                    var successTemplate =
                        '<td class="title">'+ title +'</td>' +
                        '<td class="body">'+ body +'</td>' +
                        '<td class="announcer">'+ announcer +'</td>' +
                        '<td><span class="del">刪除</span><br><span class="update">更新</span></td>';
                    fullMsg.html(successTemplate);
                }
            })
        });

        $(".cancel").on('click', function(){
            var originTemplate =
                '<td class="title">'+ title +'</td>' +
                '<td class="body">'+ body +'</td>' +
                '<td class="announcer">'+ announcer +'</td>' +
                '<td><span class="del">刪除</span><br><span class="update">更新</span></td>';
            fullMsg.html(originTemplate);
        })
    });

    $(".billboardList").on('click', '.del', function(){
        var fullMsg = $(this).closest('.data');
        var ID = fullMsg.data('id');
        $.ajax({
            url: "{{ url('api/v1/billboard') }}/" + ID,
            type: 'DELETE',
            error: function() {
                console.log('error');
            },
            success: function(e){
                fullMsg.html('');
            }
        });
    })

    $(".addBillboard").on('click', '.add', function(){
        var fullMsg = $(this).closest('.addBillboard');
        var title = fullMsg.find('.title').val();
        var body = fullMsg.find('.body').val();
        var announcer = fullMsg.find('.announcer').val();

        $.ajax({
            url: "{{ url('api/v1/billboard') }}",
            type: 'POST',
            data: {
                "title": title,
                "body": body,
                "announcer": announcer
            },
            success: function(e) {
                $('.billboardList').html('');
                jQuery.ajax({
                    url: "{{ url('api/v1/billboard') }}",
                    method: 'get',
                    success: function(result){
                        createDomElement(result.data)
                    }
                });
            }
        })
    });
</script>