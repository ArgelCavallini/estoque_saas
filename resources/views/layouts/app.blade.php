<!DOCTYPE html>
<html lang="pt-br" class="h-full">
<head>
    <meta charset="utf-8">
    <title>Sistema de Estoque</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">

<div style="display:flex; min-height:100vh;">

    <!-- SIDEBAR -->
    <aside
    style="
        width:220px;
        background:#111827;
        color:#ffffff;
        padding:20px;
    "
>
    <h2 style="font-size:18px; font-weight:600; margin-bottom:20px;">
        Estoque SaaS
    </h2>

    <nav>
        @foreach ($menus as $menu)
            <div style="margin-bottom:10px;">
                <a
                    href="{{ $menu->rota ? route($menu->rota) : '#' }}"
                    style="color:#ffffff; text-decoration:none;"
                >
                    {{ $menu->icone }} {{ $menu->nome }}
                </a>

                @if ($menu->filhos->count())
                    <div style="margin-left:15px; margin-top:5px;">
                        @foreach ($menu->filhos as $sub)
                            <a
                                href="{{ $sub->rota ? route($sub->rota) : '#' }}"
                                style="display:block; color:#9ca3af; font-size:14px;"
                            >
                                {{ $sub->icone }} {{ $sub->nome }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </nav>
</aside>

    <!-- CONTEÚDO -->
    <main style="flex:1; background:#f9fafb;">
        <header style="padding:16px; border-bottom:1px solid #e5e7eb;">
            {{ $header ?? '' }}
        </header>

        <section>
            {{ $slot }}
        </section>
    </main>

</div>

</body>
</html>
