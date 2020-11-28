@extends('adminlte::master')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}
            <div class="content-header">
                <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                    @yield('content_header')
                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    @yield('content')
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')

    <script>
        function excluir(rota) {
            // console.log(window.LaravelDataTables)
            // console.log(Object.keys(window.LaravelDataTables)[0])
            Swal.fire({
                title: 'Atenção?',
                text: "Deseja mesmo excluir?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não'
                }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(rota)
                        .then((data) => {
                            $('#' + Object.keys(window.LaravelDataTables)[0]).DataTable().ajax.reload()
                            Swal.fire(
                                'Perfeito!',
                                'Excluido com sucesso.',
                                'success'
                            )
                        })
                        .catch((err) => {
                            Swal.fire(
                                'Ops!',
                                'Error ao excluir.',
                                'success'
                            )
                        })
                }
            })
        }
    </script>

    @if (Session::has('sucesso') || Session::has('erro'))
        <script>
            Swal.fire({
                text: '{{ Session::get('sucesso') ?? Session::get('erro') }}',
                @if (Session::has('sucesso'))
                    icon: 'success',
                @else
                    icon: 'error',
                @endif
                // icon: '{{ Session::has('sucesso') ? 'success' : 'error'}}',
                // timer: 2000,
                timerProgressBar: true
            })
        </script>
    @endif
@stop
