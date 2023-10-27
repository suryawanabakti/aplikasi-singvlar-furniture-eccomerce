<x-app-layout>


    <section class="section">

        <div class="section-header">
            <h1>Pengaduan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Pengaduan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
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
                                    <h4 class="card-title">Pengaduan </h4>
                                </div>
                                <div class="card-body">
                                    <main class="content">
                                        <div class="container p-0">
                                            <div class="card">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            @foreach ($users as $user)
                                                                <div class="col-md-12 mb-4">
                                                                    <div class="d-flex justify-content-between">
                                                                        <a href="?user={{ $user->id }}"
                                                                            class="text-decoration-none text-dark {{ $user->id == request('user') ? 'font-weight-bold' : '' }}">
                                                                            <img alt="image"
                                                                                src="https://ui-avatars.com/api/?name={{ $user->name }}"
                                                                                class="rounded-circle mr-1">
                                                                            {{ $user->name }}
                                                                        </a>
                                                                        <a href="/admintoko/live-chat/delete?user={{ $user->id }}"
                                                                            onclick="return confirm('Apakah anda yakin membersihkan chat ini?')"
                                                                            class="text-danger"><i
                                                                                class="fas fa-trash"></i></a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                    </div>

                                                    <div class="col-md-8">
                                                        <div class="position-relative">
                                                            <div class="chat-messages p-4" id="bodyChat">
                                                                @foreach ($chats as $chat)
                                                                    <div
                                                                        class="chat-message-{{ $chat->is_admin == 1 ? 'right' : 'left' }} pb-4">
                                                                        <div>
                                                                            <img src="https://ui-avatars.com/api/?name={{ $chat->is_admin == 1 ? auth()->user()->name : $chat->user->name }}"
                                                                                class="rounded-circle mr-1"
                                                                                alt="Sharon Lessman" width="40"
                                                                                height="40">
                                                                            <div
                                                                                class="text-muted small text-nowrap mt-2">
                                                                                {{ $chat->created_at->addHour(8)->format('H:i') }}
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="flex-shrink-1  rounded py-2 px-3 ml-3">
                                                                            <div class="font-weight-bold mb-1">
                                                                                {{ $chat->is_admin == 1 ? auth()->user()->name : $chat->user->name }}
                                                                            </div>
                                                                            {{ $chat->pesan }}
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>

                                                            @if ($users->count() > 0)
                                                                <div class="flex-grow-0 py-3 px-4 border-top">
                                                                    <div class="mb-2" id="suggestion">
                                                                    </div>
                                                                </div>
                                                                <form action="/admintoko/live-chat" method="POST">
                                                                    @csrf
                                                                    <div class="input-group">
                                                                        <input type="hidden" name="user"
                                                                            value="{{ request('user') ?? $chats->first()->user_id }}">
                                                                        <input type="text" id="pesan"
                                                                            name="pesan" class="form-control"
                                                                            autofocus placeholder="Masukkan Pesan Anda">
                                                                        <button class="btn btn-primary">Send</button>
                                                                    </div>
                                                                </form>
                                                            @else
                                                                Belum ada pengaduan...
                                                            @endif

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
                </div>
            </div>
        </div>
    </section>
    <x-slot name="modal"></x-slot>
</x-app-layout>
