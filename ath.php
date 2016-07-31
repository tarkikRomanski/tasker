<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="text-xs-center text-success m-b-2">Регистрация</h1>
            <form id="reg">
                <div class="form-group">
                    <label for="newUserNickname">
                        Ваш логин:
                    </label>
                    <input type="text" id="newUserNickname" class="form-control lim40">
                    <div class="form-control-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="newUserName">
                       Ваше имя:
                    </label>
                    <input type="text" id="newUserName" class="form-control lim40">
                    <div class="form-control-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="newUserPass">
                        Ваш пароль:
                    </label>
                    <input type="password" id="newUserPass" class="form-control">
                    <div class="form-control-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="confirmUserPass">
                        Повторите пароль:
                    </label>
                    <input type="password" id="confirmUserPass" class="form-control">
                    <div class="form-control-feedback"></div>
                </div>
                <button class="btn btn-success btn-block">Зарегистрироватся</button>
            </form>
        </div>
        <div class="col-sm-6">
            <h1 class="text-xs-center text-success m-b-2">Вход</h1>
            <form id="signin">
                <div class="form-group">
                    <label for="userNickname">
                        Ваш логин:
                    </label>
                    <input type="text" id="userNickname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="userPass">
                        Ваш пароль:
                    </label>
                    <input type="password" id="userPass" class="form-control">
                </div>
                <button class="btn btn-success btn-block">Войти</button>
            </form>
        </div>
    </div>
</div>
<script src="js/validation.js"></script>
<script>
    speak('Вам нужно зпрегистрироватся или войти в систему');
</script>