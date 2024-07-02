<nav class=" nav_menu_mobile animate__animated animate__fadeInLeft">
    <ul>
      @if (Auth::check())
      <li>
         <span class="btn">
            <a href="/trangcanhan" class="text-white">
               <i class="fas fa-user mr-2"></i>{!! Auth::user()->name !!}
            </a>
         </span>
      </li>
      @else
      <li>
         <span class="btn">
            <a href="" class="text-white">
               <i class="fas fa-user mr-2"></i> ĐĂNG NHẬP
            </a>
         </span>
      </li>
      @endif
      <li><a href="#">Trang chủ</a></li>
      <li><a href="#">Giới thiệu</a></li>
      <li><a href="/blog">Blog</a></li>
      <li><a href="/video">Video</a></li>
      <li><a href="#">Liên hệ</a></li>
   </ul>
</nav>