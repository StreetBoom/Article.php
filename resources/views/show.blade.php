@extends('base.base')
@section('start')
    <div class="row d-flex justify-content-center">

        @foreach($articles as $article)
            <div class="container px-4 text-center">
                <div class="row gx-5">
                    <div class="col">
                        <div class="p-3">
                            <div class="card" style="width: 50rem;">
                                <img src="{{asset('images/text.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$article->title}}</h5>
                                    <p class="card-text">{{$article->text}}</p>

                                </div>


                                <section style="background-color: #eee;">
                                    <div class="container my-10 py-10">
                                        <div class="row d-flex justify-content-center">

                                            <div class="card">
                                                <div class="card-body">
                                                    @foreach($article->comments as $comment)
                                                        <div class="d-flex flex-start align-items-center">
                                                            <img class="rounded-circle shadow-1-strong me-3"
                                                                 src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                                                 alt="avatar" width="60"
                                                                 height="60"/>
                                                            <div>
                                                                <h6 class="fw-bold text-primary mb-1">{{$comment->user->name}}</h6>
                                                                <p class="text-muted small mb-0">{{$comment->created_at}}</p>
                                                            </div>
                                                        </div>

                                                        <p class="mt-3 mb-4 pb-2"> {{$comment->text}}</p>

                                                    @endforeach
                                                </div>
                                                @guest()
                                                    <div style="color: red">Необходимо авторизоваться</div>
                                                @endguest
                                                @auth('web')
                                                <div class="card-footer py-3 border-0"
                                                     style="background-color: #f8f9fa;">
                                                    <div class="d-flex flex-start w-100">
                                                        <img class="rounded-circle shadow-1-strong me-3"
                                                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp"
                                                             alt="avatar" width="40"
                                                             height="40"/>
                                                        <div class="form-outline w-100">
                                                            <form method="POST"
                                                                  action="{{ route("comment") }}">
                                                                @csrf
                                                                <textarea name="text" class="form-control"
                                                                          id="textAreaExample" rows="4"
                                                                          style="background: #fff;"></textarea>
                                                                <input type="hidden" name="article_id"
                                                                       value="{{$article->id}}">
                                                                <label class="form-label"
                                                                       for="textAreaExample">Message</label>
                                                                @if(!auth()->user())
                                                                    <div style="color: red">Необходимо авторизоваться</div>
                                                                @endif
                                                                <div class="float-end mt-2 pt-1">
                                                                    <button type="submit"
                                                                            {{!auth()->user() ? 'disabled' : ''}}
                                                                            class="btn btn-primary btn-sm">Написать
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    @endauth
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    {{ $comments->links() }}
@endsection

