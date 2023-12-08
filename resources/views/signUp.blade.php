<div id="id_signUp" class="modal_login_signup">

    <form class="modal_content" action="{{ route('signup') }}" method="post">
        <div class="container_top">
            <span onclick="document.getElementById('id_signUp').style.display='none'" class="close"
                title="Close">&times;</span>
            <p>ĐĂNG KÝ</p>
        </div>

        <div class="container">

            <label for="username"><b>Tên tài khoản</b></label>
            <input type="text" placeholder="Nhập tên tài khoản của bạn" name="username" required>

            <label for="password"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu của bạn" name="password" required>

            <label for="re_password"><b>Nhập lại mật khẩu</b></label>
            <input type="password" placeholder="Nhập lại mật khẩu của bạn" name="re_password" required>

            <button class="button" type="submit" style="width: 100%">Đăng ký</button>

            <p>
                Bạn đã có tài khoản? Hãy <a href="#" onclick="show_modal_login()">đăng nhập</a> !
            </p>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id_signUp').style.display='none'"
                class="button btn_cancel">Cancel</button>
        </div>
    </form>

</div>

<script>
    var modal = document.getElementById('id_signUp');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>
