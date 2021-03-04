@php
$links = [




    [
        "href" => "recherche_admin",
        "text" => "Accueil",
        "is_multi" => false,
    ],


    [
        "href" => [
            [
                "section_text" => "User",
                "section_list" => [
                    ["href" => "user", "text" => "Data User"],
                    ["href" => "user.new", "text" => "Buat User"]
                ]
            ]
        ],
        "text" => "User",
        "is_multi" => true,
    ],
     [
        "href" => [
            [
                "section_text" => "Departement",
                "section_list" => [
                    ["href" => "departement.create", "text" => "Ajouter Departement"],
                    ["href" => "departement.lister", "text" => "Afficher Departements"]
                ]
            ]
        ],
        "text" => "Departements",
        "is_multi" => true,

    ],
     [
        "href" => [
            [
                "section_text" => "Enseignant",
                "section_list" => [
                    ["href" => "enseignant.create", "text" => "Ajouter Engeignant"],
                    ["href" => "enseignant.lister", "text" => "Afficher Engeignant"]
                ]
            ]
        ],
        "text" => "Enseignants",
        "is_multi" => true,
        ],
        [
                "href" => [
                    [
                        "section_text" => "Logiciel",
                        "section_list" => [
                            ["href" => "Logiciel.create", "text" => "Ajouter Logiciel"],
                            ["href" => "Logiciel.lister", "text" => "Afficher Logiciel"]
                        ]
                    ]
                ],
                "text" => "Logiciels",
                "is_multi" => true,
                ],
                [
                "href" => [
                    [
                        "section_text" => "Salle",
                        "section_list" => [
                            ["href" => "salle.create", "text" => "Ajouter Salle"],
                            ["href" => "salle.lister", "text" => "Afficher Salle"]
                        ]
                    ]
                ],
                "text" => "Salles",
                "is_multi" => true,
                ],


];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Accueil</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img src="{{ URL::to('/photos/newlogoIUT.png') }}"   alt="logo de l'IUT de Laval">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route("recherche_admin") }}"><i class="fas fa-search"></i><span>Recherche</span></a>

            </li>

            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i ></i> <span>{{ $section->section_text }}</span></a>

                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
