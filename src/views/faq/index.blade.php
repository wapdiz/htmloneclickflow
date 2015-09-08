@extends('main-layout')

@section('content')
    <div class="container-fluid">
        <section class="panel">
            <header class="panel-heading">
                <h2>FAQ</h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table mb-none">
                        <thead>
                        <tr>
                            <th>Вопрос</th>
                            <th>Ответ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faqs as $item)
                            <tr>
                                <td>{!!$item['question']!!}</td>
                                <td>{!!$item['answer']!!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection