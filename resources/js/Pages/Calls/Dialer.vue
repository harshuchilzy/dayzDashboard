<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
  <AppLayout title="Dialer">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dialer</h2>
    </template>
    <div class="flex align-middle justify-center mt-32">
      <div class="max-w-lg w-full bg-slate-600 p-3 rounded-xl">
        <div class="flex align-middle justify-between text-white w-full mb-6">
          <div>Agent: Harshu</div>
          <div>00.07.56</div>
        </div>

        <!-- Contact detail -->
        <div class="flex p-3 rounded-xl bg-slate-500 items-center w-full mx-auto px-12">
            <div class="min-w-xs pr-12">
                <img class="rounded-full max-w-[70px]" src="https://randomuser.me/api/portraits/women/0.jpg" />
            </div>
            <div>
                <h2 class="text-white font-bold text-lg">Dayz Solutions</h2>
                <p class="text-white">+94 (071) 77765 766</p>
            </div>
        </div>
        <!-- End Contact detail -->

        <!-- Input -->
        <div class="my-6 relative">
            <form id="dialer" class="dial-display">
                <input type="tel" pattern="[0-9 ]+" autofocus class="bg-transparent border-0 text-white w-full text-right pr-10 text-xl focus:outline-0 focus:border-0"/>
                <input type="reset" value="x" class="absolute right-2 top-1 text-red-700 font-extrabold text-2xl"/>
            </form>
        </div>
        <!-- End - Input -->

        <!-- Dialer -->
        <div class="flex items-center justify-evenly">
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="1">1</button></div>
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="2">2</button></div>
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="3">3</button></div>
        </div>

        <div class="flex items-center justify-evenly">
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="4">4</button></div>
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="5">5</button></div>
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="6">6</button></div>
        </div>

        <div class="flex items-center justify-evenly">
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="7">7</button></div>
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="8">8</button></div>
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="9">9</button></div>
        </div>

        <div class="flex items-stretch justify-evenly">
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="+">+</button></div>
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="0">0</button></div>
            <div class="w-full"><button class="w-full p-3 bg-teal-600 hover:bg-teal-500 text-2xl font-bold text-white" type="button" value="#">#</button></div>
        </div>
        <!-- End dialer -->

        <!-- Dial Button -->
        <div class="text-center">
            <button type="button" class="bg-green-500 hover:bg-green-400 w-full">
                <img class="mx-auto" src="../../assets/svg/call.svg" />
            </button>
        </div>
        <!-- End Dial Button -->
      </div>
    </div>
  </AppLayout>
</template>