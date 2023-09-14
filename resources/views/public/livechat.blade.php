@extends('public.layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <style>
                    .chat-online {
                        color: #34ce57
                    }

                    .chat-offline {
                        color: #e4606d
                    }

                    .chat-messages {
                        display: flex;
                        flex-direction: column;
                        max-height: 800px;
                        overflow-y: scroll
                    }

                    .chat-message-left,
                    .chat-message-right {
                        display: flex;
                        flex-shrink: 0
                    }

                    .chat-message-left {
                        margin-right: auto
                    }

                    .chat-message-right {
                        flex-direction: row-reverse;
                        margin-left: auto
                    }

                    .py-3 {
                        padding-top: 1rem !important;
                        padding-bottom: 1rem !important;
                    }

                    .px-4 {
                        padding-right: 1.5rem !important;
                        padding-left: 1.5rem !important;
                    }

                    .flex-grow-0 {
                        flex-grow: 0 !important;
                    }

                    .border-top {
                        border-top: 1px solid #dee2e6 !important;
                    }
                </style>
                <div class="card-header">
                    <h4 class="card-title">Live Chat</h4>
                </div>
                <div class="card-body">
                    <main class="content">
                        <div class="container p-0">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-12 col-lg-12 col-xl-9">
                                        <div class="position-relative">
                                            <div class="chat-messages p-4" id="bodyChat">

                                                @foreach ($chats as $chat)
                                                    <div
                                                        class="chat-message-{{ auth()->id() == $chat->user_id ? 'right' : 'left' }} pb-4">
                                                        <div>
                                                            <img src="https://ui-avatars.com/api/?name={{ $chat->user->name }}"
                                                                class="rounded-circle mr-1" alt="Sharon Lessman"
                                                                width="40" height="40">
                                                            <div class="text-muted small text-nowrap mt-2">
                                                                {{ $chat->created_at->format('H:i') }}</div>
                                                        </div>
                                                        <div class="flex-shrink-1  rounded py-2 px-3 ml-3">
                                                            <div class="font-weight-bold mb-1">{{ $chat->user->name }}</div>

                                                            {{ $chat->pesan }}
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>

                                            <div class="flex-grow-0 py-3 px-4 border-top">
                                                <div class="mb-2" id="suggestion">
                                                </div>
                                            </div>
                                            <form action="/live-chat" method="POST">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" id="pesan" name="pesan" class="form-control"
                                                        autofocus placeholder="Masukkan Pesan Anda">
                                                    <button class="btn btn-primary">Send</button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
