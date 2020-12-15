<!-- これで取得であってるか確認 -->
$Arts = Art::get();

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

     <!-- 現在の本 -->
     @if (count($Arts) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>記事一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($Arts as $Art)
                            <tr>
                                <!-- とりあえず記事のIDが出るか確認用 -->
                                <td class="table-text">
                                    <div>{{ $Art->aid }}</div>
                                </td>

			        <!-- 記事: 登録ボタン -->
                                <td>
                                  <form action=""></form>
                                  <input type="submit" name="" value="登録？ ">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif









</body>
</html>