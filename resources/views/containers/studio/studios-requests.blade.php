@extends('components.head')
@section('sections')
    <x-studios-header></x-studios-header>
@if(session('successSend'))

    <div class="alert alert-success mt-2" role="alert">
              {{  session()->pull('successSend')}}
            </div>
            <script>
            let error = document.querySelector('.alert-success');
            setTimeout(() => {
                error.style.display = 'none';
            }, 3000);

        </script>
@endif
    <main>
        <!-- contacts -->
        <section class="contacts">
            <div class="content">
                <div class="contacts__inline">
                    <div class="contacts__main">
                        <div class="contacts__inner">
                            <div class="contacts__title">Ваш менеджер</div>
                            <div class="contacts__name">{{ $manager->name }}</div>
        
                            <div class="contacts__schedule">
                                <div>Режим работы: с 9:00-19:00</div>
                                <div>Сб-Вс: выходной</div>
                            </div>
                        </div>
                        <div class="social">
                            <a href="#" class="social__item">
                                <img src="/img/layout/general/phone.svg" alt="">
                            </a>
                            <a href="#" class="social__item">
                                <img src="/img/layout/general/mail.svg" alt="">
                            </a>
                            <a href="#" class="social__item">
                                <img src="/img/layout/general/tg.svg" alt="">
                            </a>
                        </div>
                    </div>
        
                    <a href="#popup" class="contacts__btn button button-black">Сделать запрос</a>
                    @livewire('popup')
                </div>
            </div>
        </section>
        <!-- request -->
        <section class="manager">
            <div class="content">
                <div class="top">
                    <a href="#" class="top__link top__active">Запросы</a>
                    <a href="{{ route('chat') }}" class="top__link">Чат</a>
        
                    <div class="top__aside">
                        <div class="load">
                            <div class="load__head">
                                <img src="img/layout/general/load.svg" alt="">
                                Выгрузить
                            </div>
                            <div class="load__drop">
                                <a href="#" class="load__item">пример</a>
                                <a href="#" class="load__item">пример</a>
                                <a href="#" class="load__item">пример</a>
                                <a href="#" class="load__item">пример</a>
                                <a href="#" class="load__item">пример</a>
                            </div>
                        </div>
        
                        <div class="filter">
                            <div class="filter__ico">
                                <img src="img/layout/general/filter.png" alt="">
                            </div>
                            <div class="filter__drop">
                                <a href="#" class="filter__item">пример</a>
                                <a href="#" class="filter__item">пример</a>
                                <a href="#" class="filter__item">пример</a>
                                <a href="#" class="filter__item">пример</a>
                                <a href="#" class="filter__item">пример</a>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="table">
                    <div class="table__wrap">
                        <div class="table__row">
                            <div class="table__item table__account">
                                <a href="#" class="account">
                                    <div class="account__img">
                                        
                                    </div>
                                    <div class="account__person">ФИО</div>
                                </a>
                            </div>
        
                            <div class="table__item table__product">
                                <div class="product">
                                    <div class="product__name">Пленка</div>
                                    <div class="product__article">
                                        <div>Артикул:</div>
                                        <div>0569543Y</div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="table__item table__option">
                                <div class="option">
                                    <div>Объем:</div>
                                    <div>20м</div>
                                </div>
                            </div>
        
                            <div class="table__item table__status">
                                <div class="status">
                                    <div class="status__title">Статус заявки:</div>
                                    <div class="status__value status__confirmed">Заяка подтверждена</div>
                                </div>
                            </div>
        
                            <div class="table__item table__edit">
                                <a href="#" class="edit">
                                    <img src="img/layout/general/edit.svg" alt="">
                                </a>
                            </div>
                        </div>
        
                        <div class="table__row">
                            <div class="table__item table__account">
                                <a href="#" class="account">
                                    <div class="account__img">
                                        
                                    </div>
                                    <div class="account__person">ФИО</div>
                                </a>
                            </div>
        
                            <div class="table__item table__product">
                                <div class="product">
                                    <div class="product__name">Пленка</div>
                                    <div class="product__article">
                                        <div>Артикул:</div>
                                        <div>0569543Y</div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="table__item table__option">
                                <div class="option">
                                    <div>Объем:</div>
                                    <div>20м</div>
                                </div>
                            </div>
        
                            <div class="table__item table__status">
                                <div class="status">
                                    <div class="status__title">Статус заявки:</div>
                                    <div class="status__value status__confirmed">Заяка подтверждена</div>
                                </div>
                            </div>
        
                            <div class="table__item table__edit">
                                <a href="#" class="edit">
                                    <img src="img/layout/general/edit.svg" alt="">
                                </a>
                            </div>
                        </div>
        
                        <div class="table__row">
                            <div class="table__item table__account">
                                <a href="#" class="account">
                                    <div class="account__img">
                                        
                                    </div>
                                    <div class="account__person">ФИО</div>
                                </a>
                            </div>
        
                            <div class="table__item table__product">
                                <div class="product">
                                    <div class="product__name">Пленка</div>
                                    <div class="product__article">
                                        <div>Артикул:</div>
                                        <div>0569543Y</div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="table__item table__option">
                                <div class="option">
                                    <div>Объем:</div>
                                    <div>20м</div>
                                </div>
                            </div>
        
                            <div class="table__item table__status">
                                <div class="status">
                                    <div class="status__title">Статус заявки:</div>
                                    <div class="status__value status__confirmed">Заяка подтверждена</div>
                                </div>
                            </div>
        
                            <div class="table__item table__edit">
                                <a href="#" class="edit">
                                    <img src="img/layout/general/edit.svg" alt="">
                                </a>
                            </div>
                        </div>
        
                        <div class="table__row">
                            <div class="table__item table__account">
                                <a href="#" class="account">
                                    <div class="account__img">
                                        
                                    </div>
                                    <div class="account__person">ФИО</div>
                                </a>
                            </div>
        
                            <div class="table__item table__product">
                                <div class="product">
                                    <div class="product__name">Пленка</div>
                                    <div class="product__article">
                                        <div>Артикул:</div>
                                        <div>0569543Y</div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="table__item table__option">
                                <div class="option">
                                    <div>Объем:</div>
                                    <div>20м</div>
                                </div>
                            </div>
        
                            <div class="table__item table__status">
                                <div class="status">
                                    <div class="status__title">Статус заявки:</div>
                                    <div class="status__value status__confirmed">Заяка подтверждена</div>
                                </div>
                            </div>
        
                            <div class="table__item table__edit">
                                <a href="#" class="edit">
                                    <img src="img/layout/general/edit.svg" alt="">
                                </a>
                            </div>
                        </div>
        
                        <div class="table__row">
                            <div class="table__item table__account">
                                <a href="#" class="account">
                                    <div class="account__img">
                                        
                                    </div>
                                    <div class="account__person">ФИО</div>
                                </a>
                            </div>
        
                            <div class="table__item table__product">
                                <div class="product">
                                    <div class="product__name">Пленка</div>
                                    <div class="product__article">
                                        <div>Артикул:</div>
                                        <div>0569543Y</div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="table__item table__option">
                                <div class="option">
                                    <div>Объем:</div>
                                    <div>20м</div>
                                </div>
                            </div>
        
                            <div class="table__item table__status">
                                <div class="status">
                                    <div class="status__title">Статус заявки:</div>
                                    <div class="status__value status__confirmed">Заяка подтверждена</div>
                                </div>
                            </div>
        
                            <div class="table__item table__edit">
                                <a href="#" class="edit">
                                    <img src="img/layout/general/edit.svg" alt="">
                                </a>
                            </div>
                        </div>
        
                        <div class="table__row">
                            <div class="table__item table__account">
                                <a href="#" class="account">
                                    <div class="account__img">
                                        
                                    </div>
                                    <div class="account__person">ФИО</div>
                                </a>
                            </div>
        
                            <div class="table__item table__product">
                                <div class="product">
                                    <div class="product__name">Пленка</div>
                                    <div class="product__article">
                                        <div>Артикул:</div>
                                        <div>0569543Y</div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="table__item table__option">
                                <div class="option">
                                    <div>Объем:</div>
                                    <div>20м</div>
                                </div>
                            </div>
        
                            <div class="table__item table__status">
                                <div class="status">
                                    <div class="status__title">Статус заявки:</div>
                                    <div class="status__value status__confirmed">Заяка подтверждена</div>
                                </div>
                            </div>
        
                            <div class="table__item table__edit">
                                <a href="#" class="edit">
                                    <img src="img/layout/general/edit.svg" alt="">
                                </a>
                            </div>
                        </div>
        
                        <div class="table__row">
                            <div class="table__item table__account">
                                <a href="#" class="account">
                                    <div class="account__img">
                                        
                                    </div>
                                    <div class="account__person">ФИО</div>
                                </a>
                            </div>
        
                            <div class="table__item table__product">
                                <div class="product">
                                    <div class="product__name">Пленка</div>
                                    <div class="product__article">
                                        <div>Артикул:</div>
                                        <div>0569543Y</div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="table__item table__option">
                                <div class="option">
                                    <div>Объем:</div>
                                    <div>20м</div>
                                </div>
                            </div>
        
                            <div class="table__item table__status">
                                <div class="status">
                                    <div class="status__title">Статус заявки:</div>
                                    <div class="status__value status__confirmed">Заяка подтверждена</div>
                                </div>
                            </div>
        
                            <div class="table__item table__edit">
                                <a href="#" class="edit">
                                    <img src="img/layout/general/edit.svg" alt="">
                                </a>
                            </div>
                        </div>
        
                        <div class="table__row">
                            <div class="table__item table__account">
                                <a href="#" class="account">
                                    <div class="account__img">
                                        
                                    </div>
                                    <div class="account__person">ФИО</div>
                                </a>
                            </div>
        
                            <div class="table__item table__product">
                                <div class="product">
                                    <div class="product__name">Пленка</div>
                                    <div class="product__article">
                                        <div>Артикул:</div>
                                        <div>0569543Y</div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="table__item table__option">
                                <div class="option">
                                    <div>Объем:</div>
                                    <div>20м</div>
                                </div>
                            </div>
        
                            <div class="table__item table__status">
                                <div class="status">
                                    <div class="status__title">Статус заявки:</div>
                                    <div class="status__value status__confirmed">Заяка подтверждена</div>
                                </div>
                            </div>
        
                            <div class="table__item table__edit">
                                <a href="#" class="edit">
                                    <img src="img/layout/general/edit.svg" alt="">
                                </a>
                            </div>
                        </div>
        
                        <div class="table__row">
                            <div class="table__item table__account">
                                <a href="#" class="account">
                                    <div class="account__img">
                                        
                                    </div>
                                    <div class="account__person">ФИО</div>
                                </a>
                            </div>
        
                            <div class="table__item table__product">
                                <div class="product">
                                    <div class="product__name">Пленка</div>
                                    <div class="product__article">
                                        <div>Артикул:</div>
                                        <div>0569543Y</div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="table__item table__option">
                                <div class="option">
                                    <div>Объем:</div>
                                    <div>20м</div>
                                </div>
                            </div>
        
                            <div class="table__item table__status">
                                <div class="status">
                                    <div class="status__title">Статус заявки:</div>
                                    <div class="status__value status__confirmed">Заяка подтверждена</div>
                                </div>
                            </div>
        
                            <div class="table__item table__edit">
                                <a href="#" class="edit">
                                    <img src="img/layout/general/edit.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<x-footer></x-footer>

@endsection