@extends('components.head')
@section('sections')

<x-studios-header></x-studios-header>

<main>
    <!-- info -->
    <section class="info">
        <div class="content">
            <div class="info__list">
                <div class="info__item">
                    <div class="info__title">Количество запросов </div>
                    <div class="info__value">14/32</div>
                </div>
                <div class="info__item">
                    <div class="info__title">Количество студии </div>
                    <div class="info__value">32</div>
                </div>
                <div class="info__item">
                    <div class="info__title">Количество выполненных обращений </div>
                    <div class="info__value">32</div>
                </div>
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