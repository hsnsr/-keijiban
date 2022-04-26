<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">

    <head>
        <title>4eachblog 掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css"> 
        <img src="4eachblog_logo.jpg" class="logo">

        <div class="menu">
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>

    </head>

    <body>
        <?php
            mb_internal_encoding("utf8");
            $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","");
            $stmt=$pdo->query("select * from 4each_keijiban");
        ?>

        <div class="main-contents">
            <div class="left">
                <h1>プログラミングに役立つ掲示板</h1>

                <form action="insert.php" method="post">
                    <h3>入力フォーム</h3>
                    <div>
                        <label>ハンドルネーム</label>
                        <br>
                        <input type="text" name="handlename" size="30" class="text">
                    </div>
                    <div>
                        <label>タイトル</label>
                        <br>
                        <input type="text" name="title" size="30" class="text">
                    </div>
                    <div>
                        <label>コメント</label>
                        <br>
                        <textarea name="comments"  rows="10px" cols="70px" class="text"></textarea>
                    </div>
                    <div>
                        <input type="submit" value="投稿する" class="button">
                    </div>
                </form>

                <?php
                    while($row=$stmt->fetch()){
                        echo "<div class='toukou'>";
                        echo "<h3>".$row['title']."</h3>";
                        echo "<p>".$row['comments']."</p>";
                        echo "<div class='handlename'>posted by.".$row['handlename']."</div>";
                        echo "</div>";
                    }
                ?>

            </div>

            <div class="right">
                <h2>人気の記事</h2>
                <ul>
                    <li>PHPオススメの本</li>
                    <li>PHP MyAdmineの使い方</li>
                    <li>いま人気のエディタTop5</li>
                    <li>HTMLの基礎</li>
                </ul>
                <h2>オススメリンク</h2>
                <ul>
                    <li>インターノウス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>
                <h2>カテゴリ</h2>
                <ul>
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div>
        </div>
    </body>

    <footer>
        <P>copyright©internous|4each blog the which provides A to Z about programing.</p>
    </footer>

</html>