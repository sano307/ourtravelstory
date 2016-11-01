<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>CodeIgniter</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" href="/todo/include/css/bootstrap.css" />
</head>
<body>
<div id="main">
    <header id="header" data-role="header" data-position="fixed">
        <blockquote>
            <p>CodeIgniter</p>
            <small>Install Example</small>
        </blockquote>
    </header>

    <nav id="gnb">
        <ul>
            <li><a rel="external" href="/todo/main/lists/">todo Application Program</a></li>
        </ul>
    </nav>

    <article id="board_area">
        <header>
            <h1>Todo Lists</h1>
        </header>
        <table cellpadding="0" cellspacing="0" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">내용</th>
                    <th scope="col">시작일</th>
                    <th scope="col">종료일</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($list as $lt) {
                ?>
                <tr>
                    <th scope="row">
                        <?= $lt->id; ?>
                    </th>
                    <td><a rel="external" href="/todo/main/view/<?= $lt->id; ?>"><?= $lt->content; ?></a></td>
                    <td><time datatime="<?= mdate("%Y-%M-%j", human_to_unix($lt->created_on));?>"><?= $lt->created_on; ?></time></td>
                    <td><time datetime="<?= mdate("%Y-%M-%j", human_to_unix($lt->due_date));?>"><?= $lt->due_date; ?></time></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4"><a href="/todo/index.php/main/write/" class="btn btn-success">Write</a></th>
                </tr>
            </tfoot>
        </table>
    </article>
</div>
</body>
</html>