@extends('layouts.main')
@section('title','Alas de Colibrí')
@section('styles')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

@endsection
@section('body')
<div class="inicio" id="inicioid">
    <section>
      <div
        id="carouselAlasDeColibri"
        class="carousel slide"
        data-bs-ride="carousel">

        @if (count($sliders)>0)
        <div class="carousel-indicators">
            @if ($sliders[0])
                <button
                type="button"
                data-bs-target="#carouselAlasDeColibri"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
            ></button>
            @for ($i=1;$i<count($sliders);$i++)
                <button
                type="button"
                data-bs-target="#carouselAlasDeColibri"
                data-bs-slide-to="{{$i}}"
                aria-label="Slide {{$i+1}}"
                ></button>
            @endfor
            @endif
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('storage').'/'.$sliders[0]->imagen}}" class="d-block w-100 carousel__img" alt="..." />
              <div class="carousel-caption d-md-block">
                <h5>{{$sliders[0]->titulo}}</h5>
                <p>
                  {{$sliders[0]->descripcion}}
                </p>
              </div>
            </div>
            @for ($i=1;$i<count($sliders);$i++)
            <div class="carousel-item">
              <img src="{{asset("storage").'/'.$sliders[$i]->imagen}}" class="d-block w-100 carousel__img" alt="..." />
              <div class="carousel-caption d-md-block">
                <h5>{{$sliders[$i]->titulo}}</h5>
                <p>
                  {{$sliders[$i]->descripcion}}
                </p>
              </div>
            </div>
            @endfor

          </div>
        @endif

        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselAlasDeColibri"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselAlasDeColibri"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <!-- Donaciones -->
    <section class="donaciones">
      <a class="donaciones-box donaciones__btn btn-transparent" href="#">
        <h2 class="donaciones__title">Únete y Participa</h2>
        <i class="fab fa-cc-paypal donaciones__icon"></i>
      </a>
      <!--     <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container"></div>
        </div>
      </div> -->
    </section>
        <!-- proyecto -->
@if(count($proyectos)>0)
<section class="container proyectos">
    <h2 class="copy-title">Proyectos</h2>
    <p class="copy-subtitle">
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis,
      deleniti.
    </p>
    <div class="cards">

        @foreach ($proyectos as $proyecto)
        <div class="card">
          <img src="{{asset('storage').'/'.$proyecto->imagen}}" alt="" class="card__img" />
            <h2 class="card__title">{{$proyecto->titulo}}</h2>
            <p class="card__txt">
                {{$proyecto->mini_descripcion}}
            </p>
            <a href="{{route('proyecto.show',$proyecto->id)}}" class="btn-morado card--btn">Leer más <i class="fas fa-chevron-right"></i></a>
        </div>
        @endforeach

     </div>
     {{$proyectos->links()}}
  </section>
@endif

</div>

@component('componentes.colaboradores')
  
@endcomponent
@endsection
