@extends('layouts.admin')

@section('content')
<nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
        <li><a href="../">Bulma</a></li>
        <li><a href="../">Templates</a></li>
        <li><a href="../">Examples</a></li>
        <li class="is-active"><a href="#" aria-current="page">Admin</a></li>
    </ul>
</nav>
<section class="hero is-info welcome is-small">
    <div class="hero-body">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="title">
                Administración de Activos del Instituto Yavirac.
            </h1>
            <h2 class="subtitle">
                Bienvenido
            </h2>
        </div>
    </div>
</section>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">439</p>
                <p class="subtitle">Activos</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">59</p>
                <p class="subtitle">De Baja</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">3</p>
                <p class="subtitle">Pendientes de revisión</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">19</p>
                <p class="subtitle">Tareas asignadas</p>
            </article>
        </div>
    </div>
</section>
<div class="columns">
    <div class="column is-6">
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                    Tareas Asignadas
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <tbody>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td>Lorum ipsum dolem aire</td>
                                <td><a class="button is-small is-primary" href="#">Action</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <a href="#" class="card-footer-item">Ver Todo</a>
            </footer>
        </div>
    </div>
    <div class="column is-6">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Inventory Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
    <span class="icon">
    <i class="fa fa-angle-down" aria-hidden="true"></i>
    </span>
</a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="">
                        <span class="icon is-medium is-left">
        <i class="fa fa-search"></i>
    </span>
                        <span class="icon is-medium is-right">
        <i class="fa fa-check"></i>
    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    User Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
    <span class="icon">
    <i class="fa fa-angle-down" aria-hidden="true"></i>
    </span>
</a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="">
                        <span class="icon is-medium is-left">
        <i class="fa fa-search"></i>
    </span>
                        <span class="icon is-medium is-right">
        <i class="fa fa-check"></i>
    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
