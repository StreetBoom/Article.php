@extends('base.base')
@section('start')

    <div class="row">


        @foreach($articles as $article)

            <div class="card" style="width: 18rem;">
                <img src="{{asset('images/title.jpg')}}">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->text}}</p>

                    <a href="{{route('show',$article->id)}}" class="btn btn-primary">Открыть статью</a>

                </div>
{{--                <div style="display: flex">--}}
{{--                    <div class="counter">{{$article->like->id}}</div>--}}
{{--                    <button class="like-btn" type="button">Лайкнуть</button>--}}
{{--                </div>--}}
            </div>
        @endforeach


    </div>

    <script>
        const btns = document.querySelectorAll('.like-btn');
        btns.forEach((btn) => {
            btn.addEventListener('click', () => {
                let counter = btn.parentNode.querySelector('.counter');
                let newCount = parseInt(counter.textContent);
                newCount++
                counter.textContent = "";
                counter.textContent = newCount;
                axios
                    .post('/add-like', {
                        'article_id': {{$article->id}},
                        'count': newCount,
                    })
            })
        })
    </script>
@endsection
