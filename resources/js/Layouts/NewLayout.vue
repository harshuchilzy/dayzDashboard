<template>
<div class="dayz-header bg-white sticky top-0 z-50 w-full">
      <div class="grid grid-cols-4 gap-4  shadow-lg py-2">
        <div class="dayz-logo text-center p-3">
            <span class="italic font-bold text-[#798bff]"><i class="fa-solid fa-phone"></i> Caller System</span>
        </div>
        <div class="dayz-menu gap-4 text-center p-3">
            <a href="#" class="text-gray ml-5">Overview</a>
            <a href="#" class="text-gray ml-5">Apps</a>
            <a href="#" class="text-gray ml-5">Components</a>
            <a href="#" class="text-gray ml-5">Support</a>
            <a href="#" class="text-gray ml-5">Contact</a>
        </div>
        <div class="empty-col">
        </div>
        <div class="notifiactions-area gap-4 text-center">
            <i class="fa-regular fa-bell ml-3 fa-xl"></i>
            <i class="fa-solid fa-user ml-3 bg-[#798bff] text-white p-3 rounded-full"></i>
        </div>
      </div>
   </div>
   <div class="flex">
    <div class="dayz-side-bar inline-block p-5 shadow-lg w-60 h-screen">
        <div class="dayz-side-bar-menu p-5">
            <div class="nav-item">
              <a href="#" class="font-bold uppercase text-gray-500 text-sm	"><i class="fa-solid fa-arrow-up-right-dots"></i> Dashboard</a>
            </div> <br>
            <div class="nav-item">
              <a href="#" class="font-bold uppercase text-gray-500 text-sm"><i class="fa-regular fa-file"></i> Pages</a>
            </div> <br>
            <div class="nav-item">
              <a href="#" class="font-bold uppercase text-gray-500 text-sm"><i class="fa-solid fa-bars-progress"></i> Buttons</a>
            </div> <br>
            <div class="nav-item">
              <a href="#" class="font-bold uppercase text-gray-500 text-sm"><i class="fa-solid fa-folder-open"></i> Forms</a>
            </div> <br>
        </div>
    </div>
    <div class="content-area bg-slate-200 p-5 w-screen">
          <div class="container mx-auto p-5">
            <main>
                <slot />
            </main>
          </div>
    </div>
   </div>
   <div class="footer bg-white py-4 relative z-50">
     <div class="grid grid-cols-4 gap-4">
      <div class="empty-area"></div>
      <div class="social-media-area">
        <i class="fa-brands fa-facebook fa-xl ml-3"></i>
        <i class="fa-brands fa-whatsapp fa-xl ml-3"></i>
        <i class="fa-solid fa-envelope fa-xl ml-3"></i>
      </div>
      <div class="copy-right-area">© 2022. Website By DayzSolutions</div>
      <div class="policy-area">
        <a href="#">Terms & Conditions</a>
      </div>
   </div>
   </div>
</template>

