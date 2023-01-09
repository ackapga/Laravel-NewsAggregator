@extends('layouts.admin')
@section('content')
    <style>
        .flex-container {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-flow: row wrap;
            flex-flow: row wrap;
            text-align: center;
        }

        .flex-container > * {
            padding: 15px;
            -webkit-flex: 1 100%;
            flex: 1 100%;
        }

        .article {
            text-align: left;
            -webkit-flex: 5 0;
            flex: 5 0;
            order: 2;
        }

        .headInfo {
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .textInfo {
            margin-top: 15px;
            padding-left: 10%;
            padding-right: 10%;
        }

        headerNotes {
            background: black;
            color: grey;
            display: flex;
            flex-direction: row-reverse;
            margin-top: 15px;
        }

        footer {
            background: #aaa;
            color: white;
            order: 3;
        }

        .imageNones {
            width: 30px;
        }

        .titleText {
            padding-left: 7px;
        }

        .footerNote {
            color: white;
            background: none;
            border: none;
        }

        .footerNote:hover {
            color: white;
            text-shadow: 0 0 5px yellow;
        }

        .footerInfo {
            background: linear-gradient(to top, #ffffff, #fcd43b);
            border-radius: 90px;
            margin-top: 10px;
        }

    </style>

    <body>

    <div class="flex-container">
        <headerNotes>
            Дата создания: {{ $note->created_at }}
        </headerNotes>

        <article class="article">
            <div class="headInfo">
                <img class="imageNones"
                     src="https://cdn-icons-png.flaticon.com/512/3209/3209265.png"
                     alt="Notes">
                <h4 class="titleText">{{$note->title}}</h4>
            </div>
            <div class="textInfo">
                {!! $note->content !!}
            </div>


        </article>

        <footer>

            <button class="footerNote"
                    data-bs-toggle="collapse"
                    data-bs-target="#information">
                News aggregator &copy; <?php echo date('Y') ?>
            </button>

            <div class="collapse footerInfo" id="information">

                <div class="row">

                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-muted">Developer: Аскар Маемгенов</h4>
                        <p class="text-muted">
                            Этот веб-сайт разработал Аскар Маемгенов. Использовал фреймворк - Laravel. <br>
                            Релиз Новостного агрегатора(агрегатор СМИ) — машинная программа или информационный
                            интернет-ресурс,
                            собирающий информационную ленту. Формирует и подбирает новости из различных СМИ.
                        </p>
                    </div>

                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-muted">Напиши мне:</h4>
                        <ul class="list-unstyled">
                            <li><a href="mailto:ackapga@gmailcom" style="text-decoration: none; color: grey"
                                   target="_blank">Email me: ackapga@gmail.com</a></li>
                            <li><a href="https://www.instagram.com/ackapga"
                                   style="text-decoration: none; color: gray" target="_blank">Instagram:
                                    @ackapga</a></li>
                            <li><a href="https://t.me/ackapga" style="text-decoration: none; color: gray"
                                   target="_blank">Telegram: @ackapga</a></li>
                        </ul>
                    </div>

                </div>

            </div>

        </footer>

    </div>

    </body>

@endsection
