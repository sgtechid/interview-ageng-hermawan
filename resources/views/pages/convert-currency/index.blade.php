<x-app-layout>
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Convert Currency</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form action="{{ route('convert.currency.index') }}" method="get" id="convert-form">
                            <div class="row px-4">
                                @if ($result_convert != null)
                                    <div class="col-md-12">
                                        @foreach ($result_convert['data'] as $key => $value)
                                            <div class="alert alert-info" role="alert">
                                                <span class="text-light">{{ $key }} :
                                                    {{ $value }}</span>
                                                <br />
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="row px-4">
                                <div class="col-md-6 py-3">
                                    <div class="form-group">
                                        <label class="form-label">Base Currency :</label>
                                        <div class="input-group input-group-outline">
                                            <select class="form-control" name="base_currency" required>
                                                @foreach ($data_currencies as $dc)
                                                    <option value="{{ $dc['code'] }}"
                                                        {{ $base_currency == $dc['code'] ? 'selected' : '' }}>
                                                        {{ $dc['code'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 py-3">
                                    <div class="form-group">
                                        <label class="form-label">Target Currency :</label>
                                        <select class="form-select" id="multiple-select-field" name="target_currency[]"
                                            required data-placeholder="Choose anything" multiple>
                                            @foreach ($data_currencies as $dc)
                                                <option value="{{ $dc['code'] }}">
                                                    {{ $dc['code'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 px-4 pt-1">
                                <button class="btn btn-info">Check Rates</button>
                            </div>
                        </form>


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
