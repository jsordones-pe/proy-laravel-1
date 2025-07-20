<x-blog-layout meta-title="Blog Title" meta-description="Blog Description">

    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">Blog</h1>

        @auth
            {{--BOTÓN CREAR--}}
            <div class="flex items-center justify-center">
                <a
                    href="{{ route('posts.create')}}"
                    class="group rounded-full bg-sky-600 p-2 text-sky-100 shadow-lg duration-300 hover:bg-sky-700 active:bg-sky-800"
                >
                    <svg
                    class="h-6 w-6 duration-300 group-hover:rotate-12"
                    data-slot="icon"
                    fill="none"
                    stroke-width="1.5"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4.5v15m7.5-7.5h-15"
                    ></path>
                    </svg>
                </a>
            </div>
        @endauth
    </div>

    <div class="mx-auto mt-8 grid max-w-6xl gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <article class="flex flex-col overflow-hidden rounded bg-white shadow dark:bg-slate-900">

                <div class="flex-1 space-y-3 p-5">
                    <h2
                    class="text-xl font-semibold leading-tight text-slate-800 dark:text-slate-200"
                    >
                    <a class="hover:underline" href="{{ route('posts.show', $post) }}">
                        {{ $post->title }}
                    </a>
                    </h2>
                    <p
                    class="hidden text-slate-500 dark:text-slate-400 md:block"
                    >

                    {{ $post->body }}
                    </p>
                </div>
            </article>
        @endforeach


        {{--
        @foreach ($posts as $post)
            <div style="display: flex; align-items: baseline;">
                <h2>
                    <a href="{{ route('posts.show', $post) }}"> {{ $post->title }}</a>
                </h2>&nbsp;
                <a href="{{ route('posts.edit', $post) }}">{{ __('Edit') }}</a>&nbsp;
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
        --}}
    </div>



    {{--
    <x-slot:sidebar>
        Es una parte del sidebar
    </x-slot:sidebar>
    --}}
</x-blog-layout>
