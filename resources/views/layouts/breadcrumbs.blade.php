@if(isset($breadcrumbs) && count($breadcrumbs))

<nav class="mb-6 text-sm">

    <ol class="flex items-center gap-2 text-slate-500">

        @foreach($breadcrumbs as $breadcrumb)

            <li class="flex items-center gap-2">

                @if(!$loop->first)

                    <span class="material-symbols-outlined text-base">

                        chevron_right

                    </span>

                @endif

                @if(isset($breadcrumb['url']))

                    <a
                        href="{{ $breadcrumb['url'] }}"
                        class="hover:text-primary transition">

                        {{ $breadcrumb['title'] }}

                    </a>

                @else

                    <span class="font-semibold text-slate-800">

                        {{ $breadcrumb['title'] }}

                    </span>

                @endif

            </li>

        @endforeach

    </ol>

</nav>

@endif
