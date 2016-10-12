@extends('layouts.main')

@section('content')
    <h1>Налоговая</h1>
    <br>
    <br />
    <div id="form-errors">

    </div>
    <form action="" id="sign-up">
        {{csrf_field()}}
        <div class="form-group">
            <label>Группа плательщиков единого налога</label>
            <select name="group" class="form-control">
                <option value="">Выберите группу</option>
                <option value="1">Первая группа</option>
                <option value="2">Вторая группа</option>
                <option value="3">Третья группа</option>
                <option value="4">Четвертая группа</option>
                <option value="5">Пятая группа</option>
                <option value="6">Шестая группа</option>
            </select>
        </div>

        <div class="form-group">
            <label>Текущий год</label>
            <select name="year" class="form-control" id="select-year">
                <option value="">Выберите год</option>
                @for($i=2010; $i < (2016+30); $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>

        <div class="form-group">
            <label>периодичность оплаты ЕСВ</label>
            <select name="periodPay" class="form-control">
                <option value="1">месяц</option>
                <option value="2">квартал</option>
            </select>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <div class="input-group date" id="datetimepickerFrom">
                        <input type="text" name="dateFrom" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                         </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <div class="input-group date" id="datetimepickerTo">
                        <input type="text" name="dateTo" class="form-control" />
                        <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Язык</label>
            <select name="locale" class="form-control">
                <option value="ru">рус</option>
                <option value="uk">укр</option>
            </select>
        </div>

        <button type="submit" class="btn btn-default">Отправить</button>
    </form>
    <script src="{{asset('js/ajaxform.js')}}"></script>

    <div class="container">
        <div class="row">
            <div id="response" class="col-lg-8">
                Ответ :
            </div>
        </div>

    </div>

@endsection
