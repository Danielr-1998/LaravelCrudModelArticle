@extends('layout')
  <script src="https://cdn.tailwindcss.com"></script>
@section('content')

    <section class="bg-white dark:bg-gray-900">
  <div class="max-w-2xl px-4 py-4 mx-auto lg:py-16">
        <!-- Mostrar información del usuario -->
<div class="flex items-center space-x-4">
    <img src="{{ $user->profile_picture }}" alt="Profile Picture" class="w-20 h-20 rounded-full">

    <div>
        <h2 class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">User Information</h2>
        <p class="mb-0 text-gray-500 dark:text-gray-400">Name: {{ $user->name }}</p>
        <p class="mb-0 text-gray-500 dark:text-gray-400">Email: {{ $user->email }}</p>
    </div>
</div>
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Actualizar producto </h2>
<form action="{{ route('articles.update', $article) }}" method="POST" onsubmit="return validateForm()">
      @csrf
    @method('PUT')
          <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
              <div class="sm:col-span-2">
                  <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Articulo</label>
                  <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ $article->title }}" placeholder="Type product name" required="">
              </div>
             
             
             
              <div class="sm:col-span-2">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                  <textarea id="content" name="content" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a product description here...">{{ $article->content }}</textarea>
              </div>
          </div>
          <div class="flex items-center space-x-4">
              <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                  Update product
              </button>
              <button type="submit" class="text-green-600 inline-flex items-center hover:text-white border border-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-red-900">
<svg height="25px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#44ca5a" stroke="#44ca5a"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#6b9e79;" d="M97.872,304.24c-3.926,0-7.854-1.497-10.849-4.494l-33.205-33.205 c-6.731-6.732-10.438-15.682-10.438-25.201c0-9.519,3.707-18.47,10.438-25.201l85.873-85.873c0.008-0.006,0.015-0.014,0.021-0.021 l12.414-12.414c5.991-5.991,15.707-5.991,21.7,0c2.995,2.996,4.494,6.923,4.494,10.849c0,3.926-1.499,7.854-4.494,10.849 l-98.308,98.31c-1.932,1.932-1.932,5.074,0,7.004l33.205,33.205c5.991,5.991,5.991,15.707,0,21.7 C105.726,302.742,101.798,304.24,97.872,304.24z"></path> <path style="fill:#8ec936;" d="M295.728,77.44l-86.132,1.177l-47.032-47.032c-5.715-5.715-1.689-15.489,6.393-15.519l188.868-0.723 l-0.724,188.868c-0.031,8.083-9.804,12.109-15.519,6.393l-47.032-47.032L295.728,77.44z"></path> <g> <path style="fill:#6b9e79;" d="M368.676,4.494C365.784,1.602,361.844,0,357.769,0l-188.87,0.724 c-9.896,0.038-18.728,5.976-22.497,15.127s-1.685,19.587,5.315,26.586l47.032,47.031c2.929,2.927,6.918,4.535,11.059,4.492 l70.364-0.962l-0.828,60.643l-77.97,77.97c-5.991,5.991-5.991,15.707,0,21.7c2.996,2.996,6.923,4.494,10.849,4.494 s7.854-1.497,10.849-4.494l69.76-69.76l37.903,37.905c4.627,4.626,10.74,7.173,17.212,7.173c13.457,0,24.447-10.927,24.5-24.357 l0.726-188.868C373.184,11.312,371.569,7.385,368.676,4.494z M341.817,189.14l-31.837-31.837l1.089-79.654 c0.057-4.141-1.565-8.13-4.492-11.059c-2.929-2.929-6.84-4.528-11.059-4.492l-79.654,1.089L184.027,31.35l158.396-0.608 L341.817,189.14z"></path> <path style="fill:#6b9e79;" d="M349.041,398.662c-3.928,0-7.853-1.497-10.849-4.494c-5.991-5.991-5.991-15.707,0-21.698 l98.307-98.308c1.932-1.932,1.932-5.074,0-7.004l-33.205-33.205c-5.991-5.991-5.991-15.707,0-21.7c5.993-5.991,15.705-5.991,21.7,0 l33.205,33.205c13.896,13.896,13.896,36.505,0,50.403l-85.854,85.854c-0.014,0.012-0.026,0.026-0.038,0.04l-12.414,12.414 C356.893,397.164,352.968,398.662,349.041,398.662z"></path> </g> <path style="fill:#8ec936;" d="M216.287,434.56l86.132-1.177l47.032,47.032c5.715,5.715,1.689,15.489-6.393,15.519L154.19,496.66 l0.726-188.868c0.031-8.083,9.804-12.109,15.519-6.393l47.032,47.032L216.287,434.56z"></path> <path style="fill:#6b9e79;" d="M360.299,469.563l-47.031-47.031c-2.88-2.878-6.783-4.494-10.849-4.494c-0.069,0-0.14,0-0.21,0.002 l-70.364,0.962l0.829-60.645l77.97-77.968c5.991-5.991,5.991-15.707,0-21.698c-5.991-5.991-15.703-5.991-21.7,0l-69.758,69.758 l-37.903-37.903c-4.627-4.626-10.74-7.174-17.212-7.174c-13.457,0-24.447,10.927-24.5,24.357l-0.724,188.868 c-0.015,4.09,1.602,8.017,4.494,10.909c2.878,2.877,6.78,4.494,10.849,4.494c0.02,0,0.04,0,0.06,0l188.868-0.724 c9.898-0.038,18.729-5.978,22.499-15.128C369.384,486.996,367.299,476.561,360.299,469.563z M169.591,481.256l0.608-158.394 l31.837,31.837l-1.089,79.654c-0.057,4.141,1.563,8.13,4.492,11.059c2.929,2.929,6.9,4.525,11.059,4.492l79.654-1.089l31.835,31.837 L169.591,481.256z"></path> </g></svg>                                    Actualizar
              </button>
                  
          </div>
      </form>
                  
  </div>
</section>
<script>
    function validateForm() {
        var title = document.getElementById('title').value;
        var content = document.getElementById('content').value;
        if (!title || !content) {
            alert('All fields are required!');
            return false;
        }
        return true;
    }
</script>
@endsection

