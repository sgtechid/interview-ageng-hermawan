<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Cron Job</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="row px-4">
                            <div class="col-md-6 py-3">
                                <label class="form-label">Base Currency</label>
                                <div class="input-group input-group-outline my-1">
                                    <input type="text" class="form-control" name="name" disabled
                                        placeholder="USD ">
                                </div>
                            </div>
                            <div class="col-md-6 py-3">
                                <label class="form-label">Target Currency</label>
                                <div class="input-group input-group-outline my-1">
                                    <input type="text" class="form-control" name="name" disabled
                                        placeholder="IDR ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 px-4">
                            @foreach ($result_convert['data'] as $key => $value)
                                <div class="alert alert-info" role="alert">
                                    <span class="text-light">{{ $key }} :
                                        {{ $value }}</span>
                                    <br />
                                </div>
                            @endforeach
                        </div>
                        <div class="progress m-4">
                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 100%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-header">Currency Converter Cron Job</div>
                                <div class="card-body">
                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>

                                        <form method="POST" action="{{ route('cron-job.destroy') }}">
                                            @csrf
                                            @method('post')
                                            <button type="submit" class="btn btn-primary">Non Aktifkan Cron
                                                Job</button>
                                        </form>
                                    @elseif(session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @else
                                        <p>Set up a cron job to convert IDR to USD every 12 hours</p>
                                        <form method="POST" action="{{ route('cron-job.create') }}">
                                            @csrf
                                            @method('post')
                                            <button type="submit" class="btn btn-primary">Add Cron Job</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#multiple-select-field').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                closeOnSelect: false,
            });

        });
    </script>
</x-app-layout>
