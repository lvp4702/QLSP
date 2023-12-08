<header id="header">
    <div class="header_wrapper">
        <a href="#" class="header_logo">
            QLSP
        </a>
        <div class="header_login_btn">
            @if (request()->is('/'))
                <button onclick="document.getElementById('id_login').style.display='block'" class="button ">
                    ĐĂNG NHẬP
                </button>
            @else
                <button class="button" id="btn-logout" onclick="window.location.href = '/'">
                    ĐĂNG XUẤT
                </button>
            @endif
        </div>
    </div>
</header>
