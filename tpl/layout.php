<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<? echo \Page::renderDescription(); ?>">
    <title></title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="carousel.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
</head>
<body>

    <header>
        <? echo \Page::renderMenu(); ?>
    </header>

    <content>
        <? echo \Page::renderContent(); ?>
    </content>

    <footer>
        <div class="container">
            <p class="float-right"><a href="#">Поднятся наверх</a></p>
           <!-- <p>&copy; 2017 Репититор-Онлайн</p> -->
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="sendForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="sendFormPost">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Отправить заявку</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Укажите Ваш Email" name="semail" required>
                            <small id="emailHelp" class="form-text text-muted">Мы ответим вам в письме и поможем</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Вопрос</label>
                            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Напишите вопрос и мы с радостью ответим вам" name="squestion" required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="holder.min.js"></script>
    <script>
        $(document).ready(function() {
            $( "#sendFormPost" ).submit(function( event ) {
                $.ajax({
                    type: "POST",
                    data: $( "#sendFormPost" ).serialize(),
                    success: function(result){
                        console.log(result);
                        if (result.status) {
                            $('#sendFormPost .modal-body').html('Сообщение отправлено! Ожидайте ответа!');
                            $('#sendFormPost .modal-footer').remove();
                        } else {
                            alert(result.message);
                        }
                    },
                    dataType: 'json'
                });
                return false;
            });
        });

    </script>
    <? echo \Page::renderScripts(); ?>

</body>
</html>
