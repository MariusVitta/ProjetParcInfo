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
                "section_text" => "Administrateur",
                "icon"=>"ic",
                "section_list" => [
                    ["href" => "user.new", "text" => "Ajouter Administrateur "],
                    ["href" => "user", "text" => "liste Administrateur"]
                ]
            ]
        ],
        "text" => "Administrateurs",
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
                    ["href" => "enseignant.lister", "text" => "Afficher Engeignants"]
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
                            ["href" => "Logiciel.lister", "text" => "Afficher Logiciels"]
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
                            ["href" => "salle.lister", "text" => "Afficher Salles"]
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
                <img src="{{ URL::to('/photos/logo.jpg') }}"width= 5000px" alt="logo de l'IUT de Laval">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="fas fa-search"></i><span>Recherche</span></a>

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
                        @if( $section->section_text=="Logiciel")
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"> <i class="fas fa-laptop-code"></i> <span>{{ $section->section_text }}</span></a>
                        @elseif( $section->section_text=="Departement")
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-building"></i> <span> {{ $section->section_text }}</span></a>
                        @elseif( $section->section_text=="Administrateur")
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">   <i class="far fa-user"></i> <span> {{ $section->section_text }}</span></a>
                        @elseif( $section->section_text=="Salle")
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-school"></i><span> {{ $section->section_text }}</span></a>
                        @elseif( $section->section_text=="Enseignant")
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">    <i class="fas fa-chalkboard-teacher"></i> <span> {{ $section->section_text }}</span></a>
                        @endif
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
