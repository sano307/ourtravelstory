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
            <h1>Todo Write</h1>
        </header>

        <form class="form-horizontal" method="post" action="" id="write_action">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="input01">내용</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="input01" name="content">
                        <p class="help-block"></p>
                    </div>
                    <label class="control-label" for="input02">시작일</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="input02" name="created_on">
                        <p class="help-block"></p>
                    </div>
                    <label class="control-label" for="input03">종료일</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="input03" name="due_date">
                        <p class="help-block"></p>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="btn btn-primary" id="write_btn" value="작성" />
                    </div>
                </div>
            </fieldset>
        </form>
    </article>
</div>
</body>
</html>