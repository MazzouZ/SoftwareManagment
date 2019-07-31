
<!----(---------------------utilisateurs et droits------------------------------------------------->
@can('access_user_mangement')
<li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fa fa-group nav-icon">

                        </i>
                        User management
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="@if(Request::url() == url('users')) active @endif" style="margin-left:15px">
                                <a href="{{url('permissions')}}" class="nav-link ">
                                    <i class="fa fa-exclamation-triangle nav-icon">

                                    </i>
                                    Permissions
                                </a>
                        </li>
                        <li class="@if(Request::url() == url('roles')) active @endif " style="margin-left:15px">
                                <a href="{{url('roles')}}" class="nav-link ">
                                    <i class="fa fa-flag nav-icon">

                                    </i>
                                    Roles
                                </a>
                        </li>
                             
                        <li class="@if(Request::url() == url('users')) active @endif" style="margin-left:15px">
                                <a href="{{url('users')}}" class="nav-link">
                                <i class="nav-icon icon-user"></i> Utilisateurs

                                </a>
                        </li>


                    </ul>
 </li>
@endcan
<!----(---------congés------------------------------------------------------------->
@can('access_conge')
    <li class="nav-item nav-dropdown">
        <a class="nav-link  nav-dropdown-toggle">
            <i class="icon-directions nav-icon">

            </i>
            Congés
        </a>
        <ul class="nav-dropdown-items">
             <li class="@if(Request::url() == url('conges')) active @endif" style="margin-left:15px">
                <a href="{{url('conges')}}" class="nav-link">
                    <i class="nav-icon cui-sun"></i>Gestion congé
                </a>
            </li>
            <li class="@if(Request::url() == url('conges/rapport')) active @endif" style="margin-left:15px">
                <a href="{{url('conges/rapport')}}" class="nav-link">
                    <i class="nav-icon cui-note"></i>Rapport
                </a>
            </li>
            <li class="@if(Request::url() == url('conges/status_salaire')) active @endif" style="margin-left:15px">
                <a href="{{url('conges/status_salaire')}}" class="nav-link">
                    <i class="nav-icon cui-note"></i>Status Salaire
                </a>
            </li>
        </ul>
    </li>
@endcan
<!------------------------------------------------------------------------------------->
@can('access_docs_administratifs')
    <li class="nav-item nav-dropdown">
        <a class="nav-link  nav-dropdown-toggle">
            <i class="icon-home nav-icon">

            </i>
           Administration
        </a>
        <ul class="nav-dropdown-items">

            <li class="@if(Request::url() == url('docs_administratifs')) active @endif" style="margin-left:15px">
                <a href="{{url('docs_administratifs')}}" class="nav-link">
                    <i class="nav-icon cui-note"></i>Docs Administratifs
                </a>
            </li>
            <li class="@if(Request::url() == url('free_days')) active @endif" style="margin-left:15px">
                <a href="{{url('free_days')}}" class="nav-link">
                    <i class="nav-icon icon-emotsmile"></i>Jours fériés
                </a>
            </li>
            <li class="@if(Request::url() == url('Entreprise')) active @endif" style="margin-left:15px">
                <a href="{{url('Entreprise')}}" class="nav-link">
                    <i class="nav-icon cui-info"></i>Entreprise
                </a>
            </li>
        </ul>
    </li>
@endcan
<!---------------------------------------------------------------------------------pointage---->
<li class="nav-item nav-dropdown">
    <a class="nav-link  nav-dropdown-toggle">
        <i class="fa fa-calendar-check-o nav-icon">

        </i>
        Pointage
    </a>
    <ul class="nav-dropdown-items">

        <li class="@if(Request::url() == url('pointage')) active @endif" style="margin-left:15px">
            <a href="{{url('pointage')}}" class="nav-link">
                <i class="nav-icon fa fa-cloud-upload"></i>pointage
            </a>
        </li>
        <li class="@if(Request::url() == url('pointage/rapport')) active @endif" style="margin-left:15px">
            <a href="{{url('pointage/rapport')}}" class="nav-link">
                <i class="nav-icon icon-book-open"></i>Rapport
            </a>
        </li>
    </ul>
</li>