<div id="id_login" class="modal_login_signup">

    <form class="modal_content" id="form_login" action="{{ route('login') }}" method="post" >
        <div class="container_top">
            <span onclick="document.getElementById('id_login').style.display='none'" class="close"
                title="Close">&times;</span>
            <p>ĐĂNG NHẬP</p>
        </div>

        <div class="container">
            <label for="username"><b>Tài khoản</b></label>
            <input type="text" placeholder="Nhập tên tài khoản của bạn" name="username" required>

            <label for="password"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu của bạn" name="password" required>

            <button class="button" id="btn_login" type="submit" style="width: 100%">Đăng nhập</button>

            <p>
                Bạn chưa có tài khoản? Hãy <a href="#" onclick="show_modal_signUp()">đăng ký</a> !
            </p>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id_login').style.display='none'"
                class="button btn_cancel">Cancel</button>
        </div>
    </form>

</div>

<script>
    var modal = document.getElementById('id_login');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function show_modal_signUp() {
        var signUp = document.getElementById('id_signUp');
        var login = document.getElementById('id_login');

        signUp.style.display = "block";
        login.style.display = "none";
    }

    function show_modal_login() {
        var signUp = document.getElementById('id_signUp');
        var login = document.getElementById('id_login');

        signUp.style.display = "none";
        login.style.display = "block";
    }

</script>
