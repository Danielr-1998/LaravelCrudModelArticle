@extends('layout')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        <p class="text-white">Articulo Eliminado</p>
        <p class="text-gray-500">Se a Eliminado correctamente</p>
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

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="flex justify-center">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                  <th scope="col" class="px-6 py-3">
                    Articulo
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripcion
                </th>
                <th scope="col" class="px-6 py-3">
                    Usuario
                </th>
<th scope="col" class="px-6 py-3">
                    Perfil
                </th>

                <th scope="col" class="px-6 py-3">
                    Opciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    <td class="px-6 py-4">
                        <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $article->content }}
                    </td>
                    <td class="px-6 py-4">

                        {{ $article->user->name }}
                    </td>
                     <td class="px-6 py-4">
                        <img src="{{ $article->user->profile_picture }}" alt="Profile Picture" class="w-10 h-10 rounded-full">
                    </td>
                    <td class="px-6 py-4">
                        <a class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-lg text-sm px-7 py-2.5 text-center me-2 mb-2" href="{{ route('articles.edit', $article) }}">Editar</a>

                        <form action="{{ route('articles.destroy', $article) }}" onsubmit="return confirmDelete(this);" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onsubmit="return confirmDelete(this);" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-4 py-2.5 text-center me-2 mb-2">Borrar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div></div>


<!-- Paginación -->
<div class="mt-4">
    {{ $articles->links() }}
</div>

<script>
function confirmDelete(form) {
console.log(form);
    if (confirm('Desea elimiar el articulo?')) {
    $('#response_success').show();

        form.submit();
    } else {
        return false;
    }
}
</script>
<br>
@endsection
