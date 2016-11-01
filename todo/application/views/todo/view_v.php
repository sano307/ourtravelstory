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
            <h1>Todo Search</h1>
        </header>
        <table cellspacing="0" cellpadding="0" class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"><?= $views->id; ?> 번 할일</th>
                    <th scope="col">시작일 : <?= $views->created_on; ?></th>
                    <th scope="col">종료일 : <?= $views->due_date; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="3">
                        <?= $views->content; ?>
                    </th>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <a href="/todo/main/lists/" class="btn btn-primary">List</a>
                        <a href="/todo/main/delete/<?= $this->uri->segment(3); ?>" class="btn btn-danger">Delete</a>
                        <a href="/todo/main/modify/<?= $views->id; ?>" class="btn btn-warning">Modify</a>
                    </th>
                </tr>
            </tfoot>
        </table>
    </article>
</div>
</body>
</html>