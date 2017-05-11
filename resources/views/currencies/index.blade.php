{{-- <div id="content"> --}}
@extends ('layout')

@section ('content')

    <h1>Currency Converter</h1>

  {{-- <div id="currencyTable">
    @include ('currencies.table')
    @yield ('table')

  </div> --}}
    <div class="form-group form-inline">
      <select id="currency_from" class="currencyConvert form-control">
        <option value="">Select a currency:</option>
        @foreach ($currencies as $currency)
          <option class="{{ $currency->iso_4217 }} currencyOption" value="{{ $currency->iso_4217 }}">{{ $currency->iso_4217 }}</option>
        @endforeach
      </select>

      <input id="currency_amount" class="currencyConvert form-control" type="number" value="0"/>

      <select id="currency_to" class="currencyConvert form-control">
        <option value="">Select a currency:</option>
        @foreach ($currencies as $currency)
          <option class="{{ $currency->iso_4217 }} currencyOption" value="{{ $currency->iso_4217 }}">{{ $currency->iso_4217 }}</option>
        @endforeach
      </select>
      <span id="result" class="h4"></span>
    </div>
{{-- </div> --}}

    <div class="form-group">
      <button id="update_currencies" class="btn btn-primary btn-md">Update Currencies</button>
      <button id="truncate" class="btn btn-danger btn-md" type="button">Clean</button>
    </div>

    <div class="row" style="overflow-y: scroll; height:60vh;">

        <table id="currency_table" class="table table-striped table-hover table-bordered">
          <tr>
            <th>ISO 4217</th>
            <th>Name</th>
            <th>Date Created</th>
            <th>Date Modified</th>
            <th>Rate</th>
          </tr>

          @foreach ($currencies as $currency)
            <tr class="currencyRow">
              <td>{{ $currency->iso_4217 }}</td>
              <td>{{ $currency->name }}</td>
              <td>{{ $currency->date_created }}</td>
              <td>{{ $currency->date_modified }}</td>
              <td class="{{ $currency->iso_4217 . '_rate' }}">{{ $currency->rate }}</td>
            </tr>
          @endforeach
        </table>

    </div>



@endsection
