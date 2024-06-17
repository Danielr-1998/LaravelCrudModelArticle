@extends('layout')
  <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('content')

<div id="response_success" style='display:none' class="relative flex flex-col gap-2 w-60 sm:w-72 text-[10px] sm:text-xs z-50">
  <div
    class="succsess-alert cursor-default flex items-center justify-between w-full h-12 sm:h-14 rounded-lg bg-[#232531] px-[10px] absolute top-0 left-0"
  >
    <div class="flex gap-2">
      <div class="text-[#2b9875] bg-white/5 backdrop-blur-xl p-1 rounded-lg">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-6 h-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="m4.5 12.75 6 6 9-13.5"
          ></path>
        </svg>
      </div>
      <div>
        <p class="text-white">Articulo Creado</p>
        <p class="text-gray-500">Se a creado correctamente</p>
      </div>
    </div>
    <button
      class="text-gray-600 text-gray-600 hover:bg-white/5 p-1 rounded-md transition-colors ease-linear"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M6 18 18 6M6 6l12 12"
        ></path>
      </svg>
    </button>
  </div>
</div>

<div id="response_fail" style='display:none' class="relative flex flex-col gap-2 w-60 sm:w-72 text-[10px] sm:text-xs z-50">
  <div
    class="error-alert cursor-default flex items-center justify-between w-full h-12 sm:h-14 rounded-lg bg-[#232531] px-[10px] absolute top-0 left-0"
  >
    <div class="flex gap-2">
      <div class="text-[#d65563] bg-white/5 backdrop-blur-xl p-1 rounded-lg">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-6 h-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"
          ></path>
        </svg>
      </div>
      <div>
        <p class="text-white">A ocurrido un Error</p>
        <p class="text-gray-500">No se a creado el articulo Intentelo de nuevo</p>
      </div>
    </div>
    <button
      class="text-gray-600 hover:bg-white/10 p-1 rounded-md transition-colors ease-linear"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke-width="1.5"
        stroke="currentColor"
        class="w-6 h-6"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M6 18 18 6M6 6l12 12"
        ></path>
      </svg>
    </button>
  </div>
</div>

	
<section class="bg-white dark:bg-gray-900">
  <div class="max-w-2xl px-4 py-4 mx-auto lg:py-16">
    <!-- Mostrar información del usuario -->
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Crear producto</h2>
    <form action="{{ route('articles.store') }}" method="POST" onsubmit="return validateForm()">
      @csrf
      <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
        <div class="sm:col-span-2">
          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Articulo</label>
          <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
        </div>
        <div class="sm:col-span-2">
          <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
          <textarea name="content" id="content" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required></textarea>
          <input type="hidden" name="user_id" value="1"> <!-- Campo oculto con user_id fijo -->
        </div>
      </div>
      <div class="flex items-center space-x-4">
        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">Create</button>
      </div>
    </form>
  </div>
</section>
<script>
    function validateForm() {
        var title = document.getElementById('title').value;
        var content = document.getElementById('content').value;
        if (!title || !content) {
         $('#response_fail').show();    
		// Ocultar el div después de 2 segundos (2000 milisegundos)
    setTimeout(function() {
        $('#response_fail').hide();
    }, 2000);
           // alert('All fields are required!');
            return false;
        }
$('#response_success').show();
    
    // Ocultar el div después de 2 segundos (2000 milisegundos)
    setTimeout(function() {
        $('#response_success').hide();
    }, 2000);
        return true;
    }
</script>
@endsection

