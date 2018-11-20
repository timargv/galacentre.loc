@extends('layouts.app')



@section('content')

    <div class="row pt-3">



        <div class="col-5">
            <img class="card-img-top shadow-sm" src="{{ $product->image }}" alt="Card image cap">
        </div>
        <div class="col-7">

            <h1 class="h4 mb-5">{{ $product->name == null ? $product->name_original : $product->name }} <small class="text-muted text-small">#{{ $product->article }}</small></h1>

            <div class="w-100 shadow-sm p-3 mb-4 bg-white rounded ">
                <div class="block">
                    <div class="stk h6 mb-3">
                        <strong class="text-muted " >В Наличии: </strong> @if($product->store_msk) <span class="text-success pl-2">{{ $product->stk == null ? $product->store_msk : $product->stk }}</span> шт.@else <span class="text-danger">Нет в наличии</span> @endif <small class="text-muted"></small>
                    </div>
                    <div class="price h4 mb-3">
                         <strong class="text-muted " >Цена: </strong> {{ $product->price == null ? $product->price_base : $product->price }} Руб.<small class="text-muted"></small>
                    </div>

                </div>
            </div>
            <div class="w-100  p-3 mt-4 mb-5 bg-white rounded ">

                <nav class="nav">
                    <a class="nav-link active text-black" id="pills-full_description-tab" data-toggle="pill" href="#pills-full_description" role="tab" aria-controls="pills-full_description" aria-selected="true">Описание</a>
                    {{--<a class="nav-link text-black" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>--}}
                    {{--<a class="nav-link text-black" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>--}}
                </nav>
                <div class="tab-content p-3" id="full_description">
                    <div class="tab-pane fade show active" id="pills-full_description" role="tabpanel" aria-labelledby="pills-full_description-tab">
                        <div class="block">
                            <blockquote class="blockquote">
                                <p class="mb-0">{{ $product->full_description }}</p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">2</div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">3</div>
                </div>

            </div>

        </div>
    </div>

@endsection

