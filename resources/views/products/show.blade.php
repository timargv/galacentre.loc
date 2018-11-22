@extends('layouts.app')



@section('content')

    <div class="row pt-3">



        <div class="col-5">
            <a href="{{ $product->image }}" data-toggle="lightbox" data-gallery="example-gallery" data-height="700" data-max-height="700">
                <img class="card-img-top shadow-sm" src="{{ $product->image }}" alt="{{ $product->name_original }}">
            </a>

            @if($product->images)
            <div class="w-100 bg-white shadow-sm my-4">
                <div class="pt-2 pl-2 justify-content-center clearfix">
                    @foreach($product->images as $key => $image)
                        <a href={{ $image }}?image=180" data-toggle="lightbox" data-gallery="example-gallery" data-height="700" data-max-height="700" class="float-left pr-2 w-25 pb-2" alt="{{ $product->name_original }}-{{ $key }}">
                            <img src="{{ $image }}?image=180" class="img-fluid" alt="{{ $product->name_original }}-{{ $key }}">
                        </a>
                    @endforeach
                </div>
            </div> 
            @endif     

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

                    @if($product->props)
                    <div class="props  mb-3">
                         <strong class="text-muted pb-3" >Основные свойства товара: </strong>
                         <ul class="p-0">
                            @foreach($product->props as $prop)
                                <div><strong>{{ str_before($prop, '=') }}:</strong> {{ str_after($prop, '=') }}</div>
                            @endforeach
                         </ul>
                    </div>
                    @endif

                    

                    @if($product->includes)
                    <div class="includes  mb-3">
                         <strong class="text-muted pb-3">Комплектация: </strong>
                         <ul class="p-0">
                             @foreach($product->includes as $include)
                                <div>{{ $include }}</div>
                            @endforeach
                         </ul>
                    </div>
                    @endif

                </div>
            </div>
            <div class="w-100  p-3 mt-4 mb-5 bg-white rounded ">

                <nav class="nav">
                    <a class="nav-link active text-black" id="pills-full_description-tab" data-toggle="pill" href="#pills-full_description" role="tab" aria-controls="pills-full_description" aria-selected="true">Описание</a>
                     @if($product->specifications)
                    <a class="nav-link text-black" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Характеристики</a>@endif

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
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @if($product->specifications)
                        <div class="specifications  mb-3">
                             {{-- <strong class="text-muted pb-3" >Характеристики товара</strong> --}}
                             <table class="table table-striped  table-sm">
                                @foreach($product->specifications as $specification)
                                <tr>
                                    <th scope="row" width="200px">{{ str_before($specification, '=') }}</th> 
                                    <td>{{ str_after($specification, '=') }}</td>
                                </tr>
                                @endforeach

                             </table>
                        </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">3</div>
                </div>

            </div>

        </div>
    </div>

@endsection

