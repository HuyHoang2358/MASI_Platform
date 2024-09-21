<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        <li>
            <a href="{{ route('admin.home') }}" class="side-menu {{$page == 'homepage' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Trang chủ
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="side-menu {{$page == 'category' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                <div class="side-menu__title"> Danh mục </div>
            </a>
        </li>

        <li>
            <a href="#" class="side-menu {{$page == 'product' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="package"></i> </div>
                <div class="side-menu__title">
                    Sản phẩm
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.size') }}" class="side-menu {{$page == 'size' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="scissors"></i> </div>
                <div class="side-menu__title">
                    Quản lý kich thước
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.text_editor') }}" class="side-menu {{$page == 'media' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                <div class="side-menu__title"> File Manager </div>
            </a>
        </li>

        <li>
            <a href="#" class="side-menu {{$page == 'post' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Bài viết </div>
            </a>
        </li>

        <li>
            <a href="#" class="side-menu {{$page == 'contact' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="message-square"></i> </div>
                <div class="side-menu__title"> Liên hệ </div>
            </a>
        </li>

        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:" class="side-menu {{$page == 'setting' ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="settings"></i> </div>
                <div class="side-menu__title">
                    Cài đặt
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="#" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="image"></i> </div>
                        <div class="side-menu__title"> Banner quảng cáo</div>
                    </a>
                </li>
                <li>
                    <a href="{{'admin.setting.config.edit'}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="briefcase"></i> </div>
                        <div class="side-menu__title"> Cấu hình hệ thống</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- END: Side Menu -->
